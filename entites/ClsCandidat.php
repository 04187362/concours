<?php 
	// include_once ("connexion/connexiongenerale.php");

	// include("ClsPersonne.php");

	class Candidat extends Personne{

		private $date_nais;
		private $lieu_nais;
		private $image;
		private $filiere;
		private $diplome;
		private $serie;
		private $niv_etu_univ;
		private $statut;
		private $numbourse;
		private $specialite;

		public function __construct(){
			parent::__construct();
		}

		
		public function getLieu_nais(){
			return $this->lieu_nais;
		}

		public function setLieu_nais($lieu_nais){
			$this->lieu_nais = $lieu_nais;
		}

		public function getDate_nais(){
			return $this->date_nais;
		}

		public function setDate_nais($date_nais){
			$this->date_nais = $date_nais;
		}

		public function getIamge(){
			return $this->image;
		}

		public function setImage($image){
			$this->image = $image;
		}

		public function getFiliere(){
			return $this->filiere;
		}

		public function setFiliere($filiere){
			$this->filiere = $filiere;
		}

		public function getDiplome(){
				return $this->diplome;
			}

			public function setDiplome($diplome){
				$this->diplome = $diplome;
			}

			public function getSerie(){
				return $this->$serie;
			}

			public function setSerie($serie){
				$this->serie = $serie;
			}

			public function getNiveauEtudeUniversitaire(){
				return $this->niv_etu_univ;
			}

			public function setNiveauEtudeUniversitaire($niv_etu_univ){
				 $this->niv_etu_univ = $niv_etu_univ;
			}

			public function getStatut(){
				return $this->statut;
			}

			public function setStatut($statut){
				 $this->statut = $statut;
			}

			public function getNumbourse(){
				return $this->numbourse;
			}

			public function setNumbourse($numbourse){
				 $this->numbourse = $numbourse;
			}

			public function getSpecialite(){
				return $this->specialite;
			}

			public function setSpecialite($specialite){
				 $this->specialite = $specialite;
			}


		   function ajouterCandidat(){
			try{
				$requete="INSERT INTO  personne(nom_pers, prenom_pers, sexe_pers, adresse_pers, tel_pers, code_pays, date_nais_etu, lieu_nais_etu, image, id_filiere, diplome, serie, niv_etu_univ, statut, type_pers) 
						VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$param = array($this->nom_pers, $this->prenom_pers, $this->sexe_pers, $this->adresse_pers, $this->tel_pers, $this->pays, $this->date_nais, $this->lieu_nais, $this->image, $this->filiere, $this->diplome, $this->serie, $this->niv_etu_univ, $this->statut, $this->type_pers);
				$count = CUD($requete,$param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
			
		}

		function supprimerCandidat(){
			try{

				$requete = "DELETE FROM personne WHERE id_pers =?";
				$param = array($this->id_pers);
				$count = CUD($requete,$param);
		  		return $count;

			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}

		}


		function modifierCandidat(){
			try{
				if($this->image == null){

					$requete="UPDATE personne 
						SET nom_pers=?, prenom_pers=?, sexe_pers=?, adresse_pers=?, tel_pers=?, code_pays=?,date_nais_etu=?, lieu_nais_etu=?, id_filiere = ?, diplome=?, serie=?, niv_etu_univ=?, statut=?, id_etat=?,numbourse=?,id_spe=? WHERE id_pers = ?";
						$param = array($this->nom_pers, $this->prenom_pers, $this->sexe_pers, $this->adresse_pers, $this->tel_pers, $this->pays, $this->filiere, $this->diplome, $this->serie, $this->niv_etu_univ, $this->statut, $this->id_etat,$this->numbourse,$this->specialite, $this->id_pers);
					$count = CUD($requete,$param);
				  	return $count;

				}else{

					$requete="UPDATE personne 
						SET nom_pers=?, prenom_pers=?, sexe_pers=?, adresse_pers=?, tel_pers=?, code_pays=?,date_nais_etu=?, lieu_nais_etu=?,image=?, id_filiere = ?, diplome=?,serie=?, niv_etu_univ=?, statut=?, id_etat=?,numbourse=?,id_spe=? WHERE id_pers = ?";
						$param = array($this->nom_pers, $this->prenom_pers, $this->sexe_pers, $this->adresse_pers, $this->tel_pers, $this->pays, $this->image, $this->filiere, $this->diplome, $this->serie, $this->niv_etu_univ, $this->statut, $this->id_etat,$this->numbourse,$this->specialite, $this->id_pers);
					$count = CUD($requete,$param);
				  	return $count;

				}
				

		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}

	}


?>