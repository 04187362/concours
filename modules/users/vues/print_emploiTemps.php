<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/users/modeles/methodeUsers.php");
	include("globale/verification.php");
?>

<?php 

  $id_niveauetude=htmlentities(htmlspecialchars($_GET['cood']));
  $requete = "SELECT * FROM emploi_temps WHERE id_niveauetude=?";
  $param = array($id_niveauetude);
  
  if(isset($_GET['cood']) && existanceGestion($requete,$param)){

    $requete1 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
    $lib_niveauetude = getChampsParametrage($requete1, $param);

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

		<title>Emploi du temps</title>

		<link href="plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">

        <link href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">

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
											<th style="text-align:left">Complexe scolaire </th>
											<th style="width:20%;"></th>
											<th style="text-align:right">République Congolaise</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align:left"> ** Brunel EBATA **</td>
											<td style="width:30%;"></td>
											<td style="text-align:right">Union * travail * progrès</td>
										</tr>
									</tbody>
								</table>
								<br>
								<div class="col-md-6 col-md-offset-3">
									
								</div>
								
							  	<hr />

									<h4 style="font-family:Lucida Calligraphy;font-size:17px;text-align:center">Emploi du temps de <b class="text-primary"><?php echo $lib_niveauetude; ?></span></h4>
								
								
								<hr/>
								
								<br><br>
								
								<table style="border:1px solid black;width:100%" class="table table-striped">
									<thead>
									<tr style="border:1px solid black;">
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Horaire</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Lundi</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Mardi</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Mercredi</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Jeudi</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Vendredi</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center; padding:10px">Samedi</th>								
									</tr>

									</thead>
									<tbody>
											<?php
                                                $sql ="SELECT * FROM emploi_temps e, niveau_etude n
                                                            WHERE n.id_niveauetude = e.id_niveauetude
                                                            AND n.id_niveauetude = ?";
                                                
                                                $request = afficherTout($sql); 
                                                $param = array($id_niveauetude);
                                                //exécution de la requête de sélection et retour des résultats
                                                $request->execute($param);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$request->fetch()){

                                                    $requete1 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
                                                    $param1 = array($tablo['lundi']);
                                                    $param2 = array($tablo['mardi']);
                                                    $param3 = array($tablo['mercredi']);
                                                    $param4 = array($tablo['jeudi']);
                                                    $param5 = array($tablo['vendredi']);
                                                    $param6 = array($tablo['samedi']); 
                                            ?>
                                            <tr>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo $tablo['heure_debut'].'-'.$tablo['heure_fin']; ?></td>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo getChampsParametrage($requete1,$param1); ?></td>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo getChampsParametrage($requete1,$param2); ?></td>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo getChampsParametrage($requete1,$param3); ?></td>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo getChampsParametrage($requete1,$param4); ?></td>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo getChampsParametrage($requete1,$param5); ?></td>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo getChampsParametrage($requete1,$param6);; ?></td>
                                                
                                            </tr>
                                            <?php } ?>
										
									</tbody>
								
								</table>
									
									<br/>
																	
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
