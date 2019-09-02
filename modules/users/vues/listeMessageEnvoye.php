<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Etudiant</title>
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

                            $colonne="id_message";

                            $table = "message";

                            if(isset($_GET['parasup']) && existanceUsers($table, $colonne, $_GET['parasup'])){

                                $id_message=htmlspecialchars($_GET['parasup']);

                                $message = new Message();

                                $message->setId_message($id_message);
                              
                                $message->supprimerMessage();

                                header("location:$_SERVER[HTTP_REFERER]");  

                            }else{

                              header("location:index.php?module=users&action=accueil");

                            }

                          }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i><span style="font-family:Ravie"> Message </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Liste des messages </li>
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
                                <h3 class="panel-title">Liste des messages envoyés</h3>
                            </div>
                            <div class="panel-body">
                               <div id="demo-chat-body" class="collapse in">
                                            <div class="nano" style="height:550px">
                                                <div class="nano-content pad-all">
                                                    <ul class="list-unstyled media-block">

                                                         <?php 
                                                            $requete = "SELECT id_exp, id_ben, message, date 
                                                            			FROM message 
                                                            			WHERE id_exp = '$id_personne' 
                                                                        GROUP BY id_exp, id_ben
                                                                        ORDER BY id_message DESC";
                                                            $response = Selection($requete);

                                                            foreach ($response as $value) { ?>

                                                                    <li class="mar-btm">
                                                                        <div class="media-left">
                                                                            <img src="img/user.png" class="img-circle img-sm" alt="Profile Picture">
                                                                        </div>
                                                                        <div class="media-body pad-hor speech-left">
                                                                            <div class="speech">
                                                                                <a href="index.php?module=users&action=detailMessageEnvoye&cood=<?php echo $value['id_ben'] ?>" class="media-heading">
                                                                                    <?php
                                                                                        $val_recuperer1 ="nom_pers";
                                                                                        $val_recuperer2 ="prenom_pers";
                                                                                        $table2 = "personne";
                                                                                        $colonne2 = "id_pers"; 
                                                                                        echo getChampsUsers($val_recuperer1, $table2, $colonne2, $value['id_ben']).' '.getChampsUsers($val_recuperer2, $table2, $colonne2, $value['id_ben']); 
                                                                                    ?>
                                                                                </a>
                                                                                <p> <?php echo $value['message']; ?> </p>
                                                                                <small class="text-muted pull-right"><?php echo $value['date']; ?></small>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--Widget footer-->
                                            <div class="panel-header">
                                                <form method="post" action="" id="formulaire1">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <input type="hidden" name="id_exp" id="id_exp" value="<?php echo $id_personne; ?>" required>
                                                            <div class="col-xs-4">
                                                                <select id="id_ben" name="id_ben" class="form-control selectpicker" data-live-search="true" required>
                                                                    <option value="">Selectionner</option>
                                                                    <?php 
                                                                          $table ="SELECT * FROM personne 
                                                                                    WHERE type_pers NOT IN('Etudiant') 
                                                                                    AND id_pers NOT IN($id_personne)
                                                                                    ORDER BY nom_pers, prenom_pers DESC";
                                                                          $resultat = Selection($table);
                                                                            foreach($resultat as $tablo){                         
                                                                        echo  '<option value ="'.$tablo['id_pers'].'">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</option>';
                                                                    } ?>     
                                                                
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <input type="text" id="sujet" name="sujet" placeholder="Entrer votre message" class="form-control chat-input" required>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <button class="btn btn-dark btn-block btn-xs" type="submit">Envoyer</button>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Fenetre du message renvenyé apres le traitement de la requete -->
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
                  url:"index.php?module=users&action=saveMessage",
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
       
      });
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>