<?php 

	include("ClsPersonne.php");
	 
	class Parents extends Personne{

		private $profession_par;

		function __construct(){
			parent::__construct();
		}

		function getProfession_par(){
			$this->profession_par;
		}

		function setProfession_par($profession_par){
			$this->profession_par = $profession_par;
		}

		
		function ajouterParent(){
			try{
				$requete="INSERT INTO  personne(nom_pers, prenom_pers, sexe_pers, adresse_pers, tel_pers, password, code_pays, prof_par, type_pers) 
						VALUES(?,?,?,?,?,?,?,?,?)";
				$param = array($this->nom_pers,$this->prenom_pers,$this->sexe_pers,$this->adresse_pers,$this->tel_pers,$this->password,$this->pays,$this->profession_par,$this->type_pers);
				$count = CUD($requete,$param);
			  	return $count;
			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}
		}

		function supprimerParent(){
			try{

				$requete = "DELETE FROM personne WHERE id_pers =?";
				$param=array($this->id_pers);
				$count = CUD($requete,$param);
		  		return $count;

			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}

		}

		function modifierParent(){
			try{
				$requete="UPDATE personne 
						SET nom_pers=?, prenom_pers=?, sexe_pers=?, adresse_pers=?, tel_pers=?, code_pays=?, prof_par=? 
						WHERE id_pers = '$this->id_pers'";
				$param=array($this->nom_pers,$this->prenom_pers,$this->sexe_pers,$this->adresse_pers,$this->tel_pers,$this->pays,$this->profession_par);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}
		}

	}


?>