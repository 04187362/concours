<?php
	include("connexion/connexiongenerale.php");
	include("modules/users/modeles/methodeUsers.php");
?>

<?php
	$requete = "SELECT * FROM personne WHERE id_pers=?";
	$param = array($_GET['cood']);

	if(isset($_GET['cood']) && existanceUsers($requete,$param) && isset($_GET['cood2']))
	{
		$employe=htmlentities(htmlspecialchars($_GET['cood']));
		$acces=htmlentities(htmlspecialchars($_GET['cood2']));

		if($acces == 0){

			$requete1 = "UPDATE personne SET droit_acces = 1 WHERE id_pers = ?";
			$param1 = array($employe);
			$count = CUD($requete1, $param1);
			header("location:$_SERVER[HTTP_REFERER]"); 

		}else{

			$requete1 = "UPDATE personne SET droit_acces = 0 WHERE id_pers = ?";
			$param1 = array($employe);
			$count = CUD($requete1, $param1);
			header("location:$_SERVER[HTTP_REFERER]"); 

		}
									
	}
	else
	{		
		header('location:index.php?module=users&action=Deconnexion');
	}

		
?>