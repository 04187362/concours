<?php
	
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
	include("modules/users/modeles/methodeUsers.php");

	include("entites/ClsArchiveComposition.php");
	include("entites/ClsComposer.php");
?>

<?php

	$somme_note = 0;
	$count = 0;
	$count2 = 0;//supprimeCompositionEtudiant(3, 4, 2);
	// Compte le nombre total de composition.
	$nbre_comp = getNombreCompositionEtudiant();
	// Compte le nombre total d'enregistrement de la table composer
	$table0 = "composer";
	$nbre_enr = getNombreLigneGestion1($table0);

	$requete ="SELECT *
              FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
              WHERE e.id_pers = c.id_etu 
              AND c.id_matiere = m.id_matiere 
              AND m.id_matiere = p.id_matiere 
              AND p.id_classe = cl.id_classe
              AND cl.id_classe=e.id_classe
              AND c.id_anneeAc = a.id_annee
              GROUP BY m.id_matiere, id_pers, trimestre";

              $resultat = Selection($requete); 

              foreach($resultat as $p){

              	$note_examen = getNoteExamenEtudiant($p['id_pers'], $p['trimestre'], $p['id_matiere']);
                $note_devoir = getNoteDevoirEtudiant($p['id_pers'], $p['trimestre'], $p['id_matiere']);
                $coef_matiere = getCoefficientMatiere($p['id_matiere'], $p['id_classe']);

				$note_final = ($note_examen + $note_devoir)/2;
                // Calcule de la somme des note;
                $somme_note = $somme_note + (($note_examen + $note_devoir)/2)*$coef_matiere;
                // Calcule la somme des coeficients
                $table = "programme";
                $colonne = "id_classe";
				$somme_coef =  getSommeCoefficient($p['id_classe']);
				// moyenne general  de l'etudiant
				$moyenne_generale = $somme_note/$somme_coef;
				// Recuperation le nombre d'etudaint inscris dans une classe;
				$effectif_cl =  getNombreEtudiantInscription($p['id_classe']);
				// Moyenne du majorant
				$moy_major = getMoyenneMajor($p['id_classe'], $p['trimestre']);
				// Moyenne du minorant
				$moy_min = getMoyenneMinor($p['id_classe'], $p['trimestre']);
				// Recuperation du libellé du pays de l'etudiant
				$table1 = "pays";
				$colonne1 = "code_pays";
				$val_recuperer1 = "lib_pays";
				$pays = getChampsParametrage($val_recuperer1, $table1, $colonne1, $p['code_pays']);
				// Recuperation du nom, prenom de l'enseignant;
				// Recuperons tout d'abord l'identifiant de l'enseignant à partir de la matiere qu'il enseigne 
				$val_recuperer2 = "id_ens";
                $table2 = "enseigner";
                $colonne2 = "id_matiere";

                $id_ens = getChampsGestion($val_recuperer2, $table2, $colonne2, $p['id_matiere']);


                $val_recuperer3 ="nom_pers";
                $val_recuperer4 ="prenom_pers";
                $table3 = "personne";
                $colonne3 = "id_pers";
                $nom_ens = getChampsUsers($val_recuperer3, $table3, $colonne3, $id_ens);
                $prenom_ens = getChampsUsers($val_recuperer4, $table3, $colonne3, $id_ens); 
                // Recuperation du nom et prenom du DE.

                $colonne4 = "role";
                $value = "Directeur des Etudes";
                $nom_de = getChampsUsers($val_recuperer3, $table3, $colonne4, $value).' '.getChampsUsers($val_recuperer4, $table3, $colonne4, $value);

				$archive = new ArchiveComposition();

		        $archive->setNote($note_final);

		        $archive->setMatiere($p['lib_matiere']);

		        $archive->setNom_etu($p['nom_pers']);

		        $archive->setPrenom_etu($p['prenom_pers']);

		        $archive->setSexe_etu($p['sexe_pers']);

		        $archive->setDatenais_etu($p['date_nais_etu']);

		        $archive->setPays($pays);

		        $archive->setTrimestre($p['trimestre']);

				$archive->setAnneeAc($p['lib_annee']);

				$archive->setRang($p['rang']);

		        $archive->setClasse($p['lib_classe']);

		        $archive->setCoef($coef_matiere);

		        $archive->setSomme_coef($somme_coef);

		        $archive->setMoyenne($p['moyenne']);

		        $archive->setEffectif_cl($effectif_cl);

		        // Recuperation de la moyenne d'abmission du trimestre I, II et III.
                $table5 = "classe";
                
                if($p['trimestre'] == "Trimestre I"){
                	$val_recuperer5 = "moy_trim1";
                	$moy_trim1 = getChampsParametrage($val_recuperer5, $table5, $colonne, $p['id_classe']);
                	$archive->setMoy_adm($moy_trim1);

                }else if($p['trimestre'] == "Trimestre II"){
                	$val_recuperer6 = "moy_trim2";
                	$moy_trim2 = getChampsParametrage($val_recuperer6, $table5, $colonne, $p['id_classe']);
                	$archive->setMoy_adm($moy_trim2);
                }else{
                	$val_recuperer7 = "moy_trim3";
                	$moy_trim3 = getChampsParametrage($val_recuperer7, $table5, $colonne, $p['id_classe']);
                	$archive->setMoy_adm($moy_trim3);
                }

		        $archive->setMoy_major($moy_major);

				$archive->setMoy_min($moy_min);

		        $archive->setNom_ens($nom_ens);

		        $archive->setPrenom_ens($prenom_ens);

		        $archive->setNom_de($nom_de);

		        $count = $count + $archive->ajouterArchiveComposition();

		        // Supression de la composition 
		        $count2 = $count2 + supprimeCompositionEtudiant($p['id_pers'], $p['id_matiere'], $p['id_annee']);

		        // Initialisation de l'etat de la table classe;

		        $requete1 ="SELECT * FROM classe";

			              $resultat1 = Selection($requete1); 

			              foreach($resultat1 as $tablo){
			              	$id_classe = $tablo['id_classe'];
			              	$requete = "UPDATE classe SET moy_trim1 =10, moy_trim2=10, moy_trim3=10, pub_trim1=0, pub_trim2=0, pub_trim3=0 WHERE id_classe ='$id_classe'";
                    		CUD($requete);
			              }

    }

    if($count > 0){

    	if($count2 > 0 ){

    		if($count == $nbre_comp){

	    		if($count2 == $nbre_enr){
		    		echo '
					<p style="color:white" class="text-center">Vous avez inserez <b>'.$count.'</b> ligne(s) sur <b>'.$nbre_comp.'</b></p>
					<p style="color:white" class="text-center">Vous avez supprimez <b>'.$count2.'</b> ligne(s) sur <b>'.$nbre_enr.'</b></p>
					<div style="text-align:center" class="text-mint">
						<b>Ce qui justifie que l\'archivage a été effectué avec succès.</b>
					</div>';
		    	}else{

		    		echo '
					<p style="color:white" class="text-center">Vous avez inserez <b>'.$count.'</b> ligne(s) sur <b>'.$nbre_comp.'</b></p>
					<p style="color:white" class="text-center">Vous avez supprimez <b>'.$count2.'</b> ligne(s) sur <b>'.$nbre_enr.'</b></p>
					<div style="text-align:center">
						<b style="text-align:center; color:yellow">Ce qui justifie que l\'archivage n\'a pas été bien fait.</b>
					</div>';

		    	}
	    	}else{

	    		echo '
					<p style="color:white" class="text-center">Vous avez inserez <b>'.$count.'</b> ligne(s) sur <b>'.$nbre_comp.'</b></p>
					<p style="color:white" class="text-center">Vous avez supprimez <b>'.$count2.'</b> ligne(s) sur <b>'.$nbre_enr.'</b></p>
					<div style="text-align:center">
						<b style="text-align:center; color:yellow">Ce qui justifie que l\'archivage n\'a pas été bien fait.</b>
					</div>';

	    	}
	    }else{
	    	echo '
					<p style="color:white" class="text-center">Vous avez inserez <b>'.$count.'</b> ligne(s) sur <b>'.$nbre_comp.'</b></p>
					<p style="color:white" class="text-center">Vous avez supprimez <b>'.$count2.'</b> ligne(s) sur <b>'.$nbre_enr.'</b></p>
					<div style="text-align:center">
						<b style="text-align:center; color:yellow">Ce qui justifie que l\'archivage n\'a pas été bien fait.</b>
					</div>';
	    }
					
	}else{
		echo '<div style="text-align:center; color:orange"><b>L\'opération a échouée.</b></div>';	
	}

?>