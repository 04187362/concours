<?php 
	//include_once ("connexion/connexiongenerale.php");

	//include("ClsPersonne.php");

	class Enseignant extends Personne{

		private $email_ens;
		private $date_nais;
		protected $diplome;
	
		function __construct(){
			parent::__construct();
		}


		function getEmail_ens(){
			$this->email_ens;
		}

		function setEmail_ens($email_ens){
			$this->email_ens = $email_ens;
		}

		function getDate_nais(){
			$this->date_nais;
		}

		function setDate_nais($date_nais){
			$this->date_nais = $date_nais;
		}

		function getDiplome(){
			$this->diplome;
		}

		function setDiplome($diplome){
			$this->diplome = $diplome;
		}


		
		function ajouterEnseignant(){

			$requete="INSERT INTO  personne(nom_pers, prenom_pers, sexe_pers, adresse_pers, tel_pers, password, code_pays, date_nais_ens, email_ens, diplome, type_pers) 
					VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			$param = array($this->nom_pers,$this->prenom_pers,$this->sexe_pers,$this->adresse_pers,$this->tel_pers,$this->password,$this->pays,$this->date_nais,$this->email_ens,$this->diplome,$this->type_pers);
			$count = CUD($requete,$param);
		  	return $count;

			
		}

		function supprimerEnseignant(){
			try{

				$requete = "DELETE FROM personne WHERE id_pers =?";
				$param = array($this->id_pers);
				$count = CUD($requete, $param);
		  		return $count;

			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}

		}

		function modifierEnseignant(){
			try{
				$requete="UPDATE personne 
						SET nom_pers=?, prenom_pers=?, sexe_pers=?, adresse_pers=?, tel_pers=?, code_pays=?, date_nais_ens=?, email_ens=?, diplome=?
						WHERE id_pers = '$this->id_pers'";
				$param =array($this->nom_pers,$this->prenom_pers,$this->sexe_pers,$this->adresse_pers,$this->tel_pers,$this->pays,$this->date_nais,$this->email_ens,$this->diplome);
				$count = CUD($requete, $param);
			  	return $count;
		  	}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}
		}

	}


?>