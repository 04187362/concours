<?php 
		class Duplicata extends Payement{


			public function __construct(){
				parent::__construct();
			}


			//les methodes d'actions

			 public function ajouterDuplicata()
			{
		 	try{
				$requete = "INSERT INTO payement(date_paye,id_filiere,id_candidat,id_niveau,id_agent,id_annee,type_payement) VALUES(?,?,?,?,?,?,?,?)";
				$param = array($this->date_paye,$this->filiere,$this->candidat,$this->niveau,$this->agent,$this->annee_academique,$this->type_payement);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		  }

		 

		  public function modifierDuplicata()
			{
				try{
					$requete = "UPDATE payement SET date_paye =?,id_filiere=?,id_candidat=?,id_niveau=?,id_agent=?,id_annee=?,type_payement=? WHERE id_paye = ?";
						$param = array($this->date_paye,$this->filiere,$this->candidat,$this->niveau,$this->id_agent,$this->annee_academique,$this->type_payement);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}



			public function supprimerDuplicata()
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