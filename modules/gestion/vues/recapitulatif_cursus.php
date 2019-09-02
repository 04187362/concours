<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Absence etudiant - GESET</title>
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
                    $id_paye =htmlentities(htmlspecialchars($_GET['cood']));
                    $requete = "SELECT nom_pers,prenom_pers, lib_filiere, lib_niveauetude,p.diplome, etablissement, p.statut, date_paye, resultat, lib_annee, image 
                                FROM payement p, personne ps, filiere f, niveau_etude n, annee_academique a
                                WHERE p.id_etu = ps.id_pers
                                AND p.id_filiere = f.id_filiere
                                AND p.id_niveauetude = n.id_niveauetude
                                AND p.id_annee = a.id_annee
                                AND id_paye=?";
                    $param = array($id_paye);
                    if(isset($_GET['cood']) && existanceGestion($requete,$param)){

                        $p = selection_condition($requete,$param);

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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Payement </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">Recapitulatif Cursus</li>
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
                                        <h3 class="panel-title" style="font-family:Times New Roman">Recapitulatif du cursus <span class="text-primary"><?php //echo getChampsUsers($requete1,$param1).' '.getChampsUsers($requete2,$param1); ?></span></h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <div class="row">

                                                    <div class="col-md-10 col-md-offset-1">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading"></div>
                                                            <div class="panel-body">

                                                                <div class="col-md-6">
                                                                    <table>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Noms : </td><td><span class="text-primary"><b><?php echo $p['nom_pers']; ?></b></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Prénoms : </td><td><span class="text-primary"><b><?php echo $p['prenom_pers']; ?></b></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Filière : </td><td><?php echo $p['lib_filiere']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Niveau Etude : </td><td><?php echo $p['lib_niveauetude']; ?></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Etablissement : </td><td><?php echo $p['etablissement']; ?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <table>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Diplôme : </td><td><?php echo $p['diplome']; ?></td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Résultat : </td><td><?php echo $p['resultat']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Statut : </td><td><?php echo $p['statut']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Date : </td><td><?php echo date('d-m-Y',strtotime($p['date_paye'])); ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:10px">Année académique : </td><td><?php echo $p['lib_annee']; ?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <img src="img/photos/<?php echo $p['image']; ?>" class="img-circle img-thumbnail" width ="200" height="200"/>
                                                                </div>
                                                                <hr>
                                                                <div>
                                                                    <span style="float : left"><a href="index.php?module=users&action=imprimer_cursus&cood=<?php echo $id_paye; ?>" class="btn btn-default btn-xs"><i class="fa fa-print"></i> Imprimer</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                            
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