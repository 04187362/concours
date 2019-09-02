<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/users/modeles/methodeUsers.php");
    include("globale/verification.php");
?>

<?php 

  $table = "emploi_temps";
  $table1 = "classe";
  $colonne ="id_classe";
  
  if(isset($_GET['cood']) && existanceGestion($table, $colonne, $_GET['cood'])){

    $id_classe=htmlspecialchars($_GET['cood']);

    $val_recuperer1 = "lib_classe";

    $lib_classe = getChampsGestion($val_recuperer1, $table1, $colonne, $id_classe);

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

									<h4 style="font-family:Lucida Calligraphy;font-size:17px;text-align:center">EMPLOI DU TEMPS DE LA <b><?php echo $lib_classe; ?></span></h4>
								
								
								<hr/>
								
								<br><br>
								
								<table style="border:1px solid black;width:100%" class="table table-striped">
									<thead>
									<tr style="border:1px solid black;">
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Horaire</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Lundi</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Mardi</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Mercredi</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Jeudi</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Vendredi</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center; padding:10px">Samedi</th>								
									</tr>

									</thead>
									<tbody>
												<?php
                                                $requete ="SELECT * FROM emploi_temps e, classe c
                                                            WHERE c.id_classe = e.id_classe
                                                            AND c.id_classe = '$id_classe'";
                                                
                                                $resultat = Selection($requete); 
                                                foreach($resultat as $tablo){

                                                    $val_recuperer4 ="lib_matiere";
                                                    $table4 = "matiere";
                                                    $colonne4 = "id_matiere"; 

                                                    $val_recuperer2 ="nom_pers";
                                                    $val_recuperer3 ="prenom_pers";
                                                    $table3 = "personne";
                                                    $colonne2 = "id_pers";  
                                            ?>
                                            <tr>
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px"><?php echo $tablo['heure_debut'].'-'.$tablo['heure_fin']; ?></td>
                                                <?php
				                                  $table3 = "enseigner";
				                                  $colonne3 = "id_matiere";
				                                  $get_value3 = "id_ens";
				                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
				                                  if($id_personne == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['lundi'])){ 
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px" class="text-primary">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['lundi']).'</td>';
				                                  }else{
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['lundi']).'</td>';
				                                  }
				                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
				                                  if($id_personne == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['mardi'])){ 
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px" class="text-primary">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['mardi']).'</td>';
				                                  }else{
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['mardi']).'</td>';
				                                  }
				                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
				                                  if($id_personne == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['mercredi'])){ 
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px" class="text-primary">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['mercredi']).'</td>';
				                                  }else{
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['mercredi']).'</td>';
				                                  }

				                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
				                                  if($id_personne == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['jeudi'])){ 
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px" class="text-primary">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['jeudi']).'</td>';
				                                  }else{
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['jeudi']).'</td>';
				                                  }

				                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
				                                  if($id_personne == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['vendredi'])){ 
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px" class="text-primary">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['vendredi']).'</td>';
				                                  }else{
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['vendredi']).'</td>';
				                                  }

				                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
				                                  if($id_personne == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['samedi'])){ 
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px" class="text-primary">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['samedi']).'</td>';
				                                  }else{
				                                  	echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:10px">'.getChampsParametrage($val_recuperer4, $table4, $colonne4, $tablo['samedi']).'</td>';
				                                  }

				                                  ?>
				                                  
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
