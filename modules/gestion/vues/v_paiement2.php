<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
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

                            $id_paye=htmlspecialchars($_GET['parasup']);
                            $requet1 = "SELECT * FROM paiement WHERE id_paye = ? ";
                            $param = array($id_paye);

                            if(isset($_GET['parasup']) && existanceGestion($requete, $param)){

                                $paiement = new Paiement();

                                $paiement->setIdPaye($id_paye);
                              
                                $paiement->supprimerPaiement();

                                header("location:$_SERVER[HTTP_REFERER]");   

                            }else{ 

                              header("location:index.php?module=users&action=accueil");

                            }

                          }


                        $id_pers = htmlspecialchars($_GET['cood']);

                        $requete = "SELECT * FROM personne WHERE id_pers = ? ";
                        $param = array($id_pers);
                        if(isset($id_pers) && existanceGestion($requete, $id_pers)){

                          $val_recuperer0 = "nom_pers";
                          $val_recuperer01 = "prenom_pers";
                          $nom_etu = getChampsUsers($val_recuperer0, $table1, $colonne1, $id_pers);
                          $prenom_etu = getChampsUsers($val_recuperer01, $table1, $colonne1, $id_pers);

                        }else{

                            header("location:index.php?module=users&action=accueil");
                        }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Ravie"> Frais scolaire </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Paiement </li>
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
                                <h3 class="panel-title">Liste des paiements de <b class="text-info"><?php echo $nom_etu.' '.$prenom_etu; ?></b></h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <a href="index.php?module=gestion&action=saisie_paiement" class="btn btn-success btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mois</th>
                                                <th class="text-center">Année</th>
                                                <th class="text-center">Prix à payer</th>
                                                <th class="text-center">Avance</th>
                                                <th class="text-center">Reste</th>
                                                <th class="text-center">Payé le</th>
                                                <th class="text-center">Personnel</th>
                                                <th ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM paiement WHERE id_etu=?";

                                                $requete = AfficherTout($sql); 
                                                $param = array($id_pers);
                                                //exécution de la requête de sélection et retour des résultats
                                                $requete->execute($param);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$requete->fetch()){

                                                $requete1 = "SELECT montant FROM frait WHERE id_frait=?";
                                                $param1 = array($tablo['id_frait']);

                                                $requete2 = "SELECT prix FROM classe WHERE id_classe=?";
                                                $param2 = array($id_classe);

                                                

                                                $val_recuperer5 ="lib_annee";
                                                $table5 = "annee_academique";
                                                $colonne5 = "id_annee";

                                                $val_recuperer6 ="nom_pers";
                                                $val_recuperer7 ="prenom_pers";
                                                $table6 = "personne";
                                                $colonne6 = "id_pers"; 

                                                $table7 = "classe";
                                                $colonne7 = "id_classe";
                                                $val_recuperer8 = "id_classe";
                                                $val_recuperer9 = "prix";

                                              // Recuperation de la classe de l'etudiant 
                                                $id_classe = getChampsUsers($val_recuperer8, $table6, $colonne1, $id_pers);
                                              // Recuperation du prix a payer pour cette classe
                                                $prix = getChampsParametrage($requete1, $param1);

                                                $reste = $prix - getChampsParametrage($requete1, $param1);
                                            ?>
                                            <tr>
                                                
                                                <td class="text-primary text-center">
                                                    <b>
                                                        <?php 
                                                            if($tablo['mois'] == "1"){
                                                                echo 'Janvier';
                                                            }else if($tablo['mois']=="2"){
                                                                echo 'Fevrier';
                                                            }else if($tablo['mois']=="3"){
                                                                echo 'Mars';
                                                            }else if($tablo['mois']=="4"){
                                                                echo 'Avril';
                                                            }else if($tablo['mois']=="5"){
                                                                echo 'Mais';
                                                            }else if($tablo['mois']=="6"){
                                                                echo 'Juin';
                                                            }else if($tablo['mois']=="7"){
                                                                echo 'Juillet';
                                                            }else if($tablo['mois']=="8"){
                                                                echo 'Août';
                                                            }else if($tablo['mois']=="9"){
                                                                echo 'Septembre';
                                                            }else if($tablo['mois']=="10"){
                                                                echo 'Octobre';
                                                            }else if($tablo['mois']=="11"){
                                                                echo 'Novembre';
                                                            }else{
                                                                echo 'Décembre';
                                                            } 
                                                        ?>
                                                    </b>
                                                </td>
                                                <td class="text-center"><?php echo getChampsParametrage($val_recuperer5, $table5, $colonne5, $tablo['id_annee']); ?></td>
                                                <td class="text-primary text-center"><b><?php echo $prix; ?> FCFA</b></td>
                                                <td class="text-center"><span class="label label-dark"><?php echo getChampsParametrage($requete1, $param1); ?> FCFA</span></td>
                                                <td class="text-center"><b class="label label-danger"><?php echo $reste; ?> FCFA</b></td>
                                                <td class="text-center"><?php echo date('d-m-Y', strtotime($tablo['date_paye'])); ?></td>
                                                <td class="text-center"><?php echo getChampsUsers($val_recuperer6, $table6, $colonne6, $tablo['id_pers']).' '.getChampsUsers($val_recuperer7, $table6, $colonne6, $tablo['id_pers']); ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=editer_paiement&cood=<?php echo $tablo['id_paye']; ?>" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a> 
                                                    <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_paye'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <a href="index.php?module=users&action=imprimer_paiement&cood=<?php echo $tablo['id_paye']; ?>" class="btn btn-mint btn-xs" title='Imprimer' style ="border-radius:5px"><i class="glyphicon glyphicon-print"></i></a> 
                                                    <div class="modal fade <?php echo $tablo['id_paye'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression du paiement</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=paiement2&cood=<?php echo $id_pers ?>&parasup=<?php echo $tablo['id_paye'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                      <div>
                                                                         <table>
                                                                            <tr>
                                                                                <td><b>Identifiant : </b></td><td><?php echo $tablo['id_paye']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Nom : </b></td><td><?php echo $nom_etu; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Prénom: </b></td><td><?php echo $prenom_etu; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>Mois : </b></td><td><?php echo $tablo['mois']; ?></td>
                                                                            </tr>
                                                                          </table><br/>
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