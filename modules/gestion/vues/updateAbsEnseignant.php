<?php 
	include('modules/gestion/modeles/methodeGestion.php');
  	include('modules/parametrage/modeles/methodeParametrage.php');
  	include('entites/ClsAbsenceEnseignant.php');
  	
	if(!empty($_POST['enseignant']) && !empty($_POST['niveauetude']) && !empty($_POST['mois']) 
		&& !empty($_POST['heure_debut']) && !empty($_POST['heure_fin']) && !empty($_POST['remplace']))
		{
			
			$id_abs=htmlentities(htmlspecialchars($_POST['id_abs']));
            $id_niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
			$justification=htmlentities(htmlspecialchars($_POST['justification']));
			$id_ens = htmlentities(htmlspecialchars($_POST['enseignant']));
			$heure_deb=htmlentities(htmlspecialchars($_POST['heure_debut']));
			$heure_f=htmlentities(htmlspecialchars($_POST['heure_fin']));
			$mois=htmlentities(htmlspecialchars($_POST['mois']));

			//Recuperation du libellé du niveau d'etude
			$requete = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
			$param = array($id_niveauetude);
			$lib_niveauetude = getChampsParametrage($requete,$param);
			
			$requete1 = "SELECT * FROM absence_enseignant WHERE id_niveauetude=? AND heure_fin=? AND heure_debut=? AND id_ens=? AND id_abs NOT IN(?)";
			$param1 = array($id_niveauetude,$heure_f,$heure_deb,$id_ens,$id_abs);
			if(existanceGestion($requete1,$param1)==0){

				if($heure_deb < $heure_f){

					$absence = new AbsenceEnseignant();

					$absence->setNiveauEtude($id_niveauetude);
					$absence->setJustification($justification);
					$absence->setEnseignant($id_ens);
					$absence->setHeure_debut($heure_deb);
					$absence->setHeure_fin($heure_f);
					$absence->setMois($mois);
                    $absence->setId_abs($id_abs);

					if(isset($_POST['ens_remp'])){
						$ens_remp = htmlspecialchars($_POST['ens_remp']);
						$absence->setEns_remp($ens_remp);
					}else{
						$absence->setEns_remp(0);
					}
					
					$count = $absence->modifierAbsenceEnseignant();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Absence modifiée avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
					
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Heure debut doit être superieure à celle de fin.</b></div>';

				}
					
			}else{
					echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$heure_debut.'</span> a été déjà enseignée en <span style="color:yellow">'.$lib_niveauetude.'.</span></div></div>';
			}					
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>