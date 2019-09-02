<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("globale/verification.php");
?>

<?php 
     $id_pers=htmlentities(htmlspecialchars($_GET['cood']));
     $requete1 = "SELECT * FROM personne WHERE id_pers=?";
     $param1 = array($id_pers);

     if(isset($_GET['cood']) && existanceGestion($requete1, $param1)){

         $requete2 = "SELECT nom_pers FROM personne WHERE id_pers=?";
         $param2 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $nom_pers = getChampsParametrage($requete2, $param2);

         $req3 ="SELECT prenom_pers FROM personne WHERE id_pers=?";
         $param3 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $prenom_pers = getChampsParametrage($req3, $param3);

         $req4 ="SELECT date_nais_etu FROM personne WHERE id_pers=?";
         $param4 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $date_nais_etu = getChampsParametrage($req4, $param4);

         $req5 ="SELECT lieu_nais_etu FROM personne WHERE id_pers=?";
         $param5 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $lieu_nais_etu = getChampsParametrage($req5, $param5);
         
         $req6 ="SELECT niv_etu_univ FROM personne WHERE id_pers=?";
         $param6 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $niv_etu_univ = getChampsParametrage($req6, $param6);

         $req7 ="SELECT lib_filiere FROM personne p,filiere f WHERE p.id_filiere=f.id_filiere AND id_pers=?";
         $param7 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $lib_filiere = getChampsParametrage($req7, $param7);


         $req8 ="SELECT lib_pays FROM personne p, pays pa WHERE p.code_pays=pa.code_pays AND id_pers=?";
         $param8 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $lib_pays = getChampsParametrage($req8, $param8);
         
         $req9 ="SELECT lib_annee FROM personne p,annee_academique l WHERE p.id_annee=l.id_annee AND id_pers=?";
         $param9 = array($id_pers);
         //Recuperation du nom et prenom de l'etudiant
         $lib_annee = getChampsParametrage($req9, $param9);
         //$montant = getChampsParametrage($requete2, $param2);
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
											<td style="width:25%; text-align:left">(Inscription) <span class="text-danger"><b>N° <?php echo $id_pers ?></b></span><br> <br>Année Académique : <span class="text-success"><b><?php echo $lib_annee;?></b></span></td>
										</tr>
									</tbody>
								
								</table>
								
							  
								<hr/>
								    <h3 style="text-align:center">Certificat d'inscription</h3>
                                    <p>Je soussigné, Directeur de l'INPTIC atteste que par la présente note que Monsieur/Madame 
                                    <?php echo $nom_pers.' '.$prenom_pers;?> né le <?php echo $date_nais_etu; ?> à <?php echo $lieu_nais_etu; ?>
                                    (<?php echo $lib_pays; ?>), étudiant inscrit en <?php echo $niv_etu_univ; ?> du Cycle de formation
                                    <?php echo $lib_filiere; ?> au titre de l'année universitaire <?php echo $lib_annee; ?>.</p>
									
																	
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
