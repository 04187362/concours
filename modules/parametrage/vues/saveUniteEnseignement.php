<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsUniteEnseignement.php");

?>

<?php
	if(!empty($_POST['lib_ue']) && !empty($_POST['abreviation']))
	{

		$lib_ue = htmlentities(htmlspecialchars($_POST['lib_ue']));
		$abreviation = htmlentities(htmlspecialchars($_POST['abreviation']));

		$requete = "SELECT * FROM unite_enseignement WHERE lib_ue = ?";
        $param = array($lib_ue);

		if(existanceParametrage($requete, $param)==0){

			$ue = new UniteEnseignement();

			$ue->setLib_uniteEnseignement($lib_ue);

			$ue->setAbreviation($abreviation);

			$count = $ue->ajouterUniteEnseignement();

			if($count > 0){

				echo '<div  class="text-mint text-center"><b>Unité d\'enseignement enregistrée avec succès.</b></div>';
					
			}else{

				echo '<div style ="color:orange; text-align:center>L\'insertion a echouée.</div>';
					
			}
				
		}else{

			echo '<div style ="color:white; text-align:center">Unité d\'enseignement <span style="color:yellow">'.$_POST['lib_ue'].'</span> existe déjà.</div></div>';
		}								
	}
	else
	{		
		echo '<div style ="color:orange; text-align:center>Remplissez le champs svp !</div>';
	}

		
?>