<?php

	include("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsMatiereConcours.php');
?>

<?php
	if(!empty($_POST['libelle']) && !empty($_POST['abreviation']))
	{

		$libelle=addslashes(htmlentities(htmlspecialchars($_POST['libelle'])));

		$abreviation=addslashes(htmlentities(htmlspecialchars($_POST['abreviation'])));

		$requete1 = "SELECT * FROM matiere_concours WHERE lib_matiere = ? ";
        $param1 = array($libelle);

		if(existanceParametrage($requete1,$param1)==0){

				$matiere = new MatiereConcours();

				$matiere->setLibMatiereConours($libelle);

				$matiere->setAbreviation($abreviation);

				$count = $matiere->ajouterMatiereConcours();

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
		
		echo '<div style ="text-align:center; color:orange" >Tous les champs sont obligatoire</div>';
	}

		
?>