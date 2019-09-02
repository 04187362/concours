<?php 
		class Payement{
			//les proprietes de la classe.
			protected  $id_paye;
			protected  $date_paye;
			protected  $filiere;
			protected  $etudiant;
			protected  $niveau_etude;
			protected  $personnel;
			protected  $annee_academique;
			protected  $type_payement;


			//le constructeur de la classe
			public function __construct(){}


			//les getters et les setters
			public function getId_paye(){
				return $this->id_paye;
			}

			public function setId_paye($id_paye){
				$this->id_paye = $id_paye;
			}

			public function getTypePayement(){
				return $this->type_payement;
			}

			public function setTypePayement($type_payement){
				$this->type_payement = $type_payement;
			}

			public function getDatePaye(){
				return $this->date_paye;
			}

			public function setDatePaye($date_paye){
				$this->date_paye = $date_paye;
			}

			public function getFiliere(){
				return $this->filiere;
			}

			public function setFiliere($filiere){
				$this->filiere = $filiere;
			}

			public function getEtudiant(){
				return $this->etudiant;
			}

			public function setEtudiant($etudiant){
				$this->etudiant = $etudiant;
			}

			public function getNiveauEtude(){
				return $this->niveau_etude;
			}

			public function setNiveauEtude($niveau_etude){
				$this->niveau_etude = $niveau_etude;
			}

			public function getPersonnel(){
				return $this->personnel;
			}

			public function setPersonnel($personnel){
				$this->personnel = $personnel;
			}


			public function getAnneeAcademique(){
				return $this->annee_academique;
			}

			public function setAnneeAcademique($annee_academique){
				$this->annee_academique = $annee_academique;
			}


		}

 ?>