<?php 
	include_once ("connexion/connexiongenerale.php");

	class Personnel extends Personne{

		private $date_nais;
		private $lieu_nais;
		private $role;

		function __construct(){
			parent::__construct();
		}

		function getDate_nais(){
			$this->date_nais;
		}

		function setDate_nais($date_nais){
			$this->date_nais = $date_nais;
		}

		function getLieu_nais(){
			$this->date_nais;
		}

		function setLieu_nais($lieu_nais){
			$this->lieu_nais = $lieu_nais;
		}


		function getRole(){
			$this->role;
		}

		function setRole($role){
			$this->role = $role;
		}


		function ajouterPersonnel(){
			try{
				$requete="INSERT INTO  personne(nom_pers, prenom_pers, sexe_pers, adresse_pers, tel_pers, password, code_pays, date_nais_pers, lieu_nais_pers, email_pers, role, type_pers) 
						VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
				$param = array($this->nom_pers,$this->prenom_pers,$this->sexe_pers,$this->adresse_pers,$this->tel_pers,$this->password,$this->pays,$this->date_nais,$this->lieu_nais,$this->email_pers,$this->role,$this->type_pers);
				$count = CUD($requete,$param);
			  	return $count;
			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}
		}

		function supprimerPersonnel(){
			try{

				$requete = "DELETE FROM personne WHERE id_pers =?";
				$param = array($this->id_pers);
				$count = CUD($requete,$param);
		  		return $count;

			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}

		}

		function modifierPersonnel(){
			try{
				$requete="UPDATE personne 
						SET nom_pers=?, prenom_pers=?, sexe_pers=?, adresse_pers=?, tel_pers=?, code_pays=?, date_nais_pers=?, lieu_nais_pers=?, email_pers=?, role =? 
						WHERE id_pers = ?";
				$param = array($this->nom_pers,$this->prenom_pers,$this->sexe_pers,$this->adresse_pers,$this->tel_pers,$this->pays,$this->date_nais,$this->lieu_nais,$this->email_pers,$this->role,$this->id_pers);
				$count = CUD($requete,$param);
			  	return $count;

			}catch(Exception $e){

				die("Erreur : " . $e->getMessage());

			}
		}

	}


?>