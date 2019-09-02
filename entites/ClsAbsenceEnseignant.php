<?php
	include_once ("connexion/connexiongenerale.php");

    class AbsenceEnseignant{

        private $id_abs;
        private $enseignant;
        private $niveauEtude;
        private $justification;
        private $heure_debut;
        private $heure_fin;
        private $mois;
        private $ens_remp;

        function __construct(){}

        function getId_abs(){
        	return $this->id_abs;
        }

        function setId_abs($id_abs){
        	$this->id_abs = $id_abs;
        }

        function getEnseignant(){
        	return $this->enseignant;
        }

        function setEnseignant($enseignant){
        	$this->enseignant = $enseignant;
        }

        function getniveauEtude(){
            return $this->niveauEtude;
        }

        function setniveauEtude($niveauEtude){
            $this->niveauEtude = $niveauEtude;
        }

        function getJustification(){
        	return $this->justification;
        }

        function setJustification($justification){
        	$this->justification = $justification;
        }

        function getHeure_debut(){
            return $this->heure_debut;
        }

        function setHeure_debut($heure_debut){
            $this->heure_debut = $heure_debut;
        }

        function getHeure_fin(){
            return $this->heure_fin;
        }

        function setHeure_fin($heure_fin){
            $this->heure_fin = $heure_fin;
        }

        function getMois(){
            return $this->mois;
        }

        function setMois($mois){
            $this->mois = $mois;
        }

        function getEns_remp(){
            return $this->ens_remp;
        }

        function setEns_remp($ens_remp){
            $this->ens_remp = $ens_remp;
        }


        function ajouterAbsenceEnseignant(){
        	try{
    			$requete = "INSERT INTO absence_enseignant(id_ens, id_niveauetude, date_abs, justification, heure_debut, heure_fin, mois, id_remp) 
                            VALUES(?,?, NOW(),?,?,?,?,?)";
    			$param = array($this->enseignant,$this->niveauEtude,$this->justification,$this->heure_debut,$this->heure_fin,$this->mois,$this->ens_remp);
                $count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

		function supprimerAbsenceEnseignant(){
            try{
    			$requete = "DELETE FROM absence_enseignant WHERE id_abs =?";
                $param = array($this->id_abs);
    			$count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

		function modifierAbsenceEnseignant(){
            try{
    			$requete = "UPDATE absence_enseignant SET id_ens = ?, id_niveauetude=?, date_abs=NOW(), justification = ?, heure_debut=?, heure_fin=?, mois=?, id_remp = ? WHERE id_abs = ?";
    			$param = array($this->enseignant,$this->niveauEtude,$this->justification,$this->heure_debut,$this->heure_fin,$this->mois,$this->ens_remp,$this->id_abs);
                $count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }
		}

    }

?>

