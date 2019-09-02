<?php

  	include('modules/users/modeles/methodeUsers.php');
  	
  	include('entites/ClsArchivePaiement.php');
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

					$archive = new ArchivePaiement();

					$archive->setAnneeAc($anneeAc);

					$count = $archive->supprimerArchivePaiement();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Suppression effectuée avec succès</b></div>';
					
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