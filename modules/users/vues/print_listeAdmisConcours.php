<?php
    
    include("connexion/connexiongenerale.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("globale/verification.php");
?>

<?php 
     $id_filiere=htmlentities(htmlspecialchars($_GET['cood']));
     $requete1 = "SELECT * FROM filiere WHERE id_filiere=?";
     $param1 = array($id_filiere);

     if(isset($_GET['cood']) && existanceGestion($requete1, $param1)){

         $requete2 = "SELECT lib_filiere FROM filiere WHERE id_filiere=?";
         $param2 = array($id_filiere);
         //Recuperation du nom et prenom de l'etudiant
         $lib_filiere = getChampsParametrage($requete2, $param2);
         //Recuperation du libellé de l'année academique.
         $requests = "SELECT lib_annee FROM annee_academique WHERE id_annee =?";
        $paramaters = array($id_an);
        $libelle_anneeAc = getChampsParametrage($requests, $paramaters);

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
							  
								<hr />
                                    <h4 class="text-center">NOTE DE SERVICE</h4>
									<p>
                                        Les etudiants dont les noms et prénoms suivent, sont declarés admis au concours d'entrée à l'Institut National de la Poste, des Technologies de l'Informatique et de la Communication session <?php echo date('Y'); ?> au benefice d'une bourse d'etude au titre de l'année académique <?php echo $libelle_anneeAc; ?>
									</p>
                                    <h4 class="text-center">Filière : <?php echo $lib_filiere; ?></h4>
								
								<br>
								
								<table style="border:1px solid black;width:100%" class="table table-striped">
									<thead>
									<tr style="border:1px solid black;">
                                        <th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">N°</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center; padding:2px">Noms</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Prénoms</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Moyennes</th>
										<th style="font-family:cambria;width:10%;border:1px solid black;background:#e6e6e6;text-align:center">Mentions</th>							
									</tr>

									</thead>
									<tbody>
                                            <?php 
                                                $nombre_dmis = 0;
                                                $moyenne_general = 0;
                                                $sql = "SELECT sum(note*coef) as moyenne, nom_pers, prenom_pers, id_pers, sexe_pers
                                                    FROM personne e, composer_concours c, matiere_concours m, programme_concours p, filiere f, annee_academique a
                                                    WHERE e.id_pers = c.id_candidat 
                                                    AND c.id_matiere = m.id_matiere
                                                    AND m.id_matiere = p.id_matiere 
                                                    AND p.id_filiere = f.id_filiere
                                                    AND f.id_filiere = e.id_filiere
                                                    AND c.id_anneeAc = a.id_annee
                                                    AND f.id_filiere = ?
                                                    GROUP BY id_pers";

                                                    $requete = AfficherTout($sql); 
                                                    $param = array($id_filiere);
                                                    //exécution de la requête de sélection et retour des résultats
                                                    $requete->execute($param);
                                                    //Conservation lignes par ligne des élements retournés
                                                while($tablo=$requete->fetch()){
                                                        //Calcule la somme des coefficients des matieres qui sont programmés dans une filiere.
                                                         $requete3="SELECT sum(coef) as effectif 
                                                            FROM programme_concours 
                                                            WHERE id_filiere =?";
                                                        $param3 = array($id_filiere);
                                                        $somme_coef = getNombreLigneGestion($requete3,$param3);  
                                                        //Calcule la moyenne des etudiants.
                                                        $moyenne_general = ($tablo['moyenne']/$somme_coef);

                                                        // Mise a jour de la moyenne du candidat.
                                                        updateMoyenneCandidat($tablo['id_pers'], $moyenne_general);
                                                        //Mise a jour des rang des candidat de la filiere selectionnée.
                                                        rangCandidat($id_filiere, $id_an);
                                                        // Recuperation de la myenne d'admission du trimestre I
                                                        $requete4 = "SELECT moyenne_admission FROM filiere WHERE id_filiere=?";
                                                        $param4 = array($id_filiere);
                                                        $moyenne_admission= getChampsParametrage($requete4, $param4);

                                                        if($moyenne_general>=$moyenne_admission){
                                                        //On compte le ombre d'admis au concours
                                                        $nombre_dmis++;
                                                        //On recuperère le rang des etudiants
                                                        $requete5 = "SELECT rang FROM composer_concours WHERE id_candidat=?";
                                                        $param5 = array($tablo['id_pers']);
                                                        $rang = getChampsUsers($requete5, $param5);
                                                ?>
											<tr style="border:1px solid black">
                                                <td style="font-family:cambria;text-align:center;border:1px solid black; padding:2px"><?php echo $rang;?></td>
												<td style="font-family:cambria;border:1px solid black; padding:2px"><?php echo $tablo['nom_pers'];?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black"><?php echo $tablo['prenom_pers'];?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black"><?php echo number_format($moyenne_general,2);?></td>
												<td style="font-family:cambria;text-align:center;border:1px solid black">
                                                    <?php 
                                                            if($moyenne_general < 10 ){ 
                                                                echo '<p>Insuffisant</p>'; 
                                                            }else if($moyenne_general>=10 && $moyenne_general <12){ 
                                                                echo '<p>Passable</p>'; 
                                                            }else if($moyenne_general >=12 && $moyenne_general <14){ 
                                                                echo '<p>Assez bien</p>'; 
                                                            }else if($moyenne_general >=14 && $moyenne_general< 16){ 
                                                                echo '<p>Bien</p>'; 
                                                            }else if($moyenne_general >=16 && $moyenne_general < 18){ 
                                                                echo '<p>Très bien</p>'; 
                                                            }else if($moyenne_general >=18 && $moyenne_general <20){ 
                                                                echo '<p>Excelent</p>'; 
                                                            }else{ 
                                                                echo '<p>Honorable</p>'; 
                                                            }
                                                        ?>
                                                </td>
                                                
											</tr>
                                            <?php } } ?>

									</tbody>
								
								</table>
									
                                        <?php 
                                            if($nombre_dmis > 1){
                                                echo '<p>Arreté la presente liste à l\'effectif de : '.$nombre_dmis.' candidats</p>';
                                            }else{
                                                echo '<p>Arreté la presente liste à l\'effectif de : '.$nombre_dmis.' candidat</p>';
                                            }
                                        ?> 
                                    <p>La présenete note de service prend effet à compter de la note de signature.</p>
									<br/>
																	
								<page_footer>
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
