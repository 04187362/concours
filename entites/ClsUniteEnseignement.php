<?php 
		class UniteEnseignement
		{
			//les proprietes de la classe.
			private $id_uniteEnseignement;
			private $lib_uniteEnseignement;
			private $abreviation;

			//le constructeur de la classe

			public function __construct(){

			}


			//les getters et les setters

			public function getId_uniteEnseignement(){
				return $this->lib_uniteEnseignement;
			}

			public function setId_uniteEnseignement($id_uniteEnseignement){
				$this->id_uniteEnseignement = $id_uniteEnseignement;
			}


			public function getLib_uniteEnseignement(){
				return $this->lib_uniteEnseignement;
			}

			public function setLib_uniteEnseignement($lib_uniteEnseignement){
				$this->lib_uniteEnseignement = $lib_uniteEnseignement;
			}

			public function getAbreviation(){
				return $this->abreviation;
			}

			public function setAbreviation($abreviation){
				$this->abreviation = $abreviation;
			}

			//les fonctions d'actions

			public function ajouterUniteEnseignement()
			{
		 	try{
				$requete = "INSERT INTO unite_enseignement(lib_ue,abreviation) VALUES(?,?)";
				$param = array($this->lib_uniteEnseignement, $this->abreviation);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}			
		   }

		  public function modifierUniteEnseignement()
			{
				try{
					$requete = "UPDATE unite_enseignement SET lib_ue = ?, abreviation=?WHERE id_ue = ?";
						$param = array($this->lib_uniteEnseignement,$this->abreviation, $this->id_uniteEnseignement);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
			}

		public function supprimerUniteEnseignement()
		{
				try{
					$requete = "DELETE FROM unite_enseignement WHERE id_ue =?";
					$param = array($this->id_uniteEnseignement);
					$count = CUD($requete,$param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}
		 }
	 }


 ?>