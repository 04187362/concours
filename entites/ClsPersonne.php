<?php 

	include_once ("connexion/connexiongenerale.php");

	class Personne {

		protected $id_pers;
		protected $nom_pers;
		protected $prenom_pers;
		protected $sexe_pers;
		protected $adresse_pers;
		protected $tel_pers;
		protected $email_pers;
		protected $password;
		protected $pays;
		protected $type_pers;

		function __construct(){}

		function getId_pers(){
			$this->id_pers;
		}

		function setId_pers($id_pers){
			$this->id_pers = $id_pers;
		}

		function getNom_pers(){
			$this->nom_pers;
		}

		function setNom_pers($nom_pers){
			$this->nom_pers = $nom_pers;
		}


		function getPrenom_pers(){
			$this->prenom_pers;
		}

		function setPrenom_pers($prenom_pers){
			$this->prenom_pers = $prenom_pers;
		}

		function getSexe_pers(){
			$this->sexe_pers;
		}

		function setSexe_pers($sexe_pers){
			$this->sexe_pers = $sexe_pers;
		}

		function getAdresse_pers(){
			$this->adresse_pers;
		}

		function setAdresse_pers($adresse_pers){
			$this->adresse_pers = $adresse_pers;
		}

		function getTel_pers(){
			$this->tel_pers;
		}

		function setTel_pers($tel_pers){
			$this->tel_pers = $tel_pers;
		}

		function getEmail_pers(){
			$this->email_pers;
		}

		function setEmail_pers($email_pers){
			$this->email_pers = $email_pers;
		}

		function getPassword(){
			$this->password;
		}

		function setPassword($password){
			$this->password = $password;
		}

		function getPays(){
			$this->pays;
		}

		function setPays($pays){
			$this->pays = $pays;
		}

		function getType_pers(){
			$this->type_pers;
		}

		function setType_pers($type_pers){
			$this->type_pers = $type_pers;
		}


	}


?>