<?php
    //include("modules/parametrage/modeles/methodeParametrage.php");
    //include("entites/ClsAnneeAcademique.php");
	// On verifie l'existance de la session
	if(isset($_SESSION["users"]) && isset($_SESSION['id_annee'])){

        $id_personne = htmlentities(htmlspecialchars($_SESSION["users"]['id_pers']));
        $nom_personne = htmlentities(htmlspecialchars($_SESSION["users"]['nom_pers']));
        $prenom_personne = htmlentities(htmlspecialchars($_SESSION["users"]['prenom_pers']));
        $type_personne = htmlentities(htmlspecialchars($_SESSION["users"]['type_pers']));
        $role = htmlentities(htmlspecialchars($_SESSION["users"]['role']));
        $classe_etudiant = htmlentities(htmlspecialchars($_SESSION["users"]['id_niveauetude']));
        $tel_personne = htmlentities(htmlspecialchars($_SESSION["users"]['tel_pers']));
        $adresse_personne = htmlentities(htmlspecialchars($_SESSION["users"]['adresse_pers']));
        $email_personne = htmlentities(htmlspecialchars($_SESSION["users"]['email_pers']));
        $sexe_personne = htmlentities(htmlspecialchars($_SESSION["users"]['sexe_pers']));
        $code_pays = htmlentities(htmlspecialchars($_SESSION["users"]['code_pays']));
        $image = htmlentities(htmlspecialchars($_SESSION["users"]['image']));
        $type_personne = htmlentities(htmlspecialchars($_SESSION["users"]['type_pers']));
        $password = htmlentities(htmlspecialchars($_SESSION["users"]['password']));

        // Recuperation de la nouvelle année academique
        $id_an = 0 ;
        if(isset($_SESSION['id_an'])){

            $id_an = htmlentities(htmlspecialchars($_SESSION['id_an']));

        }else{
            $id_an= htmlentities(htmlspecialchars($_SESSION['id_annee']['maxi']));
        }
        
        /*$requests = "SELECT lib_annee FROM annee_academique WHERE id_annee =?";
        $paramaters = array($id_an);

        $libelle_anneeAc = getChampsParametrage($requests, $paramaters);*/

    }else{

        header("location:index.php?module=users&action=Deconnexion");
    }
?>
