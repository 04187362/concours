<?php

	include("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsCycle.php');
?>

<?php
	if(!empty($_POST['lib_cycle']) && !empty($_POST['frais']))
	{

		$libelle=htmlentities(htmlspecialchars($_POST['lib_cycle']));
		$frais=htmlentities(htmlspecialchars($_POST['frais']));

		$requete = "SELECT * FROM cycle WHERE lib_cycle = ? ";
        $param = array($libelle);

		if(existanceParametrage($requete, $param)==0){

				$cycle = new cycle();

				$cycle->setLibCycle($libelle);
				$cycle->setFrais($frais);

				$count = $cycle->ajouterCycle();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Cycle enregistré avec succès</b></div>';
				
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