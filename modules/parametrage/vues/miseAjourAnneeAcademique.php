<?php	
	include("modules/parametrage/modeles/methodeParametrage.php");
?>

<?php
	if(!empty($_POST['id_annee'])){

        $id_annee=htmlspecialchars($_POST['id_annee']);
        $requete = "SELECT * FROM annee_academique WHERE id_annee=?";
        $param = array($id_annee);
        
		if(existanceParametrage($requete,$param)==1){

            $_SESSION['id_an'] = $id_annee;

		}else{

			echo '<div style ="color:white; text-align:center">L\'année <span style="color:yellow">'.$id_annee.'</span> existe déjà.</div></div>';
		}								
	}
	else
	{		
		echo '<div style ="color:orange; text-align:center>Remplissez le champs svp !</div>';
	}

		
?>