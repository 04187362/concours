<?php

	include_once ("connexion/connexiongenerale.php");

	class Annee{

		private $id_annee;
		
		private $lib_annee;

		function  __construct(){}


		function setId_annee($id_annee){
			 $this->id_annee = $id_annee;
		}

		function setLib_annee($lib_annee){
			$this->lib_annee = $lib_annee;
		}

		 function ajouterAnnee(){
		 	try{
				$requete = "INSERT INTO annee(lib_annee) VALUES('$this->lib_annee')";
				$count = CUD($requete);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerAnnee(){
			try{

				$requete = "DELETE FROM annee WHERE id_annee ='$this->id_annee'";
				$count = CUD($requete);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function modifierAnnee(){
			try{
				$requete = "UPDATE annee SET lib_annee = '$this->lib_annee' WHERE id_annee = '$this->id_annee'";
				$count = CUD($requete);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

	}

?>