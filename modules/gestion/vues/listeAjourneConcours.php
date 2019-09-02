<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultats du concours - GESET</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Bootstrap Table [ OPTIONAL ]-->
        <link href="plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
    </head>
    <body>
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <?php include("globale/entete.php"); ?>

                <?php 
                       $id_filiere=htmlentities(htmlspecialchars($_GET['cood']));
                        $requete1 = "SELECT * FROM filiere WHERE id_filiere=?";
                        $param1 = array($id_filiere);

                        if(isset($_GET['cood']) && existanceGestion($requete1, $param1)){

                          $requete2 = "SELECT lib_filiere FROM filiere WHERE id_filiere=?";
                          $param2 = array($id_filiere);
                          //Recuperation du nom et prenom de l'etudiant
                          $lib_filiere = getChampsParametrage($requete2, $param2);
                        }else{
                            header("location:index.php?modules=users&action=page_erreur");
                        }
                        
                ?>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">

                    <?php include("globale/menu2.php"); ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i><span style="font-family:Times New Roman"> Examens </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Resultats concours </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="font-family:Times New Roman"><b>Liste des candidats ajournés au concours</b></h3>
                            </div>
                                
                            <div class="panel-body">
                                <div class="bg-gray" style=" padding:10px; border-radius:10px">
                                    <p style"font-family:Forte; font-size:20px">Les etudiants dont les noms et prénoms suivent, sont declarés ajournés au concours d'entrée à l'Institut GESET session <?php echo date('Y'); ?>, ils ne beneficieront pas d'une bourse d'etude au titre de l'année académique <?php echo $libelle_anneeAc; ?></p>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Etudiants</th>
                                            <th class="text-center">Moyennes</th>
                                            <th class="text-center">Mentions</th>
                                            <th class="text-center">Décision du juri</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
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
                                                        $requete3="SELECT sum(coef) as effectif 
                                                            FROM programme_concours 
                                                            WHERE id_filiere =?";
                                                        $param3 = array($id_filiere);
                                                        //Calcule la somme des coefficients des matieres qui sont programmés dans une filiere.
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

                                                        if($moyenne_general < $moyenne_admission){
                                                        
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $tablo['nom_pers'].' '.$tablo['prenom_pers']; ?></td>
                                                    <td class="text-center"><?php echo number_format($moyenne_general,2); ?></td>
                                                    <td class="text-center">
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
                                                    <td class="text-center">
                                                        <?php 
                                                        //On compare la moyenne d'admission à celle de l'etudiant. 
                                                        if($moyenne_general >= $moyenne_admission){ 
                                                            if($tablo['sexe_pers'] =="Femme"){
                                                                echo '<b>Admise</b>';
                                                            }else{
                                                                echo '<b>Admis</b>';
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
                                                    <td class="text-center"><a href="index.php?module=gestion&action=detail_resultatConcours&cood=<?php echo $tablo['id_pers']; ?>&cood1=<?php echo $id_filiere; ?>" class="btn btn-primary btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-eye-open"></i> Détails</a></td>
                                                </tr>
                                            <?php } } ?>
                            </tbody>
                                </table>
                            </div>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                <nav id="mainnav-container">
                    <?php include("globale/menu_concours.php"); ?>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
                <!--ASIDE--> 
                <!--===================================================-->
                <aside id="aside-container">
                    <?php include("globale/aside.php"); ?>
                </aside>
                <!--===================================================--> 
                <!--END ASIDE-->
                <!--RIGHT CHAT MESSANGER--> 
                <!--===================================================-->
                <aside class="conversation closed">
                    <?php include("globale/aside2.php"); ?>
                </aside>
                <!--END RIGHT CHAT MESSANGER--> 
                <!--===================================================-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">
                <?php include("globale/pied.php"); ?>
            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Merismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--DataTables [ OPTIONAL ]-->
        <script src="plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--DataTables Sample [ SAMPLE ]-->
        <script src="js/demo/tables-datatables.js"></script>

        <script>
      $(document).ready(function(){

          // Selectionne uniquement les trimestres que les etudiants ont composé dans la classe selectionnée
          $('#filiere').on('change', function(){

            var id_filiere = $(this).val();
            var action = "resultat_concours";
            if(id_filiere){
              $.post("index.php?module=gestion&action=ajaxResultat",
              {id_filiere:id_filiere, action:action},
                function(data){
                  $('#resultat').html(data);
                }
              );

            }
          });
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>