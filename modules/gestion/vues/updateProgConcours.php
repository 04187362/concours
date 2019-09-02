<?php

	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
	include("entites/ClsProgrammeConcours.php");
	include("globale/verification.php");

	if(!empty($_POST['id_pro']) && !empty($_POST['filiere']) && !empty($_POST['matiere']) && !empty($_POST['coef']))
		{

			$id_pro=htmlentities(htmlspecialchars($_POST['id_pro']));
            $id_matiere=htmlentities(htmlspecialchars($_POST['matiere']));
			$id_filiere=htmlentities(htmlspecialchars($_POST['filiere']));
			$coef=htmlentities(htmlspecialchars($_POST['coef']));

			//Recuperation du libelle de la matiere et de la filiere
			$requete1 = "SELECT lib_matiere FROM matiere WHERE id_matiere";
			$param1 = array($id_matiere);
			$lib_matiere = getChampsParametrage($requete1,$param1);

			$requete2 = "SELECT lib_filiere FROM filiere WHERE id_filiere";
			$param2 = array($id_filiere);
			$lib_filiere = getChampsParametrage($requete2,$param2);
			// Verifiant si la matiere a déjà été programmé dans une classe
			$requete3 = "SELECT * FROM programme_concours WHERE id_matiere=? AND id_filiere=? AND id_pro NON IN(?)";
			$param3 = array($id_matiere,$id_filiere,$id_pro);

			if(existanceGestion($requete3,$param3)==0){

				if($coef > 0){

					$programmeConcours = new ProgrammeConcours();

                    $programmeConcours->setId_pr($id_pro);
					$programmeConcours->setMatiere($id_matiere);
					$programmeConcours->setFiliere($id_filiere);
					$programmeConcours->setCoef($coef);
					$programmeConcours->setAnneeAc($id_an);

					$count = $programmeConcours->modifierProgrammeConcours();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Programme modifié avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
					
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez un coefficient positif.</b></div>';

				}
					
			}else{
					echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$lib_matiere.'</span> a été déjà programmée en <span style="color:yellow">'.$lib_filiere.'.</span></div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}
	
?>