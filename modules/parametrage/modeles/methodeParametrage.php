<?php

	//include_once ("connexion/connexiongenerale.php");
    function existanceParametrage($requete, $param){
		try{
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			// Preparation de la rêquete
			$req = $Cnx->prepare($requete);
			//exécution de la requête de sélection et retour des résultats
			$req->execute($param);
			//Conservation lignes par ligne des élements retournés
			$nombre = 0;

			while ($req->fetch()) {
				$nombre = $nombre + 1;
			}
			 //Retour des lignes
			 return $nombre;
			}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}

	}

	
	function getChampsParametrage($requete, $param){
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

	function getNombreLigneParametre($requete, $param){

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

	function getNombreLigneParametre2($requete){

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


	function updateMoyenneAdm($id_classe, $trimestre, $moyenne){

		try{

			if($trimestre =='Trimestre I'){
				$requete = "UPDATE classe 
							SET moy_trim1 = '$moyenne' 
							WHERE id_classe = '$id_classe'";

			}else if($trimestre =='Trimestre II'){
				$requete = "UPDATE classe 
							SET moy_trim2 = '$moyenne' 
							WHERE id_classe = '$id_classe'";
			}else{
				$requete = "UPDATE classe 
							SET moy_trim3 = '$moyenne' 
							WHERE id_classe = '$id_classe'";
			}
			
			$count = CUD($requete);
			return $count;

		}catch(Exception $e){

			die("Erreur : " . $e->getMessage());
		}
		
	}

	function updateEtatPublication($id_classe, $trimestre){

		try{

			if($trimestre =='Trimestre I'){
				$requete = "UPDATE classe 
							SET pub_trim1 = 1 
							WHERE id_classe = '$id_classe'";

			}else if($trimestre =='Trimestre II'){
				$requete = "UPDATE classe 
							SET pub_trim2 = 1 
							WHERE id_classe = '$id_classe'";
			}else{
				$requete = "UPDATE classe 
							SET pub_trim3 = 1 
							WHERE id_classe = '$id_classe'";
			}
			
			$count = CUD($requete);
			return $count;

		}catch(Exception $e){

			die("Erreur : " . $e->getMessage());
		}
		
	}

	//Modification de la moyenne d'admission du concours
	function updateMoyenneAdmissionConcours($requete,$param){

		try{
			$count = CUD($requete,$param);
			return $count;

		}catch(Exception $e){

			die("Erreur : " . $e->getMessage());
		}
		
	}

	//Modification de l'etat de publication des resultats
	function updateEtatPublicationConcours($requete,$param){

		try{
			$count = CUD($requete,$param);
			return $count;

		}catch(Exception $e){

			die("Erreur : " . $e->getMessage());
		}
		
	}

	function deleteAnneeAcademique($id_annee){
			try{
				$requete = "DELETE FROM annee_academique WHERE id_annee =?";
				$param = array($id_annee);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}






