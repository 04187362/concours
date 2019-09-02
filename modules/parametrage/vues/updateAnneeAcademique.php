<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsAnneeAcademique.php");
?>

<?php
	if(!empty($_POST['lib_ac']) && !empty($_POST['id_ac']))
	{
		$libelle=htmlspecialchars($_POST['lib_ac']);

		$id_annee=htmlspecialchars($_POST['id_ac']);

		$requete1 = "SELECT * FROM annee_academique WHERE id_annee = ? ";
        $param1 = array($id_annee);
		//On verifie l'existance de l'identifiant
		if(existanceParametrage($requete1, $param1)==1){
			//On verifie si le nouveau libellé du pays a déjà été enregistré par un autre identifiant
			$requete2 = "SELECT * FROM annee_academique WHERE lib_annee = ? AND id_annee NOT IN (?) ";
        	$param2 = array($libelle,$id_annee);

			if(existanceParametrage($requete2, $param2)==0){

				$annee = new AnneeAcademique();

				$annee->setId_anneeAc($id_annee);

				$annee->setLib_anneeAc($libelle);

				$count = $annee->modifierAnneeAcademique();

				if($count > 0){

					echo '<div style="text-align:center" class="text-mint"><b>Année académique modifiée avec succès</b></div>';
						
				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
				}

			}else{

				echo '<div style ="color:white; text-align:center">L\'annee_academique <span style="color:yellow">'.$_POST['lib_ac'].'</span> existe déjà.</div></div>';

			}

				
		}else{

			echo '<div style ="text-align:center; color:white">L\'identifiant <span style="color:yellow">'.$id_annee.'</span> n\'existe déjà !</div></div>';
		}								
	}
	else
	{		
		echo '<div style="text-align:center; color:orange"><b>Remplissez tous les champs</b></div>';
	}

		
?>