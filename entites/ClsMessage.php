<?php
	include_once ("connexion/connexiongenerale.php");

	class Message{

		private $id_message;

		private $sujet;

		private $date;

		private $expediteur;

		private $beneficiaire;

		function  __construct(){}

		function getIdMessage(){
			return $this->id_message;
		}

		function setIdMessage($id_message){
			$this->id_message = $id_message;
		}

		function getSujet(){
			return $this->sujet;
		}

		function setSujet($sujet){
			$this->sujet = $sujet;
		}

		function getExpediteur(){
			return $this->expediteur;
		}

		function setExpediteur($expediteur){
			$this->expediteur = $expediteur;
		}

		function getBeneficiaire($beneficiaire){
			return $this->beneficiaire;
		}

		function setBeneficiaire($beneficiaire){
			$this->beneficiaire = $beneficiaire;
		}

		function ajouterMessage(){

			//if($this->employe3 ==0){

				$requete = "INSERT INTO message(message, date, id_exp, id_ben) VALUES('$this->sujet',NOW(),'$this->expediteur','$this->beneficiaire')";
				$count = CUD($requete);
		    	return $count;

			/*}else{

				$requete = "INSERT INTO message(sujet, date_mes, id_par, id_pers) VALUES('$this->sujet',NOW(),'$this->expediteur','$this->expediteur')";
				$count = CUD($requete);
		    	return $count;

			}*/

			
		}

		function deleteMessage($id_message){

			$requete = "DELETE FROM message WHERE id_message ='$id_message'";
			$count = CUD($requete);
		  	return $count;

		}

		function suppressionMultiLigne(){

            try{
                $sql = "SELECT * FROM message
                        WHERE id_exp = '$this->expediteur'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_pro = $tablo['id_pro'];
                    $requete = "DELETE FROM message WHERE id_pro ='$id_pro'";
                    $count = CUD($requete);
                }
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

        }


	}

?>