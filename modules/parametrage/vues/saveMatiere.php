<?php

	include_once ("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsMatiere.php');
?>

<?php
	if(!empty($_POST['libelle']) && !empty($_POST['ue']))
	{

		$libelle=htmlentities(addslashes(htmlspecialchars($_POST['libelle'])));

		$uniteEnseignement = htmlentities(htmlspecialchars($_POST['ue']));

		$requete = "SELECT * FROM matiere WHERE lib_matiere=?";
		$param = array($libelle);

		if(existanceParametrage($requete,$param)==0){

				$matiere = new Matiere();

				$matiere->setLibMat($libelle);

				$matiere->setUniteEnseignement($uniteEnseignement);

				$count = $matiere->ajouterMatiere();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Matière enregistrée avec succès</b></div>';
				
				}else{

					echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
				
				}
				
		}else{
				echo '<div style="text-align:center; color:orange">La matière <span style="color:yellow">'.$libelle.'</span> existe déjà !</div></div>';
		}						
	
		
	}
	else
	{
		
		echo '<div style ="border-radius : 5px ; background-color : rgb(128,0,0); color:white" >Tous les champs sont obligatoire</div>';
	}

		
?>