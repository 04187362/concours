<?php
	
	include("modules/gestion/modeles/methodeGestion.php");

	include("entites/ClsAbsenceEtudiant.php");
?>

<?php

	if(!empty($_POST['emargement']) && !empty($_POST['etudiant']))
		{

			$id_em=htmlentities(htmlspecialchars($_POST['emargement']));
			$etudiant=htmlentities(htmlspecialchars($_POST['etudiant']));
			$justification=htmlentities(addslashes(htmlspecialchars($_POST['justification'])));

			// Recuperation du nom et prenom de l'etudiant
            $requete= "SELECT * FROM personne WHERE id_pers=?";
            $param = array($etudiant);
            $p = selection_condition($requete,$param);
			// Verifions si l'absence de l'etudiant a été déjà enregistré.
			$requete1 = "SELECT * absence_etudiant WHERE id_em=? AND id_etu=?";
			$param1 = array($id_em,$etudiant);
			if(existanceGestion($requete1,$param1)==0){

					$absence = new AbsenceEtudiant();

					$absence->setEmargement($id_em);
					$absence->setEtudiant($etudiant);
					$absence->setJustification($justification);

					$count = $absence->ajouterAbsenceEtudiant();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Absence enregistrée avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion à echouée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">L\'absence de <span style="color:yellow">'.$p['nom_pers'].' '.$p['prenom_pers'].'</span> a été déjà enregistrée.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?> 