<?php
	
	include("modules/parametrage/modeles/methodeParametrage.php");

	include("entites/ClsAnneeAcademique.php");

?>
<?php
    if(isset($_SESSION['id_an'])){

        $a = new AnneeAcademique();
        $id_annee = $a->miseAjourAnneeAcademique();
        $requete1 = "SELECT lib_annee FROM annee_academique WHERE id_annee=?";
        $param1 = array($id_annee);

        echo getChampsParametrage($requete1,$param1);

    }