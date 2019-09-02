<?php

	include_once ("connexion/connexiongenerale.php");

	class Emargement{

		private $id_em;
		
		private $enseignant;
		private $niveauetude;
		private $matiere;
		private $heure_effectue;
		private $titre_cours;
		private $date_em;
		private $heure_debut;
		private $heure_fin;
		private $type_seance;
		private $mois;

		function  __construct(){}

		function getId_em(){
			return $this->id_em;
		}
		
		function setId_em($id_em){
			 $this->id_em = $id_em;
		}

		function getEnseignant_em(){
			return $this->enseignant;
		}

		function setEnseignant_em($enseignant){
			return $this->enseignant = $enseignant;
		}

		function getNiveauetude(){
			return $this->niveauetude;
		}

		function setNiveauetude($niveauetude){
			$this->niveauetude = $niveauetude;
		}

		function getMatiere_em(){
			return $this->matiere;
		}

		function setMatiere_em($matiere){
			$this->matiere = $matiere;
		}

		function getHeure_effectue(){
			return $this->heure_effectue;
		}

		function setHeure_effectue($heure_effectue){
			$this->heure_effectue = $heure_effectue;
		}

		function getTitre_cours(){
			return $this->titre_cours;
		}

		function setTitre_cours($titre_cours){
			$this->titre_cours = $titre_cours;
		}

		function getDate_em(){
			return $this->date_em;
		}

		function setDate_em($date_em){
			$this->date_em = $date_em;
		}

		function getHeure_debut(){
			return $this->heure_effectue;
		}

		function setHeure_debut($heure_debut){
			$this->heure_debut = $heure_debut;
		}

		function getHeure_fin(){
			return $this->heure_fin;
		}

		function setHeure_fin($heure_fin){
			$this->heure_fin = $heure_fin;
		}

		function getType_seance(){
			return $this->type_seance;
		}

		function setType_seance($type_seance){
			$this->type_seance = $type_seance;
		}

		function getMois(){
			return $this->mois;
		}

		function setMois($mois){
			$this->mois = $mois;
		}

		 function ajouterEmargement(){
		 	try{
				$requete = "INSERT INTO emargement(id_ens, id_niveauetude, id_matiere, heure_effectue, titre_cours, date_em, heure_debut, heure_fin, type_seance, mois) 
				VALUES(?,?,?,?,?,?,?,?,?,?)";
				$param = array($this->enseignant,$this->niveauetude,$this->matiere,$this->heure_effectue,$this->titre_cours,$this->date_em,$this->heure_debut,$this->heure_fin,$this->type_seance,$this->mois);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function supprimerEmargement(){
			try{

				$requete = "DELETE FROM emargement WHERE id_em ='$this->id_em'";
				$count = CUD($requete);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

		function modifierEmargement(){
			try{
				$requete = "UPDATE emargement SET id_ens = ?, id_niveauetude =?, id_matiere =?, heure_effectue=?, titre_cours=?, date_em = ?, heure_debut=?, heure_fin =?, type_seance =?, mois = ?  WHERE id_em = ?";
				$param = array($this->enseignant,$this->niveauetude,$this->matiere,$this->heure_effectue,$this->titre_cours,$this->date_em,$this->heure_debut,$this->heure_fin,$this->type_seance,$this->mois,$this->id_em);
				$count = CUD($requete,$param);
			  	return $count;
		  	}catch (Exception $e){
				die("Erreur : " . $e->getMessage());
			}
		}

	}

?>