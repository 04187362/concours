<?php

	include("connexion/connexiongenerale.php");
  	include('modules/gestion/modeles/methodeGestion.php');
  	include('modules/parametrage/modeles/methodeParametrage.php');
  	include('modules/users/modeles/methodeUsers.php');
  	include('entites/ClsEmploiTemps.php');
  	include('entites/ClsInscription.php');
  	include('entites/ClsPaiement.php');
  	include('entites/ClsComposer.php');
  	include('entites/ClsProgramme.php');
?>

<?php

	if(isset($_POST['gestion']) && ($_POST['gestion']=="emploi_temps")){

		

	}

	if(isset($_POST['gestion']) && ($_POST['gestion']=="inscription")){

		if(!empty($_POST['classe']) && !empty($_POST['annee']) && !empty($_POST['etudiant']) && !empty($_POST['frait']))
		{

			$id_annee=htmlspecialchars($_POST['annee']);
			$id_classe=htmlspecialchars($_POST['classe']);
			$etudiant=htmlspecialchars($_POST['etudiant']);
			$frait=htmlspecialchars($_POST['frait']);

			$table1 = "inscription";
			$colonne1 = "id_etu";
			$colonne2 = "id_annee";

			$val_recuperer1 = "nom_pers";
			$val_recuperer2 = "prenom_pers";
			$colonne3 = "id_pers";
			$table2 = "personne";

			$nom_etu = getChampsGestion($val_recuperer1, $table2, $colonne3, $etudiant);
			$prenom_etu = getChampsGestion($val_recuperer2, $table2, $colonne3, $etudiant);

			if(existanceChampsGestion2($table1, $colonne1, $etudiant, $colonne2, $id_annee)==0){

					$inscription = new Inscription();

					$inscription->setAnneeAc($id_annee);
					$inscription->setClasse($id_classe);
					$inscription->setEtudiant($etudiant);
					$inscription->setFrait($frait);

					$count = $inscription->ajouterInscription();

					if($count>0){

						echo '<div style="text-align:center; color:white"><b>Inscription créée avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
					
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

		if(!empty($_POST['classe']) && !empty($_POST['matiere']) && !empty($_POST['coef']))
		{

			$id_matiere=htmlspecialchars($_POST['matiere']);
			$id_classe=htmlspecialchars($_POST['classe']);
			$coef=htmlspecialchars($_POST['coef']);

			$table1 = "programme";
			$colonne1 = "id_classe";
			$colonne2 = "id_matiere";

			$val_recuperer1 = "lib_matiere";
			$val_recuperer2 = "lib_classe";

			$table2 = "matiere";
			$table3 = "classe";

			$lib_matiere = getChampsParametrage($val_recuperer1, $table2, $colonne2, $id_matiere);
			$lib_classe = getChampsParametrage($val_recuperer2, $table3, $colonne1, $id_classe);

			if(existanceChampsGestion2($table1, $colonne1, $id_classe, $colonne2, $id_matiere)==0){

				if($coef > 0){

					$programme = new Programme();

					$programme->setMatiere($id_matiere);
					$programme->setClasse($id_classe);
					$programme->setCoef($coef);

					$count = $programme->ajouterProgramme();

					if($count>0){

						echo '<div style="text-align:center; color:white"><b>Programme crée avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
					
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez un coefficient positif.</b></div>';

				}
					
			}else{
					echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$lib_matiere.'</span> a été déjà programmée en <span style="color:yellow">'.$lib_classe.'.</span></div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

	}
	

	
		
?>