<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Editer enseignant - GESET</title>
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

                  $id_pers = htmlentities(htmlspecialchars($_GET['cood']));
                  $requete = "SELECT * FROM personne WHERE id_pers=?";
                  $param = array($id_pers);

                  if(isset($_GET['cood']) && existanceUsers($requete,$param)){

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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Utilisateur </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li> Parent </li>
                                <li class="active"> Editer enseignant </li>
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
                                                <legend>Edition d'un enseignant</legend>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="hidden" id="id_pers" name="id_pers" value="<?php echo $p['id_pers'] ?>" class="form-control" required />
                                                    
                                                    <div class="form-group">
                                                        <label for="nom_pers" class="col-md-4 control-label">Nom</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="nom_pers" name="nom_pers" value="<?php echo $p['nom_pers'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="prenom_pers" class="col-md-4 control-label">Prénom</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="prenom_pers" name="prenom_pers" value="<?php echo $p['prenom_pers'] ?>" class="form-control" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="sexe_pers" class="col-md-4 control-label">Sexe</label>
                                                        <div class="col-md-8">
                                                            <?php if($p['sexe_pers']=='Homme'){ ?>
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" checked="true" value="Homme"> Homme &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" value="Femme"> Femme
                                                            <?php }else{ ?>
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" value="Homme"> Homme &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" checked="true" value="Femme"> Femme
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="prof_par" class="col-md-4 control-label">Date naissance</label>
                                                        <div class="col-md-8">
                                                            <input type="date" id="date_nais" name="date_nais" value="<?php echo $p['date_nais_ens'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="adresse_pers" class="col-md-4 control-label">Adresse</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="adresse_pers" name="adresse_pers" value="<?php echo $p['adresse_pers'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tel_pers" class="col-md-4 control-label">Téléphone</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="tel_pers" name="tel_pers" value="<?php echo $p['tel_pers'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="prof_par" class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-8">
                                                            <input type="email" id="email_ens" name="email_ens" value="<?php echo $p['email_ens'] ?>" class="form-control" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="diplome" class="col-md-4 control-label">Diplôme</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="diplome" name="diplome" value="<?php echo $p['diplome'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="pays" class="control-label col-md-4"> Pays </label>
                                                        <div class="col-md-8">
                                                            <select id="pays" name="pays" class="form-control selectpicker" data-live-search="true" required>
                                                            <?php 
                                                                $request = "SELECT lib_pays FROM pays WHERE code_pays=?";
                                                                $parameter = array($p['code_pays']);
                                                                echo '<option value="'.$p['code_pays'].'">'.getChampsParametrage($request,$parameter).'</option>'; 
                                                            ?>
                                                                <?php 
                                                                      $sql = "SELECT * FROM pays ";
                                                                        $requete4 = AfficherTout($sql);                      
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $requete4->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$requete4->fetch()){                          
                                                                    echo  '<option value ="'.$tablo['code_pays'].'">'.$tablo['lib_pays'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                            <input type="hidden" id="type_pers" name="type_pers" value="Enseignant"  class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align:center">
                                                    <a href="index.php?module=users&action=enseignant" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Afficher</a>&nbsp                          
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
                  url:"index.php?module=users&action=updatePersonne",
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
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>