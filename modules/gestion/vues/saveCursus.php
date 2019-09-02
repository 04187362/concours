<?php
	
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
    //include("entites/ClsPayement.php");
	include("entites/ClsCursus.php");
	include("globale/verification.php");
?>

<?php

	if(!empty($_POST['etudiant']) && !empty($_POST['filiere']) && !empty($_POST['niveauetude'])
      && !empty($_POST['diplome']) && !empty($_POST['resultat']) && !empty($_POST['statut']))
		{

			// Recupere l'annee académique et de l'identetité du personne à partir de la session
			$id_annee=htmlentities(htmlspecialchars($id_an));
			$etudiant=htmlentities(htmlspecialchars($_POST['etudiant']));
            $personnel=htmlentities(htmlspecialchars($id_personne));
            $filiere=htmlentities(htmlspecialchars($_POST['filiere']));
            $niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
            $diplome=htmlentities(htmlspecialchars($_POST['diplome']));
            $resultat=htmlentities(htmlspecialchars($_POST['resultat']));
            $statut=htmlentities(htmlspecialchars($_POST['statut']));
            $type_payement = "Cursus";

			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
            $param1 = array($etudiant);
            $requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
            $param2 = array($etudiant);
            $requete3 = "SELECT * FROM payement WHERE id_etu=? AND id_annee=?";
            $param3 = array($etudiant, $id_annee);

			$nom_etu = getChampsGestion($requete1,$param1);
			$prenom_etu = getChampsGestion($requete2,$param2);

			if(existanceGestion($requete3,$param3)==0){

					$cursus = new Cursus();

					$cursus->setAnneeAcademique($id_annee);
					$cursus->setEtudiant($etudiant);
					$cursus->setPersonnel($personnel);
                    $cursus->setFiliere($filiere);
                    $cursus->setNiveauEtude($niveauetude);
                    $cursus->setDiplome($diplome);
                    $cursus->setResultat($resultat);
                    $cursus->setStatut($statut);
					$cursus->setEtablissement($etablissement);
                    $cursus->setTypePayement($type_payement);

					$count = $cursus->ajouterCursus();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Cursus enregistré avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">L\'etudiant <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a déjà payé les frais de cursus.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>