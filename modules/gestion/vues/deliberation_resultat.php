<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultats</title>
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

                            $colonne="id_emploi";

                            $table = "emploi_temps";

                            if(isset($_GET['parasup']) && existanceGestion($table, $colonne, $_GET['parasup'])){

                                $id_emploi=htmlspecialchars($_GET['parasup']);

                                $emploi = new EmploiTemps();

                                $emploi->setId_emploi($id_emploi);
                              
                                $emploi->supprimerEmploiTemps();

                                header("location:$_SERVER[HTTP_REFERER]");  

                            }else{

                              header("location:index.php?module=users&action=accueil");

                            }

                          }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i><span style="font-family:Ravie"> Examens </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> délibération </li>
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
                                <h3 class="panel-title" style="text-align:center"><b>Moyenne d'admission</b></h3>
                            </div>
                                
                            <div class="panel-body">

                                <form method="post" action="" id="formulaire1" class="form-horizontal form-bordered">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="classe" class="control-label col-md-4 col-xs-4"> Classe </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <select id="classe" name="classe" class="form-control selectpicker" data-live-search="true" required>
                                                            <option value="">Selectionner</option>
                                                                <?php
                                                                    $table = "classe";
                                                                        $resultat = AfficherTout($table);
                                                                            foreach($resultat as $tablo){                         
                                                                    echo  '<option value ="'.$tablo['id_classe'].'">'.$tablo['lib_classe'].'</option>';
                                                                } ?>     
                                                                        
                                                        </select>
                                                                    <!--===================================================-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="trimestre" class="control-label col-md-4 col-xs-4">Trimestre </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <select id="trimestre" name="trimestre" class="form-control" required>
                                                            <option value="">Selectionner</option>      
                                                        </select>
                                                                    <!--===================================================-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div  id="moyenne_validation">
                                                
                                            </div>
                                        </div>

                                        <div>
                                                <input type="hidden" id="gestion" name="gestion" value="updateMoyValidation"  class="form-control" />
                                        </div>
                                    </div>
                                </form>

                                
                            </div>
                        </div>


                        <!-- Publication ces resulatats  -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align:center"><b>Publication des resultats</b></h3>
                            </div>
                                
                            <div class="panel-body">

                                <form method="post" action="" id="formulaire2" class="form-horizontal form-bordered">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="classe_pub" class="control-label col-md-4 col-xs-4"> Classe </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <select id="classe_pub" name="classe_pub" class="form-control selectpicker" data-live-search="true" required>
                                                            <option value="">Selectionner</option>
                                                                <?php
                                                                    $table = "classe";
                                                                        $resultat = AfficherTout($table);
                                                                            foreach($resultat as $tablo){                         
                                                                    echo  '<option value ="'.$tablo['id_classe'].'">'.$tablo['lib_classe'].'</option>';
                                                                } ?>     
                                                                        
                                                        </select>
                                                                    <!--===================================================-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="trimestre_pub" class="control-label col-md-4 col-xs-4"> Trimestre </label>
                                                    <div class="col-md-8 col-xs-8">
                                                        <select id="trimestre_pub" name="trimestre_pub" class="form-control" required>
                                                            <option value="">Selectionner</option>      
                                                        </select>
                                                                    <!--===================================================-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div  id="etat_publication">
                                                
                                            </div>
                                        </div>

                                        <div>
                                                <input type="hidden" id="gestion" name="gestion" value="updatePublication"  class="form-control" />
                                        </div>
                                    </div>
                                </form>

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
                  url:"index.php?module=gestion&action=updateGestion",
                  method : "POST",
                  data:new FormData($('#formulaire1')[0]),
                  contentType : false,
                  processData : false,
                  success : function(feedback){
                            $('#message').modal('show');
                            $('#contenu_message').html(feedback);
                          }
                });
                return false;

          });

            $('#formulaire2').submit(function(){

                $.ajax({
                  url:"index.php?module=gestion&action=updateGestion",
                  method : "POST",
                  data:new FormData($('#formulaire2')[0]),
                  contentType : false,
                  processData : false,
                  success : function(feedback){
                            $('#message').modal('show');
                            $('#contenu_message').html(feedback);
                          }
                });
                return false;

          });

          // Selectionne uniquement les trimestres que les etudiants ont composé dans la classe selectionnée
          $('#classe').on('change', function(){

            var id_classe = $(this).val();
            var action = "classe";
            if(id_classe){
              $.post("index.php?module=gestion&action=ajaxResultat",
              {id_classe:id_classe, action:action},
                function(data){
                  $('#trimestre').html(data);
                }
              );

            }
          });

          // Selectionne uniquement les matieres qui sont programmées dans une classes
          $('#trimestre').on('change', function(){

            var trimestre = $(this).val();
            var id_classe = $('#classe').val();
            var action = "moyenne_trimestre";
            if(trimestre){
              $.post("index.php?module=gestion&action=ajaxMoyenneValidationTrim",
              {id_classe:id_classe, trimestre:trimestre, action:action},
                function(data){
                  $('#moyenne_validation').html(data);
                }
              );

            }
          });

          // Selectionne uniquement les trimestres que les etudiants ont composé dans la classe selectionnée
          $('#classe_pub').on('change', function(){

            var id_cl = $(this).val();
            var action = "classe_pub";
            if(id_cl){
              $.post("index.php?module=gestion&action=ajaxMoyenneValidationTrim",
              {id_classe:id_cl, action:action},
                function(data){
                  $('#trimestre_pub').html(data);
                }
              );

            }
          });

          // Selectionne uniquement les tr qui sont programmées dans une classes
          $('#trimestre_pub').on('change', function(){

            var trimestre_pub = $(this).val();
            var id_cl = $('#classe_pub').val();
            var action = "trimestre_pub";
            if(trimestre){
              $.post("index.php?module=gestion&action=ajaxMoyenneValidationTrim",
              {id_classe:id_cl, trimestre:trimestre_pub, action:action},
                function(data){
                  $('#etat_publication').html(data);
                }
              );

            }
          });
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>