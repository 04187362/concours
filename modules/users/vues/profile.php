<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Profile - GESET.</title>
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
                
                <?php
                    $requete ="SELECT * FROM pays WHERE id_pays=?";
                    $param = array($code_pays);
                    $lib_pays = getChampsParametrage($requete,$param);  
                ?>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <?php include('globale/menu2.php'); ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Romane"> Profile </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Profile utilisateur </li>
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
                                        <?php if(empty($image)){ ?>
                                            <img src="img/user.png" alt="avatar">
                                        <?php }else{ ?>
                                            <img src="img/photos/<?php echo $image; ?>" alt="avatar">
                                        <?php } ?>
                                        
                                        <div class="name osLight"> <?php echo $prenom_personne.' '.$nom_personne; ?> </div>
                                    </div>
                                        <?php if($type_personne=="Personnel"){ ?>
                                            <div class="title"> <?php echo $role; ?> </div>
                                        <?php }else if($type_personne=="Enseignant"){ ?>
                                            <div class="title"> Enseignant </div>
                                        <?php }else if($type_personne=="Parent"){ ?>
                                            <div class="title"> <?php echo $role; ?> </div>
                                        <?php }else{ ?>
                                            <div class="title"> Etudiant </div>
                                        <?php } ?>
                                    
                                    <div class="address"> Los Angeles, CA, USA </div>
                                    <ul class="fullstats">
                                        <li> <span>280</span>Followers </li>
                                        <li> <span>345</span>Following </li>
                                        <li> <span>36</span>Posts </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-user"> </i> Information de l'utilisateur</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-external-link ph-5"></i></td>
                                                    <td> Adresse </td>
                                                    <td> <?php echo $adresse_personne; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-neuter ph-5"></i></td>
                                                    <td> Sexe </td>
                                                    <td><?php echo $sexe_personne; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-phone ph-5"></i></td>
                                                    <td> Téléphone </td>
                                                    <td> <?php echo $tel_personne; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-flag-o ph-5"></i></td>
                                                    <td> Pays </td>
                                                    <td> <?php echo $lib_pays; ?> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                                <div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Modification du profile</h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <div>
                                            <div class="col-md-6 col-xs-12">
                                               <form method="post" id="formulaire1" action="" class="form-horizontal form-bordered">
                                                    <div class="panel panel-default">
                                                        <!--Panel heading-->
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Modification</h3>
                                                        </div>
                                                        <!--Panel body-->
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label for="email_pers" class="col-md-4 control-label">Email</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" id="email_pers" name="email_pers" value="<?php echo $email_personne; ?>"  class="form-control" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="tel_pers" class="col-md-4 control-label">Téléphone</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" id="tel_pers" name="tel_pers" value="<?php echo $tel_personne; ?>"  class="form-control" required />
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center">
                                                                    <button class="btn btn-primary btn-xs" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Valider</button>       
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer"> Panel Footer </div>
                                                    </div>
                                                </form> 

                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                
                                                <form method="post" action="index.php?module=users&action=profile" class="form-horizontal form-bordered">
                                                    <div class="panel panel-default">
                                                        <!--Panel heading-->
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Modification du mot de passe</h3>
                                                        </div>
                                                        <!--Panel body-->
                                                        <div class="panel-body">
                                                            <?php
                                                                // Modification de mot de passe.
                                                                if(isset($_POST['mod_password'])){

                                                                    $ancien_password = htmlspecialchars($_POST['ancien_password']);

                                                                    $nouveau_password = htmlspecialchars($_POST['nouveau_password']);

                                                                    $confirmer_password = htmlspecialchars($_POST['confirmer_password']);

                                                                    if($ancien_password == $password){

                                                                        if($nouveau_password == $confirmer_password){

                                                                            $count = updatePasswordUser($id_personne, $nouveau_password);

                                                                            if($count > 0){

                                                                                header("location:index.php?module=users&action=Deconnexion");

                                                                            }else{

                                                                                echo '<div class="alert alert-danger alert-dismissable">
                                                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                                            La mise à jour à echouée !
                                                                                      </div>';
                                                                            }

                                                                        }else{
                                                                            echo '<div class="alert alert-danger alert-dismissable">
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                                        Confirmer bien le mot de passe !
                                                                                  </div>';

                                                                        }

                                                                    }else{

                                                                      echo '<div class="alert alert-danger alert-dismissable">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                                   Mot de passe incorrect !
                                                                              </div>';

                                                                    }

                                                              }   
                                                            ?>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label for="ancien_password" class="col-md-4 control-label">Ancien password</label>
                                                                    <div class="col-md-8">
                                                                        <input type="password" id="ancien_password" name="ancien_password"  class="form-control" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="nouveau_password" class="col-md-4 control-label">Nouveau password</label>
                                                                        <div class="col-md-8">
                                                                            <input type="password" id="nouveau_password" name="nouveau_password"  class="form-control" required />
                                                                        </div>
                                                                </div>

                                                                <div class="form-group">
                                                                        <label for="confirmer_password" class="col-md-4 control-label">Confirmer password</label>
                                                                        <div class="col-md-8">
                                                                            <input type="password" id="confirmer_password" name="confirmer_password"  class="form-control" required />
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center">
                                                                    <button name="mod_password" class="btn btn-primary btn-xs" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Valider</button>       
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer"> Panel Footer </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="panel-footer"> Panel Footer </div>
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
                    <?php include('globale/aside2.php'); ?>
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

<!-- Mirrored from www.designbudy.com/nyasa/default/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
</html>