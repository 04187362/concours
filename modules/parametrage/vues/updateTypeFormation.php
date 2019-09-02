<?php

	include("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsTypeFormation.php');
?>

<?php
	if(!empty($_POST['id_typeformation']) && !empty($_POST['lib_typeformation']) && !empty($_POST['frais']))
	{

		$id_type=htmlentities(htmlspecialchars($_POST['id_typeformation']));
        $libelle=htmlentities(htmlspecialchars($_POST['lib_typeformation']));
		$frais=htmlentities(htmlspecialchars($_POST['frais']));

		$requete = "SELECT * FROM type_formation WHERE lib_typeformation = ? AND id_typeformation NOT IN(?) ";
        $param = array($libelle, $id_type);

		if(existanceParametrage($requete, $param)==0){

				$typeformation = new TypeFormation();

                $typeformation->setId_typeFormation($id_type);
				$typeformation->setLib_typeFormation($libelle);
				$typeformation->setFrais($frais);

				$count = $typeformation->updateTypeFormation();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Type de formation modifié avec succès</b></div>';
				
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