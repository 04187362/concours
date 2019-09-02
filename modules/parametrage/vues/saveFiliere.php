<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsFiliere.php");

?>

<?php
	if(!empty($_POST['lib_filiere']) && !empty($_POST['abreviation']))
	{

		$lib_filiere = htmlentities(htmlspecialchars($_POST['lib_filiere']));
		$abreviation = htmlentities(htmlspecialchars($_POST['abreviation']));

		$requete = "SELECT * FROM filiere WHERE lib_filiere = ? ";
        $param = array($lib_filiere);

		if(existanceParametrage($requete, $param)==0){

			$filiere = new Filiere();

			$filiere->setLibFiliere($lib_filiere);

			$filiere->setAbreviation($abreviation);

			$count = $filiere->ajouterFiliere();

			if($count > 0){

				echo '<div  class="text-mint text-center"><b>Filière enregistrée avec succès.</b></div>';
					
			}else{

				echo '<div style ="color:orange; text-align:center>L\'insertion a echouée.</div>';
					
			}
				
		}else{

			echo '<div style ="color:white; text-align:center">Filière <span style="color:yellow">'.$_POST['lib_filiere'].'</span> existe déjà.</div></div>';
		}								
	}
	else
	{		
		echo '<div style ="color:orange; text-align:center>Remplissez le champs svp !</div>';
	}

		
?>