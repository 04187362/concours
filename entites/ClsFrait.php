<?php

	include_once ("connexion/connexiongenerale.php");

	class Frait{
		// Proprietes
		private $id_frait;
		private $montant;
		 
		//Constructeur
		function __construct(){ }
		
		//Getters et setter
		function getId_frait(){
			return $this->code_mat;
		}
			
		function setId_frait($id_frait){
			$this->id_frait=$id_frait;
		} 
		
		function getMontant(){
			return $this->montant;
		}
			
		function setMontant($montant){
			$this->montant=$montant;
		} 
		
		
		 function ajouterFrait(){
		 	try{
				$requete = "INSERT INTO frait(montant) VALUES(?)";
				$param = array($this->montant);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		}

		function modifierFrait(){
			try{
				$requete = "UPDATE frait SET montant = ? WHERE id_frait = ?";
				$param = array($this->montant, $this->id_frait);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerFrait(){
			try{
				$requete = "DELETE FROM frait WHERE id_frait =?";
				$param = array($this->id_frait);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		
	}
		
?>	