<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsAnnee.php");
?>

<?php
	if(!empty($_POST['lib']) && !empty($_POST['id_a']))
	{
		$libelle=htmlspecialchars($_POST['lib']);

		$id_annee=htmlspecialchars($_POST['id_a']);

		$table = "annee";
		
		$colonne ="id_annee";

		if(existanceParametrage($table, $colonne, $id_annee)==1){

			$annee = new Annee();

			$annee->setId_annee($id_annee);

			$annee->setLib_annee($libelle);

			$count = $annee->modifierAnnee();

			if($count > 0){

				echo '<div style="text-align:center" classe="label label-mint"><b>Année modifiée avec succès</b></div>';
					
			}else{

				echo '<div style="text-align:center; color:orange"><b>Pas de modification</b></div>';
					
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