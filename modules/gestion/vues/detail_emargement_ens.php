<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Detail emargement - GESET</title>
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
                        <h3><i class="fa fa-home"></i><span style="font-family:Times New Roman"> Emargement </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">detail emargement</li>
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
                                                <legend>Details d'emargement</legend>
                                            </div>
                                            <div class="row">

                                                <input type="hidden" name="enseignant" id="enseignant" value="<?php echo $id_personne ?>">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="niveauetude" class="control-label col-md-4"> Niveau etude </label>
                                                        <div class="col-md-8">
                                                            <select id="niveauetude" name="niveauetude" class="form-control  selectpicker" data-live-search="true"  required>
                                                                <option value="">Selectionner</option>
                                                                <?php

                                                                    $sql="SELECT * FROM enseigner e, niveau_etude n
                                                                        WHERE e.id_niveauetude = n.id_niveauetude 
                                                                        AND id_ens = ?
                                                                        GROUP BY n.id_niveauetude";

                                                                    $request = AfficherTout($sql);
                                                                    $param = array($id_personne);
                                                                    //exécution de la requête de sélection et retour des résultats
                                                                    $request->execute($param);
                                                                    //Conservation lignes par ligne des élements retournés 
                                                                    while($tablo=$request->fetch()){

                                                                        echo '<option value ="'.$tablo['id_niveauetude'].'">'.$tablo['lib_niveauetude'].'</option>';    
                                                                
                                                                    }
                                                            ?>
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                </div>
                                                <div  class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="matiere" class="control-label col-md-4"> Matière </label>
                                                        <div class="col-md-8">
                                                            <select id="matiere" name="matiere" class="form-control"  required>
                                                                <option value="">Selectionner</option>
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                </div>

                                                <div  class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="mois" class="control-label col-md-4"> Mois </label>
                                                        <div class="col-md-8">
                                                            <select id="mois" name="mois" class="form-control"  required>
                                                                <option value="">Selectionner</option>
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                </div>
                                        </form>
                                        <hr>
                                        <br><br>
                                        <div id="details">
                                            
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

         // On recupere uniquement les matieres que l'enseignant selectionné enseigne dans la classe selectionnée.
          $('#niveauetude').on('change', function(){

            var id_niveauetude = $(this).val();
            var id_ens = $('#enseignant').val();
            var action = "niveauetude_details";
            if(id_niveauetude){

              $.post("index.php?module=gestion&action=ajaxEmargement",
              {id_niveauetude:id_niveauetude, id_ens:id_ens, action:action},
                function(data){
                  $('#matiere').html(data);
                }
              );

            }
          });

          // On recupere uniquement les matieres que l'enseignant selectionné enseigne au niveau selectionnée.
          $('#matiere').on('change', function(){

            var id_matiere = $(this).val();
            var id_ens = $('#enseignant').val();
            var id_niveauetude = $('#niveauetude').val();
            var action = "matiere";

            if(id_matiere){

              $.post("index.php?module=gestion&action=ajaxEmargement",
              {id_matiere:id_matiere, id_ens:id_ens, id_niveauetude:id_niveauetude, action:action},
                function(data){
                  $('#mois').html(data);
                }
              );

            }
          });


          $('#mois').on('change', function(){

            var mois = $(this).val();
            var id_matiere = $('#matiere').val();
            var id_ens = $('#enseignant').val();
            var id_niveauetude = $('#niveauetude').val();
            var action = "mois";

            if(id_matiere){

              $.post("index.php?module=gestion&action=ajaxEmargement",
              {id_matiere:id_matiere, id_ens:id_ens, id_niveauetude:id_niveauetude,mois:mois, action:action},
                function(data){
                  $('#details').html(data);
                }
              );

            }
          });
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>