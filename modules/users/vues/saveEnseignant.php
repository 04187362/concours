<?php

	include("modules/users/modeles/methodeUsers.php");
	include("entites/ClsPersonne.php");
	include("entites/ClsEnseignant.php");

	?>

<?php

	if(!empty($_POST['nom_pers']) && !empty($_POST['sexe_pers']) && !empty($_POST['adresse_pers']) && !empty($_POST['tel_pers'])
		&& !empty($_POST['password']) && !empty($_POST['conf_password']) && !empty($_POST['pays']) && !empty($_POST['date_nais']) && !empty($_POST['diplome'])){

			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$password = htmlspecialchars($_POST['password']);
			$conf_password = htmlspecialchars($_POST['conf_password']);
			$pays = htmlspecialchars($_POST['pays']);
			$date_nais = htmlspecialchars($_POST['date_nais']);
			$email_ens = htmlspecialchars($_POST['email_ens']);
			$diplome = htmlspecialchars($_POST['diplome']);
			$type_pers = "Enseignant";

			$requete = "SELECT * FROM personne WHERE nom_pers=? AND prenom_pers=?";
			$param = array($nom,$prenom);


			if($password == $conf_password){
				// On verrifie si le meme nom et prenom existe deja.
				if(existanceUsers($requete,$param) == 0){
					// On verifie si le password existe deja.
					$requete1 = "SELECT * FROM personne WHERE password=?";
					$param1 = array($password);
					if(existanceUsers($requete1,$param1) == 0){

						$requete2 = "SELECT * FROM personne WHERE tel_pers=?";
						$param2 = array($tel);

						if(existanceUsers($requete2,$param2) == 0){

							if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

								if(isset($email_ens)){

									if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email_ens)){

										$enseigant = new Enseignant();

										$enseigant->setNom_pers($nom);
										$enseigant->setPrenom_pers($prenom);
										$enseigant->setSexe_pers($sexe);
										$enseigant->setAdresse_pers($adresse);
										$enseigant->setTel_pers($tel);
										$enseigant->setPassword($password);
										$enseigant->setPays($pays);
										$enseigant->setEmail_ens($email_ens);
										$enseigant->setDiplome($diplome);
										$enseigant->setDate_nais($date_nais);
										$enseigant->setType_pers($type_pers);

										$count = $enseigant->ajouterEnseignant();

										if($count>0){

											echo '<div class ="text-center text-mint" >Enseignant enregistré avec succès.</div>';
										
										}else{

											echo '<div style ="color:green; text-align:center" >Pas d\'insertion.</div>';
										
										}

									}else{

										echo '<div style ="color:orange; text-align:center" >Ce format d\'e-mail ne correspond pas.</div>';

									}

								}else{

										$enseigant = new Enseignant();

										$enseigant->setNom_pers($nom);
										$enseigant->setPrenom_pers($prenom);
										$enseigant->setSexe_pers($sexe);
										$enseigant->setAdresse_pers($adresse);
										$enseigant->setTel_pers($tel);
										$enseigant->setPassword($password);
										$enseigant->setPays($pays);
										$enseigant->setEmail_ens($email_ens);
										$enseigant->setDate_nais($date_nais);
										$enseigant->setDiplome($diplome);
										$enseigant->setType_pers($type_pers);

										$count = $enseigant->ajouterEnseignant();

										if($count>0){

											echo '<div style ="color:white; text-align:center" >Enseignant crée avec succès.</div>';
										
										}else{

											echo '<div style ="color:green; text-align:center" >Pas d\'insertion.</div>';
										
										}
								}

							}else{

								echo '<div style ="color:orange; text-align:center" >Ce format du téléphone ne correspond pas.</div>';
							
							}

						}else{

							echo '<div style="text-align:center; color:orange">Le numero <span style="color:yellow">'.$tel.'</span> existe déjà !</div></div>';

						}

					}else{

						echo '<div style ="color:orange; text-align:center" >Ce mot de passe existe déjà</div>';

					}
				
				}else{

					echo '<div style ="color:orange; text-align:center" >Le même nom et prénom existe déjà.</div>';
				}
			}else{
				echo '<div style ="color:orange; text-align:center" >Confirmer bien votre mot de passe.</div>';
			}

		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}

?>