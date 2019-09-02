<?php
	include_once ("connexion/connexiongenerale.php");

    class ArchiveComposition{

        private $id_com;
        private $note;
        private $matiere;
        private $nom_etu;
        private $prenom_etu;
        private $sexe_etu;
        private $pays;
        private $datenaiss_etu;
        private $trimestre;
        private $anneeAc;
        private $rang;
        private $classe;
        private $coef;
        private $somme_coef;
        private $moyenne;
        private $effectif_cl;
        private $moy_adm;
        private $moy_major;
        private $moy_min;
        private $nom_ens;
        private $prenom_ens;
        private $nom_de;


        function __construct(){}

        function getId_com(){
        	return $this->id_com;
        }

        function setId_com($id_com){
        	$this->id_com = $id_com;
        }

        function getNote(){
        	return $this->note;
        }

        function setNote($note){
        	$this->note = $note;
        }

        function getMatiere(){
        	return $this->matiere;
        }

        function setMatiere($matiere){
        	$this->matiere = $matiere;
        }

        function getNom_etu(){
        	return $this->nom_etu;
        }

        function setNom_etu($nom_etu){
        	$this->nom_etu = $nom_etu;
        }

        function getPrenom_etu(){
            return $this->prenom_etu;
        }

        function setPrenom_etu($prenom_etu){
            $this->prenom_etu = $prenom_etu;
        }

        function getSexe_etu(){
            return $this->sexe_etu;
        }

        function setSexe_etu($sexe_etu){
            $this->sexe_etu = $sexe_etu;
        }

        function getDatenais_etu(){
            return $this->datenais_etu;
        }

        function setDatenais_etu($datenais_etu){
            $this->datenais_etu = $datenais_etu;
        }

        function getPays(){
            return $this->pays;
        }

        function setPays($pays){
            $this->pays = $pays;
        }

        function getTrimestre(){
        	return $this->trimestre;
        }

        function setTrimestre($trimestre){
        	$this->trimestre = $trimestre;
        }


        function getAnneeAc(){
        	return $this->anneeAc;
        }

        function setAnneeAc($anneeAc){
        	$this->anneeAc = $anneeAc;
        }

        function getRang(){
            return $this->rang;
        }

        function setRang($rang){
            $this->rang = $rang;
        }

        function getClasse(){
            return $this->classe;
        }

        function setClasse($classe){
            $this->classe = $classe;
        }

        function getCoef(){
            return $this->coef;
        }

        function setCoef($coef){
            $this->coef = $coef;
        }

        function getSomme_coef(){
            return $this->somme_coef;
        }

        function setSomme_coef($somme_coef){
            $this->somme_coef = $somme_coef;
        }

        function getMoyenne(){
            return $this->moyenne;
        }

        function setMoyenne($moyenne){
            $this->moyenne = $moyenne;
        }

        function getEffectif_cl(){
            return $this->effectif_cl;
        }

        function setEffectif_cl($effectif_cl){
            $this->effectif_cl = $effectif_cl;
        }

        function getMoy_adm(){
            return $this->moy_adm;
        }

        function setMoy_adm($moy_adm){
            $this->moy_adm = $moy_adm;
        }


        function getMoy_major(){
            return $this->moy_major;
        }

        function setMoy_major($moy_major){
            $this->moy_major = $moy_major;
        }


        function getMoy_min(){
            return $this->moy_min;
        }

        function setMoy_min($moy_min){
            $this->moy_min = $moy_min;
        }


        function getNom_ens(){
            return $this->nom_ens;
        }

        function setNom_ens($nom_ens){
            $this->nom_ens = $nom_ens;
        }

        function getPrenom_ens(){
            return $this->prenom_ens;
        }

        function setPrenom_ens($prenom_ens){
            $this->prenom_ens = $prenom_ens;
        }

        function getNom_de(){
            return $this->nom_ens;
        }

        function setNom_de($nom_de){
            $this->nom_de = $nom_de;
        }

        function ajouterArchiveComposition(){
        	try{
    			$requete = "INSERT INTO archiver_composer(note, matiere, nom_etu, prenom_etu, sexe_etu, datenais_etu, pays, trimestre, anneeAc, rang, classe, coef, somme_coef, moyenne, effectif_cl, moy_admission, moyenne_major, moyenne_minor, nom_ens, prenom_ens, nom_de) 
                            VALUES('$this->note','$this->matiere','$this->nom_etu', '$this->prenom_etu', '$this->sexe_etu', '$this->datenais_etu', '$this->pays', '$this->trimestre', '$this->anneeAc', '$this->rang', '$this->classe', '$this->coef', '$this->somme_coef', '$this->moyenne', '$this->effectif_cl', '$this->moy_adm', '$this->moy_major', '$this->moy_min', '$this->nom_ens', '$this->prenom_ens', '$this->nom_de')";
    			$count = CUD($requete);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}

		function supprimerArchiveComposition(){
            try{
    			$requete = "DELETE FROM archiver_composer WHERE id_com ='$this->id_com'";
    			$count = CUD($requete);
    		  	return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

		}


        function suppressionMultiLigne($anneeAc){
            $count = 0;
            try{
                $sql = "SELECT * FROM archiver_composer
                        WHERE anneeAc = '$this->anneeAc'";
                //Connexion à la BDD
                $Cnx=PDO2::getInstance();
                //exécution de la requête de sélection et retour des résultats
                $resultat=$Cnx->query($sql);
                //Conservation lignes par ligne des élements retournés

                foreach($resultat as $tablo){
                    $id_com = $tablo['id_com'];
                    $requete = "DELETE FROM archiver_composer WHERE id_com ='$id_com'";
                    $count = $count + CUD($requete);
                }
            return $count;
                 
            }catch (Exception $e){
                die("Erreur : " . $e->getMessage());
            }

        }

        function supprimerArchive(){
            try{
                $requete = "DELETE FROM archive_paiement WHERE anneeAc ='$this->anneeAc'";
                $count = CUD($requete);
                return $count;
            }catch(Exception $e){

                die("Erreur : " . $e->getMessage());

            }

        }

    }

?>

