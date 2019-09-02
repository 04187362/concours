<?php 
	include('modules/gestion/modeles/methodeGestion.php');
  	include('modules/parametrage/modeles/methodeParametrage.php');
  	include('entites/ClsEnseigner.php');
  	
	if(!empty($_POST['niveauetude']) && !empty($_POST['matiere']) && !empty($_POST['volumehoraire']) && !empty($_POST['enseignant']) && !empty($_POST['cout_heure']) && !empty($_POST['enseignant']) && !empty($_POST['ue']))
		{
			$id_matiere=htmlspecialchars($_POST['matiere']);
			$id_niveauetude=htmlspecialchars($_POST['niveauetude']);
			$volumehoraire=htmlspecialchars($_POST['volumehoraire']);
			$id_ens = htmlspecialchars($_POST['enseignant']);
			$cout_heure = htmlspecialchars($_POST['cout_heure']);
			$ue = htmlspecialchars($_POST['ue']);

			//On verifie si la matiere a déjà été programmée dans une classe.
			$requete1 = "SELECT * FROM enseigner WHERE id_matiere=? AND id_niveauetude=?";
			$param1 = array($id_matiere,$id_niveauetude);
			//On recupere le libellé de la matière
			$requete2 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
			$param2 = array($id_matiere);
			$lib_matiere = getChampsParametrage($requete2,$param2);
			//On recupere le libellé de la matière
			$requete3 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
			$param3 = array($id_niveauetude);
			$lib_niveauetude = getChampsParametrage($requete3,$param3);

			if(existanceGestion($requete1,$param1)==0){

				if($volumehoraire > 0){

					$enseignement = new Enseigner();

					$enseignement->setMatiere($id_matiere);
					$enseignement->setNiveauEtude($id_niveauetude);
					$enseignement->setVol_hor($volumehoraire);
					$enseignement->setEnseignant($id_ens);
					$enseignement->setCout_heure($cout_heure);
					$enseignement->setUniteEnseignement($ue);

					$count = $enseignement->ajouterEnseignement();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Enseignement crée avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
					
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez un volume d\'horaire positif.</b></div>';

				}
					
			}else{
					echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$lib_matiere.'</span> a été déjà enseignée en <span style="color:yellow">'.$lib_niveauetude.'.</span></div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>