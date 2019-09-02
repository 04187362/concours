<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsMatiereConcours.php");
?>

<?php
	if(!empty($_POST['lib_matiere']) && !empty($_POST['id_matiere']) && !empty($_POST['abreviation']))
	{
		$libelle=htmlspecialchars($_POST['lib_matiere']);

		$id_matiere=htmlspecialchars($_POST['id_matiere']);

		$abreviation=htmlspecialchars($_POST['abreviation']);

		$requete1 = "SELECT * FROM matiere_concours WHERE id_matiere = ? ";
        $param1 = array($id_matiere);
		//On verifie l'existance de l'identifiant
		if(existanceParametrage($requete1, $param1)==1){
			//On verifie si le nouveau libellé du pays a déjà été enregistré par un autre identifiant
			$requete2 = "SELECT * FROM annee_academique WHERE lib_matiere = ? AND id_matiere NOT IN (?) ";
        	$param2 = array($libelle,$id_matiere);

			if(existanceParametrage($requete2, $param2)==0){

				$matiere = new MatiereConcours();

				$matiere->setCodeMatiereConours($id_matiere);

				$matiere->setLibMatiereConours($libelle);

				$matiere->setAbreviation($abreviation);

				$count = $matiere->modifierMatiereConcours();

				if($count > 0){

					echo '<div style="text-align:center" class="text-mint"><b>matiere de concours modifiée avec succès</b></div>';
						
				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
				}

			}else{

				echo '<div style ="color:white; text-align:center">La matière <span style="color:yellow">'.$libelle.'</span> existe déjà.</div></div>';

			}

				
		}else{

			echo '<div style ="text-align:center; color:white">L\'identifiant <span style="color:yellow">'.$id_matiere.'</span> n\'existe déjà !</div></div>';
		}								
	}
	else
	{		
		echo '<div style="text-align:center; color:orange"><b>Remplissez tous les champs</b></div>';
	}

		
?>