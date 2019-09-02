<?php

    include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsPays.php");
?>

<?php
	if(!empty($_POST['id_p']) && !empty($_POST['lib'])){	

		$code_pays=htmlspecialchars($_POST['id_p']);
		
		$libelle_pays= htmlspecialchars($_POST['lib']);

		$requete1 = "SELECT * FROM pays WHERE code_pays = ? ";
        $param1 = array($code_pays);

		if(existanceParametrage($requete1,$param1)==1){
			//On verifie si le nouveau libellé du pays a déjà été enregistré par un autre identifiant
			$requete2 = "SELECT * FROM pays WHERE lib_pays = ? AND code_pays NOT IN (?) ";
        	$param2 = array($libelle_pays,$code_pays);
			if(existanceParametrage($requete2,$param2)==0){

				$pays = new Pays();

				$pays->setCode_pays($code_pays);

				$pays->setLibelle_pays($libelle_pays);

				$count = $pays->modifierPays();

				if($count > 0){

					echo '<div style="text-align:center" class="text-mint"><b>Pays modifié avec succès</b></div>';

				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';

				}	

			}else{

				echo '<div style="text-align:center; color:white">Le pays <b style="color:orange">'.$libelle_pays.'</b> existe déjà.</div>';

			}		
		
		}else{

			echo '<div style="text-align:center; color:orange"><b>Code inexistant</b></div>';
		
		}		
	}
	else{

		echo '<div style ="text-align:center; color:orange">Tous les champs sont obligatoires</div>';	
	
	}
?>