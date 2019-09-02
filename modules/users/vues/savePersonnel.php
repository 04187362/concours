<?php

	include("modules/users/modeles/methodeUsers.php");
	include("entites/ClsPersonne.php");
	include("entites/ClsPersonnel.php");

	if(!empty($_POST['nom_pers']) && !empty($_POST['sexe_pers']) && !empty($_POST['adresse_pers']) && !empty($_POST['tel_pers'])
			&& !empty($_POST['password']) && !empty($_POST['conf_password']) && !empty($_POST['pays']) && !empty($_POST['date_nais']) && !empty($_POST['lieu_nais']) && !empty($_POST['role'])){

			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$password = htmlspecialchars($_POST['password']);
			$conf_password = htmlspecialchars($_POST['conf_password']);
			$pays = htmlspecialchars($_POST['pays']);
			$date_nais = htmlspecialchars($_POST['date_nais']);
			$lieu_nais = htmlspecialchars($_POST['lieu_nais']);
			$email_pers = htmlspecialchars($_POST['email_pers']);
			$role = htmlspecialchars($_POST['role']);
			$type_pers = "Personnel";

			$table = "personne";
			$colonne1 = "nom_pers";
			$colonne2 = "prenom_pers";

			if($password == $conf_password){
				if(existanceDeuxChampsUsers($table, $colonne1, $nom, $colonne2, $prenom) == 0){

					$colonne3 = "password";

					if(existanceUsers($table, $colonne3, $password) == 0){

						$colonne4 = "tel_pers";
						$colonne5 = "type_pers";

						if(existanceDeuxChampsUsers($table, $colonne4, $tel, $colonne5, $type_pers) == 0){

							if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

								if(isset($email_ens)){

									if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email_ens)){

										$personnel = new Personnel();

										$personnel->setNom_pers($nom);
										$personnel->setPrenom_pers($prenom);
										$personnel->setSexe_pers($sexe);
										$personnel->setAdresse_pers($adresse);
										$personnel->setTel_pers($tel);
										$personnel->setPassword($password);
										$personnel->setPays($pays);
										$personnel->setEmail_pers($email_pers);
										$personnel->setDate_nais($date_nais);
										$personnel->setLieu_nais($lieu_nais);
										$personnel->setRole($role);
										$personnel->setType_pers($type_pers);

										$count = $personnel->ajouterPersonnel();

										if($count>0){

											echo '<div class ="text-mint text-center"><b>Enseignant enregistré avec succès.</b></div>';
										
										}else{

											echo '<div style ="color:orange; text-align:center" >Pas d\'insertion.</div>';
										
										}

									}else{

										echo '<div style ="color:orange; text-align:center" >Ce format d\'e-mail ne correspond pas.</div>';

									}

								}else{

										$personnel = new Personnel();

										$personnel->setNom_pers($nom);
										$personnel->setPrenom_pers($prenom);
										$personnel->setSexe_pers($sexe);
										$personnel->setAdresse_pers($adresse);
										$personnel->setTel_pers($tel);
										$personnel->setPassword($password);
										$personnel->setPays($pays);
										$personnel->setEmail_pers($email_pers);
										$personnel->setDate_nais($date_nais);
										$personnel->setLieu_nais($lieu_nais);
										$personnel->setRole($role);
										$personnel->setType_pers($type_pers);

										$count = $personnel->ajouterPersonnel();

										if($count>0){

											echo '<div class ="text-mint text-center">Personnel enregistré avec succès.</div>';
										
										}else{

											echo '<div style ="color:orange; text-align:center" >Pas d\'insertion.</div>';
										
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