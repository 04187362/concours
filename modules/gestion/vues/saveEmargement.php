<?php 
	include('modules/gestion/modeles/methodeGestion.php');
	include('modules/users/modeles/methodeUsers.php');
  	include('modules/parametrage/modeles/methodeParametrage.php');
  	include('entites/ClsEmargement.php');
  	
	if(!empty($_POST['enseignant']) && !empty($_POST['niveauetude']) && !empty($_POST['matiere']) && !empty($_POST['heure_effectue']) 
		&& !empty($_POST['titre_cours'])  && !empty($_POST['heure_debut']) && !empty($_POST['heure_fin']) && !empty($_POST['type_seance']) && !empty($_POST['mois']) && !empty($_POST['date_em']))
		{
			$id_matiere=htmlspecialchars($_POST['matiere']);
			$id_niveauetude=htmlspecialchars($_POST['niveauetude']);
			$heure_effectue=htmlspecialchars($_POST['heure_effectue']);
			$id_ens = htmlspecialchars($_POST['enseignant']);
			$titre_cours = addslashes(htmlspecialchars($_POST['titre_cours']));
			$heure_deb=htmlspecialchars($_POST['heure_debut']);
			$heure_f=htmlspecialchars($_POST['heure_fin']);
			$type_seance=htmlspecialchars($_POST['type_seance']);
			$mois=htmlspecialchars($_POST['mois']);
			$date_em = htmlspecialchars($_POST['date_em']);

			$requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
			$requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
			$param1 = array($id_ens);

			$nom_pers = getChampsUsers($requete1,$param1);
			$prenom_pers = getChampsUsers($requete2,$param1);

			$requete3 = "SELECT * FROM emargement WHERE id_ens=? AND heure_debut =? AND heure_fin=? AND date_em=?";
			$param3 = array($id_ens,$heure_deb,$heure_f,$date_em);

			if(existanceGestion($requete3, $param3)==0){

				if($heure_effectue > 0){

					if($heure_deb < $heure_f){
						$emargement = new Emargement();

						$emargement->setMatiere_em($id_matiere);
						$emargement->setNiveauEtude($id_niveauetude);
						$emargement->setHeure_effectue($heure_effectue);
						$emargement->setEnseignant_em($id_ens);
						$emargement->setTitre_cours($titre_cours);
						$emargement->setHeure_debut($heure_deb);
						$emargement->setHeure_fin($heure_f);
						$emargement->setType_seance($type_seance);
						$emargement->setMois($mois);
						$emargement->setDate_em($date_em);

						$count = $emargement->ajouterEmargement();

						if($count>0){

							echo '<div style="text-align:center" class="text-mint"><b>Emargement enregistré avec succès.</b></div>';
						
						}else{

							echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
						
						}
					}else{
						echo '<div style="text-align:center; color:orange"><b>Heure de debut doit etre superieure à celle de fin.</b></div>';
					}

				}else{

					echo '<div style="text-align:center; color:orange"><b>Entrez une heure effectuée positive.</b></div>';

				}
					
			}else{
				echo '<div style="text-align:center; color:orange">La matière de <span style="color:yellow">'.$nom_pers.' '.$prenom_pers.'</span> a déjà été enregistré à des heures renseignées.</div></div>';
			}					
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>