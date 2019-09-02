<?php
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("globale/verification.php"); 
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:57 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Accueil</title>
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
        <link href="css/mon_style.css" rel="stylesheet">
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
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div class="contenu">
            <div >
                <div id ="login-panel">
                        <h2 class="text-center" style="font-family:David">UNIVERSITE INPTIC</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default desp">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body bg-mint">
                                        <div  id="desp">
                                            <a href="index.php?module=users&action=tableaubordconcours">
                                                <div class="text-center"><i class="fa fa-graduation-cap fa-4x"></i></div>
                                                <div class="text-center">
                                                    <h4>Concours</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default desp">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body bg-info">
                                        <div>
                                            <a href="index.php?module=users&action=tableaubordscolarite">
                                                <div class="text-center"><i class="fa fa-cubes fa-4x"></i></div>
                                                <div class="text-center">
                                                    <h4>Scolarité</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-default desp">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body bg-danger">
                                        <div>
                                            <a href="index.php?module=users&action=Deconnexion">
                                                <div class="text-center"><i class="fa fa-power-off fa-4x"></i></div>
                                                <div class="text-center">
                                                    <h4>Deconnexion</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
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
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:59 GMT -->
</html>