<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:29:26 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Gallerie de l'etablissemnt </title>
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
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/gamma-gallery.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <script src="plugins/gamma-gallery/js/modernizr.custom.70736.js"></script>
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

                          if(isset($_POST['supprimer'])){

                            $id_evenement=htmlentities(htmlspecialchars($_GET['parasup']));
                            $requete ="SELECT * FROM evenement WHERE id_ev=?";
                            $param = array($id_evenement);

                            if(isset($_GET['parasup']) && existanceParametrage($requete,$param)){

                                $evenement = new Evenement();

                                $evenement->setId_ev($id_evenement);
                              
                                $evenement->supprimerEvenement();

                                header("location:$_SERVER[HTTP_REFERER]");  

                            }else{

                              header("location:index.php?module=users&action=accueil");

                            }

                          }

                    ?>

                    <?php
    
                        // Definition de la pagination

                        $size=6;

                        if(isset($_GET['page']))
                          {
                            $page=$_GET['page'];
                          }
                        else
                          {
                            $page=0;
                          }
                      
                         $offset = $size*$page; //decalage

                        
                       //Recuperation des nombres de prosduits


                        $NBE = getNombreEvenement();


                        if(($NBE%$size)==0)
                          { 
                            $nombrePage=floor($NBE/$size);
                          }
                        else
                          { 
                            $nombrePage=floor($NBE/$size)+1;
                          }

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
                        <h3><i class="fa fa-home"></i><span style="font-family:Times New Roman"> Galerie </span></h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> Galerie etablissemnt  </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="panel-heading">
                            <span class="pull-right">
                            <a href="index.php?module=parametrage&action=ajouter_evenement" class="btn btn-default" type="button"><i class="fa fa-plus"></i> Ajouter nouvelle image</a>
                            </span>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                
                                <div class="row">
                                    <?php
                                        $sql ="SELECT * FROM evenement
                                                    ORDER BY id_ev DESC
                                                    LIMIT $size OFFSET $offset";
                                        $requete1 = afficherTout($sql); 
                                        //exécution de la requête de sélection et retour des résultats
                                        $requete1->execute();
                                        //Conservation lignes par ligne des élements retournés
                                        while($p=$requete1->fetch()){ ?>
                                    <div class="col-md-4">
                                        <div class="panel panel-primary">
                                           <div class="panel-body">
                                                <a data-toggle="modal" data-target=".<?php echo $p['id_ev'];?>sbs-example-modal-lg">
                                                    <img src="img/photos/<?php echo $p['image']; ?>" class="img-responsive" width="300" >

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <span style="font-family:Tahoma"><?php echo $p['commentaire']; ?></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <small class="text-muted pull-right" style="font-family:Times New Roman"><?php echo date('d-m-Y', strtotime($p['date_ev'])); ?></small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="modal fade <?php echo $p['id_ev'];?>sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Voulez vous supprimer?</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=users&action=galerie_etablissement&parasup=<?php echo $p['id_ev'];?>" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                        <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>
                                                                    </div>
                                                                  </center>
                                                              </form>
                                                             </div>

                                                          </div>
                                                        </div>
                                                    </div>
                                           </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                            </div>
                            <div class="gamma-overlay"></div>
                            <div class="row">

                                <div class="col-md-12">
                                    <center>
                                        <ul class="pagination">
                                            <?php for($i=0; $i < $nombrePage; $i++){?>
                                                <li class="<?php echo(($i==$page)? 'active' : '' )?>">
                                                    <a href="index.php?module=users&action=galerie_etablissement&page=<?php echo($i)?>"> <span><?php echo($i+1)?></span></a>
                                                </li>
                                            <?php }?>
                                        </ul>
                                    </center>
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
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
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
        <!--Gamma Gallery [ OPTIONAL ]-->
        <script src="plugins/gamma-gallery/js/jquery.masonry.min.js"></script>
        <script src="plugins/gamma-gallery/js/jquery.history.js"></script>
        <script src="plugins/gamma-gallery/js/js-url.min.js"></script>
        <script src="plugins/gamma-gallery/js/jquerypp.custom.js"></script>
        <script src="plugins/gamma-gallery/js/gamma.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/pages-gallery.js"></script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/pages-gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:54 GMT -->
</html>