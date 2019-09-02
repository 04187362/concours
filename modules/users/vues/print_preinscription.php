<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("globale/verification.php");
?>

<?php 

  // Verifiant si l'inscription à imprimer existe.
   $id_pre =htmlentities(htmlspecialchars($_GET['cood']));
   $requete = "SELECT * FROM preinscription pr, personne p, annee_academique a, filiere f, frait fr
                WHERE a.id_annee = pr.id_annee
                AND pr.id_candidat = p.id_pers
                AND p.id_filiere = f.id_filiere
                AND pr.id_frais = fr.id_frait
                AND id_pre=?
				AND pr.id_annee=?";
   $param = array($id_pre,$id_an);
   if(isset($_GET['cood']) && existanceParametrage($requete,$param)){
        $p = selection_condition($requete,$param);
   }else{

        header("location:index.php?module=users&action=page_erreur");
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

		<title>Fature de l'inscription - GESET</title>


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
											<th style="text-align:left">Université </th>
											<th style="width:20%;"></th>
											<th style="text-align:right">REPUBLIQUE GABONAISE</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align:left; padding-left:10px; font-family:engravers mt"> <b>  GESET  </b></td>
											<td style="width:30%;"></td>
											<td style="text-align:right; padding-right:15px">Union * travail * progrès</td>
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
											<td style="width:25%; text-align:left">(Inscription) <span class="text-danger"><b>N° <?php echo $id_pre ?></b></span><br> <br>Année Académique : <span class="text-success"><b><?php echo $p['lib_annee'];?></b></span></td>
										</tr>
									</tbody>
								
								</table>
								
							  
								<hr />

									<p>Le gestionnaire de la direction de la scolarité et des Examens, soussigné déclare avoir recu de </p>
									<p>M................   <?php echo $p['nom_pers'].' '.$p['prenom_pers'];?> </p>
									<p>Filière : .....   <?php echo $p['lib_filiere'] ?>, <p>
									<p>La somme de <?php echo $p['montant']; ?> de la prréinscription.</p>
																	
								<page_footer>
								  	<hr/>
								     	<p style="text-align:left">Le Gestionnaire  <?php echo $nom_personne.' '.$prenom_personne;?>
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
