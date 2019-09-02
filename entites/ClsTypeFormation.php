<?php

	include_once ("connexion/connexiongenerale.php");

	class TypeFormation{
		// Proprietes
		private $id_typeformation;
		private $lib_typeformation;
		private $frais;
		 
		//Constructeur
		function __construct(){ }
		
		//Getters et setter
		function getId_typeformation(){
			return $this->id_typeformation;
		}
			
		function setId_typeformation($id_typeformation){
			$this->id_typeformation=$id_typeformation;
		} 
		
		function getLib_typeformation(){
			return $this->lib_typeformation;
		}
			
		function setLib_typeformation($lib_typeformation){
			$this->lib_typeformation=$lib_typeformation;
		} 
		
		function getFrais(){
			return $this->frais;
		}

		function setFrais($frais){
			$this->frais = $frais;
		}


		function ajouterTypeFormation(){
			try{
				$requete = "INSERT INTO type_formation(lib_typeformation, frais) VALUES(?,?)";
				$param = array($this->lib_typeformation,$this->frais);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
			
		}

		function updateTypeFormation(){
			try{
				$requete = "UPDATE type_formation SET lib_typeformation = ?, frais = ? WHERE id_typeformation = ?";
				$param = array($this->lib_typeformation, $this->frais, $this->id_typeformation);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}

		function supprimerTypeFormation(){
			try{
				$requete = "DELETE FROM type_formation  WHERE id_typeformation = ?";
				$param = array($this->id_typeformation);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}
		
	}
		
?>