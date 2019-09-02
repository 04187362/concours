<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Absence des etudiants - GESET</title>
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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Absence </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">Absence etudiant</li>
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
                                <div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="font-family:Times New Roman">Liste des absences des etudiants</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php 

                                                $sql = "SELECT id_pers, nom_pers, prenom_pers, count(id_abs) as effectif FROM absence_etudiant a, personne p
                                                            WHERE p.id_pers = a.id_etu
                                                            AND id_par = ?
                                                            GROUP BY nom_pers, prenom_pers";

                                                $request = afficherTout($sql); 
                                                $param = array($id_personne);
                                                //exécution de la requête de sélection et retour des résultats
                                                $request->execute($param);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$request->fetch()){ ?>
                                                    <div class="col-md-6">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading"></div>
                                                            <div class="panel-body">
                                                                <table>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Nom : </td><td><span class="text-primary"><b><?php echo $tablo['nom_pers']; ?></b></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Prénom : </td><td><span class="text-primary"><b><?php echo $tablo['prenom_pers']; ?></b></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Nombre d'absences : </td><td><?php echo $tablo['effectif']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Voir details : </td>
                                                                        <td><b><?php
                                                                                $requete="SELECT count(*) as effectif FROM absence_etudiant a, personne p 
                                                                                        WHERE a.id_etu = p.id_pers
                                                                                        AND id_etu = ? 
                                                                                        AND id_par = ? 
                                                                                        AND etat = 0";
                                                                                $param1 = array($tablo['id_pers'],$id_personne);
                                                                                if(getNombreLigneUsers($requete,$param1) > 0){ 
                                                                                ?>
                                                                            <p><a class="btn btn-success btn-xs" href="index.php?module=gestion&action=absenceEtudiantParent2&cood=<?php echo $tablo['id_pers']; ?>"> <?php echo getNombreLigneUsers($requete,$param1); ?></a></p>
                                                                            <?php  }else{ ?>
                                                                                <p><a class="btn btn-default btn-xs" href="index.php?module=gestion&action=absenceEtudiantParent2&cood=<?php echo $tablo['id_pers']; ?>"> <?php echo getNombreLigneUsers($requete,$param1); ?></a></p>
                                                                            <?php  } ?></b>
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
                    <?php include("globale/menu.php"); ?>
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