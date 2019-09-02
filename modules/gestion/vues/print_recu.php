<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("globale/verification.php");
?>

<?php 
     $id_pers=htmlentities(htmlspecialchars($_GET['cood']));
	 $requete1 = "SELECT nom_pers,prenom_pers,date_nais_etu FROM personne WHERE  id_pers=?";
	 $param1 = array($id_pers);
	 
     if(isset($_GET['cood']) && existanceGestion($requete1, $param1)){

         $requete2 = "SELECT nom_pers FROM personne WHERE  id_pers=?";
         $param2 = array($id_pers);
		 $nom_pers = getChampsParametrage($requete2, $param2);
		 
		 $requete3 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
		 $param3 = array($id_pers);
		 $prenom_pers = getChampsParametrage($requete3, $param3);
		 
		 $requete0 = "SELECT date_nais_etu FROM personne WHERE id_pers=?";
		 $param0 = array($id_pers);
		 $date_nais_etu = getChampsParametrage($requete0, $param0);

         //$prenom_pers = getChampsParametrage($requete2, $param2);
         //$date_nais_etu = getChampsParametrage($requete2, $param2);
         //	$lieu_nais_etu = getChampsParametrage($requete2, $param2);
         
     }else{
       header("location:index.php?modules=users&action=page_erreur");
     }
                        
?>
<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Apple devices fullscreen -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!-- Apple devices fullscreen -->
		<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<title>Fature d'inscription</title>


		<link rel="shortcut icon" href="img/favicon.ico" />
		<!-- Apple devices Homescreen icon -->
		<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

		<link href="css/bootstrap.min.css" rel="stylesheet">

		<script src="js/jquery.min2.js"></script>

	</head>
	<body>
	<div >
		
		<div class="container-fluid" id="content">	

			<div id="main">
				<div class="container-fluid">			
					<div class="row">
						<div class="col-sm-12">
							<div class="box box-bordeblack">
							
								<table style="width:100%">
									<thead>
										<tr>
											<th style="text-align:left">I.N.P.T.I.C</th>
											<th style="width:20%;"></th>
											<th style="text-align:right">REPUBLIQUE GABONAISE</th>

										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align:left; padding-left:10px; font-family:engravers mt"> <b> </b></td>
											<td style="width:30%;"></td>
											<td style="text-align:right; padding-right:15px">Union * Justice * Travail</td>
										</tr>
									</tbody>
								</table>
								<br>
								<table style="width:100%">
									<thead>
										<tr>
											<th style="text-align:center"></th>
											<th style="text-align:center;width:25%"></th>
										</tr>
										
									</thead>
									<tbody>
										<tr>
											<td style="width:25%; text-align:left">(Frais d'Inscription) <span class="text-danger"><b>INPTIC/N/<?php echo $id_pers ?></b></span><br> <br><span class="text-success"><b><?php //echo $nom_pers;?></b></span></td>
										</tr>
									</tbody>
								
								</table>
								
							  
								<hr />

								     <h4 style="text-align:center;"><b> Reçu de paiement des frais d'Inscription</b></h4><br>
                                    <p>Je soussigné, chef de service de la compatabilité de l'INPTIC atteste que Monsieur/Madame 
                                    <?php echo $nom_pers;?> <?php echo $prenom_pers;?> né le <?php echo $date_nais_etu; ?> à payer ses frais d'inscription.
									Pour continuer et finaliser tout le processus d'inscription.
									<?php //echo $lib_annee; ?>
                                    </p>
																	
								<page_footer>
								  	<hr/>
								     	<p style="text-align:right">Le Gestionnaire  <?php //echo getChampsUsers($val_recuperer2, $table1, $colonne, $p['id_pers']).' '.getChampsUsers($val_recuperer1, $table1, $colonne, $p['id_pers'])?>
								     	<p style="text-align:right">Fait à Libreville, le <?php echo  date('d/m/Y'); ?>.</p>
								</page_footer>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		
		</div>
	</body>

</html>
