<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paiement</title>
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

                    <?php 

                          if(isset($_POST['supprimer'])){

                            $colonne="id_pers";

                            $table = "personne";

                            if(isset($_GET['parasup']) && existanceUsers($table, $colonne, $_GET['parasup'])){

                                $id_etudiant=htmlspecialchars($_GET['parasup']);

                                $etudiant = new Etudiant();

                                $etudiant->setId_pers($id_etudiant);
                              
                                $etudiant->supprimerEtudiant();

                                header("location:$_SERVER[HTTP_REFERER]");  

                            }else{

                              header("location:index.php?module=users&action=accueil");

                            }

                          }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Ravie"> Frais scolaire </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Paiement </li>
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
                                <h3 class="panel-title">Liste de paiement</h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <a href="index.php?module=gestion&action=saisie_paiement" class="btn btn-success btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nom</th>
                                                <th class="text-center">Prénom</th>
                                                <th class="text-center">Nombre de mois payé</th>
                                                <td class="text-center"></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $sql = "SELECT id_etu, count(id_etu) as effectif FROM paiement GROUP BY id_etu";

                                                $requete = AfficherTout($sql); 
                                                //exécution de la requête de sélection et retour des résultats
                                                $requete->execute();
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$requete->fetch()){ 
                                                    $val_recuperer1 ="nom_pers";
                                                    $val_recuperer2 ="prenom_pers";
                                                    $table1 = "personne";
                                                    $colonne1 = "id_pers"; 

                                             ?>
                                            <tr>
                                                <td class="text-center"><?php echo getChampsUsers($val_recuperer1, $table1, $colonne1, $tablo['id_etu']); ?></td>
                                                <td class="text-center"><?php echo getChampsUsers($val_recuperer2, $table1, $colonne1, $tablo['id_etu']); ?></td>
                                                <td class="text-center"><span class="btn btn-default btn-xs"><i class="fa fa-table"></i> <?php echo $tablo['effectif']; ?></span></td>
                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=paiement2&cood=<?php echo $tablo['id_etu']; ?>" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-eye-open"></i></a> 
                                                    <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_etu'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <div class="modal fade <?php echo $tablo['id_etu'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=paiement1&parasup=<?php echo $tablo['id_etu'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                      <div>
                                                                         <p><b>Voulez-vous vraiment supprimer cette ligne?</b></p>
                                                                          <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                          <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>
                                                                        
                                                                      </div>
                                                                    </div>
                                                                  </center>
                                                              </form>
                                                             </div>

                                                          </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
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