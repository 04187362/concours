<?php 
		class Soutenance extends Payement
		{
			private $cycle;

			public function __construct(){
				parent::__construct();
			}

			public function getCycle(){
				return $this->cycle;
			}

			public function setCycle($cycle){
				$this->cycle = $cycle;
			}

			//les methodes d'actions

			public function ajouterSoutenance()
			{
		 	try{
				$requete = "INSERT INTO payement(date_paye, id_filiere, id_etu, id_niveauetude, id_personnel, id_cycle, id_annee,type_payement) VALUES(NOW(),?,?,?,?,?,?,?)";
				$param = array($this->filiere, $this->etudiant, $this->niveau_etude, $this->personnel, $this->cycle, $this->annee_academique, $this->type_payement);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		  }

		 

		  public function modifierSoutenance()
			{
				try{
					$requete = "UPDATE payement SET date_paye=NOW(), id_filiere=?, id_etu=?, id_niveau=?, id_personnel=?, id_cycle=?, id_annee=?, type_payement=? WHERE id_paye = ?";
						$param = array($this->filiere, $this->etudiant, $this->niveau_etude, $this->id_personnel, $this->cycle, $this->annee_academique, $this->type_payement, $this->id_paye);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}



			public function supprimerSoutenance()
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