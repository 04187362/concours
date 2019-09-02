<?php

    include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsNiveauEtude.php");
?>

<?php
	if(!empty($_POST['id_niveau']) && !empty($_POST['lib_niveau']) && !empty($_POST['abreviation']) && !empty($_POST['filiere']) && !empty($_POST['frais'])){	

		$id_niveau=htmlentities(htmlspecialchars($_POST['id_niveau']));
		
		$libelle= htmlentities(htmlspecialchars($_POST['lib_niveau']));

		$abreviation=htmlentities(htmlspecialchars($_POST['abreviation']));

		$filiere=htmlentities(htmlspecialchars($_POST['filiere']));

		$frais=htmlentities(htmlspecialchars($_POST['frais']));

  		$requete = "SELECT * FROM niveau_etude WHERE lib_niveauetude = ? AND id_niveauetude NOT IN(?) ";
        $param = array($libelle, $id_niveau);

		if(existanceParametrage($requete, $param)==0){

			$niveau = new NiveauEtude();

			$niveau->setId_niveauEtude($id_niveau);

			$niveau->setLibNiveauEtude($libelle);

			$niveau->setAbreviation($abreviation);

			$niveau->setFiliere($filiere);

			$niveau->setFrais($frais);

			$count = $niveau->modifierNiveauEtude();

			if($count > 0){

				echo '<div style="text-align:center" class="text-mint"><b>Niveau d\'etude modifié avec succès</b></div>';

			}else{

				echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';

			}			
		
		}else{

			echo '<div style="text-align:center; color:white">Le niveau d\'etude <b style="color:orange">'.$libelle.'</b> existe déjà.</div>';
		
		}		
	}
	else{

		echo '<div style ="text-align:center; color:orange">Tous les champs sont obligatoires</div>';	
	
	}
?>