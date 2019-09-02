<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsFiliere.php");
?>

<?php
	if(!empty($_POST['lib_filiere']) && !empty($_POST['id_filiere']) && !empty($_POST['abreviation']))
	{
		$libelle=htmlentities(htmlspecialchars($_POST['lib_filiere']));

        $id_filiere=htmlentities(htmlspecialchars($_POST['id_filiere']));
        $abreviation = htmlentities(htmlspecialchars($_POST['abreviation']));

		$requete1 = "SELECT * FROM filiere WHERE id_filiere = ? ";
        $param1 = array($id_filiere);
		//On verifie l'existance de l'identifiant
		if(existanceParametrage($requete1, $param1)==1){
			//On verifie si le nouveau libellé du pays a déjà été enregistré par un autre identifiant
			$requete2 = "SELECT * FROM filiere WHERE lib_filiere = ? AND id_filiere NOT IN (?) ";
        	$param2 = array($libelle,$id_filiere);

			if(existanceParametrage($requete2, $param2)==0){

				$filiere = new Filiere();

				$filiere->setId_filiere($id_filiere);

                $filiere->setLibFiliere($libelle);
                $filiere->setAbreviation($abreviation);

				$count = $filiere->modifierFiliere();

				if($count > 0){

					echo '<div style="text-align:center" class="text-mint"><b>Filière modifiée avec succès</b></div>';
						
				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
				}

			}else{

				echo '<div style ="color:white; text-align:center">Filière <span style="color:yellow">'.$_POST['lib_filiere'].'</span> existe déjà.</div></div>';

			}

				
		}else{

			echo '<div style ="text-align:center; color:white">L\'identifiant <span style="color:yellow">'.$id_filiere.'</span> n\'existe déjà !</div></div>';
		}								
	}
	else
	{		
		echo '<div style="text-align:center; color:orange"><b>Remplissez tous les champs</b></div>';
	}

		
?>