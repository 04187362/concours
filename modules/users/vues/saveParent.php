<?php

	include("modules/users/modeles/methodeUsers.php");
	//include("ClsPersonne.php");
	include("entites/ClsParent.php"); ?>


<?php

	if(!empty($_POST['nom_pers']) && !empty($_POST['sexe_pers']) && !empty($_POST['adresse_pers']) && !empty($_POST['tel_pers'])
			&& !empty($_POST['password']) && !empty($_POST['conf_password']) && !empty($_POST['pays']) && !empty($_POST['prof_par'])){

			$nom = addslashes(htmlspecialchars($_POST['nom_pers']));
			$prenom = addslashes(htmlspecialchars($_POST['prenom_pers']));
			$sexe = htmlspecialchars($_POST['sexe_pers']);
			$adresse = addslashes(htmlspecialchars($_POST['adresse_pers']));
			$tel = htmlspecialchars($_POST['tel_pers']);
			$password = htmlspecialchars($_POST['password']);
			$conf_password = htmlspecialchars($_POST['conf_password']);
			$pays = htmlspecialchars($_POST['pays']);
			$prof_par = htmlspecialchars($_POST['prof_par']);
			$type_pers = "Parent";

			$requete = "SELECT * FROM personne WHERE nom_pers=? AND prenom_pers=?";
			$param = array($nom,$prenom,$id);
			// On verifie si le meme et prenom que l'on veut modifié s'il existe déjà pour eviter la dupplication.
			if(existanceUsers($requete,$param) == 0){

					$requete1 = "SELECT * FROM personne WHERE password=?";
					$param1 = array($password);

					if(existanceUsers($requete1,$param1) == 0){

						$requete1 = "SELECT * FROM personne WHERE tel_pers =?";
						$param1 = array($tel);

						// On verifie si le telephone existe deja pour eviter la dupplication.
						if(existanceUsers($requete1,$param1) == 0){

							if (preg_match("#^0[1-9]([-. ]?[0-9]{2}){3}$#", $tel)){

								$parent = new Parents();

								$parent->setNom_pers($nom);
								$parent->setPrenom_pers($prenom);
								$parent->setSexe_pers($sexe);
								$parent->setAdresse_pers($adresse);
								$parent->setTel_pers($tel);
								$parent->setPassword($password);
								$parent->setPays($pays);
								$parent->setProfession_par($prof_par);
								$parent->setType_pers($type_pers);

								$count = $parent->ajouterParent();

								if($count>0){

									echo '<div class="text-center text-mint" >Parent enregistré avec succès.</div>';
								
								}else{

									echo '<div style ="color:green; text-align:center" >Pas d\'insertion.</div>';
								
								}

							}else{

								echo '<div style ="color:orange; text-align:center" >Le format du téléphone ne correspond pas.</div>';
							
							}

						}else{

							echo '<div style="text-align:center; color:orange">Le numero <span style="color:yellow">'.$tel.'</span> existe déjà !</div></div>';

						}

					}else{

						echo '<div style ="color:orange; text-align:center" >Ce mot de passe existe déjà</div>';

					}
				
				}else{

					echo '<div style ="color:orange; text-align:center" >Le Nom et prénom existent déjà.</div>';
				}
			}else{
				echo '<div style ="color:orange; text-align:center" >Confirmer bien votre mot de passe.</div>';
			}

		}else{

			echo '<div style ="color:orange; text-align:center" >Tous les champs sont obligatoires.</div>';
		}

?>