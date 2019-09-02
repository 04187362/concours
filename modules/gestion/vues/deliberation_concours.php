<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deliberation - GESET</title>
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
                        <h3><i class="fa fa-home"></i><span style="font-family:Times New Roman"> Examens </span></h3>
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
                                <h3 class="panel-title" style="font-family:Times New Roman"><b>Deliberation du concours</b></h3>
                            </div> 
                            <div class="panel-body">
                            	<div class="row">
                            		<div class="col-md-6">

                                		<form method="post" action="" id="formulaire1" class="form-horizontal form-bordered well">
                                    		<legend class="text-center">Moyenne d'admission</legend>
                                            <div class="row">   
                                                    <div class="col-md-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="filiere" class="control-label col-md-4 col-xs-4"> Filiere </label>
                                                            <div class="col-md-8 col-xs-8">
                                                                <select id="filiere" name="filiere" class="form-control selectpicker" data-live-search="true" required>
                                                                    <option value="">Selectionner</option>
                                                                        <?php 
                                                                                $sql = "SELECT  * FROM filiere";

                                                                                $requete = AfficherTout($sql); 
                                                                                //exécution de la requête de sélection et retour des résultats
                                                                                $requete->execute();
                                                                                //Conservation lignes par ligne des élements retournés
                                                                                while($tablo=$requete->fetch()){                        
                                                                                    echo  '<option value ="'.$tablo['id_filiere'].'">'.$tablo['lib_filiere'].'</option>';
                                                                        } ?>     
                                                                </select>
                                                                            <!--===================================================-->
                                                            </div>
                                                        </div>

                                                        <div  id="moyenne_validation"></div>

                                                        <div>
                                                            <input type="hidden" id="gestion" name="gestion" value="updateMoyValidationConcours"  class="form-control" />
                                                        </div>
                                                    </div>
	                                    	</div>
                                		</form>
                                	</div>

                                	<div class="col-md-6">
                                		<form method="post" action="" id="formulaire2" class="form-horizontal form-bordered well">
		                                    <legend class="text-center">Publication des resultats</legend>
		                                    <div class="row">
		                                                <div class="form-group">
		                                                    <label for="filiere_pub" class="control-label col-md-4 col-xs-4"> Filiere </label>
		                                                    <div class="col-md-8 col-xs-8">
		                                                        <select id="filiere_pub" name="filiere_pub" class="form-control selectpicker" data-live-search="true" required>
		                                                            <option value="">Selectionner</option>
		                                                                <?php 
		                                                                        $sql = "SELECT  * FROM filiere";

		                                                                        $requete = AfficherTout($sql); 
		                                                                        //exécution de la requête de sélection et retour des résultats
		                                                                        $requete->execute();
		                                                                        //Conservation lignes par ligne des élements retournés
		                                                                        while($tablo=$requete->fetch()){                        
		                                                                            echo  '<option value ="'.$tablo['id_filiere'].'">'.$tablo['lib_filiere'].'</option>';
		                                                                } ?>     
		                                                        </select>
		                                                                    <!--===================================================-->
		                                                    </div>
		                                                </div>
		                                        		<div  id="etat_publication"></div>

				                                        <div>
				                                                <input type="hidden" id="gestion" name="gestion" value="updatePublicationConcours"  class="form-control" />
				                                        </div>
		                                    </div>
		                                </form>
                                	</div>
                                </div>
                            </div>
                        </div>


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
          $('#filiere').on('change', function(){

            var id_filiere = $(this).val();
            var action = "moyValidationFiliereConcours";
            if(id_filiere){
              $.post("index.php?module=gestion&action=ajaxMoyenneValidationTrim",
              {id_filiere:id_filiere, action:action},
                function(data){
                  $('#moyenne_validation').html(data);
                }
              );

            }
          });

          // Selectionne uniquement les matieres qui sont programmées dans une classes
          /*$('#trimestre').on('change', function(){

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
          });*/

          // Selectionne uniquement les trimestres que les etudiants ont composé dans la classe selectionnée
          $('#filiere_pub').on('change', function(){

            var id_fil = $(this).val();
            var action = "publicationResultatConcours";
            if(id_fil){
              $.post("index.php?module=gestion&action=ajaxMoyenneValidationTrim",
              {id_filiere:id_fil, action:action},
                function(data){
                  $('#etat_publication').html(data);
                }
              );

            }
          });

          // Selectionne uniquement les tr qui sont programmées dans une classes
          /*$('#trimestre_pub').on('change', function(){

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
          });*/
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>