<?php
	include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("entites/ClsComposer.php");
    include("globale/verification.php");

		if(!empty($id_an) && !empty($_POST['matiere']) && !empty($_POST['etudiant']) 
			&& !empty($_POST['semestre']) && !empty($_POST['evaluation']) && !empty($_POST['ue']) )
		{

			$id_matiere=htmlentities(htmlspecialchars($_POST['matiere']));
			$etudiant=htmlentities(htmlspecialchars($_POST['etudiant']));
			$semestre=htmlentities(htmlspecialchars($_POST['semestre']));
			$evaluation=htmlentities(htmlspecialchars($_POST['evaluation']));
			$note=htmlentities(htmlspecialchars($_POST['note']));
			$ue=htmlentities(htmlspecialchars($_POST['ue']));
			
			//Recuperation du nom et premom de l'etudaint
			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
			$requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
			$param1 = array($etudiant);
			$nom_etu = getChampsUsers($requete1,$param1);
			$prenom_etu = getChampsUsers($requete2,$param1);
			//Recuperation du libelle de la matière.
			$requete3 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
			$param2 = array($id_matiere);
			$lib_matiere = getChampsParametrage($requete3,$param2);

			if($note >= 0 && $note <= 20){

				if($evaluation =="Examen"){
					// Verifiant si l'etudiant a deja passé l'examen sur cette matiere.
					$requete5 = "SELECT * FROM composer WHERE id_etu=? AND id_matiere=? AND semestre =? AND evaluation =? AND id_anneeAc =?";
					$param5 = array($etudiant,$id_matiere,$semestre,$evaluation,$id_an);
					if(existanceGestion($requete5,$param5)==0){

						$composition = new Composer();
						// Recupere l'annee à partir de la session
						$composition->setAnneeAc($id_an);
						$composition->setMatiere($id_matiere);
						$composition->setEtudiant($etudiant);
						$composition->setSemestre($semestre);
						$composition->setEvaluation($evaluation);
						$composition->setNote($note);
						$composition->setUniteEnseignement($ue);

						$count = $composition->ajouterComposition();

						if($count>0){

							echo '<div style="text-align:center" class="text-mint"><b>Composition enregistrée avec succès.</b></div>';
						
						}else{

							echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
						
						}

					
					}else{

						echo '<div style="text-align:center; color:orange">L\'etudiant <span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a déjà passé l\'examen de <span style="color:yellow">'.$lib_matiere.'</span> du <span style="color:yellow">'.$semestre.'</</span>.</div></div>';
					
					}

				}else{

						$composition = new Composer();

						$composition->setAnneeAc($id_an);
						$composition->setMatiere($id_matiere);
						$composition->setEtudiant($etudiant);
						$composition->setSemestre($semestre);
						$composition->setEvaluation($evaluation);
						$composition->setNote($note);
						$composition->setUniteEnseignement($ue);

						$count = $composition->ajouterComposition();

						if($count>0){

							echo '<div style="text-align:center" class="text-mint"><b>Composition enregistrée avec succès.</b></div>';
						
						}else{

							echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
						
						}

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