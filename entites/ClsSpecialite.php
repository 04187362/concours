<?php 
		class Specialite{
			//les proprietes de la classe
			private $id_specialite;
			private $lib_specialite;
			private $filiere;

			//le constructeur de la classe

			public function __construct(){

			}


			//les getters et les setters

			public function getId_specialite(){
				return $this->id_specialite;
			}

			public function setId_specialite($id_specialite){
				$this->id_specialite = $id_specialite;
			}

			public function getLibSpecialite(){
				return $this->lib_specialite;
			}

			public function setLibSpecialite($lib_specialite){
				$this->lib_specialite = $lib_specialite;
			}

			function getFiliere(){
				return $this->filiere;
			}

			function setFiliere($filiere){
				$this->filiere = $filiere;
			}

			//les fonctions d'actions

			public function ajouterSpecialite()
			{
			 	try{
					$requete = "INSERT INTO specialite(lib_spe, id_filiere) VALUES(?,?)";
					$param = array($this->lib_specialite, $this->filiere);
					$count = CUD($requete, $param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}			
		  }


		public function modifierSpecialite()
		{
			try{
				$requete = "UPDATE specialite SET lib_spe =?, id_filiere=?  WHERE id_spe =?";
				$param = array($this->lib_specialite, $this->filiere, $this->id_specialite);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}


		public function supprimerSpecialite(){
			try{
				$requete = "DELETE FROM specialite WHERE id_spe =?";
				$param = array($this->id_specialite);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}



	   }

 ?>