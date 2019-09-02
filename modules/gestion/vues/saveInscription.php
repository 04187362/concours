<?php
	
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
	include("entites/ClsInscription.php");
	include("globale/verification.php");
?>

<?php

	if(!empty($_POST['etudiant']) && !empty($_POST['frait']))
		{

			// Recupere l'annee académique et de l'identetité du personne à partir de la session
			$id_annee=htmlentities(htmlspecialchars($id_an));
			$etudiant=htmlentities(htmlspecialchars($_POST['etudiant']));
			$frait=htmlentities(htmlspecialchars($_POST['frait']));
			$personnel=htmlentities(htmlspecialchars($id_personne));

			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
            $param1 = array($etudiant);
            $requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
            $param2 = array($etudiant);
            $requete3 = "SELECT * FROM inscription WHERE id_etu=? AND id_annee=?";
            $param3 = array($etudiant, $id_annee);

			$nom_etu = getChampsGestion($requete1,$param1);
			$prenom_etu = getChampsGestion($requete2,$param2);

			if(existanceGestion($requete3,$param3)==0){

					$inscription = new Inscription();

					$inscription->setAnneeAc($id_annee);
					$inscription->setEtudiant($etudiant);
					$inscription->setFrait($frait);
					$inscription->setPersonnel($personnel);

					$count = $inscription->ajouterInscription();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Inscription créée avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">L\'etudiant <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a été déjà inscrit.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>