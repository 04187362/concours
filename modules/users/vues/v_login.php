<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:57 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Se connecter</title>
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
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="cls-container">
            <!-- LOGIN FORM -->
            <!--===================================================-->
            <div class="lock-wrapper">
                <div class="panel lock-box">
                    <div class="center"> <img alt="" src="img/user.png" class="img-circle"/> </div>
                    <h4> Authentification </h4>
                    
                    <div class="row">
                        <form  method="post" action="" class="form-inline">

                            <?php
                                 // fonction de connexion
                                            include_once("connexion/connexiongenerale.php"); 

                                            if(isset($_POST['submit'])){
                                                
                                                    
                                                if(!empty($_POST['email']) && !empty($_POST['password'])){

                                                  $email=addslashes(htmlspecialchars($_POST['email']));

                                                  $password=addslashes(htmlspecialchars($_POST['password']));

                                                    //Criptons les mots de passes

                                                    //$pass_crypter = hash("sha256", $password);

                                                    $p="SELECT * from personne  where  email_pers ='".$email."' and password='$password'";

                                                    $resultat=Selection($p);

                                                    $tabl = "annee_academique";

                                                    $resultat2=selection2($tabl);

                                                    if($table = $resultat->fetch()){

                                                        if($table['droit_acces']==1){

                                                            session_start();

                                                            $_SESSION['users'] = $table;

                                                            $_SESSION['id_annee'] = $resultat2;

                                                            header ('location:index.php?module=users&action=accueil');

                                                        }else{

                                                            echo' <div class="alert alert-danger alert-dismissible text-center bg-danger" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>
                                                                        Vous êtes privé d\'accès !
                                                                </div>';
                                                        }
                                                                    
                                                    }else{

                                                        $p1="SELECT * from personne  where  email_pers ='".$email."' and password='$password'";

                                                        $resultat1=Selection($p1);

                                                        if($table = $resultat1->fetch()){

                                                            if($table['droit_acces']==1){

                                                                session_start();

                                                                $_SESSION['users'] = $table;

                                                                $_SESSION['id_annee'] = $resultat2;

                                                                header ('location:index.php?module=users&action=accueil');
                                                            }else{

                                                                echo' <div class="alert alert-danger alert-dismissible text-center bg-danger" role="alert">
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>
                                                                            Vous êtes privé d\'accès !
                                                                    </div>';
                                                            }

                                                        }else{

                                                             $p2="SELECT * from personne  where  tel_pers ='$email' and password='$password'";

                                                            $resultat3=Selection($p2);

                                                            if($table = $resultat3->fetch()){

                                                                if($table['droit_acces']==1){

                                                                    session_start();

                                                                    $_SESSION['users'] = $table;

                                                                    $_SESSION['id_annee'] = $resultat2;

                                                                    header ('location:index.php?module=users&action=accueil');

                                                                }else{

                                                                    echo' <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>
                                                                                Vous êtes privé d\'accès !
                                                                        </div>';
                                                                }
                                                                

                                                            }else{

                                                                echo' <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>
                                                                         Password word incorrect!
                                                                </div>';

                                                            }

                                                        }

                                                    }

                                                            
                                                                                            
                                            }else{
                                                echo' <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>
                                                            Remplissez tous les champs !
                                                    </div>';
                                            }   

                                    }
                                                           
                                                      
                                ?>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <input id="email" name="email" type="text" placeholder="Nom d'utilisateur" class="form-control" required />
                                </div>
                                <div class="text-left">
                                    <input id="password" name="password" type="password" placeholder="Mot de passe" class="form-control lock-input" required />
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Se connecter
                                </button>
                                <div class="pull-right pad-btm">
                                    <label class="form-checkbox form-icon form-text">
                                        <input type="checkbox"> Mot de passe oublier ?
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <h4 class="text-center">Université GESET</h4>
                    <p class="text-center">copyright@2019</p>
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