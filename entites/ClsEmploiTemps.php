<?php
	include_once ("connexion/connexiongenerale.php");

    class EmploiTemps{

        private $id_emploi;
        private $lundi;
        private $mardi;
        private $mercredi;
        private $jeudi;
        private $vendredi;
        private $samedi;
        private $heure_debut;
        private $heure_fin;
        private $classe;
        private $anneeAc;

        function __construct(){}

        function getId_emploi(){
        	return $this->id_emploi;
        }

        function setId_emploi($id_emploi){
        	$this->id_emploi = $id_emploi;
        }

        function getLundi(){
        	return $this->lundi;
        }

        function setLundi($lundi){
        	$this->lundi = $lundi;
        }

        function getMardi(){
        	return $this->mardi;
        }

        function setMardi($mardi){
        	$this->mardi = $mardi;
        }

        function getMercredi(){
        	return $this->mercredi;
        }

        function setMercredi($mercredi){
        	$this->mercredi = $mercredi;
        }

        function getJeudi(){
        	return $this->jeudi;
        }

        function setJeudi($jeudi){
        	$this->jeudi = $jeudi;
        }

        function getVendredi(){
        	return $this->vendredi;
        }

        function setVendredi($vendredi){
        	$this->vendredi = $vendredi;
        }

        function getSamedi(){
        	return $this->samedi;
        }

        function setSamedi($samedi){
        	$this->samedi = $samedi;
        }

        function getClasse(){
        	return $this->classe;
        }

        function setClasse($classe){
        	$this->classe = $classe;
        }

        function getHeure_debut(){
        	return $this->heure;
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


        function getAnneeAc(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }


        function ajouterEmploiTemps(){
        	try{
    			$requete = "INSERT INTO emploi_temps(lundi, mardi, mercredi, jeudi, vendredi, samedi, heure_debut, heure_fin, id_classe, id_anneeAc) 
                            VALUES('$this->lundi','$this->mardi','$this->mercredi','$this->jeudi', '$this->vendredi', '$this->samedi', '$this->heure_debut', '$this->heure_fin', '$this->classe', '$this->anneeAc')";
    			$count = CUD($requete);
    		  	return $count;
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

		}

		function supprimerEmploiTemps(){
            try{
    			$requete = "DELETE FROM emploi_temps WHERE id_emploi='$this->id_emploi'";
    			$count = CUD($requete);
    		  	return $count;
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }
		}

		function modifierEmploiTemps(){
            try{
    			$requete = "UPDATE emploi_temps 
                            SET lundi = '$this->lundi', mardi = '$this->mardi', mercredi='$this->mercredi', jeudi='$this->jeudi', vendredi='$this->vendredi', samedi ='$this->samedi', heure_debut = '$this->heure_debut', heure_fin = '$this->heure_fin',  id_classe='$this->classe', id_anneeAc='$this->anneeAc' 
                            WHERE id_emploi = '$this->id_emploi'";
    			$count = CUD($requete);
    		  	return $count;
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

		}

    }

?>

