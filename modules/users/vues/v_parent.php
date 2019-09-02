<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parent</title>
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

                            $id_pers=htmlentities(htmlspecialchars($_GET['parasup']));
                            $requete = "SELECT * FROM personne WHERE id_pers=?";
                            $param = array($id_pers);

                            if(isset($_GET['parasup']) && existanceUsers($requete,$param)){

                                $parent = new Parent();

                                $parent->setId_pers($id_pers);
                              
                                $parent->supprimerParent();

                                header("location:$_SERVER[HTTP_REFERER]");  

                            }else{

                              header("location:index.php?module=users&action=accueil");

                            }

                          }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Utilisateur </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Parent </li>
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
                                <h3 class="panel-title" style="font-family:Times New Roman">Liste des parents</h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <a href="index.php?module=users&action=saisie_parent" class="btn btn-mint btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Adresse</th>
                                                <th>Téléphone</th>
                                                <th>Accès</th>
                                                <th>Act/desac</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql ="SELECT * FROM personne p, pays py 
                                                        WHERE p.code_pays = py.code_pays 
                                                        AND type_pers='Parent'";
                                                  $request = afficherTout($sql); 
                                                  //exécution de la requête de sélection et retour des résultats
                                                  $request->execute();
                                                  //Conservation lignes par ligne des élements retournés
                                                  while($tablo=$request->fetch()){ ?>
                                            <tr>
                                                <td><?php echo $tablo['nom_pers']; ?></td>
                                                <td><?php echo $tablo['prenom_pers']; ?></td>
                                                <td><?php echo $tablo['adresse_pers']; ?></td>
                                                <td><?php echo $tablo['tel_pers']; ?></td>
                                                <td class="text-center"><?php echo $tablo['droit_acces']; ?></td>
                                                <td class="text-center">
                                                    <?php if($tablo['droit_acces']==0){ ?>
                                                        <span><a href="index.php?module=users&action=updateAcces&cood=<?php echo $tablo['id_pers']; ?>&cood2=<?php echo $tablo['droit_acces']; ?>" class="btn btn-default btn-xs" style ="border-radius:5px"><i class="fa fa-ban text-danger"></i></a>
                                                    <?php }else{ ?>
                                                        <a href="index.php?module=users&action=updateAcces&cood=<?php echo $tablo['id_pers']; ?>&cood2=<?php echo $tablo['droit_acces']; ?>" class="btn btn-default btn-xs" style ="border-radius:5px"><i class="fa fa-check-circle-o text-success"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td>

                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" type="button"><i class="fa fa-tasks"></i><i class="dropdown-caret fa fa-caret-down"></i></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="index.php?module=users&action=editer_parent&cood=<?php echo $tablo['id_pers']; ?>" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"> Modifier</i></a> </li>
                                                            <li><a title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_pers'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"> Supprimer</i></a></li>
                                                            <li><a data-target=".<?php echo $tablo['id_pers'];?>mbs-example-modal-ms" data-toggle="modal" title="details" role="dialog" data-backdrop="false" aria-hidden="true"><i class="glyphicon glyphicon-user"> Profil</i></a> </li>
                                                        </ul>
                                                    </div> 
                                                    
                                                    <div class="modal fade <?php echo $tablo['id_pers'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d'un parent</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=users&action=parent&&parasup=<?php echo $tablo['id_pers'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                        <?php
                                                                            
                                                                            $requete = "SELECT * FROM personne WHERE type_pers='Etudiant' AND id_par=?";
                                                                            $param = array( $tablo['id_pers']);
                                                                            $nb_etudiant = getNombreLigneGestion($requete,$param);

                                                                        if($nb_etudiant > 0){ ?>
                                                                            <p> Ce parent contient <b><?php echo $nb_etudiant ?></b> etudiants, il est donc impossible de le supprimer.</p>
                                                                              <div class="table-responsive">
                                                                                  <table>
                                                                                        <tr>
                                                                                            <td><b>Identifiant : </b></td><td><?php echo $tablo['id_pers']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Nom : </b></td><td><?php echo $tablo['nom_pers']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Prénom : </b></td><td><?php echo $tablo['prenom_pers']; ?></td>
                                                                                        </tr>
                                                                                    </table><br/>
                                                                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                  
                                                                              </div>
                                                                      <?php }else{ ?>

                                                                            <div class="table-responsive">
                                                                                  <table>
                                                                                        <tr>
                                                                                            <td><b>Identifiant : </b></td><td><?php echo $tablo['id_pers']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Nom : </b></td><td><?php echo $tablo['nom_pers']; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><b>Prénom : </b></td><td><?php echo $tablo['prenom_pers']; ?></td>
                                                                                        </tr>
                                                                                    </table><br/>
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

                                                    <!-- Fin de modal de suppession -->

                                                    <!-- debut modal de profil -->
                                              
                                                <div class="modal fade <?php echo $tablo['id_pers'];?>mbs-example-modal-ms">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color:rgb(28,36,47); color : white">
                                                                <button type="button" class="close" data-dismiss="modal"> x </button>
                                                                <p style="text-align:center; font-family:ravie" class="text-mint"><b><?php echo $tablo['nom_pers'].' '.$tablo['prenom_pers'];?></b></p>

                                                            </div>
                                                            <div class="modal-body">

                                                               <div class="row">
                                                                   <div class="col-md-4">
                                                                      <center><h4 class="modal-title"> <img src="img/photos/atipo.jpg" class="img-circle img-thumbnail" width ="250" height="250"/></h4></center>
                                                                   </div>
                                                                    <div class="col-md-8">
                                                                      <table>
                                                                        <tr>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Adresse :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"class="pull-right"><?php echo $tablo['adresse_pers'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Téléphone :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right label label-success"><?php echo $tablo['tel_pers'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Sexe :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right"><?php echo $tablo['sexe_pers'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Profession :</b></td>
                                                                          <td style ="padding-right:20px" class="pull-right"><?php echo $tablo['prof_par'];?></td> 
                                                                        </tr>
                                                                        <tr >
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Pays :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right">
                                                                            <?php echo $tablo['lib_pays'];?>
                                                                          </td> 
                                                                        </tr>

                                                                      </table>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                          <div class="panel-footer text-center" style="background-color:rgb(28,36,47); color : white">
                                                              <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fermer</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                          <!-- fin modal du profil -->

                                          <!--  modal info -->
                                              
                                                <div class="modal fade <?php echo $tablo['id_pers'];?>modal-parent">
                                                    
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color:rgb(28,36,47); color : black">
                                                                <button type="button" class="close" data-dismiss="modal"> x </button>
                                                                <p style="text-align:center; font-family:ravie" class="text-mint"><b><?php echo $tablo['nom_pers'].' '.$tablo['prenom_pers'];?></b></p>
                                                            </div>
                                                            <div class="modal-body">

                                                               <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table id="demo-dt-basic" class="table table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Nom</th>
                                                                                    <th>Prénom</th>
                                                                                    <th>Sexe</th>
                                                                                    <th>Filière</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                
                                                                                $requet = "SELECT * FROM personne p, filiere f
                                                                                            WHERE p.id_filiere = f.id_filiere
                                                                                            AND type_pers = 'Etudiant' 
                                                                                            AND id_par = ?";

                                                                                
                                                                                $req = afficherTout($requet); 
                                                                                $par = array($tablo['id_pers']);
                                                                                //exécution de la requête de sélection et retour des résultats
                                                                                $req->execute($par);
                                                                                //Conservation lignes par ligne des élements retournés
                                                                                while($tab=$req->fetch()){ ?>
                                                                                <tr>
                                                                                    <td><?php echo $tab['nom_pers']; ?></td>
                                                                                    <td><?php echo $tab['prenom_pers']; ?></td>
                                                                                    <td><?php echo $tab['sexe_pers']; ?></td>
                                                                                    <td><?php echo $tab['lib_filiere']; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                          <div class="panel-footer text-center" style="background-color:rgb(28,36,47); color : white">
                                                              <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fermer</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                          <!-- fin modal info -->
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