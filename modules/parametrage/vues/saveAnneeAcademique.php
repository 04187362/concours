<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsAnneeAcademique.php");

?>

<?php
	if(!empty($_POST['lib_annee']))
	{

		$lib_annee = htmlentities(htmlspecialchars($_POST['lib_annee']));
		$requete = "SELECT * FROM annee_academique WHERE lib_annee = ? ";
        $param = array($lib_annee);

		if(existanceParametrage($requete, $param)==0){

			$annee = new AnneeAcademique();

			$annee->setLib_anneeAc($lib_annee);

			$count = $annee->ajouterAnneeAcademique();

			if($count > 0){

				echo '<div  class="text-mint text-center"><b>Année academique enregistrée avec succès.</b></div>';
					
			}else{

				echo '<div style ="color:orange; text-align:center>L\'insertion a echouée.</div>';
					
			}
				
		}else{

			echo '<div style ="color:white; text-align:center">L\'année academique <span style="color:yellow">'.$_POST['lib_annee'].'</span> existe déjà.</div></div>';
		}								
	}
	else
	{		
		echo '<div style ="color:orange; text-align:center>Remplissez le champs svp !</div>';
	}

		
?>