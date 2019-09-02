<?php

	include_once ("connexion/connexiongenerale.php");

	class Classe{
		// Proprietes
		private $code_cl;
		private $lib_cl;
		private $frait;
		 
		//Constructeur
		function __construct(){ }
		
		//Getters et setter
		function getCodeCl(){
			return $this->code_cl;
		}
			
		function setCodeCl($code_cl){
			$this->code_cl=$code_cl;
		} 
		
		function getLibCl(){
			return $this->lib_cl;
		}
			
		function setLibCl($lib_cl){
			$this->lib_cl=$lib_cl;
		} 
		
		function getFrait(){
			return $this->frait;
		}

		function setFrait($frait){
			$this->frait = $frait;
		}


		function ajouterClasse(){
			try{
				$requete = "INSERT INTO classe(lib_classe, prix, moy_trim1, moy_trim2, moy_trim3) VALUES(?, ?, 10, 10, 10)";
				$param = array($this->lib_cl,$this->frait);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
			
		}

		function modifierClasse(){
			try{
				$requete = "UPDATE classe SET lib_classe = ?, prix = ? WHERE id_classe = ?";
				$param = array($this->lib_cl, $this->frait, $this->code_cl);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}

		function supprimerClasse(){
			try{
				$requete = "DELETE FROM classe  WHERE id_classe = ?";
				$param = array($this->code_cl);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}
		
	}
		
?>