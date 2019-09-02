<?php

	include_once ("connexion/connexiongenerale.php");
  	
  	include('entites/ClsMessage.php');
?>

<?php
	if(!empty($_POST['id_exp']) && !empty($_POST['id_ben']) && !empty($_POST['sujet']))
	{

		$id_exp=htmlspecialchars($_POST['id_exp']);
		$id_ben=htmlspecialchars($_POST['id_ben']);
		$sujet=addslashes(htmlspecialchars($_POST['sujet']));

		$message = new Message();

		$message->setExpediteur($id_exp);
		$message->setBeneficiaire($id_ben);
		$message->setSujet($sujet);

		$count = $message->ajouterMessage();

		if($count>0){

			echo '<div style="text-align:center" class="text-mint"><b>Votre message a été envoyé avec succès.</b></div>';
				
		}else{

			echo '<div style="text-align:center; color:orange"><b>Votre message n\'a pas été envoyé.</b></div>';
				
		}
				
							
	
		
	}
	else
	{
		
		echo '<div style="text-align:center; color:orange">Tous les champs sont obligatoire</div>';
	}

		
?>