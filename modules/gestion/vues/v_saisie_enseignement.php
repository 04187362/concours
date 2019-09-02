<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Ajout enseignement - GESET </title>
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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Gestion </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">Ajout enseignement </li>
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
                                <form method="post" id="formulaire1" action="" class="form-horizontal form-bordered">
                                            <div class="form-group">
                                                <legend>Ajout d'un enseignement</legend>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="filiere" class="control-label col-md-4"> Filière *</label>
                                                        <div class="col-md-8">
                                                            <select id="filiere" name="filiere" class="form-control selectpicker" data-live-search="true" required>
                                                                <option value="">Selectionnner</option>
                                                                <?php 
                                                                      $sql1 = "SELECT  * FROM filiere";

                                                                        $request1 = AfficherTout($sql1); 
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request1->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$request1->fetch()){                        
                                                                            echo  '<option value ="'.$tablo['id_filiere'].'">'.$tablo['lib_filiere'].'</option>';
                                                                        } 
                                                                ?>  
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="niveauetude" class="control-label col-md-4"> Niveau d'etude *</label>
                                                        <div class="col-md-8">
                                                            <select id="niveauetude" name="niveauetude" class="form-control" required>
                                                                <option value="">Selectionnner</option>  
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="ue" class="control-label col-md-4"> Unité Enseignement *</label>
                                                        <div class="col-md-8">
                                                            <select id="ue" name="ue" class="form-control" required>
                                                                <option value="">Selectionnner</option> 
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="matiere" class="control-label col-md-4"> Matière *</label>
                                                        <div class="col-md-8">
                                                            <select id="matiere" name="matiere" class="form-control"  required>
                                                                <option>Selectionner</option>
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="enseignant" class="control-label col-md-4"> Enseignant *</label>
                                                        <div class="col-md-8">
                                                            <select id="enseignant" name="enseignant" class="form-control selectpicker" data-live-search="true" required>
                                                                <option value="">Selectionner</option>
                                                                <?php
                                                                        $sql2 = "SELECT  * FROM personne WHERE type_pers='Enseignant'";

                                                                        $request2 = AfficherTout($sql2); 
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request2->execute();
                                                                        //Conservation lignes par ligne des élements retournés 
                                                                        while($tablo=$request2->fetch()){                     
                                                                    echo  '<option value ="'.$tablo['id_pers'].'">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="volumehoraire" class="col-md-4 control-label">Volume horaire *</label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="volumehoraire" name="volumehoraire" value="2" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="volumehoraire" class="col-md-4 control-label">Cout par heure *</label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="cout_heure" name="cout_heure" class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                            </div><hr>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align:center">
                                                    <a href="index.php?module=gestion&action=enseignement" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Afficher</a>&nbsp                          
                                                    <button class="btn btn-default btn-xs" type="reset" name="reset"><i class="glyphicon glyphicon-remove"></i> Annuler</button>&nbsp
                                                    <button class="btn btn-primary btn-xs" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Valider</button>                         
                                                    
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
                  url:"index.php?module=gestion&action=saveEnseignement",
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

          // On recupere uniquement les unité d'enseignemnt du niveau d'etude selectionné
          $('#filiere').on('change', function(){
            var id_filiere = $(this).val();
            var action = "rempli_niveau";
            if(id_filiere){

              $.post("index.php?module=gestion&action=ajaxGestion",
              {id_filiere:id_filiere, action:action},
                function(data){
                  $('#niveauetude').html(data);
                }
              );

            }
          });

          // On recupere uniquement les unité d'enseignemnt du niveau d'etude selectionné
          $('#niveauetude').on('change', function(){
            var id_niveauetude = $(this).val();
            var action = "remplir_ue";
            if(id_niveauetude){

              $.post("index.php?module=gestion&action=ajaxGestion",
              {id_niveauetude:id_niveauetude, action:action},
                function(data){
                  $('#ue').html(data);
                }
              );

            }
          });
          // On recupere uniquement les matiere de l'unité d'enseignement selectionné
          $('#ue').on('change', function(){
            var id_ue = $(this).val();
            var id_niveauetude = $('#niveauetude').val();
            var action = "remplir_matiere";
            if(id_ue){

              $.post("index.php?module=gestion&action=ajaxGestion",
              {id_ue:id_ue, id_niveauetude:id_niveauetude, action:action},
                function(data){
                  $('#matiere').html(data);
                }
              );

            }
          });
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>