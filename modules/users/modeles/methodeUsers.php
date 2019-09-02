<?php
	include_once ("connexion/connexiongenerale.php");

    // Verification de l'existance du champs
    function existanceUsers($requete, $param){

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

	function getChampsUsers($requete, $param){

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

	function getNombreLigneUsers($requete, $param){

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

	function getNombreLigneUsers2($requete){

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



	function updatePasswordUser($id_pers, $nouveau_password){

		try{

			$requete = "UPDATE personne SET password ='$nouveau_password' WHERE id_pers = '$id_pers'";
			$count = CUD($requete);
			return $count;

		}catch(Exception $e){

			die("Erreur : " . $e->getMessage());
		}
		
	}

	// Changement d'etat du message recu
	function updateMultipleMessage($id_exp, $id_ben){

            try{
                $sql = "SELECT * FROM message
                        WHERE id_exp = '$id_exp'
                        AND id_ben = '$id_ben'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_message = $tablo['id_message'];
                    $requete = "UPDATE message SET etat = 1 WHERE id_message ='$id_message'";
                    $count = CUD($requete);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

        }


        function getNombreEvenement(){

		try{
			$req="SELECT count(*) as effectif 
					FROM evenement";

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




	


    