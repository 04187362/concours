<?php

	include("modules/users/modeles/methodeUsers.php");

	include("entites/ClsPersonne.php");

	include("entites/Clscandidat.php"); 

?>

<?php

	if(!empty($_POST['nom_pers'])  && !empty($_POST['adresse_pers']) && !empty($_POST['tel_pers']) && !empty($_POST['filiere'])
			&& !empty($_POST['diplome']) && !empty($_POST['serie']) && !empty($_POST['filiere'])
            && !empty($_POST['statut']) && !empty($_POST['pays']) && !empty($_POST['date_nais']) && !empty($_POST['lieu_nais'])){

			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$diplome = htmlspecialchars($_POST['diplome']);
			$serie = htmlspecialchars($_POST['serie']);
            $niv_etu_univ = htmlspecialchars($_POST['niv_etu_univ']);
            $statut = htmlspecialchars($_POST['statut']);
			$pays = htmlspecialchars($_POST['pays']);
			$date_nais = htmlspecialchars($_POST['date_nais']);
			$lieu_nais = htmlspecialchars($_POST['lieu_nais']);
			$filiere = htmlspecialchars($_POST['filiere']);
			$specialite = htmlspecialchars($_POST['specialite']);
			$type_pers = "Candidat";

			$requete = "SELECT * FROM personne WHERE nom_pers=? AND prenom_pers=?";
            $param = array($nom,$prenom);

				// Verfiiant l'existance du nom et prenom pour eviter la dupplication
				if(existanceUsers($requete,$param) == 0){

                        $requete1 = "SELECT * FROM personne WHERE tel_pers=?";
                        $param1 = array($tel);

						if(existanceUsers($requete1,$param1) == 0){

							if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

								// Cas de l'image

								$nomPhoto=$_FILES['image']['name'];
			
								$fichierTempo=$_FILES['image']['tmp_name'];

								if(isset($email_ens) || !empty($fichierTempo)){

									$image = explode('.', $nomPhoto);
									$image_ex = end($image);

									if(in_array(strtolower($image_ex), array('png','jpg','jpeg'))===false){

										echo '<div style ="color:orange; text-align:center" >Veillez rentrer une image ayant pour extension : jpg, png ou jpeg.</div>';

									}else{
										
										$image_size = getimagesize($fichierTempo);

										if($image_size['mime']=='image/jpeg'){
											$image_src = imagecreatefromjpeg($fichierTempo);
										}else if($image_size['mime']=='image/png'){
											$image_src = imagecreatefrompng($fichierTempo);
										}else{
											$image_src = false;
											echo '<div style ="color:orange; text-align:center" ><b> Veillez rentrer une image valide.</b></div>';
										}
									}

									if($image_src !== false){
					
										$image_width = 1000;
										if($image_size[0]==$image_width){
											$image_finale = $image_src;
										}else{
											$new_width[0] = $image_width;
											$new_height[1] = 1000;

											$image_finale = imagecreatetruecolor($new_width[0], $new_height[1]);

											imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);

										}

										imagejpeg($image_finale, 'img/photos/'.$nomPhoto);

										//move_uploaded_file($fichierTempo, 'images/'.$nomPhoto);

										$candidat = new candidat();

										$candidat->setNom_pers($nom);
										$candidat->setPrenom_pers($prenom);
										$candidat->setSexe_pers($sexe);
										$candidat->setAdresse_pers($adresse);
										$candidat->setTel_pers($tel);
										$candidat->setPays($pays);
										$candidat->setDate_nais($date_nais);
										$candidat->setLieu_nais($lieu_nais);
										$candidat->setImage($nomPhoto);
										$candidat->setFiliere($filiere);
										$candidat->setSpecialite($specialite);

                                        $candidat->setDiplome($diplome);
                                        $candidat->setSerie($serie);
                                        $candidat->setNiveauEtudeUniversitaire($niv_etu_univ);
                                        $candidat->setStatut($statut);
										$candidat->setType_pers($type_pers);

										$count = $candidat->ajoutercandidat();

										if($count>0){

											echo '<div class ="text-mint text-center" >candidat enregistré avec succès.</div>';
										
										}else{

											echo '<div style ="color:orange; text-align:center" >L\'insertion à echouée.</div>';
										
										}


									}	

									

								}else{

										$candidat = new candidat();

										$candidat->setNom_pers($nom);
										$candidat->setPrenom_pers($prenom);
										$candidat->setSexe_pers($sexe);
										$candidat->setAdresse_pers($adresse);
										$candidat->setTel_pers($tel);
										$candidat->setPays($pays);
										$candidat->setsetDate_nais($date_nais);
										$candidat->setDate_nais($date_nais);
										$candidat->setImage($nomPhoto);
										$candidat->setFiliere($filiere);
										$candidat->setSpecialite($specialite);

                                        $candidat->setDiplome($diplome);
                                        $candidat->setSerie($serie);
                                        $candidat->setNiveauEtudeUniversitaire($niv_etu_univ);
                                        $candidat->setStatut($statut);
										$candidat->setType_pers($type_pers);

										$count = $candidat->ajoutercandidat();

										if($count>0){

											echo '<div class ="text-mint text-center" >candidat enregistré avec succès.</div>';
										
										}else{

											echo '<div style ="color:orange; text-align:center" >L\'insertion à echouée.</div>';
										
										}
								}

							}else{

								echo '<div style ="color:orange; text-align:center" >Ce format du téléphone ne correspond pas.</div>';
							
							}

						}else{

							echo '<div style="text-align:center; color:orange">Le numero <span style="color:yellow">'.$tel.'</span> existe déjà !</div></div>';

						}

				
				}else{

					echo '<div style ="color:orange; text-align:center" >Nom et prénom existe déjà.</div>';
				}
			
			

		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}

?>