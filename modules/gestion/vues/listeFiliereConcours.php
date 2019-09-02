<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultat concours - GESET</title>
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
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">

                    <?php include("globale/menu2.php"); ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Resultats </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">Resultat concours</li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="font-family:Times New Roman">Resultat du concours</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <div class="row">
                                            <?php

                                                $sql = "SELECT  * FROM filiere";

                                                  $requete = AfficherTout($sql); 
                                                  //exécution de la requête de sélection et retour des résultats
                                                  $requete->execute();
                                                 //Conservation lignes par ligne des élements retournés
                                                 while($tablo=$requete->fetch()){ 
                                            ?>
                                                <div class="col-md-4">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading"></div>
                                                        <div class="panel-body">
                                                            <table>
                                                                <tr>
                                                                    <td style="padding-bottom:5px">Filière : </td><td><?php echo $tablo['lib_filiere']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding-bottom:5px">Inscris : </td>
                                                                    <td>
                                                                        <?php 
                                                                            $nombre_inscris = 0;
                                                                            $requete1 = "SELECT count(*) as effectif FROM preinscription pr, personne p, filiere f
                                                                                        WHERE pr.id_candidat = p.id_pers
                                                                                        AND p.id_filiere = f.id_filiere
                                                                                        AND f.id_filiere = ?";
                                                                            $param1 = array($tablo['id_filiere']);
                                                                            $nombre_inscris = getNombreLigneUsers($requete1,$param1);
                                                                            echo $nombre_inscris;
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding-bottom:5px">Présent : </td>
                                                                    <td>
                                                                        <b>
                                                                            <?php
                                                                                //Compte le nombre des etudiants qui ont composé
                                                                                $nbreEtudiantComposer = 0;
                                                                                $sql2 = "SELECT sum(note*coef) as moyenne, nom_pers, prenom_pers, id_pers, sexe_pers
                                                                                            FROM personne e, composer_concours c, matiere_concours m, programme_concours p, filiere f, annee_academique a
                                                                                            WHERE e.id_pers = c.id_candidat 
                                                                                            AND c.id_matiere = m.id_matiere
                                                                                            AND m.id_matiere = p.id_matiere 
                                                                                            AND p.id_filiere = f.id_filiere
                                                                                            AND f.id_filiere = e.id_filiere
                                                                                            AND c.id_anneeAc = a.id_annee
                                                                                            AND f.id_filiere = ?
                                                                                            AND c.id_anneeAc = ?
                                                                                            GROUP BY id_pers";
                                                                                
                                                                                $requete2 = AfficherTout($sql2); 
                                                                                $param2 = array($tablo['id_filiere'], $id_an);
                                                                                //exécution de la requête de sélection et retour des résultats
                                                                                $requete2->execute($param2);
                                                                                //Conservation lignes par ligne des élements retournés
                                                                            while($tab=$requete2->fetch()){
                                                                                $nbreEtudiantComposer++;
                                                                            }
                                                                            echo $nbreEtudiantComposer;
                                                                            ?>
                                                                        </b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding-bottom:5px">Absent : </td><td><b><?php echo $nombre_inscris - $nbreEtudiantComposer; ?></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding-bottom:5px">
                                                                        <a href="index.php?module=gestion&action=listeAdmisConcours&cood=<?php echo $tablo['id_filiere']; ?>" class="btn btn-mint btn-xs"><i class="fa fa-navicon"></i> Admis
                                                                    </td>
                                                                    <td>
                                                                        <a href="index.php?module=gestion&action=listeAjourneConcours&cood=<?php echo $tablo['id_filiere']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-navicon"></i> Ajournés
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="index.php?module=gestion&action=resultatConcours&cood=<?php echo $tablo['id_filiere']; ?>" class="btn btn-default btn-xs"><i class="fa fa-navicon"></i> Tous les resultats
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> 
                                            <?php  } ?>
                                        </div>  
                                    </div>
                                    <div class="panel-footer"> Panel Footer </div>
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
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>