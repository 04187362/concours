<?php

	include_once ("connexion/connexiongenerale.php");

  	include('modules/parametrage/modeles/methodeParametrage.php');
  	
  	include('entites/ClsNiveauEtude.php');
?>

<?php
	if(!empty($_POST['libelle']) && !empty($_POST['abreviation']) && !empty($_POST['filiere']) && !empty($_POST['frais']) )
	{

		$libelle=htmlentities(htmlspecialchars($_POST['libelle']));
		$frais=htmlentities(htmlspecialchars($_POST['frais']));
        $abreviation=htmlentities(htmlspecialchars($_POST['abreviation']));
		$filiere=htmlentities(htmlspecialchars($_POST['filiere']));

		$requete = "SELECT * FROM niveau_etude WHERE lib_niveauetude = ? ";
        $param = array($libelle);

		if(existanceParametrage($requete, $param)==0){

				$niveau = new NiveauEtude();

				$niveau->setLibNiveauEtude($libelle);

				$niveau->setFrais($frais);

				$niveau->setAbreviation($abreviation);

				$niveau->setFiliere($filiere);

				$count = $niveau->ajouterNiveauEtude();

				if($count>0){

					echo '<div style="text-align:center" class="text-mint"><b>Niveau d\'etude enregistré avec succès</b></div>';
				
				}else{

					echo '<div style="text-align:center; color:orange"><b>Pas d\'insertion.</b></div>';
				
				}
				
		}else{
				echo '<div style="text-align:center; color:orange">Le niveau d\'etude <span style="color:yellow">'.$libelle.'</span> existe déjà !</div></div>';
		}						
	
		
	}
	else
	{
		
		echo '<div style="text-align:center; color:orange">Tous les champs sont obligatoire</div>';
	}

		
?>