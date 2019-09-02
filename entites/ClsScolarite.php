<?php 
		//include("ClsPayement.php");

		class Scolarite extends Payement
		{
			//les proprietes de la classe
			private $frais;

			public function __construct(){
				parent::__construct();
			}


			public function getFrais(){
				return $this->frais;
			}	

			public function setFrais($frais){
				$this->frais = $frais;
			}


			//les methodes d'actions.
			public function ajouterScolarite()
			{
		 	try{
				$requete = "INSERT INTO payement(date_paye, id_filiere, id_etu, id_niveauetude,id_personnel, id_frais, id_annee,type_payement) VALUES(NOW(),?,?,?,?,?,?,?)";
				$param = array($this->filiere, $this->etudiant, $this->niveau_etude, $this->personnel, $this->frais, $this->annee_academique, $this->type_payement);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		  }

		 

		  public function modifierScolarite()
			{
				try{
					$requete = "UPDATE payement SET date_paye =NOW(), id_filiere=?, id_etu=?, id_niveauetude=?, id_personnel=?, id_frais=?, id_annee=?, type_payement=? WHERE id_paye = ?";
						$param = array($this->filiere, $this->etudiant, $this->niveau_etude, $this->personnel, $this->frais, $this->annee_academique, $this->type_payement, $this->id_paye);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}



			public function supprimerScolarite()
			{
					try{
						$requete = "DELETE FROM payement WHERE id_paye =?";
						$param = array($this->id_paye);
						$count = CUD($requete,$param);
					  	return $count;
					}catch (Exception $e){
						die("Erreur : " . $e->getMessage());
					}
			 }
		}


 ?>