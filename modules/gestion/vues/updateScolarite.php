<?php
	
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
    include("entites/ClsPayement.php");
	include("entites/ClsScolarite.php");
	include("globale/verification.php");
?>

<?php

	if(!empty($_POST['id_paye']) && !empty($_POST['etudiant']) && !empty($_POST['filiere']) && !empty($_POST['niveauetude']) && !empty($_POST['frais']))
		{

			// Recupere l'annee académique et de l'identetité du personne à partir de la session
			$id_annee=htmlentities(htmlspecialchars($id_an));
            $id_paye=htmlentities(htmlspecialchars($_POST['id_paye']));
			$etudiant=htmlentities(htmlspecialchars($_POST['etudiant']));
            $personnel=htmlentities(htmlspecialchars($id_personne));
            $filiere=htmlentities(htmlspecialchars($_POST['filiere']));
            $niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
            $frais=htmlentities(htmlspecialchars($_POST['frais']));
            $type_payement = "Scolarite";

			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
            $param1 = array($etudiant);
            $requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
            $param2 = array($etudiant);
            $requete3 = "SELECT * FROM payement WHERE id_etu=? AND id_annee NOT IN(?)";
            $param3 = array($etudiant, $id_annee);

			$nom_etu = getChampsGestion($requete1,$param1);
			$prenom_etu = getChampsGestion($requete2,$param2);

			if(existanceGestion($requete3,$param3)==0){

					$scolarite = new Scolarite();

					$scolarite->setAnneeAcademique($id_annee);
                    $scolarite->setId_paye($id_paye);
					$scolarite->setEtudiant($etudiant);
					$scolarite->setPersonnel($personnel);
                    $scolarite->setFiliere($filiere);
                    $scolarite->setNiveauEtude($niveauetude);
                    $scolarite->setFrais($frais);
                    $scolarite->setTypePayement($type_payement);

					$count = $scolarite->modifierScolarite();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>scolarite modifié avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">L\'etudiant <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a été déjà payé le frais scolarite pour l\'année '.$libelle_anneeAc.'.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>