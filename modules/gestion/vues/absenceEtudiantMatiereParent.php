<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:34:01 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Absence etudiant - GESET</title>
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
                    $id_etu =htmlentities(htmlspecialchars($_GET['cood']));
                    $id_matiere = htmlentities(htmlspecialchars($_GET['cood1']));
                    $requete = "SELECT * FROM absence_etudiant a, emargement e 
                                WHERE e.id_em = a.id_em 
                                AND id_etu=?
                                AND id_matiere=?";
                    $param = array($id_etu,$id_matiere);
                    if(isset($_GET['cood']) && existanceGestion($requete,$param)){
                        //Changement d'etat de l'absence de l'etudiant
                        updateMultipleEtatAbsence2($id_etu, $id_personne, $id_matiere);

                        $requete1 = "SELECT nom_pers FROM personne WHERE id_pers=?";
                        $requete2 = "SELECT prenom_pers FROM personne WHERE id_pers=?";
                        $param1 = array($id_etu);

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
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Absence </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active">Absence etudiant</li>
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
                                <div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="font-family:Times New Roman">Absences de <span class="text-primary"><?php echo getChampsUsers($requete1,$param1).' '.getChampsUsers($requete2,$param1); ?></span></h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php 

                                                $sql = "SELECT * FROM absence_etudiant a, emargement e
                                                            WHERE a.id_em = e.id_em
                                                            AND id_etu = ?
                                                            AND id_matiere = ?";

                                                $request = afficherTout($sql); 
                                                $param2 = array($id_etu,$id_matiere);
                                                //exécution de la requête de sélection et retour des résultats
                                                $request->execute($param2);
                                                //Conservation lignes par ligne des élements retournés
                                                while($tablo=$request->fetch()){ ?>

                                                    <div class="col-md-6">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading"></div>
                                                            <div class="panel-body">
                                                                <table>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Type de seance : </td><td><span class="text-primary"><b><?php echo $tablo['type_seance']; ?></b></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Date : </td><td><?php echo date('d-m-Y',strtotime($tablo['date_em'])); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Heure de cours : </td><td>De <b><?php echo $tablo['heure_debut']; ?></b> à <b><?php echo $tablo['heure_fin']; ?></b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Mois : </td>
                                                                        <td>
                                                                            <?php 
                                                                                if($tablo['mois'] == "1"){
                                                                                    echo 'Janvier';
                                                                                }else if($tablo['mois']=="2"){
                                                                                    echo 'Fevrier';
                                                                                }else if($tablo['mois']=="3"){
                                                                                    echo 'Mars';
                                                                                }else if($tablo['mois']=="4"){
                                                                                    echo 'Avril';
                                                                                }else if($tablo['mois']=="5"){
                                                                                    echo 'Mais';
                                                                                }else if($tablo['mois']=="6"){
                                                                                    echo 'Juin';
                                                                                }else if($tablo['mois']=="7"){
                                                                                    echo 'Juillet';
                                                                                }else if($tablo['mois']=="8"){
                                                                                    echo 'Août';
                                                                                }else if($tablo['mois']=="9"){
                                                                                    echo 'Septembre';
                                                                                }else if($tablo['mois']=="10"){
                                                                                    echo 'Octobre';
                                                                                }else if($tablo['mois']=="11"){
                                                                                    echo 'Novembre';
                                                                                }else{
                                                                                    echo 'Décembre';
                                                                                }  
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-bottom:5px">Justification : </td><td><?php echo $tablo['justification']; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php  } ?>
                                            
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