<?php

	include("connexion/connexiongenerale.php");

  	include('modules/gestion/modeles/methodeGestion.php');
  	
  	include('entites/ClsSpecialite.php');
?>

<?php
	if(!empty($_POST['lib_specialite']) && !empty($_POST['filiere']))
	{

		$libelle=htmlentities(htmlspecialchars($_POST['lib_specialite']));
		$filiere=htmlentities(htmlspecialchars($_POST['filiere']));

		$requete = "SELECT * FROM specialite WHERE lib_spe = ? ";
        $param = array($libelle);

		if(existanceGestion($requete, $param)==0){

				$specialite = new Specialite();

				$specialite->setLibSpecialite($libelle);
				$specialite->setFiliere($filiere);

				$count = $specialite->ajouterSpecialite();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Specialité enregistrée avec succès</b></div>';
				
				}else{

					echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
				
				}
				
		}else{
				echo '<div style="text-align:center; color:orange">La pecialité <span style="color:yellow">'.$libelle.'</span> existe déjà !</div></div>';
		}						
	
		
	}
	else
	{
		
		echo '<div style="text-align:center; color:orange">Tous les champs sont obligatoire</div>';
	}

		
?>