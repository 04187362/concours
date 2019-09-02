<?php

	include("modules/users/modeles/methodeUsers.php");

	include("entites/ClsParent.php");
	include("entites/ClsPersonnel.php");
	include("entites/ClsEtudiant.php");
	include("entites/ClsEnseignant.php");

	if(!empty($_POST['type_pers']) && ($_POST['type_pers'] =="Parent")){

		if(!empty($_POST['id_pers']) && !empty($_POST['nom_pers']) && !empty($_POST['sexe_pers']) && !empty($_POST['adresse_pers']) 
			&& !empty($_POST['tel_pers']) && !empty($_POST['pays']) && !empty($_POST['prof_par'])){

			$id = addslashes(htmlspecialchars($_POST['id_pers']));
			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$pays = htmlspecialchars($_POST['pays']);
			$prof_par = htmlspecialchars($_POST['prof_par']);
			$type_pers = htmlspecialchars($_POST['type_pers']);

			$requete = "SELECT * FROM personne WHERE nom_pers=? AND prenom_pers=? AND id_pers NOT IN(?)";
			$param = array($nom,$prenom,$id);
			// On verifie si le meme et prenom que l'on veut modifié existe déjà pour eviter la dupplication.
			if(existanceUsers($requete,$param) == 0){

				//if(existanceUsers($table, $colonne3, $password) == 0){

					$requete1 = "SELECT * FROM personne WHERE tel_pers =? AND id_pers NOT IN(?)";
					$param1 = array($tel,$id);

					// On verifie si le telephone existe deja pour eviter la dupplication.
					if(existanceUsers($requete1,$param1) == 0){

						if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

							$parent = new Parents();

							$parent->setId_pers($id);
							$parent->setNom_pers($nom);
							$parent->setPrenom_pers($prenom);
							$parent->setSexe_pers($sexe);
							$parent->setAdresse_pers($adresse);
							$parent->setTel_pers($tel);
							$parent->setPays($pays);
							$parent->setProfession_par($prof_par);
							$parent->setType_pers($type_pers);

							$count = $parent->modifierParent();

							if($count>0){

								echo '<div class ="text-mint text-center">Parent modifié avec succès.</div>';
							
							}else{

								echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
							
							}

						}else{

							echo '<div style ="color:orange; text-align:center" >Ce format du téléphone ne correspond pas.</div>';
						
						}

					}else{

						echo '<div style="text-align:center; color:orange">Le numero <span style="color:yellow">'.$tel.'</span> existe déjà !</div></div>';

					}

				/*}else{

					echo '<div style ="color:orange; text-align:center" >Ce mot de passe existe déjà</div>';

				}*/
			
			}else{

				echo '<div style ="color:orange; text-align:center" >Le même nom et prénom existe déjà.</div>';
			}

		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}
	}

	
	if(!empty($_POST['type_pers']) && ($_POST['type_pers'] =="Etudiant")){

		if(!empty($_POST['id_pers']) && !empty($_POST['nom_pers']) && !empty($_POST['sexe_pers']) && !empty($_POST['adresse_pers']) && !empty($_POST['parent'])
			&& !empty($_POST['tel_pers']) && !empty($_POST['pays']) && !empty($_POST['date_nais_etu']) && !empty($_POST['lieu_nais_etu']) && !empty($_POST['statut']) 
			&& !empty($_POST['niv_etu_univ']) && !empty($_POST['diplome']) && !empty($_POST['serie']) && !empty($_POST['numbourse']) 
			&& !empty($_POST['filiere']) && !empty($_POST['specialite']) && !empty($_POST['prenom_pers']) && !empty($_POST['niveauetude'])){

			$id = htmlspecialchars($_POST['id_pers']);
			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$pays = htmlspecialchars($_POST['pays']);
			$filiere = htmlspecialchars($_POST['filiere']);
			$date_nais = htmlspecialchars($_POST['date_nais_etu']);
			$lieu_nais = htmlspecialchars($_POST['lieu_nais_etu']);
			$statut = htmlspecialchars($_POST['statut']);
			$niv_etu_univ = htmlspecialchars($_POST['niv_etu_univ']);
			$diplome = htmlspecialchars($_POST['diplome']);
			$serie = htmlspecialchars($_POST['serie']);
			$parent = htmlspecialchars($_POST['parent']);
			$specialite = htmlspecialchars($_POST['specialite']);
			$numbourse=htmlentities(htmlspecialchars($_POST['numbourse']));
			$niveauetude=htmlentities(htmlspecialchars($_POST['niveauetude']));
			$type_pers = htmlspecialchars($_POST['type_pers']);

			$requete = "SELECT * FROM personne WHERE nom_pers=? AND prenom_pers=? AND id_pers NOT IN(?)";
			$param = array($nom,$prenom,$id);
			// On verifie si le meme et prenom que l'on veut modifié existe déjà pour eviter la dupplication.
			if(existanceUsers($requete,$param) == 0){

					$requete1 = "SELECT * FROM personne WHERE tel_pers =? AND id_pers NOT IN(?)";
					$param1 = array($tel,$id);

					// On verifie si le telephone existe deja pour eviter la dupplication.
					if(existanceUsers($requete1,$param1) == 0){

						if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

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

									$etudiant = new Etudiant();

									$etudiant->setId_pers($id);
									$etudiant->setNom_pers($nom);
									$etudiant->setPrenom_pers($prenom);
									$etudiant->setSexe_pers($sexe);
									$etudiant->setAdresse_pers($adresse);
									$etudiant->setTel_pers($tel);
									$etudiant->setPays($pays);
									$etudiant->setFiliere($filiere);
                                    $etudiant->setNumbourse($numbourse);
                                    $etudiant->setSpecialite($specialite);
									$etudiant->setDate_nais_etu($date_nais);
									$etudiant->setLieu_nais_etu($lieu_nais);
									$etudiant->setSerie($serie);
									$etudiant->setNiveauEtudeUniversitaire($niv_etu_univ);
									$etudiant->setDiplome($diplome);
									$etudiant->setParent($parent);
									$etudiant->setStatut($statut);
									$etudiant->setNiveauetude($niveauetude);
									$etudiant->setImage($nomPhoto);
									$etudiant->setType_pers($type_pers);

									$count = $etudiant->modifierEtudiant();
                                    
									if($count>0){

										echo '<div class ="text-mint text-center" >Etudiant modifié avec succès.</div>';
									
									}else{

										echo '<div style ="color:orange; text-align:center" >Aucune mise à jour n\'a été effectuée.</div>';
									
									}

								}


							}else{

								$etudiant = new Etudiant();

								    $etudiant->setId_pers($id);
									$etudiant->setNom_pers($nom);
									$etudiant->setPrenom_pers($prenom);
									$etudiant->setSexe_pers($sexe);
									$etudiant->setAdresse_pers($adresse);
									$etudiant->setTel_pers($tel);
									$etudiant->setPays($pays);
									$etudiant->setFiliere($filiere);
                                    $etudiant->setNumbourse($numbourse);
                                    $etudiant->setSpecialite($specialite);
									$etudiant->setDate_nais_etu($date_nais);
									$etudiant->setLieu_nais_etu($lieu_nais);
									$etudiant->setSerie($serie);
									$etudiant->setNiveauEtudeUniversitaire($niv_etu_univ);
									$etudiant->setDiplome($diplome);
									$etudiant->setParent($parent);
									$etudiant->setStatut($statut);
									$etudiant->setNiveauetude($niveauetude);
									$etudiant->setImage($nomPhoto);
									$etudiant->setType_pers($type_pers);

								$count = $etudiant->modifierEtudiant();

								if($count>0){

									echo '<div class ="text-mint text-center" >Etudiant modifié avec succès.</div>';
									
								}else{

									echo '<div style ="color:orange; text-align:center" >Aucune mise à jour n\'a été effectuée.</div>';
									
								}

							}



						}else{

							echo '<div style ="color:orange; text-align:center" >Ce format du téléphone ne correspond pas.</div>';
						
						}

					}else{

						echo '<div style="text-align:center; color:orange">Le numero <span style="color:yellow">'.$tel.'</span> existe déjà !</div></div>';

					}

			
			}else{

				echo '<div style ="color:orange; text-align:center" >Le même nom et prénom existe déjà.</div>';
			}

		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}
	}


	if(!empty($_POST['type_pers']) && ($_POST['type_pers'] =="Enseignant")){

		if(!empty($_POST['id_pers']) && !empty($_POST['nom_pers']) && !empty($_POST['sexe_pers']) && !empty($_POST['adresse_pers']) 
			&& !empty($_POST['tel_pers']) && !empty($_POST['pays']) && !empty($_POST['date_nais']) && !empty($_POST['diplome'])){

			$id = addslashes(htmlspecialchars($_POST['id_pers']));
			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$pays = htmlspecialchars($_POST['pays']);
			$date_nais = htmlspecialchars($_POST['date_nais']);
			$email_ens = htmlspecialchars($_POST['email_ens']);
			$diplome = htmlspecialchars($_POST['diplome']);
			$type_pers = htmlspecialchars($_POST['type_pers']);

			$requete = "SELECT * FROM personne WHERE nom_pers=? AND prenom_pers=? AND id_pers NOT IN(?)";
			$param = array($nom,$prenom,$id);


			// On verifie si le meme et prenom que l'on veut modifié existe déjà pour eviter la dupplication.
			if(existanceUsers($requete,$param) == 0){

					$requete1 = "SELECT * FROM personne WHERE tel_pers =? AND id_pers NOT IN(?)";
					$param1 = array($tel,$id);

					// On verifie si le telephone existe deja pour eviter la dupplication.
					if(existanceUsers($requete1,$param1) == 0){

						if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

							if(isset($email_ens)){

								if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email_ens)){

									$enseigant = new Enseignant();

									$enseigant->setId_pers($id);
									$enseigant->setNom_pers($nom);
									$enseigant->setPrenom_pers($prenom);
									$enseigant->setSexe_pers($sexe);
									$enseigant->setAdresse_pers($adresse);
									$enseigant->setTel_pers($tel);
									$enseigant->setPays($pays);
									$enseigant->setEmail_ens($email_ens);
									$enseigant->setDate_nais($date_nais);
									$enseigant->setDiplome($diplome);
									$enseigant->setType_pers($type_pers);

									$count = $enseigant->modifierEnseignant();

									if($count>0){

										echo '<div class ="text-mint text-center">Enseignant modifié avec succès.</div>';
									
									}else{

										echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
									
									}

								}else{

									echo '<div style ="color:orange; text-align:center" >Ce format d\'e-mail ne correspond pas.</div>';

								}

							}else{

									$enseigant = new Enseignant();

									$enseigant->setId_pers($id);
									$enseigant->setNom_pers($nom);
									$enseigant->setPrenom_pers($prenom);
									$enseigant->setSexe_pers($sexe);
									$enseigant->setAdresse_pers($adresse);
									$enseigant->setTel_pers($tel);
									$enseigant->setPays($pays);
									$enseigant->setEmail_ens($email_ens);
									$enseigant->setDate_nais($date_nais);
									$enseigant->setDiplome($diplome);
									$enseigant->setType_pers($type_pers);

									$count = $enseigant->updateEnseignant();

									if($count>0){

										echo '<div class ="text-mint text-center">Enseignant modifié avec succès.</div>';
									
									}else{

										echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
									
									}
							}

						}else{

							echo '<div style ="color:orange; text-align:center" >Ce format du téléphone ne correspond pas.</div>';
						
						}

					}else{

						echo '<div style="text-align:center; color:orange">Le numero <span style="color:yellow">'.$tel.'</span> existe déjà !</div></div>';

					}
			
			}else{

				echo '<div style ="color:orange; text-align:center" >Le même nom et prénom existe déjà.</div>';
			}

		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}

	}

	// Modification de l'enseignant

	if(!empty($_POST['type_pers']) && ($_POST['type_pers'] =="Personnel")){

		if(!empty($_POST['id_pers']) && !empty($_POST['nom_pers']) && !empty($_POST['sexe_pers']) && !empty($_POST['adresse_pers']) 
			&& !empty($_POST['tel_pers']) && !empty($_POST['pays']) && !empty($_POST['date_nais']) && !empty($_POST['role'])){

			$id = addslashes(htmlspecialchars($_POST['id_pers']));
			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$pays = htmlspecialchars($_POST['pays']);
			$date_nais = htmlspecialchars($_POST['date_nais']);
			$lieu_nais = htmlspecialchars($_POST['lieu_nais']);
			$email_pers = htmlspecialchars($_POST['email_pers']);
			$role = htmlspecialchars($_POST['role']);
			$type_pers = htmlspecialchars($_POST['type_pers']);

			$requete = "SELECT * FROM personne WHERE nom_pers=? AND prenom_pers=? AND id_pers NOT IN(?)";
			$param = array($nom,$prenom,$id);
			// On verifie si le meme et prenom que l'on veut modifié s'il existe déjà pour eviter la dupplication.
			if(existanceUsers($requete,$param) == 0){

					$requete1 = "SELECT * FROM personne WHERE tel_pers =? AND id_pers NOT IN(?)";
					$param1 = array($tel,$id);

					// On verifie si le telephone existe deja pour eviter la dupplication.
					if(existanceUsers($requete1,$param1) == 0){

						if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

							if(isset($email_ens)){

								if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email_ens)){

									$personnel = new Personnel();

									$personnel->setId_pers($id);
									$personnel->setNom_pers($nom);
									$personnel->setPrenom_pers($prenom);
									$personnel->setSexe_pers($sexe);
									$personnel->setAdresse_pers($adresse);
									$personnel->setTel_pers($tel);
									$personnel->setPays($pays);
									$personnel->setEmail_pers($email_pers);
									$personnel->setDate_nais($date_nais);
									$personnel->setLieu_nais($lieu_nais);
									$personnel->setRole($role);
									$personnel->setType_pers($type_pers);

									$count = $personnel->modifierPersonnel();

									if($count>0){

										echo '<div class ="text-mint text-center">Personnel modifié avec succès.</div>';
									
									}else{

										echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
									
									}

								}else{

									echo '<div style ="color:orange; text-align:center" >Ce format d\'e-mail ne correspond pas.</div>';

								}

							}else{

									$personnel = new Personnel();

									$personnel->setId_pers($id);
									$personnel->setNom_pers($nom);
									$personnel->setPrenom_pers($prenom);
									$personnel->setSexe_pers($sexe);
									$personnel->setAdresse_pers($adresse);
									$personnel->setTel_pers($tel);
									$personnel->setPays($pays);
									$personnel->setEmail_pers($email_pers);
									$personnel->setDate_nais($date_nais);
									$personnel->setLieu_nais($lieu_nais);
									$personnel->setRole($role);
									$personnel->setType_pers($type_pers);

									$count = $personnel->modifierPersonnel();

									if($count>0){

										echo '<div class ="text-mint text-center">Personnel modifié avec succès.</div>';
									
									}else{

										echo '<div style="text-align:center; color:orange"><b>Aucune mise à jour n\'a été effectuée.</b></div>';
									
									}
							}

						}else{

							echo '<div style ="color:orange; text-align:center" >Ce format du téléphone ne correspond pas.</div>';
						
						}

					}else{

						echo '<div style="text-align:center; color:orange">Le numero <span style="color:yellow">'.$tel.'</span> existe déjà !</div></div>';

					}
			
			}else{

				echo '<div style ="color:orange; text-align:center" >Le même nom et prénom existe déjà.</div>';
			}

		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}

	}


?>