<?php

	include("modules/users/modeles/methodeUsers.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
	include("entites/ClsPersonne.php");

	include("entites/ClsEtudiant.php");
	include("globale/verification.php"); 

?>

<?php

	if(!empty($_POST['nom_pers']) && !empty($_POST['prenom_pers']) && !empty($_POST['date_nais_etu']) 
	&& !empty($_POST['frait']) && !empty($id_personne) && !empty($id_an)){

		    $personnel=htmlspecialchars($id_personne);
		    $id_annee=htmlspecialchars($id_an);
			$nom_pers = addslashes(htmlspecialchars(trim($_POST['nom_pers'])));
			$prenom_pers = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$date_nais_etu = htmlspecialchars($_POST['date_nais_etu']);
			$id_frais = htmlspecialchars($_POST['frait']);
			$type_pers = "Etudiant";

			$table = "personne";
			$colonne1 = "nom_pers";
			$colonne2 = "prenom_pers";

			
				// Verfiiant l'existance du nom et prenom pour eviter la dupplication
				/*if(existanceUsers($table, $colonne1, $nom_pers, $colonne2, $prenom_pers) == 0){

					
						if(existanceDeuxChampsUsers($table, $colonne4, $tel, $colonne5, $type_pers) == 0){

							if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){*/

									
										$etudiant = new Etudiant();
										$etudiant->setNom_pers($nom_pers);
										$etudiant->setPrenom_pers($prenom_pers);
										$etudiant->setDate_nais_etu($date_nais_etu);
										$etudiant->setPersonnel($personnel);
										$etudiant->setAnneeAc($id_annee);
										$etudiant->setFrait($id_frais);
										//$etudiant->setParent($parent);
										$etudiant->setType_pers($type_pers);

										$count = $etudiant->ajouterEtudiant();

										if($count>0){

											echo '<div class ="text-mint text-center" >Etudiant enregistré avec succès.</div>';
										
										}else{

											echo '<div style ="color:orange; text-align:center" >L\'insertion à echouée.</div>';
										
										}


									/*}	

									

								else{

									$etudiant->setNom_pers($nom_pers);
										$etudiant->setPrenom_pers($prenom_pers);
										$etudiant->setDate_nais_etu($date_nais_etu);
										$etudiant->setPersonnel($personnel);
										$etudiant->setAnneeAc($id_annee);
										$etudiant->setFrait($id_frais);
										//$etudiant->setParent($parent);
										$etudiant->setType_pers($type_pers);

									$count = $etudiant->ajouterEtudiant();

										if($count>0){

											echo '<div class ="text-mint text-center" >Etudiant enregistré avec succès.</div>';
										
										}else{

											echo '<div style ="color:orange; text-align:center" >L\'insertion à echouée.</div>';
										
										}
								
									}						
								}		else{

					
				}
			
			
			}*/
		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}
	

?>