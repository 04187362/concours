<?php

	include("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsTypeFormation.php');
?>

<?php
	if(!empty($_POST['lib_typeformation']) && !empty($_POST['frais']))
	{

		$libelle=htmlentities(htmlspecialchars($_POST['lib_typeformation']));
		$frais=htmlentities(htmlspecialchars($_POST['frais']));

		$requete = "SELECT * FROM typeformation WHERE lib_typeformation = ? ";
        $param = array($libelle);

		if(existanceParametrage($requete, $param)==0){

				$typeformation = new TypeFormation();

				$typeformation->setLib_typeformation($libelle);
				$typeformation->setFrais($frais);

				$count = $typeformation->ajouterTypeFormation();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Type de formation enregistré avec succès</b></div>';
				
				}else{

					echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
				
				}
				
		}else{
				echo '<div style="text-align:center; color:orange">Le type de formation <span style="color:yellow">'.$libelle.'</span> existe déjà !</div></div>';
		}						
	
		
	}
	else
	{
		
		echo '<div style="text-align:center; color:orange">Tous les champs sont obligatoire</div>';
	}

		
?>