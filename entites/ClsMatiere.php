<?php

	include_once ("connexion/connexiongenerale.php");

	class Matiere{
		// Proprietes
		private $code_mat;
		private $lib_mat;
		 
		//Constructeur
		function __construct(){ }
		
		//Getters et setter
		function getCodeMat(){
			return $this->code_mat;
		}
			
		function setCodeMat($code_mat){
			$this->code_mat=$code_mat;
		} 
		
		function getLibMat(){
			return $this->lib_mat;
		}
			
		function setLibMat($lib_mat){
			$this->lib_mat=$lib_mat;
		}

		 function ajouterMatiere(){
		 	try{
				$requete = "INSERT INTO matiere(lib_matiere) VALUES(?)";
				$param = array($this->lib_mat);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		}

		function modifierMatiere(){
			try{
				$requete = "UPDATE matiere SET lib_matiere = ? WHERE id_matiere = ?";
				$param = array($this->lib_mat, $this->code_mat);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerMatiere(){
			try{
				$requete = "DELETE FROM matiere WHERE id_matiere =? ";
				$param = array($this->code_mat);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		
	}
		
?>	