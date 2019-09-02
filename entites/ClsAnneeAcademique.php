<?php

	include("connexion/connexiongenerale.php");

	class AnneeAcademique{
		// Proprietes
		private $id_anneeAc;
		private $lib_anneeAc;
		 
		//Constructeur
		function __construct(){}
		
		//Getters et setter
		function getId_anneeAc(){
			return $this->id_anneeAc;
		}
			
		function setId_anneeAc($id_anneeAc){
			$this->id_anneeAc=$id_anneeAc;
		} 
		
		function getLib_anneeAc(){
			return $this->lib_anneeAc;
		}
			
		function setLib_anneeAc($lib_anneeAc){
			$this->lib_anneeAc=$lib_anneeAc;
		} 
		
		
		 function ajouterAnneeAcademique(){
			try{
				$requete = "INSERT INTO annee_academique(lib_annee) VALUES('$this->lib_anneeAc')";
				$param = array($this->lib_anneeAc);
				$count = CUD($requete,$param);
				return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
			
		}

		function modifierAnneeAcademique(){
			try{
				$requete = "UPDATE annee_academique SET lib_annee= ? WHERE id_annee = ?";
				$param = array($this->lib_anneeAc, $this->id_anneeAc);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}


		function supprimerAnneeAcademique(){
			try{
				$requete = "DELETE FROM annee_academique WHERE id_annee =?";
				$param = array($this->id_anneeAc);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function miseAjourAnneeAcademique(){
			$id_an = $_SESSION['id_an'];
			return $id_an;
		}

		
	}
		
?>	