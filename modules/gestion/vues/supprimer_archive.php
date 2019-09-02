<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suppression</title>
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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Ravie">Archives </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Suupression </li>
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
                                <h3 class="panel-title"><span style="font-family:Ravie">Suppression des archives</span></h3>
                            </div>    
                        </div>
                        
                        <br>
                        <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h3 class="panel-title"><span style="font-family:Forte">Suppression de composition</span></h3></div>
                                            <div class="panel-body">
                                                <form method="post" id="formulaire1" action="" class="form-horizontal form-bordered">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="anneeP" class="control-label col-md-6 col-xs-6"> Année Académique </label>
                                                                <div class="col-md-6 col-xs-6">
                                                                    <select id="anneeP" name="anneeP" class="form-control selectpicker" data-live-search="true" required>
                                                                        <option value="">Selectionner</option>
                                                                            <?php
                                                                                    $requete = "SELECT * FROM archiver_composer
                                                                                                GROUP BY anneeAc";
                                                                                        $resultat = Selection($requete);
                                                                                            foreach($resultat as $tablo){                         
                                                                                    echo  '<option>'.$tablo['anneeAc'].'</option>';
                                                                                } 
                                                                            ?>     
                                                                                        
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="control-label col-md-6 col-xs-6">Password</label>
                                                                <div class="col-md-6">
                                                                    <input type="password" id="password" name="password"  class="form-control" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="conf_password" class="control-label col-md-6 col-xs-6">confirmer password</label>
                                                                <div class="col-md-6">
                                                                    <input type="password" id="conf_password" name="conf_password"  class="form-control" required />
                                                                </div>
                                                            </div><hr>      
                                                            <div class="form-group text-center">
                                                                <button class="btn btn-danger btn-xs" type="submit"><i class="glyphicon glyphicon-trash"></i> Supprimer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h3 class="panel-title"><span style="font-family:Forte">Suppression de paiement</span></h3></div>
                                            <div class="panel-body">
                                                <form method="post" id="formulaire2" action="" class="form-horizontal form-bordered">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="anneeP" class="control-label col-md-6 col-xs-6"> Année Académique </label>
                                                                <div class="col-md-6 col-xs-6">
                                                                    <select id="anneeP" name="anneeP" class="form-control selectpicker" data-live-search="true" required>
                                                                        <option value="">Selectionner</option>
                                                                            <?php
                                                                                    $req = "SELECT * FROM archive_paiement
                                                                                                GROUP BY annee";
                                                                                        $resul = Selection($req);
                                                                                            foreach($resul as $tab){                         
                                                                                    echo  '<option>'.$tab['annee'].'</option>';
                                                                                } 
                                                                            ?>     
                                                                                        
                                                                        </select>
                                                                    </div>
                                                            </div>            <!--===================================================-->
                                                            <div class="form-group">
                                                                <label for="password" class="control-label col-md-6 col-xs-6">Password</label>
                                                                <div class="col-md-6">
                                                                    <input type="password" id="password" name="password"  class="form-control" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="conf_password" class="control-label col-md-6 col-xs-6">confirmer password</label>
                                                                <div class="col-md-6">
                                                                    <input type="password" id="conf_password" name="conf_password"  class="form-control" required />
                                                                </div>
                                                            </div><hr>      
                                                            <div class="form-group text-center">
                                                                <button class="btn btn-danger btn-xs" type="submit"><i class="glyphicon glyphicon-trash"></i> Supprimer</button>
                                                            </div>  
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                    </div>

                    <!-- Modale qui affiche le message apres chaque operation -->

                                                    <div data-backdrop="false" class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content" style="background-color: rgb(0, 0, 0, 0.5)">
                                                          <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                          </div>
                                                          <div class="modal-body" id="contenu_message"> 
                                                                                                     
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

        <script>
      $(document).ready(function(){

            $('#formulaire1').submit(function(){

                $.ajax({
                  url:"index.php?module=gestion&action=deleteArchiveComposition",
                  method : "POST",
                  data:new FormData($('#formulaire1')[0]),
                  contentType : false,
                  processData : false,
                  success : function(feedback){
                            $('#message').modal('show');
                            $('#contenu_message').html(feedback);
                            $('#formulaire1').find("input").val('');
                          }
                });
                return false;

          });

            $('#formulaire2').submit(function(){

                $.ajax({
                  url:"index.php?module=gestion&action=deleteArchivePaiement",
                  method : "POST",
                  data:new FormData($('#formulaire2')[0]),
                  contentType : false,
                  processData : false,
                  success : function(feedback){
                            $('#message').modal('show');
                            $('#contenu_message').html(feedback);
                            $('#formulaire2').find("input").val('');
                          }
                });
                return false;

          });
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>