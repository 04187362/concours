<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Candidat - GESET</title>
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

                            $id_etudiant=htmlentities(htmlspecialchars($_GET['parasup']));

                            $requete = "SELECT * FROM personne WHERE id_pers = ? ";

                            $param = array($id_etudiant);

                            if(isset($_GET['parasup']) && existanceUsers($requete, $param)){

                                $etudiant = new Etudiant();

                                $etudiant->setId_pers($id_etudiant);
                              
                                $etudiant->supprimerEtudiant();

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
                                <li class="active"> Etudiant </li>
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
                                <h3 class="panel-title" style="font-family:Times New Roman"><b>Liste des candidats</b></h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <a href="index.php?module=users&action=saisie_candidat" class="btn btn-success btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i> Ajouter
                                    </a>
                                </center>
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Adresse</th>
                                                <th>Téléphone</th>
                                                <th>Filière</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                  $sql ="SELECT * FROM personne p, filiere c, pays py, specialite s 
                                                        WHERE p.id_filiere = c.id_filiere 
                                                        AND p.code_pays = py.code_pays
                                                        AND s.id_spe = p.id_spe 
                                                        AND type_pers='Candidat'";
                                                  $requete = afficherTout($sql); 
                                                  //exécution de la requête de sélection et retour des résultats
                                                  $requete->execute();
                                                  //Conservation lignes par ligne des élements retournés
                                                  while($tablo=$requete->fetch()){?>
                                            <tr>
                                                <td><?php echo $tablo['nom_pers']; ?></td>
                                                <td><?php echo $tablo['prenom_pers']; ?></td>
                                                <td><?php echo $tablo['adresse_pers']; ?></td>
                                                <td class="text-center"><?php echo $tablo['tel_pers']; ?></td>
                                                <td class="text-center"><?php echo $tablo['lib_filiere']; ?></td>
                                                <td class="text-center">

                                                    <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" type="button">Action <i class="dropdown-caret fa fa-caret-down"></i></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="index.php?module=users&action=editer_candidat&cood=<?php echo $tablo['id_pers']; ?>" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil">  Modifier</i></a> </li>
                                                        <li><a  title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_pers'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash">  Supprimer</i></a></li>
                                                        <li><a data-target=".<?php echo $tablo['id_pers'];?>mbs-example-modal-ms" data-toggle="modal" title="details" role="dialog" data-backdrop="false" aria-hidden="true"><i class="glyphicon glyphicon-user">  Profile</i></a> </li>
                                                        <li><a data-target=".<?php echo $tablo['id_pers'];?>modal-parent" data-toggle="modal" title="details" role="dialog" data-backdrop="false" aria-hidden="true"><i class="glyphicon glyphicon-user"> Etat civil</i></a> </li>
                                                    </ul>
                                                </div> 
                                                   <!-- Modal de suppression--> 
                                                    <div class="modal fade <?php echo $tablo['id_pers'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d'un etudiant</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=users&action=etudiant&parasup=<?php echo $tablo['id_pers'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                         
                                                                          <?php

                                                                            $requete1 = "SELECT count(*) as effectif FROM composer WHERE id_etu=?";
                                                                            $requete2 = "SELECT count(*) as effectif FROM paiement WHERE id_etu=?";
                                                                            $requete3 = "SELECT count(*) as effectif FROM preinscription WHERE id_candidat=?";
                                                                            $param1 = array($tablo['id_pers']); 

                                                                            $nb_composition = getNombreLigneGestion($requete1, $param1);
                                                                            $nb_paiement = getNombreLigneGestion($requete2, $param1);
                                                                            $nb_inscription = getNombreLigneGestion($requete3, $param1);

                                                                        if($nb_composition > 0){ ?>
                                                                                    
                                                                            <p> Cet etudiant a effectué <b><?php echo $nb_composition ?></b> composition(s), il est donc impossible de le supprimer.</p>
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
                                                                                        </table>
                                                                                        <br>
                                                                                      <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                    </div>

                                                                    <?php }else if($nb_paiement > 0){ ?>
                                                                            <p> Ce personnel a effectué <b><?php echo $nb_paiement ?></b> paiement(s), il est donc impossible de le supprimer.</p>
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
                                                                                        </table>
                                                                                        <br>
                                                                                      <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                    </div>
                                                                        <?php }else if($nb_inscription > 0){ ?>
                                                                            <p> Ce etudiant contient <b><?php echo $nb_inscription ?></b> inscription, il est donc impossible de le supprimer.</p>
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
                                                                                        </table>
                                                                                        <br>
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
                                                                                        </table>
                                                                                        <br>
                                                                                      <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                      <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>
                                                                                    </div>
                                                                        <?php  } ?>
                                                                    </div>
                                                                  </center>
                                                              </form>
                                                             </div>

                                                          </div>
                                                        </div>
                                                    </div>

                                              <!-- fenetre de description du profil -->
                                              
                                                <div class="modal fade <?php echo $tablo['id_pers'];?>mbs-example-modal-ms">
                                                    <div class="modal-dialog modal-md" style="border:2px solid black">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-gray">
                                                                <p style="font-family:lucida console" class="text-center"><b><?php echo $tablo['nom_pers'].' '.$tablo['prenom_pers'];?></b></p>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-center"><center><h4 class="modal-title"> <img src="img/photos/<?php echo $tablo['image']; ?>" class="img-circle img-thumbnail" width ="200" height="200"/></h4></center></p>
                                                               <div class="row">
                                                                    <div class="col-md-12">
                                                                      <table>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px"><b>Adresse : </b></td>
                                                                          <td style ="padding-bottom:10px"><?php echo $tablo['adresse_pers'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px"><b>Téléphone : </b></td>
                                                                          <td style ="padding-bottom:10px"><?php echo $tablo['tel_pers'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px"><b>Sexe : </b></td>
                                                                          <td style ="padding-bottom:10px"><?php echo $tablo['sexe_pers'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px"><b>Date naissance : </b></td>
                                                                         <td style ="padding-bottom:10px"><?php echo $tablo['date_nais_etu'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px"><b>Lieu naissanace : </b></td>
                                                                          <td style ="padding-right:20px"><?php echo $tablo['lieu_nais_etu'];?></td> 
                                                                        </tr>
                                                                        <tr >
                                                                          <td style ="padding-bottom:10px"><b>Pays : </b></td>
                                                                          <td style ="padding-bottom:10px">
                                                                            <?php echo $tablo['lib_pays']; ?>
                                                                          </td> 
                                                                        </tr>

                                                                        <tr>
                                                                          <td style ="padding-bottom:10px"><b>Filière : </b></td>
                                                                          <td style ="padding-right:20px">
                                                                            <?php echo $tablo['lib_filiere']; ?>
                                                                          </td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px"><b>Spécialité : </b></td>
                                                                          <td style ="padding-right:20px">
                                                                            <?php echo $tablo['lib_spe']; ?>
                                                                          </td> 
                                                                        </tr>

                                                                      </table>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                          <div class="panel-footer text-center bg-gray">
                                                              <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fermer</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                          <!-- fin de la fenetre de description -->

                                          <!--  description du parent -->
                                              
                                                <div class="modal fade <?php echo $tablo['id_pers'];?>modal-parent">
                                                    
                                                    <div class="modal-dialog modal-md" style="border:2px solid black">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-gray">
                                                                <p style="font-family:Times New Roman" class="text-center"><b>ETAT CIVIL</b></p>
                                                            </div>
                                                            <div class="modal-body">

                                                               <div class="row">
                                                                   <div class="col-md-4">
                                                                      <center><h4 class="modal-title"> <img src="img/photos/<?php echo $tablo['image']; ?>" class="img-circle img-thumbnail" width ="250" height="250"/></h4></center>
                                                                   </div>
                                                                    <div class="col-md-8">
                                                                      <table>
                                                                        <tr>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Diplôme :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right"><?php echo $tablo['diplome'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Serie du bac :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right label label-success"><?php echo $tablo['serie'];?></td> 
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Niveau d'etude universitaire :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right">0</td> 
                                                                        </tr>
                                                                        <tr >
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Pays :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right">
                                                                            <?php echo $tablo['lib_pays']; ?>
                                                                          </td> 
                                                                        </tr>
                                                                        <tr >
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Lieu de résidence :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right">
                                                                            <?php echo $tablo['adresse_pers']; ?>
                                                                          </td> 
                                                                        </tr>

                                                                        <tr >
                                                                          <td style ="padding-right:20px; padding-bottom:10px"><b>Statut de prise charge :</b></td>
                                                                          <td style ="padding-right:20px; padding-bottom:10px" class="pull-right">
                                                                            <?php echo $tablo['statut']; ?>
                                                                          </td> 
                                                                        </tr>
                                                                      </table>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                          <div class="panel-footer text-center bg-gray">
                                                              <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fermer</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                          <!-- fin de la fenetre de description -->
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