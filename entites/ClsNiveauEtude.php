<?php

	include_once ("connexion/connexiongenerale.php");

	class NiveauEtude{
		// Proprietes
		private $id_niveauetude;
		private $lib_niveauetude;
        private $abreviation;
		private $filiere;
		private $frais;
		 
		//Constructeur
		function __construct(){ }
		
		//Getters et setter
		function getId_niveauEtude(){
			return $this->$id_niveauetude;
		}
			
		function setId_niveauEtude($id_niveauetude){
			$this->id_niveauetude=$id_niveauetude;
		} 
		
		function getLibNiveauEtude(){
			return $this->lib_niveauetude;
		}
			
		function setLibNiveauEtude($lib_niveauetude){
			$this->lib_niveauetude=$lib_niveauetude;
		}


        function getAbreviation(){
			return $this->abreviation;
		}
			
		function setAbreviation($abreviation){
			$this->abreviation=$abreviation;
		} 
		
		function getFiliere(){
			return $this->filiere;
		}

		function setFiliere($filiere){
			$this->filiere = $filiere;
		}

		function getFrais(){
			return $this->frais;
		}

		function setFrais($frais){
			$this->frais = $frais;
		}
		
		 function ajouterNiveauEtude(){
		 	try{
				$requete = "INSERT INTO niveau_etude(lib_niveauetude,abreviation,id_filiere,frais) VALUES(?,?,?,?)";
				$param = array($this->lib_niveauetude, $this->abreviation, $this->filiere, $this->frais);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		}

		function modifierNiveauEtude(){
			try{
				$requete = "UPDATE niveau_etude SET lib_niveauetude=?, abreviation=?, id_filiere=?, frais=? WHERE id_niveauetude = ?";
				$param = array($this->lib_niveauetude, $this->abreviation,$this->filiere, $this->frais, $this->id_niveauetude);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerNiveauEtude(){
			try{
				$requete = "DELETE FROM niveau_etude WHERE id_niveauetude =? ";
				$param = array($this->id_niveauetude);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		
	}
		
?>	