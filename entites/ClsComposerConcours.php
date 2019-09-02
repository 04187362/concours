<?php
	include_once ("connexion/connexiongenerale.php");

    class ComposerConcours{

        private $id_com;
        private $note;
        private $matiereconcours;
        private $candidat;
        private $anneeAc;

        function __construct(){}

        function getId_com(){
        	return $this->id_com;
        }

        function setId_com($id_com){
        	$this->id_com = $id_com;
        }

        function getNote(){
        	return $this->note;
        }

        function setNote($note){
        	$this->note = $note;
        }

        function getMatiereConcours(){
        	return $this->matiereconcours;
        }

        function setMatiereConcours($matiereconcours){
        	$this->matiereconcours = $matiereconcours;
        }

        function getCandidat(){
        	return $this->candidatt;
        }

        function setCandidat($candidat){
        	$this->candidat = $candidat;
        }

        function getAnneeAc(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }


        function ajouterCompositionConcours(){
        	try{
    			$requete = "INSERT INTO composer_concours(note, id_matiere, id_candidat, id_anneeAc) 
                            VALUES(?,?,?,?)";
    			$param = array($this->note, $this->matiereconcours, $this->candidat, $this->anneeAc);
				$count = CUD($requete, $param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function supprimerCompositionConcours(){
            try{
    			$requete = "DELETE FROM composer_concours WHERE id_com =?";
    			$param = array($this->id_com);
				$count = CUD($requete, $param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function modifierCompositionConcours(){
            try{
    			$requete = "UPDATE composer_concours
                            SET note = ?, id_matiere = ?, id_candidat = ?, id_anneeAc = ? 
                            WHERE id_com = ?";
    			$param = array($this->note, $this->matiereconcours, $this->candidat, $this->anneeAc, $this->id_com);
				$count = CUD($requete, $param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}


        /*function suppressionMultiLigne(){

            try{
                $sql = "SELECT * FROM composer_concours
                        WHERE id_candidat =?";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //Preparation de la requete
                $Cnx->prepare($sql);
                $param = array($this->candidat);
                //exécution de la requête de sélection et retour des résultats
                 $Cnx->execute($param);
                //Conservation lignes par ligne des élements retournés

                    while($Cnx- as $tablo){
                    $id_com = $tablo['id_com'];
                    $requete = "DELETE FROM composer_concours WHERE id_com =?";
                    $param = array($this->id_com);
				    $count = CUD($requete, $param);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

        }*/

    }

?>

