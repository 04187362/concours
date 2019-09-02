<?php

	include_once ("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsPays.php');
?>

<?php
	if(!empty($_POST['libelle_pays']))
	{

		$libelle_pays=htmlentities(htmlspecialchars($_POST['libelle_pays']));

		$requete = "SELECT * FROM pays WHERE lib_pays = ? ";
        $param = array($libelle_pays);

		if(existanceParametrage($requete, $param)==0){

				$pays = new Pays();

				$pays->setLibelle_pays($libelle_pays);

				$count = $pays->ajouterPays();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Pays crée avec succès</b></div>';
				
				}else{

					echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
				
				}
				
		}else{
				echo '<div style="text-align:center; color:orange">Le pays <span style="color:yellow">'.$libelle_pays.'</span> existe déjà !</div></div>';
		}						
	
		
	}
	else
	{
		
		echo '<div style ="text-align:center; color:orange" >Tous les champs sont obligatoire</div>';
	}

		
?>