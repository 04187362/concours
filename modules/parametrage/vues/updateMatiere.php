<?php

    include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsMatiere.php");
?>

<?php
	if(!empty($_POST['id_m']) && !empty($_POST['lib']) && !empty($_POST['ue'])){	

		$id_matiere=htmlentities(htmlspecialchars($_POST['id_m']));
		
		$libelle= htmlentities(addslashes(htmlspecialchars($_POST['lib'])));

		$uniteEnseignement = htmlentities(htmlspecialchars($_POST['ue']));

  		$requete = "SELECT * FROM matiere WHERE id_matiere =?";
		$param = array($id_matiere);

		if(existanceParametrage($requete,$param)==1){
			$requete1 = "SELECT * FROM matiere WHERE lib_matiere =? AND id_matiere NOT IN(?)";
			$param1 = array($libelle, $id_matiere);
			if(existanceParametrage($requete1,$param1)==0){

				$matiere = new Matiere();

				$matiere->setCodeMat($id_matiere);

				$matiere->setLibMat($libelle);

				$matiere->setUniteEnseignement($uniteEnseignement);

				$count = $matiere->modifierMatiere();

				if($count > 0){
					
					echo '<div style="text-align:center" class="text-mint"><b>Matière modifiée avec succès.</b></div>';

				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';

				}
			}else{

				echo '<div style="text-align:center; color:white">La matière de <b style="color:orange">'.$libelle.'</b> existe déjà.</div>';
			}			
		
		}else{

			echo '<div style="text-align:center; color:orange"><b>Code inexistant</b></div>';
		
		}		
	}
	else{

		echo '<div style ="border-radius : 5px ; background-color : rgb(128,0,0); color : white" >Tous les champs sont obligatoires</div>';	
	
	}
?>