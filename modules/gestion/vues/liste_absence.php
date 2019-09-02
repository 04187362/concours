<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>liste des absences</title>
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
                            $id_abs=htmlentities(htmlspecialchars($_GET['parasup']));
                            $requete ="SELECT * FROM absence_etudiant WHERE id_abs=?";
                            $param = array($id_abs);

                            if(isset($_GET['parasup']) && existanceGestion($requete,$param)){

                                $absence = new AbsenceEtudiant();

                                $absence->setId_abs($id_abs);
                              
                                $absence->supprimerAbsenceEtudiant();

                                header("location:$_SERVER[HTTP_REFERER]");   

                            }else{ 

                              header("location:index.php?module=users&action=accueil");

                            }

                        }


                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Absence </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Absence etudiant</li>
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
                                <h3 class="panel-title" style="font-family:Times New Roman"><b>Liste des absences</b></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Etudiant</th>
                                                <th class="text-center">Matière</th>
                                                <th class="text-center">Date cours</th>
                                                <th class="text-center">Heure debut</th>
                                                <th class="text-center">Heure fin</th>
                                                <th class="text-center">Type seance</th>
                                                <th class="text-center">Justification</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql ="SELECT * FROM absence_etudiant a, emargement e, personne p, matiere m
                                                            WHERE a.id_em = e.id_em
                                                            AND e.id_matiere = m.id_matiere
                                                            AND a.id_etu = p.id_pers";
                                                
                                                  $requete1 = afficherTout($sql); 
                                                  //exécution de la requête de sélection et retour des résultats
                                                  $requete1->execute();
                                                  //Conservation lignes par ligne des élements retournés
                                                  while($tablo=$requete1->fetch()){
                                            ?>
                                            <tr>
                                                <td><?php echo $tablo['nom_pers'].' '.$tablo['prenom_pers']; ?></td>
                                                <td class="text-center"><?php echo $tablo['lib_matiere']; ?></td>
                                                <td class="text-center"><?php echo $tablo['date_em']; ?></td>
                                                <td class="text-center"><?php echo $tablo['heure_debut']; ?></td>
                                                <td class="text-center"><?php echo $tablo['heure_fin']; ?></td>
                                                <td class="text-center"><?php echo $tablo['type_seance']; ?></td>
                                                <td class="text-center"><?php echo $tablo['justification']; ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=editer_absenceEtudiant&cood=<?php echo $tablo['id_abs']; ?>" class="btn btn-primary btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_abs'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <div class="modal fade <?php echo $tablo['id_abs'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d'une absence</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=liste_absence&parasup=<?php echo $tablo['id_abs'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                      <div>
                                                                            <table>
                                                                                <tr>
                                                                                    <td><b>Identifiant : </b></td><td><?php echo $tablo['id_abs']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>Nom : </b></td><td><?php echo $tablo['nom_pers']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>Prénom : </b></td><td><?php echo $tablo['prenom_pers']; ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td><b>Matière : </b></td><td><?php echo $tablo['lib_matiere']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>Date du cours : </b></td><td><?php echo $tablo['date_em']; ?></td>
                                                                                </tr>
                                                                            </table><br>
                                                                          <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                          <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>
                                                                        
                                                                      </div>
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
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>