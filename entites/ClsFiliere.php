<?php 
		class Filiere
		{
			//les proprietes de la classe.
			private $id_filiere;
			private $lib_filiere;
			private $abreviation;

			//le constructeur de la classe

			public function __construct(){

			}


			//les getters et les setters

			public function getId_filiere(){
				return $this->lib_filiere;
			}

			public function setId_filiere($id_filiere){
				$this->id_filiere = $id_filiere;
			}


			public function getLibFiliere(){
				return $this->lib_filiere;
			}

			public function setLibFiliere($lib_filiere){
				$this->lib_filiere = $lib_filiere;
			}

			public function getAbreviation(){
				return $this->abreviation;
			}

			public function setAbreviation($abreviation){
				$this->abreviation = $abreviation;
			}


			//les fonctions d'actions

			public function ajouterFiliere()
			{
		 	try{
				$requete = "INSERT INTO filiere(lib_filiere,abreviation,moyenne_admission) VALUES(?,?,10)";
				$param = array($this->lib_filiere, $this->abreviation);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		   }

		  public function modifierFiliere()
			{
				try{
					$requete = "UPDATE filiere SET lib_filiere = ?, abreviation=? WHERE id_filiere = ?";
						$param = array($this->lib_filiere,$this->abreviation, $this->id_filiere);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}

		public function supprimerFiliere()
		{
				try{
					$requete = "DELETE FROM filiere WHERE id_filiere =?";
					$param = array($this->id_filiere);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
		 }
	 }


 ?>