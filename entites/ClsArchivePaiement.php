<?php
	include_once ("connexion/connexiongenerale.php");

    class ArchivePaiement{

        private $id_p;
        private $montant;
        private $anneeAc;
        private $nbreetu_ins;
        


        function __construct(){}

        function getId_com(){
        	return $this->id_p;
        }

        function setIdp($id_p){
        	$this->id_p = $id_p;
        }

        function getMontant(){
        	return $this->montant;
        }

        function setMontant($montant){
        	$this->montant = $montant;
        }

        function getAnneeAc(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }

        function getNbreetu_ins(){
            return $this->nbreetu_ins;
        }

        function setNbreetu_ins($nbreetu_ins){
            $this->nbreetu_ins = $nbreetu_ins;
        }

        function ajouterArchivePaiement(){
        	try{
    			$requete = "INSERT INTO archive_paiement(montant, annee, nbreetu_insc) 
                            VALUES('$this->montant','$this->anneeAc','$this->nbreetu_ins')";
    			$count = CUD($requete);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function supprimerArchivePaiement(){
            try{
    			$requete = "DELETE FROM archive_paiement WHERE annee ='$this->anneeAc'";
    			$count = CUD($requete);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}


    }

?>

