<?php 
	//include_once ("connexion/connexiongenerale.php");

	//include("ClsPersonne.php");

	class Etudiant extends Personne{

		private $date_nais_etu;
		private $parent;
		private $anneeAc;
		private $frait;
		private $personnel;
		private $lieu_nais_etu;
		private $image;
		private $filiere;
		private $diplome;
		private $serie;
		private $niv_etu_univ;
		private $statut;
		private $numbourse;
		private $specialite;
		private $niveauetude;

		function __construct(){
			parent::__construct();
		}

		
		function getFrait(){
        	return $this->frait;
        }

        function setFrait($frait){
        	$this->frait = $frait;
        }

		function getAnneeAc(){
        	return $this->AnneeAc;
        }

        function setAnneeAc($AnneeAc){
        	$this->AnneeAc = $AnneeAc;
        }


        public function getPersonnel(){
		    return $this->personnel;
		}

		public function setPersonnel($personnel){
			$this->personnel = $personnel;
		}

		public function getDate_nais_etu(){
		    return $this->date_nais_etu;
		}

		public function setDate_nais_etu($date_nais_etu){
			$this->date_nais_etu = $date_nais_etu;
		}



		///////////////////////////////////////////////////

		public function getLieu_nais_etu(){
			return $this->lieu_nais_etu;
		}

		public function setLieu_nais_etu($lieu_nais_etu){
			$this->lieu_nais_etu = $lieu_nais_etu;
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

			public function getParent(){
				return $this->$parent;
			}

			public function setParent($parent){
				$this->parent = $parent;
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

			public function getNiveauetude(){
				return $this->niveauetude;
			}

			public function setNiveauetude($niveauetude){
				 $this->niveauetude = $niveauetude;
			} 
            
		function ajouterEtudiant(){
			try{
				$requete="INSERT INTO  personne(nom_pers, prenom_pers, date_nais_etu,id_personnel, id_frais, id_annee, type_pers) 
						VALUES(?,?,?,?,?,?,?)";
				$param = array($this->nom_pers,$this->prenom_pers,$this->date_nais_etu,$this->personnel,$this->frait,$this->AnneeAc,$this->type_pers);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
			
		}

		function supprimerEtudiant(){
			try{

				$requete = "DELETE * FROM personne WHERE id_pers =?";
				$param = array($this->id_pers);
				$count = CUD($requete,$param);
		  		return $count;

			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}

		}

		function modifierEtudiant(){
             try{
				if(($this->image == null) && ($this->numbourse == null)){

					$requete="UPDATE personne 
						SET nom_pers=?, prenom_pers=?, sexe_pers=?, adresse_pers=?, tel_pers=?, code_pays=?, date_nais_etu=?, lieu_nais_etu=?, id_filiere = ?, diplome=?, serie=?, niv_etu_univ=?, statut=?, id_niveauetude=?, id_spe=? WHERE id_pers = ?";
						$param = array($this->nom_pers, $this->prenom_pers, $this->sexe_pers, $this->adresse_pers, $this->tel_pers, $this->pays,$this->date_nais_etu,$this->lieu_nais_etu, $this->filiere, $this->diplome, $this->serie, $this->niv_etu_univ, $this->statut, $this->niveauetude,$this->specialite, $this->id_pers);
					$count = CUD($requete,$param);
				  	return $count;

				}else{

					$requete="UPDATE personne 
						SET nom_pers=?, prenom_pers=?, sexe_pers=?, adresse_pers=?, tel_pers=?, code_pays=?, date_nais_etu=?, lieu_nais_etu=?, image=?, id_filiere = ?, diplome=?, serie=?, niv_etu_univ=?, statut=?, id_niveauetude=?, numbourse=?, id_spe=? WHERE id_pers = ?";
						$param = array($this->nom_pers, $this->prenom_pers, $this->sexe_pers, $this->adresse_pers, $this->tel_pers, $this->pays,$this->date_nais_etu,$this->lieu_nais_etu, $this->image, $this->filiere, $this->diplome, $this->serie, $this->niv_etu_univ, $this->statut, $this->niveauetude,$this->numbourse,$this->specialite, $this->id_pers);
					    $count = CUD($requete,$param);
				  	return $count;

				}
				

		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}

		}

	}


?>