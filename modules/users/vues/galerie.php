<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-directory.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> galerie.</title>
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
                <?php include('globale/entete.php'); ?>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <?php include('globale/menu2.php'); ?>

                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i><span style="font-family:Times New Roman"> Galerie </span></h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> galerie </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="well">
                            <div class="row">
                                <div class="col-sm-9">
                                    <input placeholder="Qui cherchez-vous ?" class="form-control" type="text">
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group nm">
                                        <select class="form-control" id="source">
                                            <option value="Name">Nom</option>
                                            <option value="position">Prénom</option>
                                            <option value="company">Niveau etude</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <?php 
                                $requete="SELECT * FROM personne p, filiere f
                                            WHERE f.id_filiere = p.id_filiere
                                            AND type_pers = 'Etudiant'
                                            ORDER BY nom_pers, prenom_pers";
                                $response = Selection($requete);
                                foreach ($response as $value) {
                                   if($value['sexe_pers'] =="Homme"){ 
                                        if(empty($value['image'])){ ?>
                                            <div class="col-md-3">
                                                <div class="userWidget-1">
                                                    <div class="avatar bg-dark">
                                                        <img src="img/user.png" alt="avatar">
                                                        <div class="name osLight"> <?php echo $value['nom_pers'].' '.$value['prenom_pers']; ?> </div>
                                                    </div>
                                                    <div class="title"> <?php echo $value['lib_classe']; ?> </div>
                                                    <div class="address"> Los Angeles, CA, USA </div>
                                                    <ul class="fullstats">
                                                        <li> <span>280</span>Followers </li>
                                                        <li> <span>345</span>Following </li>
                                                        <li> <span>36</span>Posts </li>
                                                    </ul>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                    <?php   }else{ ?>
                                            <div class="col-md-3">
                                                <div class="userWidget-1">
                                                    <div class="avatar bg-dark">
                                                        <img src="img/photos/<?php echo $value['image']; ?>" alt="avatar">
                                                        <div class="name osLight"> <?php echo $value['nom_pers'].' '.$value['prenom_pers']; ?> </div>
                                                    </div>
                                                    <div class="title"> <?php echo $value['lib_filiere']; ?> </div>
                                                    <div class="address"> Los Angeles, CA, USA </div>
                                                    <ul class="fullstats">
                                                        <li> <span>280</span>Followers </li>
                                                        <li> <span>345</span>Following </li>
                                                        <li> <span>36</span>Posts </li>
                                                    </ul>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                    <?php    } ?>

                                <?php }else{ 
                                        if(empty($value['image'])){ ?>

                                            <div class="col-md-3">
                                                <div class="userWidget-1">
                                                    <div class="avatar bg-mint">
                                                        <img src="img/user.png" alt="avatar">
                                                        <div class="name osLight"> <?php echo $value['nom_pers'].' '.$value['prenom_pers']; ?> </div>
                                                    </div>
                                                    <div class="title"> <?php echo $value['lib_filiere']; ?> </div>
                                                    <div class="address"> Los Angeles, CA, USA </div>
                                                    <ul class="fullstats">
                                                        <li> <span>280</span>Followers </li>
                                                        <li> <span>345</span>Following </li>
                                                        <li> <span>36</span>Posts </li>
                                                    </ul>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        <?php   }else{ ?>
                                            <div class="col-md-3">
                                                <div class="userWidget-1">
                                                    <div class="avatar bg-mint">
                                                        <img src="img/photos/<?php echo $value['image']; ?>" alt="avatar">
                                                        <div class="name osLight"> <?php echo $value['nom_pers'].' '.$value['prenom_pers']; ?> </div>
                                                    </div>
                                                    <div class="title"> <?php echo $value['lib_filiere']; ?> </div>
                                                    <div class="address"> Los Angeles, CA, USA </div>
                                                    <ul class="fullstats">
                                                        <li> <span>280</span>Followers </li>
                                                        <li> <span>345</span>Following </li>
                                                        <li> <span>36</span>Posts </li>
                                                    </ul>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                <?php   }
                                  }
                              } ?>
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
                    <?php include('globale/menu.php'); ?>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
                <!--ASIDE--> 
                <!--===================================================-->
                <aside id="aside-container">
                    <?php include('globale/aside.php'); ?>
                </aside>
                <!--===================================================--> 
                <!--END ASIDE-->
                <!--RIGHT CHAT MESSANGER--> 
                <!--===================================================-->
                <aside class="conversation closed">
                    <?php include('globale/aside.php'); ?>
                </aside>
                <!--END RIGHT CHAT MESSANGER--> 
                <!--===================================================-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">
                <?php include('globale/pied.php'); ?>
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

<!-- Mirrored from www.designbudy.com/nyasa/default/pages-directory.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
</html>