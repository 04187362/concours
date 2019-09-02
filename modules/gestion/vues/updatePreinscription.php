<?php
	
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
	include("entites/ClsPreinscription.php");
	include("globale/verification.php");
?>

<?php

	if(!empty($_POST['id_pre']) && !empty($_POST['candidat']) && !empty($_POST['frais']))
		{
            $id_pre=htmlentities(htmlspecialchars($_POST['id_pre']));
			// Recupere l'annee académique et de l'identetité du personne à partir de la session
			$id_annee=htmlentities(htmlspecialchars($id_an));
			$candidat=htmlentities(htmlspecialchars($_POST['candidat']));
            $personnel=htmlentities(htmlspecialchars($id_personne));
            $frais=htmlentities(htmlspecialchars($_POST['frais']));

			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
            $param1 = array($candidat);
            $requete2 = "SELECT nom_pers FROM personne WHERE id_pers=?";
            $param2 = array($candidat);

            $requete3 = "SELECT * FROM preinscription WHERE id_candidat=? AND id_annee=? AND id_pre NOT IN(?)";
            $param3 = array($candidat, $id_annee, $id_pre);

			$nom_etu = getChampsGestion($requete1,$param1);
			$prenom_etu = getChampsGestion($requete2,$param2);

			if(existanceGestion($requete3,$param3)==0){

					$preinscription = new Preinscription();

					$preinscription->setId_pre($id_pre);
                    $preinscription->setAnneeAcademique($id_annee);
					$preinscription->setCandidat($candidat);
					$preinscription->setPersonnel($personnel);
                    $preinscription->setFrais($frais);

					$count = $preinscription->modifierPreinscription();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Préinscription modifiée avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été éffectuée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">Le candidat <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a été déjà inscrit.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>