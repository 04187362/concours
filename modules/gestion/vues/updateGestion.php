<?php

	include("connexion/connexiongenerale.php");
	include('modules/users/modeles/methodeUsers.php');
  	include('modules/gestion/modeles/methodeGestion.php');
  	include('modules/parametrage/modeles/methodeParametrage.php');

  	include('entites/ClsEmploiTemps.php');
  	include('entites/ClsInscription.php');
  	include('entites/ClsPaiement.php');
  	include('entites/ClsComposer.php');
  	include('entites/ClsProgramme.php');
  	include('entites/ClsEnseigner.php');
  	include('entites/ClsEmargement.php');
  	include('entites/ClsAbsenceEtudiant.php');
  	include("globale/verification.php");

?>

<?php

	if(isset($_POST['gestion']) && ($_POST['gestion']=="emploi_temps")){

		if(!empty($_POST['classe']) && !empty($_POST['annee']) && !empty($_POST['heure_debut']) && !empty($_POST['heure_fin']) && !empty($_POST['id_emploi']))
		{

			$id_emploi=htmlspecialchars($_POST['id_emploi']);
			$id_annee=htmlspecialchars($_POST['annee']);
			$id_classe=htmlspecialchars($_POST['classe']);
			$heure_debut=htmlspecialchars($_POST['heure_debut']);
			$heure_fin=htmlspecialchars($_POST['heure_fin']);
			$lundi=htmlspecialchars($_POST['lundi']);
			$mardi=htmlspecialchars($_POST['mardi']);
			$mercredi=htmlspecialchars($_POST['mercredi']);
			$jeudi=htmlspecialchars($_POST['jeudi']);
			$vendredi=htmlspecialchars($_POST['vendredi']);
			$samedi=htmlspecialchars($_POST['samedi']);

			$table = "emploi_temps";
			$colonne2 = "id_classe";
			$colonne3 = "id_anneeAc";

			//if(existanceChampsGestion($table, $colonne1, $id_heure, $colonne2, $id_classe, $colonne3, $id_annee)==0){

					$emploi_temps = new EmploiTemps();

					$emploi_temps->setId_emploi($id_emploi);
					$emploi_temps->setHeure_fin($heure_fin);
					$emploi_temps->setHeure_debut($heure_debut);
					$emploi_temps->setAnneeAc($id_annee);
					$emploi_temps->setClasse($id_classe);
					$emploi_temps->setLundi($lundi);
					$emploi_temps->setMardi($mardi);
					$emploi_temps->setMercredi($mercredi);
					$emploi_temps->setJeudi($jeudi);
					$emploi_temps->setVendredi($vendredi);
					$emploi_temps->setSamedi($samedi);

					$count = $emploi_temps->modifierEmploiTemps();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Emploi du temps modifié avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
					
					}
					
			/*}else{
					echo '<div style="text-align:center; color:orange">Le pays <span style="color:yellow">'.$id_classe.'</span> existe déjà !</div></div>';
			}*/						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}


	if(isset($_POST['gestion']) && ($_POST['gestion']=="inscription")){

		if(!empty($_POST['id_ins']) && !empty($_POST['annee']) && !empty($_POST['etudiant']) && !empty($_POST['frait']))
		{

			$id_ins=htmlspecialchars($_POST['id_ins']);
			$id_annee=htmlspecialchars($_POST['annee']);
			$etudiant=htmlspecialchars($_POST['etudiant']);
			$frait=htmlspecialchars($_POST['frait']);

			$table1 = "inscription";
			$colonne1 = "id_etu";
			$colonne2 = "id_annee";

			$val_recuperer1 = "nom_pers";
			$val_recuperer2 = "prenom_pers";

			$colonne3 = "id_pers";
			$table2 = "personne";

			$colonne4 = "id_ins";

			$nom_etu = getChampsGestion($val_recuperer1, $table2, $colonne3, $etudiant);

			$prenom_etu = getChampsGestion($val_recuperer2, $table2, $colonne3, $etudiant);

			if(existanceChampsGestion3($table1, $colonne1, $etudiant, $colonne2, $id_annee, $colonne4, $id_ins)==0){

					$inscription = new Inscription();

					$inscription->setId_ins($id_ins);
					$inscription->setAnneeAc($id_annee);
					$inscription->setEtudiant($etudiant);
					$inscription->setFrait($frait);

					$count = $inscription->modifierInscription();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Inscription modifiée avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">L\'etudiant <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a été déjà inscrit.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}
	

	if(isset($_POST['gestion']) && ($_POST['gestion']=="programme")){

		if(!empty($_POST['id_pro']) && !empty($_POST['niveauetude']) && !empty($_POST['matiere']) && !empty($_POST['coef']) 
			&& !empty($_POST['ue']) && !empty($_POST['credit']))
		{
			$id_pro =htmlentities(htmlspecialchars($_POST['id_pro']));
			$id_matiere=htmlentities(htmlspecialchars($_POST['matiere']));
			$id_niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
			$coef=htmlentities(htmlspecialchars($_POST['coef']));
			$uniteEnseignement=htmlentities(htmlspecialchars($_POST['ue']));
			$credit=htmlentities(htmlspecialchars($_POST['credit']));

			//On verifie si la matiere a déjà été programmée dans une classe.
			$requete1 = "SELECT * FROM programme WHERE id_matiere=? AND id_niveauetude=? AND id_pro NOT IN(?)";
			$param1 = array($id_matiere,$id_niveauetude,$id_pro);
			//On recupere le libellé de la matière
			$requete2 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
			$param2 = array($id_matiere);
			$lib_matiere = getChampsParametrage($requete2,$param2);
			//On recupere le libellé de la matière
			$requete3 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
			$param3 = array($id_niveauetude);
			$lib_niveauetude = getChampsParametrage($requete3,$param3);

			if(existanceGestion($requete1,$param1)==0){

				if($coef > 0){

					$programme = new Programme();

					$programme->setId_pr($id_pro);
					$programme->setMatiere($id_matiere);
					$programme->setNiveauEtude($id_niveauetude);
					$programme->setCoef($coef);
					$programme->setUniteEnseignement($uniteEnseignement);
					$programme->setCredit($credit);
					$programme->setAnneeAc($id_an);

					$count = $programme->modifierProgramme();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Programme modifié avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
					
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez un coefficient positif.</b></div>';

				}
					
			}else{
					echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$lib_matiere.'</span> a été déjà programmée en <span style="color:yellow">'.$lib_niveauetude.'.</span></div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}


	if(isset($_POST['gestion']) && ($_POST['gestion']=="composition")){

		if(!empty($_POST['id_com']) && !empty($_POST['note']) && !empty($_POST['matiere']) && !empty($_POST['etudiant']) 
			&& !empty($_POST['trimestre']) && !empty($_POST['evaluation']) && !empty($id_an))
		{

			$id_com=htmlspecialchars($_POST['id_com']);
			$id_annee=htmlspecialchars($id_an);
			$id_matiere=htmlspecialchars($_POST['matiere']);
			$etudiant=htmlspecialchars($_POST['etudiant']);
			$trimestre=htmlspecialchars($_POST['trimestre']);
			$evaluation=htmlspecialchars($_POST['evaluation']);
			$note=htmlspecialchars($_POST['note']);

			$table1 = "composer";
			$colonne1 = "id_etu";
			$colonne2 = "id_matiere";

			$val_recuperer1 = "nom_pers";
			$val_recuperer2 = "prenom_pers";
			$val_recuperer3 = "lib_matiere";

			$colonne3 = "id_pers";
			$table2 = "personne";

			$colonne4 = "id_com";
			$colonne5 = "evaluation";

			$valeur5 = "Examen";

			$table3 = "matiere";

			$colonne6 ="trimestre";

			$lib_matiere = getChampsParametrage($val_recuperer3, $table3, $colonne2, $id_matiere);

			$nom_etu = getChampsGestion($val_recuperer1, $table2, $colonne3, $etudiant);

			$prenom_etu = getChampsGestion($val_recuperer2, $table2, $colonne3, $etudiant);

			if($note >= 0 && $note <= 20){

				if($evaluation =="Examen"){

					if(existanceChampsGestion6($table1, $colonne1, $etudiant, $colonne2, $id_matiere, $colonne6, $trimestre, $colonne5, $evaluation, $colonne4, $id_com)==0){

						$composition = new Composer();

						$composition->setId_com($id_com);
						$composition->setAnneeAc($id_annee);
						$composition->setMatiere($id_matiere);
						$composition->setEtudiant($etudiant);
						$composition->setTrimestre($trimestre);
						$composition->setEvaluation($evaluation);
						$composition->setNote($note);

						$count = $composition->modifierComposition();

						if($count>0){

							echo '<div style="text-align:center" class="text-mint"><b>Composition modifiée avec succès.</b></div>';
						
						}else{

							echo '<div style="text-align:center; color:orange"><b><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
						}

					}else{

						echo '<div style="text-align:center; color:orange"><span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a déjà composé la matière de <span style="color:yellow">'.$lib_matiere.'</span>.</div></div>';

					}

				}else{

					$composition = new Composer();

					$composition->setId_com($id_com);
					$composition->setAnneeAc($id_annee);
					$composition->setMatiere($id_matiere);
					$composition->setEtudiant($etudiant);
					$composition->setTrimestre($trimestre);
					$composition->setEvaluation($evaluation);
					$composition->setNote($note);

					$count = $composition->modifierComposition();

					if($count>0){

						echo '<div class="text-center text-mint"><b>Composition modifiée avec succès.</b></div>';
						
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
					}

				}

			}else{

				echo '<div style="text-align:center; color:orange"><b>Entrez une note comprise entre 0 et 20.</b></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}


	if(isset($_POST['gestion']) && ($_POST['gestion']=="paiement")){

		if(!empty($_POST['id_paye']) && !empty($_POST['mois']) && !empty($id_an) && !empty($_POST['etudiant']) && !empty($_POST['frait']) && !empty($id_personne))
		{

			$id_paye=htmlspecialchars($_POST['id_paye']);
			$id_annee=htmlspecialchars($id_an);
			$mois=htmlspecialchars($_POST['mois']);
			$etudiant=htmlspecialchars($_POST['etudiant']);
			$frait=htmlspecialchars($_POST['frait']);
			$id_pers=htmlspecialchars($id_personne);

			$table1 = "paiement";
			$colonne1 = "id_etu";
			$colonne2 = "id_annee";

			$val_recuperer1 = "nom_pers";
			$val_recuperer2 = "prenom_pers";
			$colonne3 = "id_pers";
			$table2 = "personne";

			$colonne4 = "mois";
			$colonne5 = "id_paye";

			$nom_etu = getChampsGestion($val_recuperer1, $table2, $colonne3, $etudiant);
			$prenom_etu = getChampsGestion($val_recuperer2, $table2, $colonne3, $etudiant);
			// Verifions si l'etudiant a deja paye ou pas
			if(existanceChampsGestion4($table1, $colonne1, $etudiant, $colonne2, $id_annee, $colonne4, $mois, $colonne5, $id_paye)==0){

					$paiement = new Paiement();

					$paiement->setIdPaye($id_paye);
					$paiement->setAnnee($id_annee);
					$paiement->setMois($mois);
					$paiement->setEtudiant($etudiant);
					$paiement->setFrait($frait);
					$paiement->setPersonnel($id_pers);

					$count = $paiement->modifierPaiement();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Paiement modifié avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'est effectuée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange"><span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a déjà payé le mois de '.$mois.'.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}


	if(isset($_POST['gestion']) && ($_POST['gestion']=="enseignement")){

		if(!empty($_POST['id_enseigner']) && !empty($_POST['niveauetude']) && !empty($_POST['matiere']) && !empty($_POST['volumehoraire']) 
			&& !empty($_POST['enseignant']) && !empty($_POST['cout_heure']) && !empty($_POST['ue']))
		{
			$id_enseigner =htmlentities(htmlspecialchars($_POST['id_enseigner']));
			$id_matiere=htmlentities(htmlspecialchars($_POST['matiere']));
			$id_niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
			$volumehoraire=htmlentities(htmlspecialchars($_POST['volumehoraire']));
			$id_ens = htmlentities(htmlspecialchars($_POST['enseignant']));
			$cout_heure = htmlentities(htmlspecialchars($_POST['cout_heure']));
			$ue = htmlentities(htmlspecialchars($_POST['ue']));

			//On verifie si la matiere a déjà été programmée dans une classe.
			$requete1 = "SELECT * FROM enseigner WHERE id_matiere=? AND id_niveauetude=? AND id_enseigner NOT IN(?)";
			$param1 = array($id_matiere,$id_niveauetude,$id_enseigner);
			//On recupere le libellé de la matière
			$requete2 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
			$param2 = array($id_matiere);
			$lib_matiere = getChampsParametrage($requete2,$param2);
			//On recupere le libellé de la matière
			$requete3 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
			$param3 = array($id_niveauetude);
			$lib_niveauetude = getChampsParametrage($requete3,$param3);

			if(existanceGestion($requete1,$param1)==0){

				if($volumehoraire > 0){

					$enseignement = new Enseigner();

					$enseignement->setId_enseigner($id_enseigner);
					$enseignement->setMatiere($id_matiere);
					$enseignement->setNiveauEtude($id_niveauetude);
					$enseignement->setVol_hor($volumehoraire);
					$enseignement->setEnseignant($id_ens);
					$enseignement->setCout_heure($cout_heure);
					$enseignement->setUniteEnseignement($ue);

					$count = $enseignement->modifierEnseignement();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Enseignement modifié avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'enseignement n\'a pas été mis à jour.</b></div>';
					
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez un volume d\'horaire positif.</b></div>';

				}
					
			}else{
					echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$lib_matiere.'</span> a été déjà enseignée en <span style="color:yellow">'.$lib_niveauetude.'.</span></div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}


	if(isset($_POST['gestion']) && ($_POST['gestion']=="Emargement")){
  	
		if(!empty($_POST['id_em']) &&!empty($_POST['enseignant']) && !empty($_POST['niveauetude']) && !empty($_POST['matiere']) 
			&& !empty($_POST['heure_effectue']) && !empty($_POST['titre_cours']) && !empty($_POST['heure_debut']) 
			&& !empty($_POST['heure_fin']) && !empty($_POST['type_seance']) && !empty($_POST['mois']) && !empty($_POST['date_em']))
		{
			$id_em=htmlspecialchars($_POST['id_em']);
			$id_matiere=htmlspecialchars($_POST['matiere']);
			$id_niveauetude=htmlspecialchars($_POST['niveauetude']);
			$heure_effectue=htmlspecialchars($_POST['heure_effectue']);
			$id_ens = htmlspecialchars($_POST['enseignant']);
			$heure_deb=htmlspecialchars($_POST['heure_debut']);
			$heure_f=htmlspecialchars($_POST['heure_fin']);
			$type_seance=htmlspecialchars($_POST['type_seance']);
			$titre_cours = addslashes(htmlspecialchars($_POST['titre_cours']));
			$mois=htmlspecialchars($_POST['mois']);
			$date_em = htmlspecialchars($_POST['date_em']);

			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
			$requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
			$param1 = array($id_ens);

			$nom_pers = getChampsUsers($requete1,$param1);
			$prenom_pers = getChampsUsers($requete2,$param1);

			$requete3 = "SELECT * FROM emargement WHERE id_ens=? AND heure_debut =? AND heure_fin=? AND date_em=? AND id_em NOT IN(?)";
			$param3 = array($id_ens,$heure_deb,$heure_f,$date_em,$id_em);

			if(existanceGestion($requete3, $param3)==0){

				if($heure_effectue > 0){

					if($heure_deb < $heure_f){
						$emargement = new Emargement();

						$emargement->setId_em($id_em);
						$emargement->setMatiere_em($id_matiere);
						$emargement->setNiveauEtude($id_niveauetude);
						$emargement->setHeure_effectue($heure_effectue);
						$emargement->setEnseignant_em($id_ens);
						$emargement->setTitre_cours($titre_cours);
						$emargement->setHeure_debut($heure_deb);
						$emargement->setHeure_fin($heure_f);
						$emargement->setType_seance($type_seance);
						$emargement->setMois($mois);
						$emargement->setDate_em($date_em);

						$count = $emargement->modifierEmargement();

						if($count>0){

							echo '<div style="text-align:center" class="text-mint"><b>Emargement modifié avec succès.</b></div>';
						
						}else{

							echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été faite.</b></div>';
						
						}
					}else{
						echo '<div style="text-align:center; color:orange"><b>Heure de debut doit etre superieure à celle de fin.</b></div>';
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez une heure effectuée positive.</b></div>';

				}
					
			}else{
				echo '<div style="text-align:center; color:orange"><span style="color:yellow">'.$nom_pers.' '.$prenom_pers.'</span> a été enregistré à des heures renseignées.</div></div>';
			}					
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}


	if(isset($_POST['gestion']) && ($_POST['gestion']=="AbsenceEtudiant")){
  	
		if(!empty($_POST['id_abs']))
		{

			$id_abs=htmlentities(htmlspecialchars($_POST['id_abs']));
			$justification=htmlentities(htmlspecialchars($_POST['justification']));;

			$table1 = "absence_etudiant";
			$colonne1 = "id_em";
			$colonne2 = "id_etu";

			/*$val_recuperer1 = "nom_pers";
			$val_recuperer2 = "prenom_pers";
			$colonne3 = "id_pers";
			$table2 = "personne";

			$nom_etu = getChampsGestion($val_recuperer1, $table2, $colonne3, $etudiant);
			$prenom_etu = getChampsGestion($val_recuperer2, $table2, $colonne3, $etudiant);

			if(existanceChampsGestion2($table1, $colonne1, $id_em, $colonne2, $etudiant)==0){*/

					$absence = new AbsenceEtudiant();

					$absence->setId_abs($id_abs);
					$absence->setJustification($justification);

					$count = $absence->modifierAbsenceEtudiant();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Absence modifiée avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été enregistrée.</b></div>';
					
					}
					
			/*}else{
					echo '<div style="text-align:center; color:orange">L\'absence de <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a été déjà enregistrée.</div></div>';
			}*/						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}
	// Mise à jour de la moyenne d'admission
	if(isset($_POST['gestion']) && ($_POST['gestion']=="updateMoyValidation")){
  	
		if(!empty($_POST['classe']) && ($_POST['classe'] !="Selectionner") && !empty($_POST['moyenne'])
			&& !empty($_POST['trimestre']) && ($_POST['trimestre'] !="Selectionner"))
		{

			$id_classe=htmlspecialchars($_POST['classe']);
			$trimestre=htmlspecialchars($_POST['trimestre']);
			$moyenne = htmlspecialchars($_POST['moyenne']);

			if($moyenne > 0){

				$count = updateMoyenneAdm($id_classe, $trimestre, $moyenne);

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Moyenne d\'admission modifiée avec succès</b></div>';
						
				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été faite.</b></div>';
						
				}
			}else{
				echo '<div style="text-align:center; color:orange"><b>La moyenne d\'admission doit etre positive.</b></div>';
			}

			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}

	if(isset($_POST['gestion']) && ($_POST['gestion']=="updatePublication")){
  	
		if(!empty($_POST['classe_pub']) && ($_POST['classe_pub'] !="Selectionner") 
			&& !empty($_POST['trimestre_pub']) && ($_POST['trimestre_pub'] !="Selectionner"))
		{

			$id_classe=htmlspecialchars($_POST['classe_pub']);
			$trimestre=htmlspecialchars($_POST['trimestre_pub']);

			$count = updateEtatPublication($id_classe, $trimestre);

			if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Resultat publié avec succès</b></div>';
						
			}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été faite.</b></div>';
						
			}
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}

	// Edition de la moyenne de validation du concours
	if(isset($_POST['gestion']) && ($_POST['gestion']=="updateMoyValidationConcours")){
  	
		if(!empty($_POST['filiere']) && ($_POST['filiere'] !="Selectionner") && !empty($_POST['moyenne']))
		{

			$id_filiere=htmlentities(htmlspecialchars($_POST['filiere']));
			$moyenne = htmlentities(htmlspecialchars($_POST['moyenne']));

			if($moyenne > 0){
				$requete = "UPDATE filiere SET moyenne_admission = ? WHERE id_filiere = ?";
				$param = array($moyenne,$id_filiere);
				$count = updateMoyenneAdmissionConcours($requete,$param);

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Moyenne d\'admission modifiée avec succès.</b></div>';
						
				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été faite.</b></div>';
						
				}
			}else{
				echo '<div style="text-align:center; color:orange"><b>La moyenne d\'admission doit être positive.</b></div>';
			}

			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Touss les champs sont obligatoires.</b></div>';
		}

	}

	//Publication des resultats du concours
	if(isset($_POST['gestion']) && ($_POST['gestion']=="updatePublicationConcours")){
  	
		if(!empty($_POST['filiere_pub']) && ($_POST['filiere_pub'] !="Selectionner"))
		{

			$id_filiere=htmlentities(htmlspecialchars($_POST['filiere_pub']));

			$requete = "UPDATE filiere SET etat_publication = 1 WHERE id_filiere = ?";
			$param = array($id_filiere);
			$count = updateEtatPublicationConcours($requete,$param);

			if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Resultat publié avec succès</b></div>';
						
			}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été faite.</b></div>';
						
			}
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}
		
?>