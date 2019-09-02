<?php
	//Ce module contient les fonctions d'accès à la BDD
include_once("cls_pdo2.php");
	//Cette fonction effectute toutes les opérations de sélection dans la BDD
Function Selection($requeteselect)
	
	{
		//Connexion à la BDD
	    $Cnx=PDO2::getInstance();
		//exécution de la requête de sélection et retour des résultats
		$resultat=$Cnx->query($requeteselect);
		//Conservation lignes par ligne des élements retournés

		//Retour des lignes
		return $resultat;
	}
	
	//CUD: Create Update and Delete permet d'exécuter les requêtes dites d'action sur la BDD
	Function CUD($requeteaction, $param)
	{
		//Connexion à la BDD
		$Cnx=PDO2::getInstance();
		$Cnx->exec('set names utf8');
		// Preparation de la rêquete
		$req = $Cnx->prepare($requeteaction);
		//Exécution de la requête d'action
		$nbeltsconcern = $req->execute($param);
		return $nbeltsconcern;
	}

	function AfficherTout($requete){
		try{
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			$Cnx->exec('set names utf8');
			//Preparation de la requête
			$req = $Cnx->prepare($requete);
			//Retour du resultat
			return $req;
			}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

	function AfficherTout2($table, $colonne){
		try{
			$sql = "select * from ".$table." where ".$colonne." not in(0)";
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($sql);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetchAll();
			//Retour des lignes
			return $lignesselect;
			}
		catch (Exception $e){
			die("Erreur : " .$e->getMessage());
		}
	}

	function selection_condition($requete, $param){
		try{
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//Preparation de la requête
			$resultat = $Cnx->prepare($requete);
			//exécution de la requête de sélection et retour des résultats
			$resultat->execute($param);
			//Conservation lignes par ligne des élements retournés
            $lignesselect=$resultat->fetch();
			//Retour des lignes
			return $lignesselect;
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}


	function selection2($table){
		try{
			$sql = "SELECT max(id_annee) AS maxi FROM ".$table."";
			//Connexion à la BDD
		    $Cnx=PDO2::getInstance();
			//exécution de la requête de sélection et retour des résultats
			$resultat=$Cnx->query($sql);
			//Conservation lignes par ligne des élements retournés
			$lignesselect=$resultat->fetch();
			//Retour d'une ligne
			return $lignesselect;
		}
		catch (Exception $e){
			die("Erreur : " . $e->getMessage());
		}
	}

?>