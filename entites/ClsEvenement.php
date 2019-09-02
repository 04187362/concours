<?php

	include_once ("connexion/connexiongenerale.php");

	class Evenement{

		private $id_ev;
		
		private $commentaire;

		private $image;

		function  __construct(){}


		function setId_ev($id_ev){
			 $this->id_ev = $id_ev;
		}

		function setImage($image){
			 $this->image = $image;
		}

		function setCommentaire($commentaire){
			$this->commentaire = $commentaire;
		}

		 function ajouterEvenement(){
		 	try{
				$requete = "INSERT INTO evenement(image, commentaire, date_ev) VALUES(?,?,NOW())";
				$param = array($this->image,$this->commentaire);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerEvenement(){
			try{

				$requete = "DELETE FROM evenement WHERE id_ev =?";
				$param = array($this->id_ev);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}


	}

?>