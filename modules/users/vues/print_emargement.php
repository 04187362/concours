<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");
?>

<?php 

  $id_ens=htmlentities(htmlspecialchars($_GET['cood1']));
  $id_matiere=htmlentities(htmlspecialchars($_GET['cood2']));
  $id_niveauetude=htmlentities(htmlspecialchars($_GET['cood3']));
  $mois=htmlentities(htmlspecialchars($_GET['cood4']));

  $requete = "SELECT * FROM emargement WHERE id_ens=? AND id_matiere=? AND id_niveauetude=? AND mois=?";
  $param = array($id_ens,$id_matiere,$id_niveauetude,$mois);
  
  if(isset($_GET['cood1']) && isset($_GET['cood2']) && isset($_GET['cood3']) && isset($_GET['cood4']) && existanceGestion($requete,$param)){

	// Recuperation du nom , prenom et sexe de l'enseignant.
	$requete1 = "SELECT * FROM personne WHERE id_pers=?";
	$param1 = array($id_ens);
	$p = selection_condition($requete1, $param1);

    // Recuperation du cout par heure d'une matiere
	$requete2 = "SELECT cout_heure FROM enseigner WHERE id_ens=? AND id_matiere=? AND id_niveauetude=?";
	$param2 = array($id_ens,$id_matiere,$id_niveauetude);
    $cout_heure = getChampsGestion($requete2,$param2);
    // totale des heure effectué dans une classe pendant un mois
	$requete3 = "SELECT sum(heure_effectue) as effectif 
				 FROM emargement
				 WHERE id_ens = ?
				 AND id_matiere = ?
				 AND id_niveauetude = ?
				 AND mois = ?";

	$param3 = array($id_ens,$id_matiere,$id_niveauetude,$mois);

    $total_heure = getNombreLigneGestion($requete3,$param3);

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

		<title>Salaire</title>


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
										<tr>
											<td></td><td></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="width:25%; text-align:left">Nom(s) : <span class="text-success"><b><?php echo $p['nom_pers'];?></b></span> <br>Prenom(s) : <span class="text-success"><b><?php echo $p['prenom_pers'];?></b></span> <br>Sexe : <?php echo $p['sexe_pers'];?></td>
											
										</tr>
									</tbody>
								
								</table>
							  
								<hr />
									<h4 style="font-family:Lucida Calligraphy;font-size:17px;text-align:center">
										Rénumeration de 
										<span class="text-primary">
											<?php 
                                                            if($mois == "1"){
                                                                echo 'Janvier';
                                                            }else if($mois=="2"){
                                                                echo 'Fevrier';
                                                            }else if($mois=="3"){
                                                                echo 'Mars';
                                                            }else if($mois=="4"){
                                                                echo 'Avril';
                                                            }else if($mois=="5"){
                                                                echo 'Mais';
                                                            }else if($mois=="6"){
                                                                echo 'Juin';
                                                            }else if($mois=="7"){
                                                                echo 'Juillet';
                                                            }else if($mois=="8"){
                                                                echo 'Août';
                                                            }else if($mois=="9"){
                                                                echo 'Septembre';
                                                            }else if($mois=="10"){
                                                                echo 'Octobre';
                                                            }else if($mois=="11"){
                                                                echo 'Novembre';
                                                            }else{
                                                                echo 'Décembre';
                                                            } 
                                                        ?>
										</span>
									</h4>
								<hr/>
								<br><br>
								
								<table style="border:1px solid black;width:100%" class="table table-striped">
									<thead>
									<tr style="border:1px solid black;">
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center; padding:10px">Heures effectuées</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Cout/heure</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Total</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Salaire net</th>								
									</tr>

									</thead>
									<tbody>
								
											<tr style="border:1px solid black">
												
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo $total_heure;?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black"><?php echo number_format($cout_heure,2,'.','');?> FCFA</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black"><?php echo number_format($cout_heure*$total_heure,2,'.','');?> FCFA</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black; background-color:#DDD"><?php echo number_format($cout_heure*$total_heure,2,'.','');?> FCFA</td>
											</tr>

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
