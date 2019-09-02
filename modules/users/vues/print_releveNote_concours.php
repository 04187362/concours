<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/users/modeles/methodeUsers.php");
    include("globale/verification.php");

    $requests = "SELECT lib_annee FROM annee_academique WHERE id_annee =?";
    $paramaters = array($id_an);

    $libelle_anneeAc = getChampsParametrage($requests, $paramaters);
?>

<?php
                  
                  $id_pers = htmlentities(htmlspecialchars($_GET['cood']));
                  $requete = "SELECT * FROM personne p, filiere f 
                  WHERE p.id_filiere = f.id_filiere 
                  AND id_pers=?";
                  $param = array($id_pers);

                  if(isset($_GET['cood']) && existanceUsers($requete,$param)){

                    $p = selection_condition($requete,$param);

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

		<title>Bulletin de l'etudiant</title>

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
		
		<div class="container-fluid" id="content" style="border:2px solid black; padding:2px">	

			<div id="main">
				<div class="container-fluid">			
					<div class="row">
						<div class="col-sm-12">
							<div class="box box-bordeblack">
							
								<table style="width:100%">
									<tbody>
										<tr>
											<td style="text-align:center;font-size:10px">INSTITUT NATIONAL DE LA POSTE, DES TECTHNIQUES </td>
											<td style="width:20%;"></td>
											<td style="text-align:center;font-size:10px">REPUBLIQUE GABONAISE</td>
										</tr>
										<tr>
											<td style="text-align:center;font-size:10px">DE L'INFORMATION ET DE LA COMMUNICATION </td>
											<td style="width:20%;"></td>
											<td style="text-align:center">------------</td>
										</tr>
										<tr>
											<td style="text-align:left"></td>
											<td style="width:30%;"></td>
											<td style="text-align:center;font-size:10px">Union * travail * Justice</td>
										</tr>
									</tbody>
								</table>
								<br>
								<hr />
									<h4 style="font-size:14px;text-align:center">BULLETIN DE NOTES</span></h4>
                                <p style="font-family:Lucida Calligraphy;text-align:center">Année académique <?php echo $libelle_anneeAc; ?></span></p>
                                <table style="width:100%">
									<thead>
										<tr>
											<th colspan="2" style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center; padding:5px"> Filière : <?php echo $p['lib_filiere']; ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:5px">Nom(s) et Prénom(s)</td>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:5px"><b class="text-primary"><?php echo $p['nom_pers'].' '.$p['prenom_pers'];?></b></td>
										</tr>
										<tr>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:5px">Date et lieu de naissance</td>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:5px"><?php echo date('d-m-Y', strtotime($p['date_nais_etu'])).' à '.$p['lieu_nais_etu'];?></td>
										</tr>
									</tbody>
								
								</table>
							  	
								<br>
								
								<table style="border:1px solid black;width:100%" class="table table-striped">
									<thead>
									<tr style="border:1px solid black;">
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center; padding:5px">Matières</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Coefficients</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Notes</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Mentions</th>								
									</tr>

									</thead>
									<tbody>
										<?php
                                                                    
                                                                    $moyenne_general = 0;
                                                                    $moyenne = 0;
                                                                    $id_filiere = $p['id_filiere'];
                                                                    $sql1 ="SELECT * FROM matiere_concours m, programme_concours p, filiere f
                                                                            WHERE m.id_matiere = p.id_matiere 
                                                                            AND p.id_filiere = f.id_filiere
                                                                            /*AND c.id_anneeAc = a.id_annee*/
                                                                            AND f.id_filiere=?
                                                                            AND id_annee=?";

                                                                    $requete1 = AfficherTout($sql1); 
                                                                    $param1 = array($id_filiere,$id_an);
                                                                    //exécution de la requête de sélection et retour des résultats
                                                                    $requete1->execute($param1);
                                                                    //Conservation lignes par ligne des élements retournés
                                                                    while($tab=$requete1->fetch()){ 
                                                                        //Calcule de la moyenne du candidat
                                                                        $sql2 = "SELECT sum(note*coef) as moyenne, coef, note, lib_matiere
                                                                        FROM personne e, composer_concours c, matiere_concours m, programme_concours p, filiere f, annee_academique a
                                                                        WHERE e.id_pers = c.id_candidat 
                                                                        AND c.id_matiere = m.id_matiere
                                                                        AND m.id_matiere = p.id_matiere 
                                                                        AND p.id_filiere = f.id_filiere
                                                                        AND f.id_filiere= e.id_filiere
                                                                        AND c.id_anneeAc = a.id_annee
                                                                        AND id_pers = ?
                                                                        AND f.id_filiere=?
                                                                        AND c.id_anneeAc=?
                                                                        AND m.id_matiere=?";
                                                                        $param2 = array($id_pers,$id_filiere, $id_an,$tab['id_matiere']);
                                                                        $requete2 = AfficherTout($sql2);
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $requete2->execute($param2);
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$requete2->fetch()){ $moyenne = $moyenne + $tablo['moyenne']; 
                                                                        echo'<tr>
                                                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px">'.$tablo['lib_matiere'].'</td>';
                                                                                    if(!empty($tablo['coef'])){
                                                                                        echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px">'.$tablo['coef'].'</td>';
                                                                                    }else{ 
                                                                                        //Recuperation du coefficient d'une matiere 
                                                                                        $requete3 = "SELECT coef FROM programme_concours WHERE id_matiere = ? AND id_filiere =?";
                                                                                        $parameter = array($tab['id_matiere'],$id_filiere);
                                                                                        echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px">'.getChampsParametrage($requete3,$parameter).'</td>';
                                                                                   } 

                                                                                   if(!empty($tablo['note'])){ 
                                                                                        echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px">'.number_format($tablo['note'],2).'</td>';
                                                                                   }else{ 
                                                                                        echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px">0.00</td>';
                                                                                   } 
                                                                                echo '<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px">';
                                                                                      if($tablo['note'] < 10 ){ 
                                                                                             echo '<p>Insufisante</p>';
                                                                                      }else if($tablo['note'] >=10 && $tablo['note'] <12){ 
                                                                                        echo '<p>Passable</p>';
                                                                                      }else if($tablo['note'] >=12 && $tablo['note'] <14){ 
                                                                                        echo '<p>Assez bien</p>';
                                                                                      }else if($tablo['note'] >=14 && $tablo['note'] < 16){ 
                                                                                        echo '<p>Bien</p>';
                                                                                      }else if($tablo['note'] >=16 && $tablo['note'] < 18){
                                                                                        echo '<p>Très bien</p>';
                                                                                      }else if($tablo['note'] >=18 && $tablo['note'] <20){ 
                                                                                        echo '<p>Excelente</p>';
                                                                                      }else{ 
                                                                                        echo '<p>Honorable</p>';
                                                                                      }   
                                                                             echo '</td>
                                                                                  
                                                                            </tr>';
                                                                       }
                                                                        //$moyenne = $moyenne + getNombreLigneGestion($sql2,$param2);
                                                                        
                                                                        //Calcule de la somme des coeficient d'une filiere
                                                                        $sql3="SELECT sum(coef) as effectif 
                                                                            FROM programme_concours 
                                                                            WHERE id_filiere =?";
                                                                        $param3 = array($id_filiere);
                                                                        //Calcule la somme des coefficients des matieres qui sont programmés dans une filiere.
                                                                        $somme_coef = getNombreLigneGestion($sql3,$param3);  
                                                                        //Calcule la moyenne des etudiants.
                                                                        $moyenne_general = ($moyenne/$somme_coef);
                                                                
											 } ?>
											<tr><td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px"><b>Total</b></td><td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px"><?php echo $somme_coef; ?></td><td colspan="2"></td></tr>
											
											<tr>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px" class="text-primary">Moyenne de l'etudiant</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px; background-color:#DDD" class="text-danger"><?php echo number_format($moyenne_general, 2) ?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black">Max.concours</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px; background-color:#DDD">
                                                    <b>
                                                        <?php 
                                                                                 //Recuperation de la moyenne du major 
                                                                                $sql7 = "SELECT max(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param7 = array($p['id_filiere'], $id_an);
                                                                                echo number_format(getChampsGestion($sql7, $param7),2); 
                                                        ?>
                                                    </b>
                                                </td>

											</tr>
											<tr>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px" class="text-primary">Rang de l'etudiant</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px; background-color:#DDD">
                                                    <?php
                                                                                //Recuperation du rang du candidat
                                                                                $sql6 = "SELECT rang FROM composer_concours WHERE id_candidat=? AND id_anneeAc=?";
                                                                                $param6 = array($id_pers,$id_an);
                                                                                echo  getChampsGestion($sql6, $param6);
                                                   ?>
                                                </td>
												<td style="font-family:cambria;text-align:center;border:1px solid black">Moy.concours</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px; background-color:#DDD">
                                                    <b>
                                                        <?php

                                                                             //Calcule de la moyenne du concours
                                                                             //Recuperation de la moyenne du major 
                                                                                $sql10 = "SELECT max(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param10 = array($p['id_filiere'], $id_an);
                                                                                $moyenne_major = getChampsGestion($sql10, $param10);
                                                                                 //Recuperation de la moyenne du minor 
                                                                                $sql11 = "SELECT min(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param11 = array($p['id_filiere'], $id_an);
                                                                                $moyenne_minor = getChampsGestion($sql11, $param11);

                                                                            echo number_format(($moyenne_minor+$moyenne_major)/2, 2); 
                                                         ?>
                                                    </b>
                                                </td>
											</tr>
											<tr>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px" class="text-primary">Effectif des candidats</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px; background-color:#DDD">
                                                    <?php 
                                                                            // Calcule du nombre de candidat
                                                                            $sql5 = "SELECT count(*) FROM personne WHERE id_filiere =? AND type_pers='Candidat'";
                                                                            $param5=array($id_filiere);
                                                                            echo getNombreLigneGestion($sql5,$param5); 
                                                                        ?>
                                                </td>
												<td style="font-family:cambria;text-align:center;border:1px solid black">Min.concours</td>
												<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px; background-color:#DDD">
                                                    <b>
                                                                            <?php 
                                                                                 //Recuperation de la moyenne du minor 
                                                                                $sql8 = "SELECT min(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param8 = array($p['id_filiere'], $id_an);
                                                                                echo number_format(getChampsGestion($sql8, $param8),2);
                                                                            ?>
                                                    </b>
                                                </td>
											</tr>
										
									</tbody>
								
								</table>

								<table style="border:1px solid black;width:100%" class="table table-striped">
									<tr>
										<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px">Décision du conseil des professeurs</td>
										<td style="font-family:cambria;text-align:center;border:1px solid black; padding:5px; background-color:#DDD">
											<?php
                                                                        // Recuperation de la myenne d'admission du trimestre I
                                                                        $sql4 = "SELECT moyenne_admission FROM filiere WHERE id_filiere=?";
                                                                        $param4 = array($id_filiere);
                                                                        $moyenne_admission= getChampsParametrage($sql4, $param4);
                                                                        //On compare la moyenne d'admission à celle de l'etudiant. 
                                                                        if($moyenne_general >= $moyenne_admission){ 
                                                                            if($tablo['sexe_pers'] =="Femme"){
                                                                                echo '<b>Admise au concours</b>';
                                                                            }else{
                                                                                echo '<b>Admis au concours</b>';
                                                                            }
                                                                                                                    
                                                                        }else{
                                                                            if($tablo['sexe_pers'] =="Femme"){
                                                                                echo '<b>Ajournée</b>';
                                                                            } else{
                                                                                echo '<b>Ajourné</b>';
                                                                            } 
                                                                                                                    
                                                                        }
                                                                    ?> 
										</td>
									</tr>
									<tr>
										
									</tr>
								</table>
									<br/>
																	
								<page_footer>
								     	<p style="text-align:right">Fait à Libreville, le <?php echo  date('d/m/Y'); ?>.</p>
                                         <br><br><br>
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
