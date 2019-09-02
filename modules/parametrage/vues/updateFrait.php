<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsFrait.php");
?>

<?php
	if(!empty($_POST['montant']) && !empty($_POST['id_frais']))
	{
		$montant=htmlentities(htmlspecialchars($_POST['montant']));

		$id_frait=htmlentities(htmlspecialchars($_POST['id_frais']));

		$requete = "SELECT * FROM frait WHERE id_frait=?";
		$param = array($id_frait);

		if(existanceParametrage($requete,$param)==1){
			$requete1 = "SELECT * FROM frait WHERE montant =? AND id_frait NOT IN(?)";
			$param1 = array($montant,$id_frait);

			if(existanceParametrage($requete1,$param1)==0){

				$frait = new Frait();

				$frait->setId_frait($id_frait);

				$frait->setMontant($montant);

				$count = $frait->modifierFrait();

				if($count > 0){

					echo '<div style="text-align:center" class="text-mint"><b>Frais modifié avec succès.</b></div>';
						
				}else{

					echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
				}

			}else{

				echo '<div style ="text-align:center; color:yellow">Le montant <span style="color:yellow">'.$montant.'</span> existe déjà !</div></div>';

			}

				
		}else{

			echo '<div style ="text-align:center; color:white">L\'identifiant <span style="color:yellow">'.$id_frait.'</span> n\'existe déjà !</div></div>';
		}								
	}
	else
	{		
		echo '<div style="text-align:center; color:orange"><b>Remplissez tous les champs.</b></div>';
	}

		
?>