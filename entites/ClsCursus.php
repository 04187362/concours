<?php 
		include("ClsPayement.php");

		class Cursus extends Payement{
			private $resultat;
			private $diplome;
			private $statut;
			private $etablissement;

			//le constructeur

			public function __construct(){
				parent::__construct();
			}

			//les getters et setters

			public function getResultat(){
				return $this->resultat;
			}

			public function setResultat($resultat){
				$this->resultat = $resultat;
			}

			public function getDiplome(){
				return $this->diplome;
			}

			public function setDiplome($diplome){
				$this->diplome = $diplome;
			}

			public function getStatut(){
				return $this->statut;
			}

			public function setStatut($statut){
				$this->statut = $statut;
			}

			public function getEtablissement(){
				return $this->$etablissement;
			}

			public function setEtablissement($etablissement){
				$this->etablissement = $etablissement;
			}

			//les fonctions d'actions

			public function ajouterCursus()
			{
		 	try{
				$requete = "INSERT INTO payement(date_paye, id_filiere, id_etu, id_niveauetude, id_personnel, resultat, diplome, statut,etablissement, id_annee, type_payement) VALUES(NOW(),?,?,?,?,?,?,?,?,?)";
				$param = array($this->filiere, $this->etudiant, $this->niveau_etude, $this->personnel, $this->resultat, $this->diplome, $this->statut,$this->etablissement, $this->annee_academique, $this->type_payement);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		  }

		 

		  public function modifierCursus()
			{
				try{
					$requete = "UPDATE payement SET date_paye = NOW(), id_filiere=?, id_etu=?, id_niveauetude=?, id_personnel=?, resultat=?, diplome=?, statut=?, etablissement=?, id_annee=?, type_payement=? WHERE id_paye = ?";
					$param = array($this->filiere, $this->etudiant, $this->niveau_etude, $this->personnel, $this->resultat, $this->diplome, $this->statut,$this->etablissement, $this->annee_academique, $this->type_payement, $this->id_paye);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}



			public function supprimerCursus()
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