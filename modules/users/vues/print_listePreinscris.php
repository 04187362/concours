<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
	include("globale/verification.php");
?>

<?php 

  // Verifiant si le niveau etude à modifier a été programmé.
   $id_filiere =htmlentities(htmlspecialchars($_GET['cood']));
   $requete2 = "SELECT * FROM preinscription pr, personne p 
                WHERE pr.id_candidat = p.id_pers
                AND id_filiere=?
				AND pr.id_annee=?";
   $param2 = array($id_filiere,$id_an);
   if(isset($_GET['cood']) && existanceParametrage($requete2,$param2)){
       $requete3 = "SELECT lib_filiere FROM filiere WHERE id_filiere=?";
	   $param3 = array($id_filiere);
       //Recuperation du libellé du niveau d'etude.
        $lib_filiere = getChampsParametrage($requete3,$param3);
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

		<title>Liste des preinscris au concours</title>


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
											<th style="text-align:left">Université GESET </th>
											<th style="width:20%;"></th>
											<th style="text-align:right">République Gabonaise</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td style="width:30%;"></td>
											<td style="text-align:right">Union * travail * progrès</td>
										</tr>
									</tbody>
								</table>
								
								<table style="width:100%">
									<thead>
										<tr>
											<th style="text-align:center"></th>
											<th style="text-align:center;width:25%"></th>
										</tr>
										
										
									</thead>
									<tbody>
										
									</tbody>
								
								</table>
							  
								<hr />
									<h4 style="font-family:Forte;text-align:center">
										Liste des candidats inscris en <?php echo $lib_filiere; ?>
									</h4>
								<hr/>
								<br><br>
								
								<table style="border:1px solid black;width:100%" class="table table-striped">
									<thead>
									<tr style="border:1px solid black;">
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center; padding:2px">Noms</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Prénoms</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Sexe</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Date de naissance</th>								
									</tr>

									</thead>
									<tbody>
                                            <?php
                                                $sql = "SELECT * FROM preinscription p, personne pe, frait f, annee_academique a
                                                            WHERE pe.id_pers = p.id_candidat
                                                            AND p.id_frais = f.id_frait
                                                            AND p.id_annee = a.id_annee
                                                            AND id_filiere =?
															AND p.id_annee=?
															ORDER BY nom_pers, prenom_pers ASC ";

                                                $requete4 = AfficherTout($sql); 
                                                $param4 = array($id_filiere,$id_an);
                                                //exécution de la requête de sélection et retour des résultats
                                                $requete4->execute($param4);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$requete4->fetch()){ 
                                            ?>
											<tr style="border:1px solid black">
												<td style="font-family:cambria;border:1px solid black; padding:2px"><?php echo $tablo['nom_pers'];?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black"><?php echo $tablo['prenom_pers'];?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black"><?php echo $tablo['sexe_pers'];?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black"><?php echo date('d-m-Y', strtotime($tablo['date_nais_etu']));?></td>
											</tr>
                                            <?php } ?>

									</tbody>
								
								</table>
									
									<br/><br/>
																	
								<page_footer>
								  	<hr/>
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
