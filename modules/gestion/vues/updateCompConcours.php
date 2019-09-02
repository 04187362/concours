<?php
	include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("entites/ClsComposerConcours.php");
    include("globale/verification.php");

		if(!empty($_POST['id_com']) && !empty($id_an) && !empty($_POST['matiere']) && !empty($_POST['candidat']) && !empty($_POST['note']))
		{

			$id_com = htmlentities(htmlspecialchars($_POST['id_com']));
			$id_anneeAc=htmlentities(htmlspecialchars($id_an));
			$id_matiere=htmlentities(htmlspecialchars($_POST['matiere']));
			$candidat=htmlentities(htmlspecialchars($_POST['candidat']));
			$note=htmlentities(htmlspecialchars($_POST['note']));

			
			// Recuperation du libellé de la matiere
			$requete1 = "SELECT lib_matiere FROM matiere_concours WHERE id_matiere =?";
			$param1 = array($id_matiere);
			$lib_matiere = getChampsParametrage($requete1,$param1);
			// Recuperation du nom de l'candidat
			$requete2 = "SELECT nom_pers FROM personne WHERE id_pers =?";
			$param2 = array($candidat);
			$nom_etu = getChampsUsers($requete2,$param2);
			// Recuperation du prenom de l'candidat
			$requete3 = "SELECT prenom_pers FROM personne WHERE id_pers =?";
			$param3 = array($candidat);
			$prenom_etu = getChampsUsers($requete3,$param3);

			if($note >= 0 && $note <= 20){

				$requete4 = "SELECT * FROM composer_concours WHERE id_etu =? AND id_matiere=? AND id_anneeAc NOT IN(?)";
				$param4 = array($candidat, $id_matiere, $id_anneeAc);
				if(existanceGestion($requete4, $param4)==0){

						$composition = new ComposerConcours();
						// Recupere l'annee à partir de la session
						$composition->setId_com($id_com);
						$composition->setAnneeAc($id_anneeAc);
						$composition->setMatiereConcours($id_matiere);
						$composition->setCandidat($candidat);
						$composition->setNote($note);

						$count = $composition->modifierCompositionConcours();

						if($count>0){

							echo '<div style="text-align:center" class="text-mint"><b>Composition modifiée avec succès.</b></div>';
						
						}else{

							echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
						
						}

					
				}else{

						echo '<div style="text-align:center; color:orange">Le candidat <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a déjà composé la matière de <span style="color:yellow">'.$lib_matiere.'</span>.</div></div>';
					
				}
				

			}else{

				echo '<div style="text-align:center; color:orange"><b>Entrez une note comprise entre 0 et 20.</b></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>