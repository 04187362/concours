<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
?>

<?php 

  $table = "paiement";
  $colonne1 ="id_paye";
  
  if(isset($_GET['cood']) && existanceGestion($table, $colonne1, $_GET['cood'])){

    $id_paye=htmlspecialchars($_GET['cood']);

    $p = selection_condition($table, $colonne1, $id_paye);

	//Recuperation du nom , prenom et sexe de l'enseignant.
	$table1 = "personne";
	$table2 = "frait";
	$table4 = "annee_academique";
	$table3 = "classe"; 
	$colonne = "id_pers";
	$colonne2 = "id_frait";
	$colonne3 = "id_classe";
	$colonne4 = "id_annee";

	$val_recuperer1 = "nom_pers";
	$val_recuperer2 = "prenom_pers";
	$val_recuperer3 = "sexe_pers";
	$val_recuperer4 = "montant";
	$val_recuperer5 = "id_classe";
	$val_recuperer6 = "lib_classe";
	$val_recuperer7 = "prix";
	$val_recuperer8 = "lib_annee";

    $nom_pers = getChampsUsers($val_recuperer1, $table1, $colonne, $p['id_etu']);
    $prenom_pers = getChampsUsers($val_recuperer2, $table1, $colonne, $p['id_etu']);
    $sexe_pers = getChampsUsers($val_recuperer3, $table1, $colonne, $p['id_etu']);
    $id_classe = getChampsUsers($val_recuperer5, $table1, $colonne, $p['id_etu']);
    
    $avance = getChampsParametrage($val_recuperer4, $table2, $colonne2, $p['id_frait']);

    $lib_classe = getChampsParametrage($val_recuperer6, $table3, $colonne3, $id_classe);

    $prix_classe = getChampsParametrage($val_recuperer7, $table3, $colonne3, $id_classe);

    $reste = $prix_classe - $avance;


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
											<th style="text-align:left">COMPLEXE SCOLAIRE </th>
											<th style="width:20%;"></th>
											<th style="text-align:right">REPUBLIQUE CONGOLAISE</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align:left; padding-left:10px"> <b>  DORCACE & BENIE  </b></td>
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
											<td style="width:25%; text-align:left">(Paiement) <span class="text-danger"><b>N° <?php echo $id_paye ?></b></span><br> <br>Année Académique : <span class="text-success"><b><?php echo getChampsParametrage($val_recuperer8, $table4, $colonne4, $p['id_annee']);?></b></span></td>
										</tr>
									</tbody>
								
								</table>
								
							  
								<hr />

									<p>Le gestionnaire de la direction de la scolarité et des Examens, soussigné déclare avoir recu de </p>
									<p>M................   <?php echo $nom_pers.' '.$prenom_pers;?> </p>
									<p>Classe : .....   <?php echo $lib_classe ?> <p>
									<p>La somme de <?php echo $avance; ?> comme avance et lui reste <?php echo $reste; ?></p> 
									<p>Mois : ........ <?php if($p['mois'] == "1"){
                                                                            echo 'Janvier';
                                                                        }else if($p['mois']=="2"){
                                                                            echo 'Fevrier';
                                                                        }else if($p['mois']=="3"){
                                                                            echo 'Mars';
                                                                        }else if($p['mois']=="4"){
                                                                            echo 'Avril';
                                                                        }else if($p['mois']=="5"){
                                                                            echo 'Mais';
                                                                        }else if($p['mois']=="6"){
                                                                            echo 'Juin';
                                                                        }else if($p['mois']=="7"){
                                                                            echo 'Juillet';
                                                                        }else if($p['mois']=="8"){
                                                                            echo 'Août';
                                                                        }else if($p['mois']=="9"){
                                                                            echo 'Septembre';
                                                                        }else if($p['mois']=="10"){
                                                                            echo 'Octobre';
                                                                        }else if($p['mois']=="11"){
                                                                            echo 'Novembre';
                                                                        }else{
                                                                            echo 'Décembre';
                                                                        } 
                                                        ?> 
                                 	</p>
																	
								<page_footer>
								  	<hr/>
								  		<p style="text-align:right">Le Gestionnaire <?php echo getChampsUsers($val_recuperer2, $table1, $colonne, $p['id_pers']).' '.getChampsUsers($val_recuperer1, $table1, $colonne, $p['id_pers'])?>
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
