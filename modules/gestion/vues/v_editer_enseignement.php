<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Editer enseignement _ GESET</title>
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
                
                  $id_enseigner = addslashes(htmlspecialchars($_GET['cood']));
                  $requete = "SELECT * FROM enseigner WHERE id_enseigner=?";
                  $param = array($id_enseigner);

                  if(isset($_GET['cood']) && existanceGestion($requete,$param)){

                      $req = "SELECT id_niveauetude FROM enseigner WHERE id_enseigner=?";
                      $para = array($id_enseigner);
                      $id_niveauetude = getChampsParametrage($req,$para);

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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Gestion </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">Edition enseignement </li>
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
                                                <legend>Edition d'un enseignement</legend>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <input type="hidden" id="id_enseigner" name="id_enseigner" value="<?php echo $id_enseigner ?>" class="form-control" required />
                                                    <div class="form-group">
                                                        <label for="niveauetude" class="control-label col-md-4"> Niveau d'etude </label>
                                                        <div class="col-md-8">
                                                            <select id="niveauetude" name="niveauetude" class="form-control selectpicker" data-live-search="true" required>
                                                                
                                                                <?php 
                                                                    $requete1 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
                                                                    $param1 = array($p['id_niveauetude']);
                                                                    echo '<option value="'.$p['id_niveauetude'].'">'.getChampsParametrage($requete1,$param1).'</option>'; 

                                                                        $sql1 = "SELECT  * FROM niveau_etude";
                                                                        $request1 = AfficherTout($sql1); 
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request1->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$request1->fetch()){                        
                                                                    echo  '<option value ="'.$tablo['id_niveauetude'].'">'.$tablo['lib_niveauetude'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="ue" class="control-label col-md-4"> Unité Enseignement </label>
                                                        <div class="col-md-8">
                                                            <select id="ue" name="ue" class="form-control">
                                                                <?php 
                                                                    $requete2 = "SELECT lib_ue FROM unite_enseignement WHERE id_ue=?";
                                                                    $param2 = array($p['id_ue']);
                                                                    echo '<option value="'.$p['id_ue'].'">'.getChampsParametrage($requete2,$param2).'</option>'; 
                                                                        
                                                                ?>
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="matiere" class="control-label col-md-4"> Matière </label>
                                                        <div class="col-md-8">
                                                            <select id="matiere" name="matiere" class="form-control"  required>
                                                                <?php 
                                                                    $requete2 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
                                                                    $param2 = array($p['id_matiere']);
                                                                    echo '<option value="'.$p['id_matiere'].'">'.getChampsParametrage($requete2,$param2).'</option>'; 
                                                                        
                                                                ?>
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                
                                                    <div class="form-group">
                                                        <label for="volumehoraire" class="col-md-4 control-label">Volume horaire</label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="volumehoraire" name="volumehoraire" value="<?php echo $p['volumehoraire']; ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="enseignant" class="control-label col-md-4"> Enseignant </label>
                                                        <div class="col-md-8">
                                                            <select id="enseignant" name="enseignant" class="form-control selectpicker" data-live-search="true" required>
                                                                
                                                                <?php 
                                                                    $requete3 = "SELECT nom_pers FROM personne WHERE id_pers=?";
                                                                    $requete4 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
                                                                    $param3 = array($p['id_ens']);
                                                                    echo '<option value="'.$p['id_ens'].'">'.getChampsUsers($requete3,$param3).' '.getChampsUsers($requete4,$param3).'</option>'; 
                                                                      
                                                                        $sql3 = "SELECT  * FROM personne WHERE type_pers='Enseignant'";

                                                                        $request3 = AfficherTout($sql3); 
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request3->execute();
                                                                        //Conservation lignes par ligne des élements retournés 
                                                                        while($tablo=$request3->fetch()){                         
                                                                    echo  '<option value ="'.$tablo['id_pers'].'">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="cout_heure" class="col-md-4 control-label">Cout par heure</label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="cout_heure" name="cout_heure" value="<?php echo $p['cout_heure']; ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div>
                                                            <input type="hidden" id="gestion" name="gestion" value="enseignement"  class="form-control" />
                                                    </div>
                                                </div>

                                               
                                            </div><hr>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align:center">
                                                    <a href="index.php?module=gestion&action=detail_enseignement&cood=<?php echo $id_niveauetude; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Afficher</a>&nbsp                          
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

          // On recupere uniquement les unité d'enseignemnt du niveau d'etude selectionné
         /* $('#filiere').on('change', function(){
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
          });*/

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
            var action = "rempli_matiereSimple";
            if(id_ue){

              $.post("index.php?module=gestion&action=ajaxGestion",
              {id_ue:id_ue, action:action},
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