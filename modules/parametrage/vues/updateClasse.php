<?php

    include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsClasse.php");
?>

<?php
	if(!empty($_POST['id_c']) && !empty($_POST['lib']) && !empty($_POST['pri'])){	

		$code_classe=htmlentities(htmlspecialchars($_POST['id_c']));
		
		$libelle= htmlentities(htmlspecialchars($_POST['lib']));

		$prix= htmlentities(htmlspecialchars($_POST['pri']));

  		$requete = "SELECT * FROM classe WHERE id_classe = ? ";
        $param = array($code_classe);

		if(existanceParametrage($requete, $param)==1){
			//On verifie si le nouveau libellé du pays a déjà été enregistré par un autre identifiant
			$requete2 = "SELECT * FROM classe WHERE lib_classe = ? AND id_classe NOT IN (?) ";
        	$param2 = array($libelle,$code_classe);
			if(existanceParametrage($requete2,$param2)==0){

				$classe = new Classe();

				$classe->setCodeCl($code_classe);
				$classe->setLibCl($libelle);
				$classe->setFrait($prix);

				$count = $classe->modifierClasse();

				if($count > 0){

					echo '<div style="text-align:center" class="text-mint"><b>Classe modifiée avec succès</b></div>';

				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';

				}	
			}else{

				echo '<div style="text-align:center; color:white">La classe <b style="color:orange">'.$libelle.'</b> existe déjà.</div>';

			}		
		
		}else{

			echo '<div style="text-align:center; color:orange"><b>Code inexistant</b></div>';
		
		}		
	}
	else{

		echo '<div style ="border-radius : 5px ; background-color : rgb(128,0,0); color : white" >Tous les champs sont obligatoires</div>';	
	
	}
?>