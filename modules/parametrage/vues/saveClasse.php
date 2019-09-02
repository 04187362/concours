<?php

	include_once ("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsClasse.php');
?>

<?php
	if(!empty($_POST['libelle']) && !empty($_POST['prix']))
	{

		$libelle=htmlspecialchars($_POST['libelle']);
		$prix=htmlspecialchars($_POST['prix']);

		$table = "classe";

		$colonne = "lib_classe";

		if(existanceParametrage($table, $colonne, $libelle)==0){

				$classe = new Classe();

				$classe->setLibCl($libelle);
				$classe->setFrait($prix);

				$count = $classe->ajouterClasse();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Classe crée avec succès</b></div>';
				
				}else{

					echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
				
				}
				
		}else{
				echo '<div style="text-align:center; color:orange">La classe <span style="color:yellow">'.$libelle.'</span> existe déjà !</div></div>';
		}						
	
		
	}
	else
	{
		
		echo '<div style ="border-radius : 5px ; background-color : rgb(128,0,0); color:white" >Tous les champs sont obligatoire</div>';
	}

		
?>