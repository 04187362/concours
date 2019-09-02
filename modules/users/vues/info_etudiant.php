<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Information etudiant.</title>
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

                  $table ="personne";
                  $colonne ="id_pers";

                  if(isset($_GET['cood']) && existanceUsers($table, $colonne, $_GET['cood'])){

                    $id_pers = addslashes(htmlspecialchars($_GET['cood']));

                    $p = selection_condition($table, $colonne, $id_pers);


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
                        <h3><i class="fa fa-home"></i> User Profile </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Profile </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-info">
                                        <img src="img/photos/<?php echo $p['image']; ?>" alt="avatar">
                                        <div class="name osLight"> <?php echo $p['prenom_pers'].' '.$p['nom_pers']; ?> </div>
                                    </div>
                                    <ul class="fullstats">
                                        <li> <span>280</span>Followers </li>
                                        <li> <span>345</span>Following </li>
                                        <li> <span>36</span>Posts </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-user"> </i> Information de l'etudiant</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-external-link ph-5"></i></td>
                                                    <td> Adresse </td>
                                                    <td> <?php echo $p['adresse_pers']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-phone ph-5"></i></td>
                                                    <td> Téléphone </td>
                                                    <td> <?php echo $p['tel_pers']; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-envelope-o ph-5"></i></td>
                                                    <td> Statut </td>
                                                    <td><span class="label label-sm label-primary">Etudiant </span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body pad-no">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"><i class="fa fa-flask"></i> Privé </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-2"><i class="fa fa-mortar-board"></i> Universitaire</a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-3"><i class="fa fa-user"></i> Titeurs</a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-4"><i class="fa fa-money"></i> Fraits académique</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                <div id="demo-lft-tab-1" class="tab-pane fade active in">

                                                        <div class="panel">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"><i class="fa fa-user"> </i> Information de l'etudiant</h3>
                                                            </div>
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td> Titre </td>
                                                                            <td> Monsieur</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> Date de naissance </td>
                                                                            <td> <?php echo $p['date_nais_etu']; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> Lieu de naissance </td>
                                                                            <td><?php echo $p['lieu_nais_etu']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Adresse</td>
                                                                            <td><?php echo $p['adresse_pers']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Mot de passe</td>
                                                                            <td><?php echo $p['password']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pays</td>
                                                                            <td><?php 

                                                                                $colonne3 = "code_pays";
                                                                                $table3 = "pays";
                                                                                $val_recuperer3 = "lib_pays";

                                                                                echo getChampsParametrage($val_recuperer3, $table3, $colonne3, $p['code_pays']);
                                                                        ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                </div>
                                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                                    <div class="panel">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"><i class="fa fa-user"> </i> Information de l'etudiant</h3>
                                                            </div>

                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td> Classe </td>
                                                                            <td> <?php 

                                                                                $colonne4 = "id_classe";
                                                                                $table4 = "classe";
                                                                                $val_recuperer4 = "lib_classe";

                                                                                echo getChampsParametrage($val_recuperer4, $table4, $colonne4, $p['id_classe']);
                                                                        ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> Année scolaire  </td>
                                                                            <td><?php 

                                                                            $colonne5 = "id_etu";
                                                                            $table5 = "inscription";
                                                                            $val_recuperer5 = "id_annee";

                                                                            $id_annee = getChampsParametrage($val_recuperer5, $table5, $colonne5, $p['id_pers']);

                                                                            $table6 = "annee_academique";
                                                                            $val_recuperer6 = "lib_annee";
                                                                            $colonne6 = "id_annee"; 

                                                                            echo getChampsParametrage($val_recuperer6, $table6, $colonne6, $id_annee);
                                                                         ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Date d'acceptation</td>
                                                                            <td><?php 

                                                                            $colonne6 = "id_etu";
                                                                            $table6 = "inscription";
                                                                            $val_recuperer6 = "date_ins";

                                                                            echo getChampsParametrage($val_recuperer6, $table6, $colonne6, $p['id_pers']);

                                                                         ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Statut de l'etudiant</td>
                                                                            <td>Actif</td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                </div>
                                                <div id="demo-lft-tab-3" class="tab-pane fade">
                                        <!--Chat widget-->
                                        <!--===================================================-->
                                        <div id="demo-chat-body" class="collapse in">
                                            <div class="panel">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"><i class="fa fa-user"> </i> Information de l'etudiant</h3>
                                                            </div>

                                                            <?php 

                                                            // Recuperation des information du parent.
                                                                $table5 = "personne";
                                                                $colonne5 = "id_pers";

                                                                $val_recuperer5 = "nom_pers";
                                                                $nom_par = getChampsUsers($val_recuperer5, $table5, $colonne5, $p['id_par']);

                                                                $val_recuperer6 = "prenom_pers";
                                                                $prenom_par = getChampsUsers($val_recuperer6, $table5, $colonne5, $p['id_par']);

                                                                $val_recuperer7 = "prof_par";
                                                                $prof_par = getChampsUsers($val_recuperer7, $table5, $colonne5, $p['id_par']);

                                                                $val_recuperer8 = "adresse_pers";
                                                                $adresse_par = getChampsUsers($val_recuperer8, $table5, $colonne5, $p['id_par']);

                                                                $val_recuperer9 = "tel_pers";
                                                                $tel_par = getChampsUsers($val_recuperer9, $table5, $colonne5, $p['id_par']);

                                                                $val_recuperer10 = "sexe_pers";
                                                                $sexe_par = getChampsUsers($val_recuperer10, $table5, $colonne5, $p['id_par']);

                                                                $val_recuperer11 = "prof_par";
                                                                $pays_par = getChampsUsers($val_recuperer11, $table5, $colonne5, $p['id_par']);

                                                                

                                                            ?>
                                                            <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td> Titre </td>
                                                                            <td> Monsieur</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> Nom </td>
                                                                            <td> <?php echo $nom_par; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> Prénom</td>
                                                                            <td><?php echo $prenom_par; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Sexe</td>
                                                                            <td><?php echo $tel_par; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Adresse</td>
                                                                            <td><?php echo $sexe_par; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Téléphone</td>
                                                                            <td><?php echo $tel_par; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pays</td>
                                                                            <td>

                                                                                <?php 

                                                                                $colonne7 = "code_pays";
                                                                                $table7 = "pays";
                                                                                $val_recuperer7 = "lib_pays";

                                                                                echo getChampsParametrage($val_recuperer7, $table7, $colonne7, $p['code_pays']);
                                                                        
                                                                        ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                        </div>
                                            
                                        </div>
                                        <!--===================================================-->
                                        <!--Chat widget-->

                                                </div>
                                                <div id="demo-lft-tab-4" class="tab-pane fade">
                                                    <div class="panel">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"><i class="fa fa-money"></i> Fraits d'inscription</h3>
                                                            </div>
                                                            <?php 

                                                                            $colonne5 = "id_etu";
                                                                            $table5 = "inscription";
                                                                            $val_recuperer5 = "id_annee";
                                                                            $val_recuper = "id_frait";

                                                                            $id_annee = getChampsParametrage($val_recuperer5, $table5, $colonne5, $p['id_pers']);
                                                                            $table6 = "annee_academique";
                                                                            $val_recuperer6 = "lib_annee";
                                                                            $colonne6 = "id_annee";
                                                                            $annee = getChampsParametrage($val_recuperer6, $table6, $colonne6, $id_annee);
                                                                            // Recuperation de l'identifiant du frait a payé
                                                                            $id_frait = getChampsParametrage($val_recuper, $table5, $colonne5, $p['id_pers']);
                                                                            $table7 = "frait";
                                                                            $val_recuperer7 = "montant";
                                                                            $col = "id_frait";
                                                                            // Recuperation du montant.
                                                                            $montant = getChampsParametrage($val_recuperer7, $table7, $col, $id_frait);
                                                                            // Recuperation de la date d'inscription
                                                                            $val_recuperer8 = "date_ins";
                                                                            $date = getChampsParametrage($val_recuperer8, $table5, $colonne5, $p['id_pers']);

                                                            ?>
                                                            <table class="table">
                                                                    <thead>
                                                                                <tr>
                                                                                    <th>Frait</th>
                                                                                    <th>Année</th>
                                                                                    <th>Payé le</th>
                                                                                </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $montant ?></td>
                                                                            <td><?php echo $annee ?></td>
                                                                            <td><?php echo $date ?></td>
                                                                        </tr> 
                                                                    </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="panel">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"><i class="fa fa-money"></i> Fraits mensuels</h3>
                                                            </div>

                                                                <div class="panel-body">
                                                                    <div class="table-responsive">
                                                                        <table id="demo-dt-basic" class="table table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Mois</th>
                                                                                    <th>Frait</th>
                                                                                    <th>Année</th>
                                                                                    <th>Payé le</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php



                                                                                    $table7 ="paiement";
                                                                                    $colonne7 ="id_etu";
                                                                                    $resultat7 = afficherTableGestion($table7, $colonne7, $p['id_pers']); 
                                                                                    foreach($resultat7 as $tablo){

                                                                                    $val_recuperer8 ="montant";
                                                                                    $table8 = "frait";
                                                                                    $colonne8 = "id_frait"; 

                                                                                    $val_recuperer9 ="lib_annee";
                                                                                    $table9 = "annee_academique";
                                                                                    $colonne9 = "id_annee";  
                                                                                ?>
                                                                                <tr>
                                                                                    
                                                                                    <td><?php echo $tablo['mois']; ?></td>
                                                                                    <td><?php echo getChampsParametrage($val_recuperer8, $table8, $colonne8, $tablo['id_frait']); ?></td>
                                                                                    <td><?php echo getChampsParametrage($val_recuperer9, $table9, $colonne9, $tablo['id_annee']); ?></td>
                                                                                    <td><?php echo $tablo['date_paye']; ?></td>
                                                                                    
                                                                                </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
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
                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="show-fixed pull-right">
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
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
</html>