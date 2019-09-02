<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Matière - INPTIC</title>
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

                  if(isset($_POST['supprimer'])){

                    $id_matiere=htmlspecialchars($_GET['parasup']);

                    $requete ="SELECT * FROM matiere WHERE id_matiere=?";

                    $param = array($id_matiere);

                    if(isset($_GET['parasup']) && existanceParametrage($requete,$param)){

                        $matiere = new Matiere();

                        $matiere->setCodeMat($id_matiere);
                      
                        $matiere->supprimerMatiere();

                        header("location:$_SERVER[HTTP_REFERER]");   

                    }else{

                      header("location:index.php?module=users&action=accueil");

                    }

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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Parametrage </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Matière </li>
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
                                <h3 class="panel-title" style="font-family:Times New Roman"><b>Liste des matières</b></h3>
                            </div>
                            <div class="panel-body">

                                <center>
                                    <a href="index.php?module=parametrage&action=saisie_matiere" class="btn btn-mint btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                              <div id="afficher_pays">
                                  <div class="table-responsive">
                                      <table id="demo-dt-basic" class="table table-striped table-bordered">
                                          <thead>
                                              <tr class="bg-gray">
                                                  <th class="text-center">Identifiant</th>
                                                  <th class="text-center">Libellé</th>
                                                  <th class="text-center"></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                                  $sql =" SELECT * FROM matiere";
                                                  $request2 = AfficherTout($sql);
                                                  //exécution de la requête de sélection et retour des résultats
                                                  $request2->execute();
                                                  //Conservation lignes par ligne des élements retournés
                                                  while($p=$request2->fetch()){ ?>
                                              <tr>
                                                  <td class="text-center"><?php echo $p['id_matiere']; ?></td>
                                                  <td class="text-center"><?php echo $p['lib_matiere']; ?></td>
                                                  <td class="text-center">
                                              
                                                <center>
                                                  <a href="index.php?module=parametrage&action=editer_matiere&cood=<?php echo $p['id_matiere']; ?>" class="btn btn-primary btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a>

                                                  <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $p['id_matiere'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                  <!-- modale de suppression -->
                                                    <div class="modal fade <?php echo $p['id_matiere'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Voulez-vous supprimer ?</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=parametrage&action=detail_matiere&parasup=<?php echo $p['id_matiere'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                      <?php 

                                                                        $requete1 = "SELECT * FROM Programme WHERE id_matiere=?";
                                                                        $requete2 = "SELECT * FROM enseigner WHERE id_matiere=?";
                                                                        $requete3 = "SELECT * FROM composer WHERE id_matiere=?";
                                                                        $requete4 = "SELECT * FROM emploi_temps WHERE lundi=?";
                                                                        $requete5 = "SELECT * FROM emploi_temps WHERE mardi=?";
                                                                        $requete6 = "SELECT * FROM emploi_temps WHERE mercredi=?";
                                                                        $requete7 = "SELECT * FROM emploi_temps WHERE jeudi=?";
                                                                        $requete8 = "SELECT * FROM emploi_temps WHERE vendredi=?";
                                                                        $requete9 = "SELECT * FROM emploi_temps WHERE samedi=?";
                                                                        $param1 = array($p['id_matiere']);

                                                                        $colonne7 = "samedi";
                                                                        $nb_programme = getNombreLigneGestion($requete1,$param1);
                                                                        $nb_enseigner = getNombreLigneGestion($requete2,$param1);
                                                                        $nb_composer = getNombreLigneGestion($requete3,$param1);
                                                                        // On compte le nombre de fois que la matiere a été le lundi programmer dans l'emploi de temps.
                                                                        $nb_lundi = getNombreLigneGestion($requete4,$param1);
                                                                        $nb_mardi = getNombreLigneGestion($requete5,$param1);
                                                                        $nb_mercredi = getNombreLigneGestion($requete6,$param1);
                                                                        $nb_jeudi = getNombreLigneGestion($requete7,$param1);
                                                                        $nb_vendredi = getNombreLigneGestion($requete8,$param1);
                                                                        $nb_samedi = getNombreLigneGestion($requete9,$param1);

                                                                        $nb_emploi = $nb_lundi + $nb_mardi + $nb_mercredi + $nb_jeudi + $nb_vendredi + $nb_samedi;
                                                                        
                                                                        if($nb_programme > 0 ){ ?>

                                                                            <p> Cette matière contient <b><?php echo $nb_programme ?></b> programmes, il est donc impossible de le supprimer.</p>
                                                                            <div class="table-responsive">
                                                                                <table>
                                                                                     <tr>
                                                                                          <td><b>Identifiant : </b></td><td><?php echo $p['id_matiere']; ?></td>
                                                                                      </tr>
                                                                                      <tr>
                                                                                          <td><b>Libellé : </b></td><td><?php echo $p['lib_matiere']; ?></td>
                                                                                      </tr>
                                                                                  </table><br/>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                          
                                                                                <br/>
                                                                            </div>
                                                                        
                                                                      <?php  }else if($nb_enseigner >0){ ?>

                                                                          <p> Cette matière contient <b><?php echo $nb_enseigner ?></b> enseignements, il est donc impossible de le supprimer.</p>
                                                                            <div class="table-responsive">
                                                                                <table>
                                                                                     <tr>
                                                                                          <td><b>Identifiant : </b></td><td><?php echo $p['id_matiere']; ?></td>
                                                                                      </tr>
                                                                                      <tr>
                                                                                          <td><b>Libellé : </b></td><td><?php echo $p['lib_matiere']; ?></td>
                                                                                      </tr>
                                                                                  </table><br/>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                          
                                                                                <br/>
                                                                            </div>

                                                                      <?php  }else if($nb_composer >0){ ?>

                                                                          <p> Cette matière contient <b><?php echo $nb_composer ?></b> compositions, il est donc impossible de le supprimer.</p>
                                                                            <div class="table-responsive">
                                                                                <table>
                                                                                     <tr>
                                                                                          <td><b>Identifiant : </b></td><td><?php echo $p['id_matiere']; ?></td>
                                                                                      </tr>
                                                                                      <tr>
                                                                                          <td><b>Libellé : </b></td><td><?php echo $p['lib_matiere']; ?></td>
                                                                                      </tr>
                                                                                  </table><br/>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                          
                                                                                <br/>
                                                                            </div>

                                                                      <?php  }else if($nb_emploi >0){ ?>

                                                                          <p> Cette matière contient <b><?php echo $nb_emploi ?></b> d'emplois du temps, il est donc impossible de le supprimer.</p>
                                                                            <div class="table-responsive">
                                                                                <table>
                                                                                     <tr>
                                                                                          <td><b>Identifiant : </b></td><td><?php echo $p['id_matiere']; ?></td>
                                                                                      </tr>
                                                                                      <tr>
                                                                                          <td><b>Libellé : </b></td><td><?php echo $p['lib_matiere']; ?></td>
                                                                                      </tr>
                                                                                  </table><br/>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                          
                                                                                <br/>
                                                                            </div>

                                                                      <?php  }else{ ?>
                                                                            <div class="table-responsive">
                                                                                <table>
                                                                                     <tr>
                                                                                          <td><b>Identifiant : </b></td><td><?php echo $p['id_matiere']; ?></td>
                                                                                      </tr>
                                                                                      <tr>
                                                                                          <td><b>Libellé : </b></td><td><?php echo $p['lib_matiere']; ?></td>
                                                                                      </tr>
                                                                                  </table><br/>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                  <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>      
                                                                                <br/>
                                                                            </div>

                                                                      <?php  } ?>
                                                                      
                                                                    </div>
                                                                  </center>
                                                              </form>
                                                             </div>

                                                          </div>
                                                        </div>
                                                    </div>

                                                    <!-- modale d'edition -->

                                                      <div class="modal fade" data-backdrop="false" id="update_matiere" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header" style ="background-color:rgb(0,0,43,0.8); color:white">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <h4 class="modal-title" id="myModalLabel"><center>Edition d'une matière</center></h4>
                                                            </div>
                                                            <form  method="POST" class="form-horizontal form-label-left input_mask" id="form_edit">
                                                              <div class="modal-body" id="update_details">
                                                                                                      
                                                              </div>
                                                            </form> 
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <!-- fin du modal d'edition' -->

                                                      
                                                </center>
                                            
                                         </td>
                                              </tr>
                                              <?php } ?>
                                          </tbody>
                                      </table>
                                  </div>
                                </div>
                            </div>


                            <!-- Modale qui affiche le message apres chaque operation -->

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

                            <!-- fin du modal d'edition' -->
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