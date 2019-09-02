<?php
	include_once ("connexion/connexiongenerale.php");
	
	class Paiement{

		private $id_paye;
		private $annee;
		private $mois;
		private $etudiant;
		private $frait;
		private $personnel;

		function __construct(){}

		function getIdPaye(){
			$this->id_paye;
		}

		function setIdPaye($id_paye){
			$this->id_paye = $id_paye;
		}

		function getAnnee(){
			$this->annee;
		}

		function setAnnee($annee){
			$this->annee = $annee;
		}

		function getMois(){
			$this->mois;
		}

		function setMois($mois){
			$this->mois = $mois;
		}

		function getEtudiant(){
			$this->etudiant;
		}

		function setEtudiant($etudiant){
			$this->etudiant = $etudiant;
		}

		function getFrait(){
			$this->frait;
		}

		function setFrait($frait){
			$this->frait = $frait;
		}

		function getPersonnel(){
			$this->personnel;
		}

		function setPersonnel($personnel){
			$this->personnel = $personnel;
		}


		function supprimerPaiement(){

			$requete = "DELETE FROM paiement WHERE id_paye ='$this->id_paye'";
			$count = CUD($requete);
		  	return $count;

		}


		function ajouterPaiement(){
		 	try{

				$requete = "INSERT INTO paiement(id_etu, date_paye, mois, id_annee, id_frait, id_pers) 
							VALUES('$this->etudiant', NOW(), '$this->mois','$this->annee','$this->frait', '$this->personnel')";
				$count = CUD($requete);
		  		return $count;

		 	}catch(Exception $e){

		 		die("Erreur : " . $e->getMessage());

		 	}

		}


		function modifierPaiement(){
			try{

				$requete = "UPDATE paiement 
							SET id_etu = '$this->etudiant', date_paye=NOW(), mois='$this->mois', id_annee='$this->annee', id_frait='$this->frait', id_pers='$this->personnel' 
							WHERE id_paye = '$this->id_paye'";
				$count = CUD($requete);
		  		return $count;

			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());
			}
			
		}
	}

?>



