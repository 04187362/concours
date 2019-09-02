<?php
	
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
    include("entites/ClsPayement.php");
	include("entites/ClsSoutenance.php");
	include("globale/verification.php");
?>

<?php

	if(!empty($_POST['etudiant']) && !empty($_POST['filiere']) && !empty($_POST['niveauetude']) && !empty($_POST['cycle']))
		{

			// Recupere l'annee académique et de l'identetité du personne à partir de la session
			$id_annee=htmlentities(htmlspecialchars($id_an));
			$etudiant=htmlentities(htmlspecialchars($_POST['etudiant']));
            $personnel=htmlentities(htmlspecialchars($id_personne));
            $filiere=htmlentities(htmlspecialchars($_POST['filiere']));
            $niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
            $cycle=htmlentities(htmlspecialchars($_POST['cycle']));
            $type_payement = "Soutenance";

			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
            $param1 = array($etudiant);
            $requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
            $param2 = array($etudiant);
            $requete3 = "SELECT * FROM payement WHERE id_etu=? AND id_annee=? AND type_payement='Soutenance'";
            $param3 = array($etudiant, $id_annee);

			$nom_etu = getChampsGestion($requete1,$param1);
			$prenom_etu = getChampsGestion($requete2,$param2);

			if(existanceGestion($requete3,$param3)==0){

					$soutenance = new Soutenance();

					$soutenance->setAnneeAcademique($id_annee);
					$soutenance->setEtudiant($etudiant);
					$soutenance->setPersonnel($personnel);
                    $soutenance->setFiliere($filiere);
                    $soutenance->setNiveauEtude($niveauetude);
                    $soutenance->setCycle($cycle);
                    $soutenance->setTypePayement($type_payement);

					$count = $soutenance->ajouterSoutenance();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Soutenance enregistré avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">L\'etudiant <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a déjà payé ses frais de soutenance.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>