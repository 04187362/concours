<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsUniteEnseignement.php");
?>

<?php
	if(!empty($_POST['lib_ue']) && !empty($_POST['id_ue']) && !empty($_POST['abreviation']))
	{
		$libelle=htmlentities(htmlspecialchars($_POST['lib_ue']));
        $id_ue=htmlentities(htmlspecialchars($_POST['id_ue']));
        $abreviation = htmlentities(htmlspecialchars($_POST['abreviation']));
		$requete1 = "SELECT * FROM unite_enseignement WHERE id_ue = ? ";
        $param1 = array($id_ue);
		//On verifie l'existance de l'identifiant
		if(existanceParametrage($requete1, $param1)==1){
			//On verifie si le nouveau libellé du pays a déjà été enregistré par un autre identifiant
			$requete2 = "SELECT * FROM unite_enseignement WHERE lib_ue = ? AND id_ue NOT IN (?) ";
        	$param2 = array($libelle,$id_ue);

			if(existanceParametrage($requete2, $param2)==0){

				$ue = new UniteEnseignement();

				$ue->setId_uniteEnseignement($id_ue);

                $ue->setLib_uniteEnseignement($libelle);

                $ue->setAbreviation($abreviation);

				$count = $ue->modifierUniteEnseignement();

				if($count > 0){

					echo '<div style="text-align:center" class="text-mint"><b>Unité d\'enseignement modifiée avec succès</b></div>';
						
				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
				}

			}else{

				echo '<div style ="color:white; text-align:center">Unité d\'enseignement <span style="color:yellow">'.$_POST['lib_ue'].'</span> existe déjà.</div></div>';

			}

				
		}else{

			echo '<div style ="text-align:center; color:white">L\'identifiant <span style="color:yellow">'.$id_ue.'</span> n\'existe déjà !</div></div>';
		}								
	}
	else
	{		
		echo '<div style="text-align:center; color:orange"><b>Remplissez tous les champs</b></div>';
	}

		
?>