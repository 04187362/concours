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

                  $id_pers = htmlentities(htmlspecialchars($_GET['cood1']));
                  $id_niveauetude = htmlentities(htmlspecialchars($_GET['cood2']));
                  $semestre = htmlentities(htmlspecialchars($_GET['cood3']));

                  $requete = "SELECT * FROM composer c, personne p 
                              WHERE c.id_etu = p.id_pers
                              AND id_etu=? 
                              AND id_niveauetude=?
                              AND semestre =?";
                  $param = array($id_pers,$id_niveauetude,$semestre);

                  if(isset($_GET['cood1']) && isset($_GET['cood2']) && isset($_GET['cood3']) && existanceUsers($requete,$param)){
                    $requete1 = "SELECT * FROM personne WHERE id_pers=?";
                    $param1 = array($id_pers);
                    $p = selection_condition($requete1,$param1);
                    //Recuperation du libellé du niveau d'etude
                    $requete2 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
                    $param2 = array($id_niveauetude);
                    $lib_niveauetude=getChampsParametrage($requete2,$param2);
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
		
		<div class="container-fluid" id="content">	

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
									<h4 style="font-family:Lucida Calligraphy;font-size:17px;text-align:center"><b>Bulletin de notes du <?php echo $semestre; ?></b></span></h4>
									<p style="font-family:Lucida Calligraphy;text-align:center">Année universitaire <?php echo $libelle_anneeAc; ?></span></p>
								<table style="width:100%">
									<thead>
										<tr>
											<th colspan="2" style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center; padding:2px"> Classe : <?php echo $lib_niveauetude; ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:2px">Nom(s) et Prénom(s)</td>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:2px"><b class="text-primary"><?php echo $p['nom_pers'].' '.$p['prenom_pers'];?></b></td>
										</tr>
										<tr>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:2px">Date et lieu de naissance</td>
											<td style="font-family:cambria;width:10%;border:1px solid black;padding:2px"><?php echo date('d-m-Y', strtotime($p['date_nais_etu'])).' à '.$p['lieu_nais_etu'];?></td>
										</tr>
									</tbody>
								
								</table>
								
								<br>
								
								<table style="border:1px solid black;width:100%">
									<thead>
									<tr>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center; padding:2px">Matières</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Coefficients</th>
                                        <th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Crédits</th>
                                        <th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Notes</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Mentions</th>
										<th style="font-family:cambria;border:1px solid black;background:#e6e6e6;text-align:center">Enseignants</th>								
									</tr>

									</thead>
									<tbody>
										<?php 
											$moyenne_finaleUE = 0;
											$compteUE = 0;
                                            //Regroupement des UE programmé dans un niveau d'etude
                                            $sql4="SELECT * FROM personne e, composer c, matiere m, programme p, niveau_etude n, annee_academique a
                                                   WHERE e.id_pers = c.id_etu 
                                                   AND c.id_matiere = m.id_matiere 
                                                   AND m.id_matiere = p.id_matiere 
                                                   AND p.id_niveauetude = n.id_niveauetude
                                                   AND n.id_niveauetude = e.id_niveauetude
                                                   AND c.id_anneeAc = a.id_annee
                                                   AND n.id_niveauetude = ?
                                                   AND semestre = ?
                                                   AND id_pers = ?
                                                   AND c.id_anneeAc=?
                                                   GROUP BY id_pers, c.id_ue";
                                            $requete4= AfficherTout($sql4);
                                            $param4= array($id_niveauetude,$semestre,$id_pers,$id_an); 
                                            //exécution de la requête de sélection et retour des résultats
                                            $requete4->execute($param4);
                                            foreach($requete4 as $p4){
												$compteUE++;
												$id_ue = $p4['id_ue'];
                                                //Recuperation du libellé de l'U.E.
                                                $request = "SELECT lib_ue FROM unite_enseignement WHERE id_ue=?";
                                                $params = array($id_ue);
                                                echo '<tr><td style="font-family:cambria;border:1px solid black;padding:2px" colspan="6"><em><b>U.E - '.$compteUE.' : </b>'.getChampsParametrage($request,$params).'</em></td></tr>';
                                                                        
                                                $somme_note = 0;
                                                                        
                                                $sql5 ="SELECT *
                                                        FROM personne e, composer c, matiere m, programme p, niveau_etude n, annee_academique a
                                                        WHERE e.id_pers = c.id_etu 
                                                        AND c.id_matiere = m.id_matiere 
                                                        AND m.id_matiere = p.id_matiere 
                                                        AND p.id_niveauetude = n.id_niveauetude
                                                        AND n.id_niveauetude = e.id_niveauetude
                                                        AND c.id_anneeAc = a.id_annee
                                                        AND n.id_niveauetude = ?
                                                        AND semestre = ?
                                                        AND id_pers = ?
                                                        AND c.id_anneeAc=?
                                                        AND c.id_ue=?
                                                        GROUP BY id_pers, m.id_matiere";
                                                $requete5 = AfficherTout($sql5);
                                                $param5 = array($id_niveauetude,$semestre,$id_pers,$id_an,$id_ue); 
                                                //exécution de la requête de sélection et retour des résultats
                                                $requete5->execute($param5);
												foreach($requete5 as $p){
                                            		//On recupere la note de l'examen et du devoir de la matiere
                                                    $note_examen = getNoteExamenEtudiant($p['id_pers'], $p['semestre'], $p['id_matiere']);
                                                    $note_devoir = getNoteDevoirEtudiant($p['id_pers'], $p['semestre'], $p['id_matiere']);
                                                    //On recupere le coefficient de la matière du niveau d'etude de l'etudiant
                                                    $coef_matiere = getCoefficientMatiere($p['id_matiere'], $id_niveauetude); 
                                                    //On recupere le credit de la matière du niveau d'etude de l'etudiant
                                                    $credit_matiere = getCreditMatiere($p['id_matiere'], $id_niveauetude);
                                                                            
                                                    $note_final = ($note_examen + $note_devoir)/2;
                                            		// Calcule de la somme des note;
                                                	$somme_note = $somme_note + (($note_examen + $note_devoir)/2)*$coef_matiere;
                                              echo' <tr>
                                                    	<td style="font-family:cambria;border-right:1px solid black;padding:2px">'.$p['lib_matiere'].'</td>
                                                        <td style="font-family:cambria;border-right:1px solid black;text-align:center">'.$coef_matiere.'</td>
                                                        <td style="font-family:cambria;border-right:1px solid black;text-align:center">'.$credit_matiere.'</td>
                                                        <td style="font-family:cambria;border-right:1px solid black;text-align:center">'.number_format($note_final,2).'</td>
                                                        <td style="font-family:cambria;border-right:1px solid black;text-align:center">';

                                                        if($note_final < 10 ){ 
                                                            echo '<p>Insufisant</p>';
                                                        }else if($note_final >=10 && $note_final <12){ 
                                                            echo '<p>Passable</p>';
                                                        }else if($note_final >=12 && $note_final <14){ 
                                                            echo '<p>Assez bien</p>';
                                                        }else if($note_final >=14 && $note_final < 16){ 
                                                        	echo '<p>Bien</p>';
                                                        }else if($note_final >=16 && $note_final < 18){ 
                                                            echo '<p>Très bien</p>';
                                                        }else if($note_final >=18 && $note_final <20){ 
                                                            echo '<p>Excelent</p>';
                                                        }else{ 
                                                            echo '<p>Honorable</p>';
                                                        } 
                                                 echo '</td>
                                                       <td style="font-family:cambria;border-right:1px solid black;text-align:center; padding:2px">';
                                                           //Recuperation du nom et prenom de l'enseignant qui de la matière affectée
                                                            $requete6 = "SELECT * FROM enseigner e, personne p WHERE p.id_pers=e.id_ens AND id_matiere=?";
                                                            $param6 = array($p['id_matiere']);
                                                            $enseignant = selection_condition($requete6,$param6);
                                                            echo $enseignant['nom_pers'].' '.$enseignant['prenom_pers'];        
                                                echo '</td>
                                                    </tr>';
                                                }
												//Recuperation de la somme des coefficients des matières de l'UE.
                                                $somme_coefUE = getSommeCoefficientMatiereUE($id_ue,$id_niveauetude);
                                                //Recuperation de la somme des credits des matières de l'UE.
                                                $somme_creditUE = getSommeCreditMatiereUE($id_ue,$id_niveauetude);
                                                //Determination de la moyenne finale de l'U.E.
                                                $moyenne_finaleUE = $moyenne_finaleUE + number_format($somme_note/$somme_coefUE,2);
                                                echo '<tr>
                                                          <th style="font-family:cambria;border-right:1px solid black;border-top:1px solid black;text-align:center; padding:2px"><em>Moyenne U.E - '.$compteUE.'</em></th>
														  <td style="font-family:cambria;border-right:1px solid black;border-top:1px solid black;text-align:center; padding:2px">'.$somme_coefUE.'</td>
														  <td style="font-family:cambria;border-right:1px solid black;border-top:1px solid black;text-align:center; padding:2px">'.$somme_creditUE.'</td>
                                                          <th style="font-family:cambria;border-right:1px solid black;border-top:1px solid black;text-align:center; padding:2px"><em>'.number_format($somme_note/$somme_coefUE,2).'</em></th>
                                                          <td style="font-family:cambria;border-right:1px solid black;text-align:center; padding:2px"></td><td style="font-family:cambria;border-right:1px solid black;text-align:center; padding:5px"></td>
                                                       </tr>';
											}

											//On compte le nombre de U.E enseigné dans un niveau d'etude.
									        $nombreUE = nombreUE($id_niveauetude);
                                            //Determination de la moyenne generale
                                            $moyenne_generale = number_format($moyenne_finaleUE/$nombreUE,2);

										?>                    	
									</tbody>
								</table>
								<br>
                                <table style="border:1px solid black;width:100%">
                                    <?php
										echo '<tr>
                                                  <td style="font-family:cambria;border:1px solid black;text-align:center; padding:2px"><b>Moyenne de l\'étudiant</b></td>
                                                  <td style="font-family:cambria;border:1px solid black;text-align:center; padding:2px;background:#e6e6e6"><b> '.$moyenne_generale.' </b></td>
                                                  <td style="font-family:cambria;border:1px solid black;text-align:center; padding:2px"><b> Rang de l\'etudiant </b></td>
                                                  <td style="font-family:cambria;border:1px solid black;text-align:center; padding:2px;background:#e6e6e6">
												  	<b>';
													  //Recuperation du rang de l'etudiant
                                                        $requete7 = "SELECT rang FROM composer WHERE id_etu=? AND semestre =?";
                                                        $param7 = array($id_pers,$semestre);
                                                        echo  getChampsGestion($requete7,$param7);
													echo 'è / '.getNombreEtudiantInscription($id_niveauetude).' </b>
												  </td>
												  <td style="font-family:cambria;border:1px solid black;text-align:center; padding:2px"> Mention </td>
                                                  <td style="font-family:cambria;border:1px solid black;text-align:center; padding:2px">
												  	<b>';
													  	if($moyenne_generale < 10 ){ 
                                                             echo 'Insufisant';
                                                         }else if($moyenne_generale >=10 && $moyenne_generale <12){ 
                                                            echo 'Passable';
                                                         }else if($moyenne_generale >=12 && $moyenne_generale <14){ 
                                                            echo 'Assez bien';
                                                         }else if($moyenne_generale >=14 && $moyenne_generale < 16){ 
                                                            echo 'Bien';
                                                         }else if($moyenne_generale >=16 && $moyenne_generale < 18){ 
                                                            echo 'Très bien';
                                                         }else if($moyenne_generale >=18 && $moyenne_generale <20){ 
                                                            echo 'Excelent';
                                                         }else{ 
                                                        	echo 'Honorable';
                                                         } 
												  	echo '</b>
												  </td>
                                               </tr>
											   <tr>
                                                  <td style="width:26%;font-family:cambria;border:1px solid black;text-align:center; padding:2px"><b>Max.classe</b></td>
                                                  <td style="width:10%;font-family:cambria;border:1px solid black;text-align:center; padding:2px" class="bg-gray"><b> '.number_format(getMoyenneMajor($id_niveauetude, $semestre),2).' </b></td>
                                                  <td style="width:21%;font-family:cambria;border:1px solid black;text-align:center; padding:2px"> Moy.classe </td>
                                                  <td style="width:10%;font-family:cambria;border:1px solid black;text-align:center; padding:2px" class="bg-gray"><b>'.number_format((getMoyenneMajor($id_niveauetude,$semestre)+getMoyenneMinor($id_niveauetude, $semestre))/2,2).'</b></td>
												  <td style="width:15%;font-family:cambria;border:1px solid black;text-align:center; padding:2px"> Min.classe </td>
                                                  <td style="width:18%;font-family:cambria;border:1px solid black;text-align:center; padding:2px" class="bg-gray"><b> '.number_format(getMoyenneMinor($id_niveauetude, $semestre),2).' </b></td>
                                               </tr>';
									?>                       
                                </table>
								<hr/>
									<p>
										Décision du jury :
										<?php
											if($semestre =="Semestre I"){
                                                // Recuperation de lomyenne d'admission du trimestre I
                                                 $val_recuperer9 = "moy_trim1";
                                                 $moy_trim1= 10;//getChampsParametrage($val_recuperer9, $table9, $colonne9, $id_classe);
                                                 //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                 if($moyenne_generale >= $moy_trim1){ 
                                                       if($p['sexe_pers'] =="Femme"){
                                                            echo '<strong>Admise</strong>';
                                                        }else{
                                                            echo '<strong>Admis</strong>';
                                                        }                             
                                                }else{ 
                                                      if($p['sexe_pers'] =="Femme"){
                                                         echo 'Ajournée';
                                                 	  } else{
                                                          echo 'Ajourné';
                                                      } 
                                                } 
                                        	}else if($semestre =="Semestre II"){ 
                                                 // Recuperation de lomyenne d'admission du trimestre II
                                                  $val_recuperer10 = "moy_trim2";
                                                  $moy_trim2= 10;//getChampsParametrage($val_recuperer10, $table9, $colonne9, $id_classe);
                                                  //On compaare la moyenne d'admission à celle de l'etudiant.
                                                  if($moyenne_generale >= $moy_trim2){ 
                                                        if($p['sexe_pers'] =="Femme"){
                                                              echo 'Admise';
                                                         } else{
                                                              echo 'Admis';
                                                         } 
                                                  }else{ 
                                                        if($p['sexe_pers'] =="Femme"){
                                                               echo 'Ajournée';
                                                         } else{
                                                               echo 'Ajourné';
                                                         } 
                                                 } 
                                          }else{ 
                                               // Recuperation de lomyenne d'admission du trimestre III
                                               $val_recuperer11 = "moy_trim3";
                                               $moy_trim3= 10;//getChampsParametrage($val_recuperer11, $table9, $colonne9, $id_classe);
                                               //On compaare la moyenne d'admission à celle de l'etudiant.
                                               if($moyenne_generale >= $moy_trim3){ 
                                                     if($p['sexe_pers'] =="Femme"){
                                                        echo '<p class="text-center text-primary"><b>Admise</b></p>';
                                                     } else{
                                                        echo '<p class="text-center text-primary"><b>Admis</b></p>';
                                                     } 
                                               }else{ 
                                                     if($p['sexe_pers'] =="Femme"){
                                                         echo '<p class="text-danger text-center"><b>Ajournée<b></p>';
                                                     } else{
                                                         echo '<p class="text-danger text-center"><b>Ajourné<b></p>';
                                                     } 
                                            	} 
                                            }
										?>
									</p>
								<hr/>								
								<page_footer>
									<p style="text-align:right; font-size:10px">Fait à Libreville, le <?php echo date('d/m/Y'); ?></p>
									<p style="text-align:center; font-size:10px">LE irecteur Des Etuedes et de la Pedagogie</p>
									<br><br><br>
									<p style="text-align:center; font-size:8px">Il ne sera délivré qu'un seul et unique exemplaire du belletin de notes. L'etudiant est donc prié d'en faire plusieurs copies legalisées</p>
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
