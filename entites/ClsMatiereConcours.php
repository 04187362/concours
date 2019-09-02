<?php

	include_once ("connexion/connexiongenerale.php");

	class MatiereConcours{
		// Proprietes
		private $code_matiere;
		private $lib_matiere;
        private $abreviation;
		 
		//Constructeur
		function __construct(){ }
		
		//Getters et setter
		function getCodeMatereConours(){
			return $this->code_matiere;
		}
			
		function setCodeMatiereConours($code_matiere){
			$this->code_matiere=$code_matiere;
		} 
		
		function getLibMatiereConours(){
			return $this->lib_matiere;
		}
			
		function setLibMatiereConours($lib_matiere){
			$this->lib_matiere=$lib_matiere;
		}


        function getAbreviation(){
			return $this->abreviation;
		}
			
		function setAbreviation($abreviation){
			$this->abreviation=$abreviation;
		} 
		
		
		 function ajouterMatiereConcours(){
		 	try{
				$requete = "INSERT INTO matiere_concours(lib_matiere,abreviation) VALUES(?,?)";
				$param = array($this->lib_matiere, $this->abreviation);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		}

		function modifierMatiereConcours(){
			try{
				$requete = "UPDATE matiere_concours SET lib_matiere = ?, abreviation = ? WHERE id_matiere = ?";
				$param = array($this->lib_matiere,$this->abreviation, $this->code_matiere);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerMatiereConcours(){
			try{
				$requete = "DELETE FROM matiere_concours WHERE id_matiere =? ";
				$param = array($this->code_matiere);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		
	}
		
?>	