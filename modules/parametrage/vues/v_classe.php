<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Classe</title>
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

                    $colonne="id_classe";

                    $table = "classe";

                    if(isset($_GET['parasup']) && existanceParametrage($table, $colonne, $_GET['parasup'])){

                      //if(existanceEmploye($colonne, $_GET['parasup']) == 0){

                        $id_classe=htmlspecialchars($_GET['parasup']);

                        $classe = new Classe();

                        $classe->setCodeCl($id_classe);
                      
                        $classe->supprimerClasse();

                        header("location:$_SERVER[HTTP_REFERER]");

                      /*}else{

                        header("location:$_SERVER[HTTP_REFERER]");

                      }  */   

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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Ravie"> Parametrage </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Classe </li>
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
                                <h3 class="panel-title">Gestion des classes</h3>
                            </div>
                            <div class="panel-body">
                              <center>
                                    <a href="index.php?module=parametrage&action=saisie_classe" class="btn btn-success btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                                    </a>
                                </center>
                              <div>
                                  <div class="table-responsive">
                                      <table id="demo-dt-basic" class="table table-striped table-bordered">
                                          <thead>
                                              <tr>
                                                  <th class="text-center">Identifiant</th>
                                                  <th class="text-center">Libellé</th>
                                                  <th class="text-center">Droit mensuel</th>
                                                  <th class="text-center">Etat</th>
                                                  <th></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                                  $sql ="SELECT * FROM classe";
                                                  $requete = afficherTout($sql); 
                                                  //exécution de la requête de sélection et retour des résultats
                                                  $requete->execute();
                                                  //Conservation lignes par ligne des élements retournés
                                                  while($p=$requete->fetch()){?>
                                              <tr>
                                                  <td class="text-center"><?php echo $p['id_classe']; ?></td>
                                                  <td class="text-center"><?php echo $p['lib_classe']; ?></td>
                                                  <td class="text-center"><?php echo $p['prix']; ?> FCFA</td>
                                                  <td class="text-center"><a data-target=".<?php echo $p['id_classe'];?>modal-etat" data-toggle="modal" class="btn btn-default btn-xs" title="Etat" role="dialog" data-backdrop="false" aria-hidden="true"><i class="fa fa-spinner"></i></a></td>
                                                  <td class="text-center">
                                              
                                                      <center>
                                                        <a href="index.php?module=parametrage&action=editer_classe&cood=<?php echo $p['id_classe']; ?>" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a> 

                                                        <a  class="btn btn-danger btn-xs" title='Supprimer' data-toggle="modal" data-target=".<?php echo $p['id_classe'];?>sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                        <!-- modale de suppression -->
                                                          <div class="modal fade <?php echo $p['id_classe'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                              <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">

                                                                  <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                                    <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="myModalLabel"><center>Voulez-vous supprimer ?</center></h4>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <form  method="POST" action="index.php?module=parametrage&action=classe&&parasup=<?php echo $p['id_classe'];?>" class="form-horizontal form-label-left input_mask">
                                                                      <center>
                                                                          <div class="form-group">
                                                                            <?php 

                                                                              $table1 = "programme";
                                                                              $table2 = "enseigner";
                                                                              $table3 = "emploi_temps";
                                                                              $table4 = "personne";
                                                                              $colonne1 = "id_classe";
                                                                              $nb_programme = getNombreLigneGestion($table1, $colonne1, $p['id_classe']);
                                                                              $nb_enseigner = getNombreLigneGestion($table2, $colonne1, $p['id_classe']);
                                                                              $nb_emploi = getNombreLigneGestion($table3, $colonne1, $p['id_classe']);
                                                                              $nb_etudiant = getNombreLigneGestion($table4, $colonne1, $p['id_classe']);

                                                                              if($nb_programme > 0){ ?>

                                                                                  <p> Cette classe contient <b><?php echo $nb_programme ?></b> programmes, il est donc impossible de le supprimer.</p>
                                                                                      <div class="table-responsive">
                                                                                              <table>
                                                                                                    <tr>
                                                                                                        <td><b>Identifiant : </b></td><td><?php echo $p['id_classe']; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><b>Libellé : </b></td><td><?php echo $p['lib_classe']; ?></td>
                                                                                                    </tr>
                                                                                        </table><br/>
                                                                                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                    </div>

                                                                            <?php }else if($nb_etudiant > 0){ ?>
                                                                                        <p> Cette classe contient <b><?php echo $nb_etudiant ?></b> etudiants, il est donc impossible de le supprimer.</p>
                                                                                        <div class="table-responsive">
                                                                                            <table>
                                                                                                    <tr>
                                                                                                        <td><b>Identifiant : </b></td><td><?php echo $p['id_classe']; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><b>Libellé : </b></td><td><?php echo $p['lib_classe']; ?></td>
                                                                                                    </tr>
                                                                                            </table><br/>
                                                                                            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                        </div>

                                                                              <?php  }else if($nb_enseigner > 0){ ?>

                                                                                          <p> Cette classe contient <b><?php echo $nb_enseigner ?></b> d'enseignements, il est donc impossible de le supprimer.</p>
                                                                                          <div class="table-responsive">
                                                                                              <table>
                                                                                                      <tr>
                                                                                                          <td><b>Identifiant : </b></td><td><?php echo $p['id_classe']; ?></td>
                                                                                                      </tr>
                                                                                                      <tr>
                                                                                                          <td><b>Libellé : </b></td><td><?php echo $p['lib_classe']; ?></td>
                                                                                                      </tr>
                                                                                              </table><br/>
                                                                                              <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                          </div>

                                                                                  <?php }else if($nb_emploi > 0){ ?>
                                                                                                      <p> Cette classe contient <b><?php echo $nb_enseigner ?></b> d'enseignements, il est donc impossible de le supprimer.</p>
                                                                                                      <div class="table-responsive">
                                                                                                          <table>
                                                                                                                  <tr>
                                                                                                                      <td><b>Identifiant : </b></td><td><?php echo $p['id_classe']; ?></td>
                                                                                                                  </tr>
                                                                                                                  <tr>
                                                                                                                      <td><b>Libellé : </b></td><td><?php echo $p['lib_classe']; ?></td>
                                                                                                                  </tr>
                                                                                                          </table><br/>
                                                                                                          <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                                      </div>

                                                                                                <?php  }else{ ?>

                                                                                                          <div class="table-responsive">
                                                                                                            <table>
                                                                                                                    <tr>
                                                                                                                        <td><b>Identifiant : </b></td><td><?php echo $p['id_classe']; ?></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td><b>Libellé : </b></td><td><?php echo $p['lib_classe']; ?></td>
                                                                                                                    </tr>
                                                                                                            </table><br/>
                                                                                                            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                                                            <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>
                                                                                  
                                                                                                        </div>

                                                                                                <?php  }  ?>
                                                                            
                                                                          </div>

                                                                        </center>
                                                                    </form>
                                                                   </div>

                                                                </div>
                                                              </div>
                                                          </div>
                                                            
                                                      </center>

                                                      <!-- debut de modal d'etat -->
                                                      <div class="modal fade <?php echo $p['id_classe'];?>modal-etat">
                                                          <?php
                                                              $table5 = "classe";
                                                              $colonne2="id_classe";

                                                              $val_recuperer1 = "moy_trim1";
                                                              $val_recuperer2 = "moy_trim2";
                                                              $val_recuperer3 = "moy_trim3";
                                                              // Recuperation de la moyenne d'abmission du trimestre I, II et III.
                                                              $moy_trim1 = getChampsParametrage($val_recuperer1, $table5, $colonne2, $p['id_classe']);
                                                              $moy_trim2 = getChampsParametrage($val_recuperer2, $table5, $colonne2, $p['id_classe']);
                                                              $moy_trim3 = getChampsParametrage($val_recuperer3, $table5, $colonne2, $p['id_classe']);
                                                              // Recuperation de l'etat de publicatrion du trimestre I, II et III.
                                                              $val_recuperer4 ="pub_trim1";
                                                              $val_recuperer5 ="pub_trim2";
                                                              $val_recuperer6 ="pub_trim3";
                                                              $pub_trim1 = getChampsParametrage($val_recuperer4, $table5, $colonne2, $p['id_classe']);
                                                              $pub_trim2 = getChampsParametrage($val_recuperer5, $table5, $colonne2, $p['id_classe']);
                                                              $pub_trim3 = getChampsParametrage($val_recuperer6, $table5, $colonne2, $p['id_classe']);
                                                          ?>
                                                          <div class="modal-dialog modal-md">
                                                              <div class="modal-content">
                                                                  <div class="modal-header" style="background-color:rgb(28,36,47); color : white">
                                                                      <button type="button" class="close" data-dismiss="modal"> x </button>
                                                                      <p style="text-align:center; font-family:ravie" class="text-mint"><b>Classe : <?php echo $p['lib_classe']; ?></b></p>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                  <center>
                                                                      <table>
                                                                        <tr>
                                                                          <th colspan="2"><b class="text-mint text-center">Trimestre I</b></th>
                                                                        </tr>
                                                                        <tr>
                                                                          <th style ="padding-right:20px; padding-bottom:10px">Moyenne d'admission</th>
                                                                          <th style ="padding-right:20px; padding-bottom:10px">Etat de publication</th>
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px" class="text-center text-warning"><b><?php echo number_format($moy_trim1,2);?></b></td>
                                                                          <td style ="padding-bottom:10px" class="text-center">

                                                                              <?php  if($pub_trim1==0){ ?>
                                                                                <b class="text-Warning">Non publié</b>
                                                                              <?php }else{ ?>
                                                                                <b class="text-mint">Publié</b>
                                                                              <?php } ?>
                                                                          </td> 
                                                                        </tr>
                                                                      </table>

                                                                      <div style="border-top:2px solid white"></div>
                                                                      <table>
                                                                        <tr>
                                                                          <th colspan="2"><b class="text-mint text-center">Trimestre II</b></th>
                                                                        </tr>
                                                                        <tr>
                                                                          <th style ="padding-right:20px; padding-bottom:10px">Moyenne d'admission</th>
                                                                          <th style ="padding-right:20px; padding-bottom:10px">Etat de publication</th>
                                                                        </tr>
                                                                        <tr>
                                                                          <td style ="padding-bottom:10px" class="text-center text-warning"><b><?php echo number_format($moy_trim2,2);?></b></td>
                                                                          <td style ="padding-bottom:10px" class="text-center">

                                                                              <?php  if($pub_trim2==0){ ?>
                                                                                <b class="text-Warning">Non publié</b>
                                                                              <?php }else{ ?>
                                                                                <b class="text-mint">Publié</b>
                                                                              <?php } ?>
                                                                          </td> 
                                                                        </tr>
                                                                      </table>

                                                                      <div style="border-top:2px solid white"></div>

                                                                      <table>
                                                                        <tr>
                                                                          <th colspan="2"><b class="text-mint text-center">Trimestre III</b></th>
                                                                        </tr>
                                                                        <tr>
                                                                          <th style ="padding-right:20px; padding-bottom:10px">Moyenne d'admission</th>
                                                                          <th style ="padding-right:20px; padding-bottom:10px">Etat de publication</th>
                                                                        </tr>
                                                                        <tr>
                                                                          <td class="text-center text-warning"><b><?php echo number_format($moy_trim3,2);?></b></td>
                                                                          <td class="text-center">

                                                                              <?php  if($pub_trim3==0){ ?>
                                                                                <b class="text-Warning">Non publié</b>
                                                                              <?php }else{ ?>
                                                                                <b class="text-mint">Publié</b>
                                                                              <?php } ?>
                                                                          </td> 
                                                                        </tr>
                                                                      </table>
                                                                    </center>
                                                                  </div>
                                                                  <div class="panel-footer text-center" style="background-color:rgb(28,36,47); color : white">
                                                                      <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fermer</button>
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

        <script>
      $(document).ready(function(){


          $('#formulaire1').submit(function(){
                $.ajax({
                  url:"index.php?module=parametrage&action=saveClasse",
                  method : "POST",
                  data:new FormData($('#formulaire1')[0]),
                  contentType : false,
                  processData : false,
                  success : function(feedback){
                             
                            $("#add").modal('hide');
                            $('#message').modal('show');
                            $('#contenu_message').html(feedback);
                            $('#formulaire1')[0].reset();
                          }
                });
                return false;

          });

          $(document).on('click', '.edit_classe', function(){
            var id_classe = $(this).attr('id');

            if(id_classe !=0){

                $.post("index.php?module=parametrage&action=edit_classe",
                {id_classe:id_classe},
                  function(data){
                    $("#update_details").html(data);
                    $("#update_classe").modal('show');
                  }
                );
                return false;
            }
          });


          $(document).on('click', '#update', function(){

              $.ajax({
                url:"index.php?module=parametrage&action=updateClasse",
                method : "POST",
                data:new FormData($('#form_edit')[0]),
                contentType : false,
                processData : false,
                success : function(feedback){ 
                  $("#update_classe").modal('hide');
                  $('#message').modal('show');
                  $('#contenu_message').html(feedback);
                  $('#form_edit')[0].reset();
                }
              });
              return false;
          });

       
      });
    </script>

    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>