<?php

	include_once ("connexion/connexiongenerale.php");

    function existanceGestion($requete, $param){

		try{
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($requete);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$retour ="";

			while ($lignesselect=$req->fetch()) {
				$retour = $lignesselect[0];
			}
			 //Retour des lignes
			 return $retour;
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}

	}

	
	function getChampsGestion($requete,$param){

		try{
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($requete);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$retour ="";

			while ($lignesselect=$req->fetch()) {
				$retour = $lignesselect[0];
			}
			 //Retour des lignes
			 return $retour;
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	

	function getNombreLigneGestion($requete, $param){

		try{
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($requete);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$retour = 0;

			while ($lignesselect=$req->fetch()) {
				$retour = $lignesselect[0];
			}
			 //Retour des lignes
			 return $retour;
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	function getNombreLigneGestion2($requete){
		try{
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($requete);
			//exécution de la requête de sélection et retour des résultats
			$req->execute();
			//Conservation lignes par ligne des élements retournés
			$retour = 0;

			while ($lignesselect=$req->fetch()) {
				$retour = $lignesselect[0];
			}
			 //Retour des lignes
			 return $retour;
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// On compte le nombre de payement d'un etudiant
	function getNombrePaiementEtudiant($valeur){

		try{
			$req="SELECT count(*) as effectif 
					FROM paiement pe, personne p
					WHERE p.id_pers = pe.id_etu
					AND id_par = '$valeur'
					AND etat = 0 ";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($req);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Cette methode permet de recuperer notre d'etudiant qui ont composé une matiere dans une salle

	function getNombreLigneGestion3( $valeur1, $valeur2){

		try{
			$req="SELECT count(*) as effectif 
					FROM personne p, composer c, matiere m, programme pr, classe cl
					WHERE p.id_pers = c.id_etu
					AND c.id_matiere = m.id_matiere
					AND m.id_matiere = pr.id_matiere
					AND pr.id_classe = cl.id_classe
					AND p.id_classe = cl.id_classe
					AND m.id_matiere = '$valeur1'
					AND cl.id_classe = '$valeur2'";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($req);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// On compte le nombre d'etudiant qui ont pris l'inscription dans une salle donnée

	function getNombreEtudiantInscription($id_niveauetude){

		try{
			$req="SELECT count(*) as effectif 
					FROM inscription i, personne p
					WHERE p.id_pers = i.id_etu
					AND id_niveauetude = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($req);
			$param = array($id_niveauetude);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Methode calculant la somme des coeffiient d'une UE enseignée dans un niveau d'etude.
	function getSommeCoefficientMatiereUE($id_ue,$id_niveauetude){

		try{
			$sql="SELECT sum(coef) as effectif 
					FROM matiere m, programme p, enseigner e, niveau_etude n
					WHERE m.id_matiere = p.id_matiere
					AND m.id_matiere = e.id_matiere
					AND n.id_niveauetude = p.id_niveauetude
					AND n.id_niveauetude = e.id_niveauetude
					AND p.id_ue = ?
					AND n.id_niveauetude = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($sql);
			$param = array($id_ue,$id_niveauetude);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch(); 

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Methode calculant la somme des coeffiient d'une UE enseignée dans un niveau d'etude.
	function getSommeCreditMatiereUE($id_ue,$id_niveauetude){

		try{
			$sql="SELECT sum(credit) as effectif 
					FROM matiere m, programme p, enseigner e, niveau_etude n
					WHERE m.id_matiere = p.id_matiere
					AND m.id_matiere = e.id_matiere
					AND n.id_niveauetude = p.id_niveauetude
					AND n.id_niveauetude = e.id_niveauetude
					AND p.id_ue = ?
					AND n.id_niveauetude = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($sql);
			$param = array($id_ue,$id_niveauetude);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}
	// Methode calculant la somme des coeffiient 
	function getSommeCoefficient($id_niveauetude){

		try{
			$sql="SELECT sum(coef) as effectif 
					FROM matiere m, programme p, enseigner e, niveau_etude n
					WHERE m.id_matiere = p.id_matiere
					AND m.id_matiere = e.id_matiere
					AND n.id_niveauetude = p.id_niveauetude
					AND n.id_niveauetude = e.id_niveauetude
					AND n.id_niveauetude = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($sql);
			$param = array($id_niveauetude);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}
	//On compte le nombre de U.E enseigné dans un niveau d'etude.
	function nombreUE($id_niveauetude){

			try{
				$count = 0;
                $sql = "SELECT count(id_ue) FROM enseigner 
						WHERE id_niveauetude=? GROUP BY id_ue";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
				// Preparation de la requete
                $req = $Cnx->prepare($sql);
				$param = array($id_niveauetude);
				//exécution de la requête de sélection et retour des résultats
				$req->execute($param);
				//Conservation lignes par ligne des élements retournés

                foreach($req as $tablo){
                    $count ++;
                }
                return $count; 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
		
	}

	// Compte le nombre de composition effectué par les etudiants
	function getNombreCompositionEtudiant(){
		try{
				$count = 0;

                $sql = "SELECT *
	              FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
	              WHERE e.id_pers = c.id_etu 
	              AND c.id_matiere = m.id_matiere 
	              AND m.id_matiere = p.id_matiere 
	              AND p.id_classe = cl.id_classe
	              AND cl.id_classe=e.id_classe
	              AND c.id_anneeAc = a.id_annee
	              GROUP BY m.id_matiere, id_pers, trimestre";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $count = $count + 1;
                }

               return $count;
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
	}
	// Methode permettant de faire une mise a jour du rang de l'etudiant
	function updateRangEtudiant( $rang, $etudiant, $trimestre){

		try{
				$requete = "UPDATE composer 
							SET rang = '$rang'
							WHERE id_etu ='$etudiant'
							AND trimestre ='$trimestre'";
				$count = CUD($requete);
			  	return $count;
		}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
		}

	}


	// Recuperation du rang de l'etudiant
	function getRangEtudiant($id_etudiant, $trimestre){

		try{
			$sql = "SELECT rang 
					FROM composer 
					WHERE id_etu = '$id_etudiant'
					AND trimestre = '$trimestre'";
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($sql);
			//Conservation lignes par ligne des élements retournés
			$rang =0;

			while ($lignesselect=$resultat->fetch()) {
				$rang = $lignesselect[0];
			}
			 //Retour des lignes
			 return $rang;
			}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}

	}

	//  Recuperation de la notes de l'etudiant

	function getNoteExamenEtudiant($id_etudiant,$semestre, $id_matiere){


		try{

			$requete = "SELECT note as note_examen 
						FROM personne e, composer c, matiere m, programme p, niveau_etude n, annee_academique a
						WHERE e.id_pers = c.id_etu 
						AND c.id_matiere = m.id_matiere 
						AND m.id_matiere = p.id_matiere 
						AND p.id_niveauetude = n.id_niveauetude
						AND n.id_niveauetude = e.id_niveauetude
						AND c.id_anneeAc = a.id_annee 
						AND evaluation = 'Examen'
						AND id_pers = ?
						AND semestre = ?
						AND m.id_matiere = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($requete);
			$param = array($id_etudiant,$semestre, $id_matiere);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch();

			return $lignesselect['note_examen'];

		}catch(Exception $e){
			die("Erreur :".$e->getMessage());
		}
	}


	//  Recuperation de la note du devoir de l'etudiant

	function getNoteDevoirEtudiant($id_etudiant, $semestre, $id_matiere){


		try{

			$requete = "SELECT sum(note)/count(id_com) as note_devoir 
						FROM personne e, composer c, matiere m, programme p, niveau_etude n, annee_academique a
						WHERE e.id_pers = c.id_etu 
						AND c.id_matiere = m.id_matiere 
						AND m.id_matiere = p.id_matiere 
						AND p.id_niveauetude = n.id_niveauetude
						AND n.id_niveauetude = e.id_niveauetude
						AND c.id_anneeAc = a.id_annee 
						AND evaluation = 'Devoir'
						AND id_pers = ?
						AND semestre = ?
						AND m.id_matiere = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($requete);
			$param = array($id_etudiant, $semestre, $id_matiere);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch();

			return $lignesselect['note_devoir'];

		}catch(Exception $e){
			die("Erreur :".$e->getMessage());
		}
	}

	//  Recuperation du coefficiant de la matiere dans une classe
	function getCoefficientMatiere($id_matiere, $id_niveauetude){

		try{
			$sql = "SELECT coef 
					FROM programme 
					WHERE id_matiere = ?
					AND id_niveauetude = ?";
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($sql);
			$param = array($id_matiere,$id_niveauetude);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$value =0;

			while ($lignesselect=$req->fetch()) {
				$value = $lignesselect[0];
			}
			 //Retour des lignes
			 return $value;
			}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	//  Recuperation du crédit de la matiere dans une classe
	function getCreditMatiere($id_matiere, $id_niveauetude){

		try{
			$sql = "SELECT credit 
					FROM programme 
					WHERE id_matiere = ?
					AND id_niveauetude = ?";
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($sql);
			$param = array($id_matiere,$id_niveauetude);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$value =0;

			while ($lignesselect=$req->fetch()) {
				$value = $lignesselect[0];
			}
			 //Retour des lignes
			 return $value;
			}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Comptage de nombre de message  recu.
	function getNombreMessageRecu($valeur){

		try{
			$req="SELECT count(*) as effectif 
					FROM message
					WHERE id_ben = '$valeur'
					AND etat = 0 ";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($req);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Changement d'etat du paiement recu
	function updateMultiplePaiement($id_etudiant){

            try{
                $sql = "SELECT * FROM paiement
                        WHERE id_etu ='$id_etudiant'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_paye = $tablo['id_paye'];
                    $requete = "UPDATE paiement SET etat = 1 WHERE id_paye ='$id_paye'";
                    $count = CUD($requete);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

    }

    // Cette methode calcule la somme total des heures effectuées par un enseignant dans une classe pour une matière.
    function getNombreTotalHeure($id_ens, $id_matiere, $id_classe, $mois){

		try{
			$req="SELECT sum(heure_effectue) as effectif 
					FROM emargement
					WHERE id_ens = '$id_ens'
					AND id_matiere = '$id_matiere'
					AND id_classe = '$id_classe' 
					AND mois = '$mois'";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($req);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Cette methode permet de faire une mise a jour de la moyenne de l'etudiant
	function moyenneEtudiant($id_etu, $moyenne, $semestre){

		try{
                $sql = "SELECT * FROM composer
                        WHERE id_etu = ? AND semestre = ?";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
				// Preparation de la requete
                $req = $Cnx->prepare($sql);
				$param = array($id_etu,$semestre);
				//exécution de la requête de sélection et retour des résultats
				$req->execute($param);
				//Conservation lignes par ligne des élements retournés

                foreach($req as $tablo){
                    $requete = "UPDATE composer SET moyenne =? WHERE id_com = ?";
					$param1 = array($moyenne,$tablo['id_com']);
                    $count = CUD($requete,$param1);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
		
	}

	// Cette methode permet de faire une mise a jour du rang de l'etudiant

	function rangEtudiant($id_etu, $semestre, $rang){

		try{
                $sql = "SELECT * FROM composer
                        WHERE id_etu = ? AND semestre = ?";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
				// Preparation de la requete
                $req = $Cnx->prepare($sql);
				$param = array($id_etu,$semestre);
				//exécution de la requête de sélection et retour des résultats
				$req->execute($param);
				//Conservation lignes par ligne des élements retournés

                foreach($req as $tablo){
                    $requete = "UPDATE composer SET rang =? WHERE id_com = ?";
					$param1 = array($rang,$tablo['id_com']);
                    $count = CUD($requete,$param1);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
		
	}

	// Recuperation de la moyenne du majorant.

	function getMoyenneMajor($id_niveauetude, $semestre){

		try{
			$req="SELECT max(moyenne) as effectif 
				  FROM composer c, personne p
				  WHERE p.id_pers = c.id_etu
				  AND id_niveauetude = ?
				  AND semestre = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($req);
			$param = array($id_niveauetude, $semestre);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}


	// Recuperation de la moyenne du minorant.

	function getMoyenneMinor($id_niveauetude, $semestre){

		try{
			$req="SELECT min(moyenne) as effectif 
					FROM composer c, personne p
					WHERE p.id_pers = c.id_etu
					AND id_niveauetude = ?
					AND semestre = ?";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($req);
			$param = array($id_niveauetude, $semestre);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$req->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

// Compte le nombre de fois qu'un etudiant a composer sur matiere sur un trimestre

	function compteNombreCompEtudiant($id_etudiant, $id_matiere, $trimestre){
		try{
			$req="SELECT count(*) as effectif FROM composer 
				WHERE id_etu = '$id_etudiant' 
				AND id_matiere = '$id_matiere' 
				AND trimestre = '$trimestre'
				AND etat = 0";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($req);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Compte le nombre de fois qu'un etudiant a composer 

	function compteNombreCompEtudiantParent($id_par){
		try{
			$req="SELECT count(*) as effectif FROM composer c, personne p 
				WHERE p.id_pers = c.id_etu 
				AND  id_par = '$id_par'
				AND etat = 0";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($req);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

// Changement d'etat des notes de l'etudiant
 function updateMultipleEtatComposition($id_etu, $id_matiere, $trimestre){
 	try{
                $sql = "SELECT * FROM composer
                        WHERE id_etu ='$id_etu'
                        AND id_matiere = '$id_matiere'
                        AND trimestre = '$trimestre'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_com = $tablo['id_com'];
                    $requete = "UPDATE composer SET etat = 1 WHERE id_com ='$id_com'";
                    $count = CUD($requete);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
 }
// Compte le nombre d'absence des etudiant d'un parent
 function compteNombreAbsence($id_par){
		try{
			$req="SELECT count(*) as effectif FROM absence_etudiant a, personne p 
				WHERE a.id_etu = p.id_pers
				AND id_par = '$id_par' 
				AND etat = 0";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($req);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['effectif'];
			 
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	// Compte le nombre d'absence des enseignat dans une classe
	 function compteNombreAbsenceEnseignant($id_classe){
			try{
				$req="SELECT count(*) as effectif FROM absence_enseignant  
					WHERE id_niveauetude = '$id_classe' 
					AND etat = 0";

				//Connexion à la BDD
			    $Cnx=PDO2::getInstance();
				//exécution de la requête de sélection et retour des résultats
				$resultat=$Cnx->query($req);
				//Conservation lignes par ligne des élements retournés
				$lignesselect=$resultat->fetch();

				return $lignesselect['effectif'];
				 
			}
			catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		// Changement d'etat d'absence de l'etudiant (en le mettant à 1)
 function updateMultipleEtatAbsenceEnseignant($id_niveauetude){
 	try{
                $sql = "SELECT * FROM absence_enseignant
						WHERE id_niveauetude = ? 
						AND etat = 0";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
				// Preparation de la requete
                $req = $Cnx->prepare($sql);
				$param = array($id_niveauetude);
				//exécution de la requête de sélection et retour des résultats
				$req->execute($param);
				//Conservation lignes par ligne des élements retournés

			while ($tablo=$req->fetch()) {
                    $requete1 = "UPDATE absence_enseignant SET etat = 1 WHERE id_abs=?";
					$param1 = array($tablo['id_abs']);
                    $count = CUD($requete1,$param1);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
 }

	// Changement d'etat d'absence de l'etudiant (en le mettant à 1)
 function updateMultipleEtatAbsence($id_etudiant, $id_par){
 	try{
                $sql = "SELECT * FROM absence_etudiant a, personne p 
						WHERE a.id_etu = p.id_pers
						AND id_etu = '$id_etudiant' 
						AND id_par = '$id_par' 
						AND etat = 0";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_abs = $tablo['id_abs'];
                    $requete = "UPDATE absence_etudiant SET etat = 1 WHERE id_abs ='$id_abs'";
                    $count = CUD($requete);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
 }

 // Changement d'etat d'absence de l'etudiant (en le mettant à 2)
 function updateMultipleEtatAbsence2($id_etudiant, $id_par, $id_matiere){
 	try{
                $sql = "SELECT * FROM absence_etudiant a, personne p, emargement e
						WHERE a.id_etu = p.id_pers
						AND e.id_em = a.id_em
						AND id_etu = ? 
						AND id_par = ?
						AND id_matiere = ? 
						AND etat IN(0,1)";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
				//Preparation de la requête
				$requete = $Cnx->prepare($sql);
				$param = array($id_etudiant,$id_par,$id_matiere);
				//exécution de la requête de sélection et retour des résultats
                $requete->execute($param);
                //Conservation lignes par ligne des élements retournés
                while($tablo=$requete->fetch()){
                    $requete1 = "UPDATE absence_etudiant SET etat = 2 WHERE id_abs =?";
					$param1 = array($tablo['id_abs']);
                    $count = CUD($requete1,$param1);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
 }

	function calculeMoyenneEtudiantArchiver($nom_etu, $prenom_etu, $sexe_etu, $datenais_etu, $anneeAc, $classe, $trimestre){


		try{

			$requete = "SELECT SUM(note * coef) AS moyenne 
						FROM archiver_composer
						WHERE nom_etu = '$nom_etu' 
						AND prenom_etu = '$prenom_etu' 
						AND sexe_etu = '$sexe_etu' 
						AND datenais_etu = '$datenais_etu'
						AND anneeAc = '$anneeAc'
						AND trimestre = '$trimestre'
						AND classe = '$classe'";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($requete);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['moyenne'];

		}catch(Exception $e){
			die("Erreur :".$e->getMessage());
		}
	}

	// Calcule la somme totale du paiement des etudiant pourb une année scolaire donnée.
	function sommeTotalPaiementEtudiant($annee){
		try{

			$requete = "SELECT SUM(montant) AS somme 
						FROM paiement p, frait f
						WHERE p.id_frait = f.id_frait
						AND id_annee = '$annee'";

			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($requete);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();

			return $lignesselect['somme'];

		}catch(Exception $e){
			die("Erreur :".$e->getMessage());
		}
	}

	// Cette methode supprime les composition d'un etudiant pour une matiere , un trimestre et une année donnée
	function supprimeCompositionEtudiant($id_etu, $id_matiere, $id_anneeAc){
		try{
               $count = 0;

                $sql = "SELECT * FROM composer
						WHERE id_matiere = '$id_matiere'
						AND id_etu = '$id_etu'
						AND id_anneeAc = '$id_anneeAc'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_com = $tablo['id_com'];
                    $requete = "DELETE FROM composer WHERE id_com ='$id_com'";
                    $count = $count + CUD($requete);
                }

                return $count;
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
	}

	// Cette methode supprime les paiemnts des etudiant au cour d'une année donnée
	function supprimePaiementEtudiant($id_anneeAc){
		try{
               $count = 0;

                $sql = "SELECT * FROM paiement
						WHERE id_annee = '$id_anneeAc'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_paye = $tablo['id_paye'];
                    $requete = "DELETE FROM paiement WHERE id_paye ='$id_paye'";
                    $count = $count + CUD($requete);
                }

                return $count;
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
	}

	// Cette methode permet de faire une mise a jour de la moyenne du candidat
	function updateMoyenneCandidat($id_candidat, $moyenne){

		try{
                $sql = "SELECT * FROM composer_concours
                        WHERE id_candidat = ?";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
				//Preparation de la requête
				$requete = $Cnx->prepare($sql);
				$param = array($id_candidat);
				//exécution de la requête de sélection et retour des résultats
                $requete->execute($param);
                //Conservation lignes par ligne des élements retournés
                while($tablo=$requete->fetch()){ 
                    $requete1 = "UPDATE composer_concours SET moyenne =? WHERE id_com = ?";
					$param1 = array($moyenne, $tablo['id_com']);
                    $count = CUD($requete1, $param1);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
		
	}

	// Cette methode permet de faire une mise a jour du rang du candidat

	function updateRangCandidat($id_candidat, $rang){

		try{
                $sql = "SELECT * FROM composer_concours
                        WHERE id_candidat = ?";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
				//Preparation de la requête
				$requete = $Cnx->prepare($sql);
				$param = array($id_candidat);
				//exécution de la requête de sélection et retour des résultats
                $requete->execute($param);
                //Conservation lignes par ligne des élements retournés
                while($tablo=$requete->fetch()){ 
                    $requete1 = "UPDATE composer_concours SET rang = ? WHERE id_com =?";
					$param1 = array($rang, $tablo['id_com']);
                    $count = CUD($requete1, $param1);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
		
	}

	// cette methode calcule la moyenne du candidat

	function rangCandidat($id_filiere,$id_anneeAc){
		$rang = 0;
		$sql=" SELECT * FROM composer_concours c, personne p 
					WHERE p.id_pers = c.id_candidat
					AND id_filiere = ?
					AND id_anneeAc = ?
					AND type_pers='Candidat'
					GROUP BY id_candidat
					ORDER BY moyenne DESC";
		//Connexion à la BDD
        $Cnx=PDO2::getInstance();
		//Preparation de la requête
		$requete = $Cnx->prepare($sql);
		$param = array($id_filiere, $id_anneeAc);
		//exécution de la requête de sélection et retour des résultats
        $requete->execute($param);
        //Conservation lignes par ligne des élements retournés
        while($tablo=$requete->fetch()){ 
			$rang = $rang + 1;
			// Mise a jour du rang du candidat
			updateRangCandidat($tablo['id_pers'], $rang);

		}
	}
