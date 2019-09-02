<?php
	include_once ("connexion/connexiongenerale.php");

    class Composer{

        private $id_com;
        private $note;
        private $matiere;
        private $etudiant;
        private $semestre;
        private $anneeAc;
        private $evaluation;
        private $uniteEnseignement;

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

        function getMatiere(){
        	return $this->matiere;
        }

        function setMatiere($matiere){
        	$this->matiere = $matiere;
        }

        function getEtudiant(){
        	return $this->etudiant;
        }

        function setEtudiant($etudiant){
        	$this->etudiant = $etudiant;
        }

        function getSemestre(){
        	return $this->semestre;
        }

        function setSemestre($semestre){
        	$this->semestre = $semestre;
        }


        function getAnneeAc(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }

        function getEvaluation(){
            return $this->evaluation;
        }

        function setEvaluation($evaluation){
            $this->evaluation = $evaluation;
        }

        function getUniteEnseignement(){
            return $this->uniteEnseignement;
        }

        function setUniteEnseignement($uniteEnseignement){
            $this->uniteEnseignement = $uniteEnseignement;
        }

        function ajouterComposition(){
        	try{
    			$requete = "INSERT INTO composer(note, id_matiere, id_etu, semestre, evaluation, id_anneeAc, id_ue) 
                            VALUES(?,?,?,?,?,?,?)";
    			$param = array($this->note,$this->matiere,$this->etudiant,$this->semestre,$this->evaluation,$this->anneeAc,$this->uniteEnseignement);
    			$count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function supprimerComposition(){
            try{
    			$requete = "DELETE FROM composer WHERE id_com ='$this->id_com'";
    			$count = CUD($requete);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function modifierComposition(){
            try{
    			$requete = "UPDATE composer 
                            SET note =?, id_matiere = ?, id_etu =?, semestre=?, evaluation=?, id_anneeAc=?, id_ue=? 
                            WHERE id_com = ?";
                $param = array($this->note,$this->matiere,$this->etudiant,$this->semestre,$this->evaluation,$this->anneeAc,$this->uniteEnseignement,$this->id_com);
    			$count = CUD($requete,$param);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}


        function suppressionMultiLigne(){

            try{
                $sql = "SELECT * FROM composer
                        WHERE id_etu = '$this->etudiant'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_com = $tablo['id_com'];
                    $requete = "DELETE FROM composer WHERE id_com ='$id_com'";
                    $count = CUD($requete);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

        }

    }

?>

