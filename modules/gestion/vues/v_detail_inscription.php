<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription - GESET</title>
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

                            $id_ins=htmlentities(htmlspecialchars($_GET['parasup']));
                            $requete = "SELECT * FROM inscription WHERE id_ins=?";
                            $param = array($id_ins);

                            if(isset($_GET['parasup']) && existanceGestion($requete,$param)){

                                $inscription = new Inscription();

                                $inscription->setId_ins($id_ins);
                              
                                $inscription->supprimerInscription();

                                header("location:$_SERVER[HTTP_REFERER]");
  

                            }else{ 

                              header("location:index.php?module=users&action=accueil");

                            }

                          }

                          // Verifiant si le niveau etude à modifier a été programmé.
                        $id_filiere = addslashes(htmlspecialchars($_GET['cood']));
                        $requete2 = "SELECT * FROM inscription i, personne p
                                    WHERE p.id_pers = i.id_etu
                                    AND p.id_filiere=?";
                        $param2 = array($id_filiere);
                        if(isset($_GET['cood']) && existanceParametrage($requete2,$param2)){

                         $requete3 = "SELECT lib_filiere FROM filiere WHERE id_filiere=?";
                         //Recuperation du libellé du niveau d'etude.
                          $lib_filiere = getChampsParametrage($requete3,$param2);
                        }else{

                            header("location:index.php?module=users&action=page_erreur");
                        }

                    ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Payement </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Inscription </li>
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
                                <h3 class="panel-title" style="font-family:Times New Roman">Liste des étudiant inscris en <span class="text-primary"><?php echo $lib_filiere; ?></span></h3>
                            </div>
                            <div class="panel-body">
                                <center>
                                    <a href="index.php?module=gestion&action=saisie_inscription" class="btn btn-mint btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th class="text-center">Etudiant</th>
                                                <th class="text-center">Niveau</th>
                                                <th class="text-center">Frais</th>
                                                <th class="text-center">Payé le</th>
                                                <th class="text-center">Année Académique</th>
                                                <th class="text-center">Agent</th>
                                                <td class="text-center"></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql ="SELECT * FROM inscription i, personne p, annee_academique a, frait f, niveau_etude n
                                                            WHERE i.id_etu = p.id_pers
                                                            AND i.id_annee = a.id_annee
                                                            AND i.id_frait = f.id_frait
                                                            AND p.id_niveauetude = n.id_niveauetude
                                                            AND p.id_filiere = ?
                                                            AND i.id_annee = ?";
                                                $request = AfficherTout($sql);
                                                $parameter=array($id_filiere,$id_an); 
                                                //exécution de la requête de sélection et retour des résultats
                                                $request->execute($parameter);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$request->fetch()){
                                                    //Recuperation du nom et prenom de l'agent
                                                    $requete4 = "SELECT nom_pers FROM personne p WHERE id_pers=?";
                                                    $requete5 = "SELECT prenom_pers FROM personne p WHERE id_pers=?";
                                                    $param5 = array($tablo['id_personnel']);
                                                    $nom_agent = getChampsUsers($requete4,$param5);
                                                    $prenom_agent = getChampsUsers($requete5,$param5);
                                            ?>
                                            <tr>
                                                <td><?php echo $tablo['nom_pers'].' '.$tablo['prenom_pers']; ?></td>
                                                <td class="text-center"><?php echo $tablo['lib_niveauetude']; ?></td>
                                                <td class="text-center"><?php echo $tablo['montant']; ?> FCFA</td>
                                                <td class="text-center"><?php echo date('d-m-Y', strtotime($tablo['date_ins'])); ?></td>
                                                <td class="text-center"><?php echo $tablo['lib_annee']; ?></td>
                                                <td><?php echo $nom_agent.' '.$prenom_agent; ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=editer_inscription&cood=<?php echo $tablo['id_ins']; ?>" class="btn btn-primary btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a> 
                                                    <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $tablo['id_ins'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <a class="btn btn-warning btn-xs" data-target=".<?php echo $tablo['id_ins'];?>modal-detail" data-toggle="modal" title="details" role="dialog" data-backdrop="false"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                    <div class="modal fade <?php echo $tablo['id_ins'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d'une inscription</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=inscription2&parasup=<?php echo $tablo['id_ins'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                        <?php 
                                                                            $requete1 = "SELECT * FROM payement id_etu=?";
                                                                            $param1 = array($tablo['id_etu']);

                                                                            $requete2 = "SELECT * FROM composer id_etu=?";
                                                                            $param2 = array($tablo['id_etu']);
                                                                            // Verifiant si cette matiere a été enseignant dans la classe selectionnée
                                                                            $nb_paiement = getNombreLigneGestion($requete1,$param1);
                                                                            $nb_composition = getNombreLigneGestion($requete2,$param2);
                                                                        
                                                                        if($nb_paiement > 0){ ?>
                                                                            <p> Cet etudiant a effectué <b><?php echo $nb_paiement ?></b> paiement(s), il est donc impossible de le supprimer.</p>
                                                                            <div class="table-responsive">
                                                                                <table>
                                                                                    <tr>
                                                                                        <td><b>Identifiant : </b></td><td><?php echo $tablo['id_ins']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Année académique : </b></td><td><?php echo $tablo['lib_annee']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Nom : </b></td><td><?php echo $tablo['nom_pers']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Prénom : </b></td><td><?php echo $tablo['prenom_pers']; ?></td>
                                                                                    </tr>
                                                                                </table><br>
                                                                              <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button> 
                                                                          </div>
                                                                        <?php }else if($nb_composition > 0){ ?>
                                                                            <div class="table-responsive">
                                                                                <p> Cet etudiant a effectué <b><?php echo $nb_composition ?></b> composition(s), il est donc impossible de le supprimer.</p>
                                                                                <table>
                                                                                    <tr>
                                                                                        <td><b>Identifiant : </b></td><td><?php echo $tablo['id_ins']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Année académique : </b></td><td><?php echo $tablo['lib_annee']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Nom : </b></td><td><?php echo $tablo['nom_pers']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Prénom : </b></td><td><?php echo $tablo['prenom_pers']; ?></td>
                                                                                    </tr>
                                                                                </table><br>
                                                                              <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button> 
                                                                          </div>
                                                                        <?php }else{ ?>
                                                                            <div class="table-responsive">
                                                                                <table>
                                                                                    <tr>
                                                                                        <td><b>Identifiant : </b></td><td><?php echo $tablo['id_ins']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Année académique : </b></td><td><?php echo $tablo['lib_annee']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Nom : </b></td><td><?php echo $tablo['nom_pers']; ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Prénom : </b></td><td><?php echo $tablo['prenom_pers']; ?></td>
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

                                                    <!--  description du parent -->
                                              
                                                            <div class="modal fade <?php echo $tablo['id_ins'];?>modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
                                                                
                                                                <div class="modal-dialog modal-lg" style="border:2px solid black">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-gray">
                                                                            <p style="font-family:Times New Roman" class="text-center"><b>Détail d'inscription</b></p>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <table>
                                                                                    <tr>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><b>Noms :</b></td>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px" class="pull-right"><?php echo $tablo['nom_pers'];?></td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><b>Prénoms :</b></td>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><?php echo $tablo['prenom_pers'];?></td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><b>Année Académique :</b></td>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><?php echo $tablo['lib_annee'];?></td> 
                                                                                    </tr>
                                                                                    
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <table>
                                                                                    <tr>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><b>Filière :</b></td>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><?php echo $lib_filiere;?></td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><b>Niveau :</b></td>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><?php echo $tablo['lib_niveauetude'];?></td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><b>Frais Niveau Etude :</b></td>
                                                                                        <td style ="padding-right:20px; padding-bottom:5px"><?php echo $tablo['frais'];?> FCFA</td> 
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center"><a href="index.php?module=users&action=imprimer_inscription&cood=<?php echo $tablo['id_ins']; ?>" class="btn btn-mint btn-xs"><i class="glyphicon glyphicon-print"></i> Imprimer</a></div>
                                                                    <br>
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