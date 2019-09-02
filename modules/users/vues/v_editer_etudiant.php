<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Editer etudiant - INPTIC</title>
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
                
                  $id_pers = htmlentities(htmlspecialchars($_GET['cood']));
                  $requete = "SELECT * FROM personne WHERE id_pers=?";
                  $param = array($id_pers);

                  if(isset($_GET['cood']) && existanceUsers($requete,$param)){

                    $p = selection_condition($requete,$param);


                  }else{

                      header("location:index.php?modules=users&action=page_erreur");
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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Ravie"> Utilisateur </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Etudiant </li>
                                <li class="active"> Editer etudiant </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-body">
                                <form method="post" id="formulaire1" action="" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                            <div class="form-group">
                                                <legend>Edition d'un etudiant</legend>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <input type="hidden" id="id_pers" name="id_pers" value="<?php echo $p['id_pers'] ?>" class="form-control" required />
                                                    <div class="form-group">
                                                        <label for="nom_pers" class="col-md-4 control-label">Nom</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="nom_pers" name="nom_pers" value="<?php echo $p['nom_pers'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="prenom_pers" class="col-md-4 control-label">Prénom</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="prenom_pers" name="prenom_pers" value="<?php echo $p['prenom_pers'] ?>"  class="form-control" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="sexe_pers" class="col-md-4 control-label">Sexe</label>
                                                        <div class="col-md-8">
                                                            <?php if($p['sexe_pers']=='Homme'){ ?>
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" checked="true" value="Homme"> Homme &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" value="Femme"> Femme
                                                            <?php }else{ ?>
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" value="Homme"> Homme &nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="sexe_pers" id="sexe_pers" checked="true" value="Femme"> Femme
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <label for="adresse_pers" class="col-md-4 control-label">Adresse</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="adresse_pers" name="adresse_pers" value="<?php echo $p['adresse_pers'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="niv_etu_univ" class="col-md-4 control-label">Niveau etude</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="niv_etu_univ" name="niv_etu_univ" value="<?php //echo $p['adresse_pers'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="statut" class="col-md-4 control-label">Statut</label>
                                                        <div class="col-md-8">
                                                        <select id="statut" name="statut" class="form-control selectpicker" data-live-search="true" required>
                                                                <option value="">Selectionner</option>
                                                                <option value="1">Boursier</option>
                                                                <option value="2" >Non boursier</option>
                                                                <option value="3">En attente</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" id="saisie">
                                                        <label for="numbourse" class="col-md-4 control-label">Numero bourse</label>
                                                        <div class="col-md-8">
                                                        <input type="text" name="numbourse" id="numbourse" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="tel_pers" class="col-md-4 control-label">Téléphone</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="tel_pers" name="tel_pers" value="<?php echo $p['tel_pers'] ?>"  class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="date_nais_etu" class="col-md-4 control-label">Date nais</label>
                                                        <div class="col-md-8">
                                                            <input type="date" id="date_nais_etu" name="date_nais_etu" value="<?php echo $p['date_nais_etu'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lieu_nais_etu" class="col-md-4 control-label">Lieu nais</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="lieu_nais_etu" name="lieu_nais_etu" value="<?php echo $p['lieu_nais_etu'] ?>" class="form-control" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="pays" class="control-label col-md-4"> Pays </label>
                                                        <div class="col-md-8">
                                                            <select id="pays" name="pays" class="form-control selectpicker" data-live-search="true" required>
                                                            <?php 
                                                                $requete1 = "SELECT lib_pays FROM pays WHERE code_pays=?";
                                                                $param1 = array($p['code_pays']);
                                                                echo '<option value="'.$p['code_pays'].'">'.getChampsParametrage($requete1,$param1).'</option>'; 
                                                            ?>
                                                                <?php 
                                                                      $sql1 = "SELECT * FROM pays ";
                                                                        $request1 = AfficherTout($sql1);                      
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request1->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$request1->fetch()){                                             
                                                                    echo  '<option value ="'.$tablo['code_pays'].'">'.$tablo['lib_pays'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                     
                                                        </div>

                                                        <div class="form-group">
                                                        <label for="diplome" class="col-md-4 control-label">Diplôme</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="diplome" name="diplome" value="" class="form-control" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="serie" class="col-md-4 control-label">Série</label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="serie" name="serie" value="" class="form-control" required />
                                                        </div>
                                                    </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="filiere" class="control-label col-md-4">Filière </label>
                                                        <div class="col-md-8">
                                                            <select id="filiere" name="filiere" class="form-control selectpicker" data-live-search="true" required>
                                                            <option value="">Selectionner</option>
                                                                <?php 
                                                                        $sql = "SELECT * FROM filiere ";
                                                                        $requete4 = AfficherTout($sql);                      
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $requete4->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$requete4->fetch()){                        
                                                                    echo  '<option value ="'.$tablo['id_filiere'].'">'.$tablo['lib_filiere'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="form-group">
                                                        <label for="specialite" class="control-label col-md-4"> Specialité </label>
                                                        <div class="col-md-8">
                                                            <select id="specialite" name="specialite" class="form-control selectpicker" data-live-search="true" required>
                                                            <?php 
                                                                $requete0 = "SELECT lib_spe FROM filiere f,specialite s WHERE f.id_filiere=s.id_spe AND id_spe=?";
                                                                $param0 = array($pi['id_spe']);
                                                                echo '<option value="'.$pi['id_spe'].'">'.getChampsParametrage($requete0, $param0).'</option>'; 
                                                             
                                                                        $sql0 = "SELECT * FROM specialite ";
                                                                        $request0 = AfficherTout($sql0);                      
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request0->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$request0->fetch()){                        
                                                                    echo  '<option value ="'.$tablo['id_spe'].'">'.$tablo['lib_spe'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="niveauetude " class="control-label col-md-4"> Niveau etude </label>
                                                        <div class="col-md-8">
                                                            <select id="niveauetude" name="niveauetude" class="form-control selectpicker" data-live-search="true" required>
                                                            <?php 
                                                                $requete3 = "SELECT lib_niveauetude FROM filiere f,niveau_etude n WHERE f.id_filiere=n.id_niveauetude AND id_niveauetude=?";
                                                                $param3 = array($pi['id_niveauetude']);
                                                                echo '<option value="'.$pi['id_niveauetude'].'">'.getChampsParametrage($requete3, $param3).'</option>'; 
                                                             
                                                                        $sql3 = "SELECT * FROM niveau_etude ";
                                                                        $request3 = AfficherTout($sql3);                      
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request3->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablos=$request3->fetch()){                        
                                                                    echo  '<option value ="'.$tablos['id_niveauetude'].'">'.$tablos['lib_niveauetude'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="form-group">
                                                        <label for="parent" class="control-label col-md-4"> Tuteur </label>
                                                        <div class="col-md-8">
                                                            <select id="parent" name="parent" class="form-control selectpicker" data-live-search="true" required>
                                                            <?php 
                                                                    $requete3 = "SELECT nom_pers FROM personne WHERE id_pers=?";
                                                                    $requete4 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
                                                                    $param3 = array($p['id_par']);
                                                                    echo '<option value="'.$p['id_par'].'">'.getChampsParametrage($requete3,$param3).' '.getChampsParametrage($requete4,$param3).'</option>'; 
                                                            
                                                                        $sql3 = "SELECT * FROM personne WHERE type_pers='Parent'";
                                                                        $request3 = AfficherTout($sql3);                      
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $request3->execute();
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$request3->fetch()){                      
                                                                    echo  '<option value ="'.$tablo['id_pers'].'">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</option>';
                                                                } ?>     
                                                                
                                                            </select>
                                                            <!--===================================================-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="image" class="col-md-4 control-label">Image</label>
                                                        <div class="col-md-8">
                                                            <input type="file" id="image" name="image"  class="form-control" />
                                                            <img src="img/photos/<?php echo $p['image']; ?>" width ="100" height="100"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                            <input type="hidden" id="type_pers" name="type_pers" value="Etudiant"  class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align:center">
                                                    <a href="index.php?module=users&action=etudiant" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Afficher</a>&nbsp                          
                                                    <button class="btn btn-default btn-xs" type="reset" name="reset"><i class="glyphicon glyphicon-remove"></i> Annuler</button>&nbsp
                                                    <button class="btn btn-primary btn-xs" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Valider</button>                         
                                                    
                                                </div>
                                            </div>
                                        </form>

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
            
                event.preventDefault();

                var extension = $('#image').val().split('.').pop().toLowerCase();

                $.ajax({
                      url:"index.php?module=users&action=updatePersonne",
                      method : "POST",
                      data:new FormData($('#formulaire1')[0]),
                      contentType : false,
                      processData : false,
                      success : function(feedback){
                                $('#message').modal('show');
                                $('#contenu_message').html(feedback);
                              }
                });
                return false;

          });

       
      });

      $('#saisie').hide();


      $('#statut').change(function() {
         var val1= $('#statut').val();
        //alert(val1);
        if (val1 == 1) {
            $('#saisie').fadeIn("slow");
        }else if(val1 == 2){
            $('#saisie').hide();
        }else{
            $('#saisie').hide();
        };
      })
    </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
</html>