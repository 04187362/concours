<?php 
		class Cycle{
			//les proprietes de la classe
			private $id_cycle;
			private $lib_cycle;
			private $frais;

			//le constructeur de la classe

			public function __construct(){

			}


			//les getters et les setters

			public function getId_cycle(){
				return $this->id_cycle;
			}

			public function setId_cycle($id_cycle){
				$this->id_cycle = $id_cycle;
			}

			public function getLibCycle(){
				return $this->lib_cycle;
			}

			public function setLibCycle($lib_cycle){
				$this->lib_cycle = $lib_cycle;
			}

			function getFrais(){
				return $this->frais;
			}

			function setFrais($frais){
				$this->frais = $frais;
			}

			//les fonctions d'actions

			public function ajouterCycle()
			{
			 	try{
					$requete = "INSERT INTO cycle(lib_cycle, frais) VALUES(?,?)";
					$param = array($this->lib_cycle, $this->frais);
					$count = CUD($requete, $param);
				  	return $count;
				}catch (Exception $e){
					die("Erreur : " . $e->getMessage());
				}			
		  }


		public function modifierCycle()
		{
			try{
				$requete = "UPDATE cycle SET lib_cycle =?, frais=?  WHERE id_cycle =?";
				$param = array($this->lib_cycle, $this->frais, $this->id_cycle);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}


		public function supprimerCycle(){
			try{
				$requete = "DELETE FROM cycle WHERE id_cycle =?";
				$param = array($this->id_cycle);
				$count = CUD($requete, $param);
			  	return $count;
			}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}



	   }

 ?>