<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>detail programme concours - GESET</title>
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

                            $id_pro=htmlentities(htmlspecialchars($_GET['parasup']));

                            $requete = "SELECT * FROM programme_concours WHERE id_pro=?";
                            $param = array($id_pro);

                            if(isset($_GET['parasup']) && existanceGestion($requete,$param)){

                                $programmeConcours = new ProgrammeConcours();

                                $programmeConcours->setId_pr($id_pro);
                              
                                $programmeConcours->supprimerProgrammeConcours();

                                header("location:$_SERVER[HTTP_REFERER]");  

                            }else{ 

                              header("location:index.php?module=users&action=page_erreur");

                            }

                        }


                        $id_filiere=htmlentities(htmlspecialchars($_GET['cood']));

                        $requete1 = "SELECT * FROM programme_concours WHERE id_filiere=?";
                        $param1 = array($id_filiere);

                        if(isset($_GET['cood']) && existanceGestion($requete1, $param1)){

                          $requete2 = "SELECT lib_filiere FROM filiere WHERE id_filiere=?";
                          $param2 = array($id_filiere);
                          $lib_filiere = getChampsParametrage($requete2, $param2);


                        }else{

                            header("location:index.php?module=users&action=page_erreur");
                        }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i><span style="font-family:Times New Roman"> Gestion </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Programme Concours</li>
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
                                <h3 class="panel-title" style="font-family:Times New Roman">Liste des matières programmées en <b class="text-info"><?php echo $lib_filiere ?></b></h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <a href="index.php?module=gestion&action=saisie_progConcours" class="btn btn-mint btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Matière</th>
                                                <th class="text-center">Coeficient</th>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM programme_concours p, matiere_concours m 
                                                        WHERE p.id_matiere = m.id_matiere
                                                        AND id_filiere=?
                                                        AND id_annee=?";

                                                $requete4 = AfficherTout($sql); 
                                                $param4 = array($id_filiere,$id_an);
                                                //exécution de la requête de sélection et retour des résultats
                                                $requete4->execute($param4);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$requete4->fetch()){ 
                                            ?>
                                            <tr>
                                                
                                                <td class="text-center"><?php echo $tablo['lib_matiere']; ?></td>
                                                <td class="text-center"><?php echo $tablo['coef']; ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=editer_progConcours&cood=<?php echo $tablo['id_pro']; ?>" class="btn btn-primary btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a> 
                                                    <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_pro'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <div class="modal fade <?php echo $tablo['id_pro'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d'un programme</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=detail_progConcours&cood=<?php echo $id_filiere; ?>&parasup=<?php echo $tablo['id_pro'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                        <?php 
                                                                        // Verifiant si les candidats ont composé cette matiere
                                                                        $requete5 ="SELECT count(*) as effectif FROM composer_concours c, personne p
                                                                                    WHERE p.id_pers = c.id_candidat
                                                                                    AND id_matiere=? 
                                                                                    AND id_filiere=?";
                                                                        $param5 = array($tablo['id_matiere'],$id_filiere);
                                                                        $nb_composer = getNombreLigneGestion($requete5, $param5);

                                                                        if($nb_composer > 0){ ?>
                                                                            <p> Cette matière à été composée par <b><?php echo $nb_composer ?></b> candidat(s), il est donc impossible de le supprimer.</p>
                                                                              <div class="table-responsive">
                                                                                  <table>
                                                                                        <tr>
                                                                                            <td><b>Identifiant : </b></td><td><?php echo $tablo['id_pro']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Matière : </b></td><td><?php echo $tablo['lib_matiere']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Filière : </b></td><td><?php echo $lib_filiere; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Coefficient : </b></td><td><?php echo $tablo['coef']; ?></td>
                                                                                        </tr>
                                                                                    </table><br>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                
                                                                              </div>
                                                                        
                                                                        <?php }else{ ?>
                                                                            <div class="table-responsive">
                                                                                  <table>
                                                                                        <tr>
                                                                                            <td><b>Identifiant : </b></td><td><?php echo $tablo['id_pro']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Matière : </b></td><td><?php echo $tablo['lib_matiere']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Filière : </b></td><td><?php echo $lib_filiere; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Coefficient : </b></td><td><?php echo $tablo['coef']; ?></td>
                                                                                        </tr>
                                                                                    </table><br>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                  <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>
                                                                              </div>
                                                                       <?php } ?>
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
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>