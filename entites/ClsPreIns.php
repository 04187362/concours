<?php 
	include_once ("connexion/connexiongenerale.php");

	class PreInscription extends Payement {
		//les proprites de la classe preinscription
		private $type_formation;

		//le constructeur
		public function __construct(){
			parent::__construct();
		}

		//les getters et les setters

		

		public function getTypeFormation(){
			return $this->type_formation;
		}

		public function setTypeFormation($type_formation){
			$this->type_formation = $type_formation;
		}


		//Les fonctions d'actions

		
		   public function ajouterPreInscription()
			{
		 	try{
				$requete = "INSERT INTO payement(date_paye, id_filiere, id_candidat, id_niveau, id_agent, id_typeformation, id_annee, type_payement) VALUES(?,?,?,?,?,?,?,?)";
				$param = array($this->date_paye, $this->filiere, $this->candidat, $this->niveau_etude, $this->agent, $this->type_formation, $this->annee_academique, $this->type_payement);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		  }

		 

		  public function modifierPreInscription()
			{
				try{
					$requete = "UPDATE payement SET date_paye =?, id_filiere=?, id_candidat=?, id_niveauetude=?, id_agent=?, resultat=?, diplome=?, statut=?, id_annee=?, type_payement=? WHERE id_paye = ?";
						$param = array($this->date_paye, $this->filiere, $this->candidat, $this->niveau_etude, $this->id_agent, $this->resultat, $this->diplome, $this->statut, $this->annee_academique, $this->type_payement);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}



			public function supprimerPreInscription()
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
