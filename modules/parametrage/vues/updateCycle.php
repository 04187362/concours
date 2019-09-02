<?php

	include("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsCycle.php');
?>

<?php
	if(!empty($_POST['id_cycle']) && !empty($_POST['lib_cycle']) && !empty($_POST['frais']))
	{

		$id_type=htmlentities(htmlspecialchars($_POST['id_cycle']));
        $libelle=htmlentities(htmlspecialchars($_POST['lib_cycle']));
		$frais=htmlentities(htmlspecialchars($_POST['frais']));

		$requete = "SELECT * FROM cycle WHERE lib_cycle = ? AND id_cycle NOT IN(?) ";
        $param = array($libelle, $id_type);

		if(existanceParametrage($requete, $param)==0){

				$cycle = new cycle();

                $cycle->setId_cycle($id_type);
				$cycle->setLibCycle($libelle);
				$cycle->setFrais($frais);

				$count = $cycle->updateCycle();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Cycle modifié avec succès</b></div>';
				
				}else{

					echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
				
				}
				
		}else{
				echo '<div style="text-align:center; color:orange">Le cycle <span style="color:yellow">'.$libelle.'</span> existe déjà !</div></div>';
		}						
	
		
	}
	else
	{
		
		echo '<div style="text-align:center; color:orange">Tous les champs sont obligatoire</div>';
	}

		
?>