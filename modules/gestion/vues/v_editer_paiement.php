<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> edition inscription</title>
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

                  $table ="paiement";
                  $colonne ="id_paye";

                  if(isset($_GET['cood']) && existanceGestion($table, $colonne, $_GET['cood'])){

                    $id_paye = addslashes(htmlspecialchars($_GET['cood']));

                    $p = selection_condition($table, $colonne, $id_paye);

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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Ravie"> Frais scolaire </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">Edition paiement </li>
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
                                                <legend>Edition d'un paiement</legend>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">

                                                    <input type="hidden" id="id_paye" name="id_paye" value="<?php echo $p['id_paye'] ?>" class="form-control" required />
                                                    
                                                    <div class="form-group">
                                                        <label for="classe" class="control-label col-md-4"> Classe </label>
                                                        <div class="col-md-8">
                                                            <select id="classe" name="classe" class="form-control selectpicker" data-live-search="true" required>
                                                                <?php
                                                                    $table0 = "personne";
                                                                    $colonne0 = "id_pers";
                                                                    $val_recuperer0  = "id_classe";
                                                                    // Recuperation de la classe de l'etudiant
                                                                    $id_classe = getChampsGestion($val_recuperer0, $table0, $colonne0, $p['id_etu']);

                                                                    $val_recuperer2 = "lib_classe";
                                                                    $table2 = "classe";
                                                                    $colonne2 = "id_classe";
                                                                    echo '<option value="'.$id_classe.'">'.getChampsParametrage($val_recuperer2, $table2, $colonne2, $id_classe).'</option>'; 
                                                                      $resultat2 = AfficherTout($table2);
                                                                        foreach($resultat2 as $tablo){                         
                                                                    echo  '<option value ="'.$tablo['id_classe'].'">'.$tablo['lib_classe'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="etudiant" class="control-label col-md-4"> Etudiant </label>
                                                        <div class="col-md-8">
                                                            <select id="etudiant" name="etudiant" class="form-control" required>
                                                            
                                                                <?php 
                                                                        $val_recuperer3 = "nom_pers";
                                                                        $val_recuperer4 = "prenom_pers";
                                                                        $table3 = "personne";
                                                                        $colonne3 = "id_pers";
                                                                    echo '<option value="'.$p['id_etu'].'">'.getChampsParametrage($val_recuperer3, $table3, $colonne3, $p['id_etu']).' '.getChampsParametrage($val_recuperer4, $table3, $colonne3, $p['id_etu']).'</option>'; 

                                                                 ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="mois" class="control-label col-md-4"> Mois </label>
                                                        <div class="col-md-8">
                                                            <select id="mois" name="mois" class="form-control selectpicker" data-live-search="true" required>
                                                                <option value="$p['mois']">
                                                                    <?php 
                                                                        if($p['mois'] == "1"){
                                                                            echo 'Janvier';
                                                                        }else if($p['mois']=="2"){
                                                                            echo 'Fevrier';
                                                                        }else if($p['mois']=="3"){
                                                                            echo 'Mars';
                                                                        }else if($p['mois']=="4"){
                                                                            echo 'Avril';
                                                                        }else if($p['mois']=="5"){
                                                                            echo 'Mais';
                                                                        }else if($p['mois']=="6"){
                                                                            echo 'Juin';
                                                                        }else if($p['mois']=="7"){
                                                                            echo 'Juillet';
                                                                        }else if($p['mois']=="8"){
                                                                            echo 'Août';
                                                                        }else if($p['mois']=="9"){
                                                                            echo 'Septembre';
                                                                        }else if($p['mois']=="10"){
                                                                            echo 'Octobre';
                                                                        }else if($p['mois']=="11"){
                                                                            echo 'Novembre';
                                                                        }else{
                                                                            echo 'Décembre';
                                                                        } 
                                                                    ?>
                                                                </option>
                                                                <option value="1">Janvier</option>
                                                                <option value="2">Février</option>
                                                                <option value="3">Mars</option>
                                                                <option value="4">Avril</option>
                                                                <option value="5">Mais</option>
                                                                <option value="6">Juin</option>
                                                                <option value="7">Juillet</option>
                                                                <option value="8">Août</option>
                                                                <option value="9">Septembre</option>
                                                                <option value="10">Octobre</option>
                                                                <option value="11">Novembre</option>
                                                                <option value="12">Decembre</option>
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="frait" class="control-label col-md-4"> Frais </label>
                                                        <div class="col-md-8">
                                                            <select id="frait" name="frait" class="form-control selectpicker" data-live-search="true" class="form-control jour" required>
                                                                <?php
                                                                    $val_recuperer5 = "montant";
                                                                    $table4 = "frait";
                                                                    $colonne5 = "id_frait";
                                                                    echo '<option value="'.$p['id_frait'].'">'.getChampsParametrage($val_recuperer5, $table4, $colonne5, $p['id_frait']).'</option>'; 
                                                                      
                                                                      $resultat4 = AfficherTout($table4);
                                                                        foreach($resultat4 as $tablo){                         
                                                                    echo  '<option value ="'.$tablo['id_frait'].'">'.$tablo['montant'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>
                                                    
                                                    <div>
                                                            <input type="hidden" id="gestion" name="gestion" value="paiement"  class="form-control" />
                                                    </div>
                                                </div>

                                               
                                            </div><hr>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align:center">
                                                    <a href="index.php?module=gestion&action=paiement1&cood=<?php  ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Afficher</a>&nbsp                          
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

          // On recupere uniquement les etudiant qui sont inscris dans la classe selectionnée

          $('#classe').on('change', function(){



            var id_classe = $(this).val();
            var action = "etudiant";
            if(id_classe){

              $.post("index.php?module=gestion&action=ajaxGestion",
              {id_classe:id_classe, action:action},
                function(data){
                  $('#etudiant').html(data);
                }
              );

            }
          });
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>