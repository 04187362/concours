<?php
	include_once ("connexion/connexiongenerale.php");

    class Enseigner{

        private $id_enseigner;
        private $vol_hor;
        private $matiere;
        private $niveauEtude;
        private $enseignant;
        private $cout_heure;
        private $uniteEnseignement;

        function __construct(){}

        function getId_enseigner(){
        	return $this->id_enseigner;
        }

        function setId_enseigner($id_enseigner){
        	$this->id_enseigner = $id_enseigner;
        }

        function getVol_hor(){
        	return $this->vol_hor;
        }

        function setVol_hor($vol_hor){
        	$this->vol_hor = $vol_hor;
        }

        function getMatiere(){
        	return $this->matiere;
        }

        function setMatiere($matiere){
        	$this->matiere = $matiere;
        }

        function getNiveauEtude(){
        	return $this->niveauEtude;
        }

        function setNiveauEtude($niveauEtude){
        	$this->niveauEtude = $niveauEtude;
        }
        function getEnseignant(){
        	return $this->enseignant;
        }

        function setEnseignant($enseignant){
        	$this->enseignant = $enseignant;
        }

        function getCout_heure(){
            return $this->cout_heure;
        }

        function setCout_heure($cout_heure){
            $this->cout_heure = $cout_heure;
        }

        function getUniteEnseignement(){
            return $this->uniteEnseignement;
        }

        function setUniteEnseignement($uniteEnseignement){
            $this->uniteEnseignement = $uniteEnseignement;
        }

        function ajouterEnseignement(){
        	try{

    			$requete = "INSERT INTO enseigner(volumehoraire, id_matiere, id_niveauetude, id_ens, cout_heure,id_ue) VALUES(?,?,?,?,?,?)";
    			$param = array($this->vol_hor,$this->matiere,$this->niveauEtude,$this->enseignant,$this->cout_heure,$this->uniteEnseignement);
				$count = CUD($requete, $param);
    		  	return $count;

            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function supprimerEnseignement(){
            try{
    			$requete = "DELETE FROM enseigner WHERE id_enseigner =?";
                $param = array($this->id_enseigner);
    			$count = CUD($requete, $param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function modifierEnseignement(){
            try{
    			$requete = "UPDATE enseigner 
                            SET volumehoraire =?, id_matiere =?, id_niveauetude =?, id_ens =?, cout_heure=?, id_ue=?
                            WHERE id_enseigner =?";
    			$param = array($this->vol_hor,$this->matiere,$this->niveauEtude,$this->enseignant,$this->cout_heure,$this->uniteEnseignement,$this->id_enseigner);
				$count = CUD($requete, $param);
		  	   return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

    }

?>

