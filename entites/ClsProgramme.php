<?php
	include_once ("connexion/connexiongenerale.php");

    class Programme{

        private $id_pr;
        private $coef;
        private $matiere;
        private $niveauEtude;
        private $uniteEnseignement;
        private $credit;
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

        function getNiveauEtude(){
        	return $this->niveauetude;
        }

        function setNiveauEtude($niveauetude){
        	$this->niveauetude = $niveauetude;
        }

        function getUniteEnseignement(){
			return $this->uniteEnseignement;
		} 
		
		function setUniteEnseignement($uniteEnseignement){
			$this->uniteEnseignement = $uniteEnseignement;
		}

        function getCredit(){
			return $this->credit;
		} 
		
		function setCredit($credit){
			$this->credit = $credit;
		}

        function getAnneeAc(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }

        function ajouterProgramme(){
        	try{
    			$requete = "INSERT INTO programme(coef, credit, id_matiere, id_niveauetude, id_ue, id_annee) VALUES(?,?,?,?,?,?)";
    			$param = array($this->coef, $this->credit, $this->matiere,$this->niveauetude, $this->uniteEnseignement,$this->anneeAc);
				$count = CUD($requete, $param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

		function supprimerProgramme(){
            try{
    			$requete = "DELETE FROM programme WHERE id_pro =?";
    			$param = array($this->id_pr);
				$count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

		function modifierProgramme(){
            try{
    			$requete = "UPDATE programme 
                            SET coef =?, credit=?, id_matiere =?, id_niveauetude =?, id_ue=?, id_annee=?
                            WHERE id_pro = ?";
    			$param = array($this->coef,$this->credit, $this->matiere, $this->niveauetude,$this->uniteEnseignement,$this->anneeAc, $this->id_pr);
				$count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

    }

?>

