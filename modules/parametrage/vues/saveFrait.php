<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsFrait.php");
?>

<?php
	if(!empty($_POST['montant']))
	{
		$montant=htmlentities(htmlspecialchars($_POST['montant']));

		$requete = "SELECT * FROM frait WHERE montant = ? ";
        $param = array($montant);

		if(existanceParametrage($requete, $param)==0){

			$frait = new Frait();

			$frait->setMontant($montant);

			$count = $frait->ajouterFrait();

			if($count > 0){

				echo '<div class ="text-mint text-center"><b>Frais enregistré avec succès</b></div>';
					
			}else{

				echo '<div style ="color:orange; text-align:center>L\'insertion a echouée.</div>';
					
			}
				
		}else{

			echo '<div style ="color:white; text-align:center">Le montant <span style="color:yellow">'.$_POST['montant'].'</span> existe déjà.</div></div>';
		}								
	}
	else
	{		
		echo '<div style ="color:orange; text-align:center>Remplissez le champs svp !</div>';
	}

		
?>