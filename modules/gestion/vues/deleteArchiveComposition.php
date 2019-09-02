<?php

  	include('modules/users/modeles/methodeUsers.php');
  	include('modules/gestion/modeles/methodeGestion.php');
  	include('entites/ClsArchiveComposition.php');
?>

<?php
	if(!empty($_POST['anneeP']) && !empty($_POST['password']) && !empty($_POST['conf_password']))
	{

		$anneeAc=htmlspecialchars($_POST['anneeP']);
		$password=htmlspecialchars($_POST['password']);
		$conf_password=htmlspecialchars($_POST['conf_password']);

		if($password == $conf_password){
			$table = "personne";
			$colonne = "password";

			if(existanceUsers($table, $colonne, $password)==1){

					$archive = new ArchiveComposition();

					$archive->setAnneeAc($anneeAc);

					$count = $archive->suppressionMultiLigne($anneeAc);
					// Recuperation du nombre de composition pour d'une année
					$table1 = "archiver_composer";
					$colonne = "anneeAc";
					$nbre_comp = getNombreLigneGestion($table1, $colonne, $anneeAc);

					if($count > 0){

						if($count = $nbre_comp){

							echo '<div style="text-align:center" class="text-mint"><b>Suppression effectuée avec succès</b></div>';
						
						}else{
							
							echo '<div style="text-align:center; color:orange"><b>L\'opération n\'a pas été effectuée complement.</b></div>';
						
						}
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'opération à echouée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">Mot de passe incorrect.</div></div>';
			}	
		}else{
			echo '<div style="text-align:center; color:orange">Confirmer bien votre mot de passe.</div></div>';
		}
		
	}
	else
	{
		
		echo '<div style ="text-align:center; color:orange" >Tous les champs sont obligatoire</div>';
	}

		
?>