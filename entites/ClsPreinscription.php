<?php
	include_once ("connexion/connexiongenerale.php");

    class Preinscription{

        private $id_pre;
        private $date_pre;
        private $candidat;
        private $personnel;
        private $anneeAcademique;
        private $frais;

        function __construct(){}

        function getId_pre(){
        	return $this->id_pre;
        }

        function setId_pre($id_pre){
        	$this->id_pre = $id_pre;
        }

        function getDate(){
        	return $this->date_pre;
        }

        function setDate($date){
        	$this->date = $date;
        }

        function getcandidat(){
        	return $this->candidat;
        }

        function setcandidat($candidat){
        	$this->candidat = $candidat;
        }

        function getPersonnel(){
        	return $this->personnel;
        }

        function setPersonnel($personnel){
        	$this->personnel = $personnel;
        }

        function getAnneeAcademique(){
        	return $this->anneeAcademique;
        }

        function setAnneeAcademique($anneeAcademique){
        	$this->anneeAcademique = $anneeAcademique;
        }

        function getFrais(){
        	return $this->frais;
        }

        function setFrais($frais){
        	$this->frais = $frais;
        }


        function ajouterPreinscription(){
        	try{
                $requete = "INSERT INTO preinscription(date_pre, id_candidat, id_personnel, id_annee, id_frais) 
                            VALUES(NOW(),?,?,?,?)";
                $param = array($this->candidat,$this->personnel,$this->anneeAcademique,$this->frais);
                $count = CUD($requete, $param);
                return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function supprimerPreinscription(){
            try{
                $requete = "DELETE FROM preinscription WHERE id_pre =?";
                $param = array($this->id_pre);
                $count = CUD($requete,$param);
                return $count;

            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function modifierPreinscription(){
            try{
                $requete = "UPDATE preinscription SET date_pre = NOW() , id_candidat = ?, id_personnel = ?, id_annee =?, id_frais=? WHERE id_pre = ?";
                $param = array($this->candidat, $this->personnel, $this->anneeAcademique,$this->frais, $this->id_pre);
				$count = CUD($requete,$param);
                return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

    }

?>

