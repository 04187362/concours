<?php
	include_once ("connexion/connexiongenerale.php");

    class Inscription{

        private $id_ins;
        private $date;
        private $etudiant;
        private $frait;
        private $anneeAc;
        protected  $personnel;

        function __construct(){}

        function getId_ins(){
        	return $this->id_ins;
        }

        function setId_ins($id_ins){
        	$this->id_ins = $id_ins;
        }

        function getDate(){
        	return $this->date;
        }

        function setDate($date){
        	$this->date = $date;
        }

        function getEtudiant(){
        	return $this->etudiant;
        }

        function setEtudiant($etudiant){
        	$this->etudiant = $etudiant;
        }

        function getFrait(){
        	return $this->frait;
        }

        function setFrait($frait){
        	$this->frait = $frait;
        }

        function getAnnee(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }

        public function getPersonnel(){
		    return $this->personnel;
		}

		public function setPersonnel($personnel){
			$this->personnel = $personnel;
		}


        function ajouterInscription(){
        	
			$requete = "INSERT INTO inscription(date_ins, id_etu, id_frait, id_annee, id_personnel) VALUES(NOW(),?,?,?,?)";
			$param = array($this->etudiant,$this->frait,$this->anneeAc,$this->personnel);
			$count = CUD($requete, $param);
		  	return $count;

		}

		function supprimerInscription(){

			$requete = "DELETE FROM inscription WHERE id_ins =?";
			$param = array($this->id_ins);
			$count = CUD($requete, $param);
		  	return $count;

		}

		function modifierInscription(){

			$requete = "UPDATE inscription SET date_ins = NOW() , id_etu = ? , id_frait = ? , id_annee = ?, id_personnel=? WHERE id_ins =?";
			$param = array($this->etudiant,$this->frait,$this->anneeAc,$this->personnel,$this->id_ins);
			$count = CUD($requete, $param);
		  	return $count;

		}

    }

?>

