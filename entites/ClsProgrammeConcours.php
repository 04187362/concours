<?php
	include_once ("connexion/connexiongenerale.php");

    class ProgrammeConcours{

        private $id_pr;
        private $coef;
        private $matiere;
        private $filiere;
        private $anneeAc;

        function __construct(){}

        function getId_pr(){
        	return $this->id_pr;
        }

        function setId_pr($id_pr){
        	$this->id_pr = $id_pr;
        }

        function getCoef(){
        	return $this->coef;
        }

        function setCoef($coef){
        	$this->coef = $coef;
        }

        function getMatiere(){
        	return $this->matiere;
        }

        function setMatiere($matiere){
        	$this->matiere = $matiere;
        }

        function getFiliere(){
        	return $this->filiere;
        }

        function setFiliere($filiere){
        	$this->filiere = $filiere;
        }

        function getAnneeAc(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }

        function ajouterProgrammeConcours(){
        	try{
    			$requete = "INSERT INTO programme_concours(coef, id_matiere, id_filiere, id_annee) VALUES(?,?,?,?)";
    			$param = array($this->coef,$this->matiere,$this->filiere,$this->anneeAc);
				$count = CUD($requete, $param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

		function supprimerProgrammeConcours(){
            try{
    			$requete = "DELETE FROM programme_concours WHERE id_pro =?";
    			$param = array($this->id_pr);
				$count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

		function modifierProgrammeConcours(){
            try{
    			$requete = "UPDATE programme_concours 
                            SET coef = ?, id_matiere = ?, id_filiere = ?, id_annee=? 
                            WHERE id_pro = ?";
    			$param = array($this->coef, $this->matiere, $this->filiere,$this->anneeAc, $this->id_pr);
				$count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

    }

?>

