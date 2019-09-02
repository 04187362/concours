<?php

	include("modules/gestion/modeles/methodeGestion.php");

	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsProgramme.php");
	
	include("globale/verification.php");

	if(!empty($_POST['niveauetude']) && !empty($_POST['matiere']) && !empty($_POST['coef']) && !empty($_POST['ue']) && !empty($_POST['credit']))
		{

			$id_matiere=htmlentities(htmlspecialchars($_POST['matiere']));
			$id_niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
			$coef=htmlentities(htmlspecialchars($_POST['coef']));
			$credit=htmlentities(htmlspecialchars($_POST['credit']));
			$uniteEnseignement = htmlentities(htmlspecialchars($_POST['ue']));

			//On verifie si la matiere a déjà été programmée dans une classe.
			$requete1 = "SELECT * FROM programme WHERE id_matiere=? AND id_niveauetude=?";
			$param1 = array($id_matiere,$id_niveauetude);
			//On recupere le libellé de la matière
			$requete2 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
			$param2 = array($id_matiere);
			$lib_matiere = getChampsParametrage($requete2,$param2);
			//On recupere le libellé de la matière
			$requete3 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
			$param3 = array($id_niveauetude);
			$lib_niveauetude = getChampsParametrage($requete3,$param3);

			if(existanceGestion($requete1, $param1)==0){

				if($coef > 0){

					$programme = new Programme();

					$programme->setMatiere($id_matiere);
					$programme->setNiveauEtude($id_niveauetude);
					$programme->setCoef($coef);
					$programme->setUniteEnseignement($uniteEnseignement);
					$programme->setCredit($credit);
					$programme->setAnneeAc($id_an);

					$count = $programme->ajouterProgramme();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Programme enregistré avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
					
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez un coefficient positif.</b></div>';

				}
					
			}else{
					echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$lib_matiere.'</span> a été déjà programmée en <span style="color:yellow">'.$lib_niveauetude.'.</span></div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}
	
?>