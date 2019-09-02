<?php

	include_once ("connexion/connexiongenerale.php");

	class Pays{

		private $code_pays;

		private $libelle_pays;

		function  __construct(){}

		function getCode_pays(){
			return $this->code_pays;
		}

		function getLibelle_pays(){
			return $this->libelle_pays;
		}

		function setCode_pays($code_pays){
			 $this->code_pays = $code_pays;
		}

		function setLibelle_pays($libelle_pays){
			$this->libelle_pays = $libelle_pays;
		}

		 function ajouterPays(){
	    	try{
				$requete = "INSERT INTO pays(lib_pays) VALUES(?)";
				$param = array($this->libelle_pays);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerPays(){
			try{
				$requete = "DELETE FROM pays WHERE code_pays =?";
				$param = array($this->code_pays);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}

		function modifierPays(){

			try{
				$requete = "UPDATE pays
							SET lib_pays = ? 
							WHERE code_pays = ?";
				$param = array($this->libelle_pays, $this->code_pays);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}

	}

?>