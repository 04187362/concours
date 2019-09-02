<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>detail cursus - GESET</title>
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

                            $id_paye=htmlentities(htmlspecialchars($_GET['parasup']));

                            $requete = "SELECT * FROM payement WHERE id_paye=?";
                            $param = array($id_paye);

                            if(isset($_GET['parasup']) && existanceGestion($requete,$param)){

                                $cursus = new Cursus();

                                $cursus->setId_paye($id_paye);
                              
                                $cursus->supprimerCursus();

                                header("location:$_SERVER[HTTP_REFERER]");  

                            }else{ 

                              header("location:index.php?module=users&action=page_erreur");

                            }

                        }


                        $id_etudiant=htmlentities(htmlspecialchars($_GET['cood']));

                        $requete1 = "SELECT * FROM payement WHERE id_etu=?";
                        $param1 = array($id_etudiant);

                        if(isset($_GET['cood']) && existanceGestion($requete1, $param1)){

                          $requete2 = "SELECT nom_pers FROM personne WHERE id_pers=?";
                          $requete3 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
                          $param2 = array($id_etudiant);
                          //Recuperation du nom et prenom de l'etudiant
                          $nom_pers = getChampsParametrage($requete2, $param2);
                          $prenom_pers = getChampsParametrage($requete3, $param2);


                        }else{

                            header("location:index.php?module=users&action=page_erreur");
                        }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i><span style="font-family:Times New Roman"> Payement </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Cursus</li>
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
                                <h3 class="panel-title" style="font-family:Times New Roman">Liste des payements du  cursus de <b class="text-info"><?php echo $nom_pers.' '.$prenom_pers; ?></b></h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <a href="index.php?module=gestion&action=saisie_cursus" class="btn btn-mint btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th class="text-center">Etab</th>
                                                <th class="text-center">Filière</th>
                                                <th class="text-center">Niveau Etude</th>
                                                <th class="text-center">Diplôme</th>
                                                <th class="text-center">Resultat</th>
                                                <th class="text-center">Année academique</th>
                                                <th class="text-center">Agent</th>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM payement 
                                                        WHERE type_payement='Cursus'
                                                        AND id_etu=?
                                                        ORDER BY id_annee ASC";

                                                $requete4 = AfficherTout($sql); 
                                                $param4 = array($id_etudiant);
                                                //exécution de la requête de sélection et retour des résultats
                                                $requete4->execute($param4);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$requete4->fetch()){ 
                                                    //Recuperation du nom et prenom de l'agent'
                                                    $requete5 = "SELECT nom_pers FROM personne WHERE id_pers=?";
                                                    $requete6 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
                                                    $param3 = array($tablo['id_personnel']);

                                                    $nom_pers = getChampsUsers($requete5, $param3);
                                                    $prenom_pers = getChampsUsers($requete6, $param3);
                                                    // Recuperation du libellé du niveau d'etude
                                                    $requete7 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
                                                    $param7 = array($tablo['id_niveauetude']);
                                                    $lib_niveauetude = getChampsUsers($requete7, $param7);
                                                    // Recuperation du libellé du niveau d'etude
                                                    $requete8 = "SELECT lib_annee FROM annee_academique WHERE id_annee=?";
                                                    $param8 = array($tablo['id_annee']);
                                                    $lib_annee = getChampsUsers($requete8, $param8);
                                                    // Recuperation du libellé de la filiere
                                                    $requete9 = "SELECT lib_filiere FROM filiere WHERE id_filiere=?";
                                                    $param9 = array($tablo['id_filiere']);
                                                    $lib_filiere = getChampsUsers($requete9, $param9);
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $tablo['etablissement']; ?></td>
                                                <td class="text-center"><?php echo $lib_filiere; ?></td>
                                                <td class="text-center"><?php echo $lib_niveauetude; ?></td>
                                                <td class="text-center"><?php echo $tablo['diplome']; ?></td>
                                                <td class="text-center"><?php echo $tablo['resultat']; ?></td>
                                                <td class="text-center"><?php echo $lib_annee; ?></td>
                                                <td class="text-center"><?php echo $nom_pers.' '.$prenom_pers; ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=editer_cursus&cood=<?php echo $tablo['id_paye']; ?>" class="btn btn-primary btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a> 
                                                    <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_paye'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <a href="index.php?module=gestion&action=recapitulatif_cursus&cood=<?php echo $tablo['id_paye']; ?>" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                    <div class="modal fade <?php echo $tablo['id_paye'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d'un cursus</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=detail_cursus&cood=<?php echo $id_etudiant; ?>&parasup=<?php echo $tablo['id_paye'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                        
                                                                            <div class="table-responsive">
                                                                                  <table>
                                                                                        <tr>
                                                                                            <td><b>Identifiant : </b></td><td><?php echo $tablo['id_paye']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Filiere : </b></td><td><?php echo $tablo['lib_filiere']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Année academique : </b></td><td><?php echo $lib_annee; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Diplôme : </b></td><td><?php echo $tablo['diplome']; ?></td>
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