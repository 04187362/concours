<?php
	include_once ("connexion/connexiongenerale.php");

    class AbsenceEtudiant{

        private $id_abs;
        private $etudiant;
        private $emargement;
        private $justification;

        function __construct(){}

        function getId_abs(){
        	return $this->id_abs;
        }

        function setId_abs($id_abs){
        	$this->id_abs = $id_abs;
        }

        function getEtudiant(){
        	return $this->etudiant;
        }

        function setEtudiant($etudiant){
        	$this->etudiant = $etudiant;
        }

        function getEmargement(){
            return $this->emargement;
        }

        function setEmargement($emargement){
            $this->emargement = $emargement;
        }

        function getJustification(){
        	return $this->justification;
        }

        function setJustification($justification){
        	$this->justification = $justification;
        }

        function ajouterAbsenceEtudiant(){
        	
			$requete = "INSERT INTO absence_etudiant(id_etu, id_em, justification) VALUES(?,?,?)";
			$param = array($this->etudiant,$this->emargement,$this->justification);
            $count = CUD($requete,$param);
		  	return $count;

		}

		function supprimerAbsenceEtudiant(){

			$requete = "DELETE FROM absence_etudiant WHERE id_abs =?";
            $param = array($this->id_abs);
			$count = CUD($requete,$param);
		  	return $count;

		}

		function modifierAbsenceEtudiant(){

			$requete = "UPDATE absence_etudiant SET justification = ? WHERE id_abs =?";
            $param = array($this->justification,$this->id_abs);
            $count = CUD($requete,$param);
		  	return $count;

		}

    }

?>

