<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsAnnee.php");
?>

<?php
	if(!empty($_POST['libelle']))
	{

		$table = "annee";
		
		$colonne ="lib_annee";

		if(existanceParametrage($table, $colonne, $_POST['libelle'])==0){

			$libelle=htmlspecialchars($_POST['libelle']);

			$annee = new Annee();

			$annee->setLib_annee($libelle);

			$count = $annee->ajouterAnnee();

			if($count > 0){

				echo '<div style ="color:white" class="text-mint">Année créée avec succès</div>';
					
			}else{

				echo '<div style ="color:orange; text-align:center>Pas d\'insertion</div>';
					
			}
				
		}else{

			echo '<div style ="color:white; text-align:center">L\'année <span style="color:yellow">'.$_POST['libelle'].'</span> existe déjà.</div></div>';
		}								
	}
	else
	{		
		echo '<div style ="color:orange; text-align:center>Remplissez le champs svp !</div>';
	}

		
?>