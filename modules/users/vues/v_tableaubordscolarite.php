<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:21:48 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Accueil.</title>
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
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
        <!--jVector Map [ OPTIONAL ]-->
        <link href="plugins/jvectormap/jquery-jvectormap.css" rel="stylesheet">
        <!--Morris.js [ OPTIONAL ]-->
        <link href="plugins/morris-js/morris.min.css" rel="stylesheet">
        <!--Bootstrap Table [ OPTIONAL ]-->
        <link href="plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jquery-steps.min.css" rel="stylesheet">
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
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">

                        <?php if($type_personne=="Etudiant"){ ?>
                            <div class="row">
                                <?php 
                                    $sql1 ="SELECT * FROM enseigner e, matiere m
                                            WHERE m.id_matiere = e.id_matiere
                                            AND id_niveauetude = ?";
                                    $request1 = afficherTout($sql1); 
                                    $param1 = array($classe_etudiant);
                                    //exécution de la requête de sélection et retour des résultats
                                    $request1->execute($param1);
                                    //Conservation lignes par ligne des élements retournés
                                     while($val=$request1->fetch()){ ?>
                                       <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                                        <h3 class="mar-no"> 
                                                            <span class="counter">
                                                                <?php
                                                                  // Compte le nombre de fois que l'etudiant a composé sur une matiere.
                                                                  $request2 = "SELECT count(*) as effectif 
                                                                                FROM composer
                                                                                WHERE id_etu =?
                                                                                AND id_matiere =?";
                                                                  $param2 = array($id_personne,$val['id_matiere']);
                                                                  $nb_comp = getNombreLigneGestion($request2, $param2);
                                                                  echo  $nb_comp;
                                                                ?>
                                                            </span></h3>
                                                        <?php 
                                                            if($nb_comp > 1){ ?>
                                                            <p class="mar-ver-5"><b style="font-family:engravers mt">Compositions</b></p>
                                                        <?php }else{ ?>
                                                            <p class="mar-ver-5"><b style="font-family:engravers mt">Composition</b></p>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-user fa-3x text-success"></i> </div>
                                                </div>
                                                <div class="progress progress-striped progress-xs">
                                                    <div style="width: 100%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-success"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                                <h4> <?php echo $val['lib_matiere']; ?> </h4>
                                            </div>
                                        </div>
                                    </div> 
                                <?php  }?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="font-family:andalus"> Effectif </h6>
                                        </div>
                                        <div class="panel-body">
                                            <!--Morris Area Chart placeholder-->
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                            <div id="demo-morris-color-donut" style="height:275px"></div>
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  }else if($type_personne=="Parent"){ ?>
                            <div class="row">
                                <?php 
                                    $sql2 ="SELECT * FROM niveau_etude";
                                    $request2 = afficherTout($sql2); 
                                    //exécution de la requête de sélection et retour des résultats
                                    $request2->execute();
                                    //Conservation lignes par ligne des élements retournés
                                     while($value=$request2->fetch()){ ?>

                                       <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                                        <h3 class="mar-no"> 
                                                            <span class="counter">
                                                                <?php
                                                                  // Compte le nombre de matiere que l'enseignant enseigne dans chaque classe 
                                                                  $request3 = "SELECT count(*) as effectif FROM  inscription i, personne p
                                                                                WHERE p.id_pers = i.id_etu
                                                                                AND id_par = ?
                                                                                AND id_niveauetude =?";
                                                                  $param3 = array($id_personne,$value['id_niveauetude']);
                                                                  $nb_etu = getNombreLigneGestion($request3, $param3); 
                                                                  echo  $nb_etu;
                                                                ?>
                                                            </span></h3>
                                                        <?php 
                                                            if($nb_etu > 1){ ?>
                                                            <p class="mar-ver-5"><b style="font-family:engravers mt">Etudiants</b></p>
                                                        <?php }else{ ?>
                                                            <p class="mar-ver-5"><b style="font-family:engravers mt">Etudiant</b></p>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-user fa-3x text-primary"></i> </div>
                                                </div>
                                                <div class="progress progress-striped progress-xs">
                                                    <div style="width: 100%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-primary"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                                <h4> <?php echo $value['lib_niveauetude']; ?> </h4>
                                            </div>
                                        </div>
                                    </div> 
                                <?php  }?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="font-family:andalus"> Effectif </h6>
                                        </div>
                                        <div class="panel-body">
                                            <!--Morris Area Chart placeholder-->
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                            <div id="demo-morris-color-donut" style="height:275px"></div>
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  }else if($type_personne=="Enseignant"){ ?>
                            <div class="row">
                                <?php 
                                    
                                    $sql ="SELECT * FROM niveau_etude";
                                    $request = afficherTout($sql); 
                                    //exécution de la requête de sélection et retour des résultats
                                    $request->execute();
                                    //Conservation lignes par ligne des élements retournés
                                     while($tablo=$request->fetch()){ ?>
                                       <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <a href="index.php?module=gestion&action=matiereEnseignant&cood=<?php echo $tablo['id_niveauetude']; ?>">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-10">
                                                        <h3 class="mar-no"> 
                                                            <span class="counter">
                                                                <?php
                                                                    // Compte le nombre de matiere que l'enseignant enseigne dans chaque classe 
                                                                    $requete1 = "SELECT count(*) as effectif FROM enseigner WHERE id_ens=? AND id_niveauetude=?";
                                                                    $param1 = array($id_personne,$tablo['id_niveauetude']);
                                                                    $nb_mat = getNombreLigneGestion($requete1,$param1); 
                                                                  echo  $nb_mat;
                                                                ?>
                                                            </span></h3>
                                                        <?php 
                                                            if($nb_mat > 1){ ?>
                                                            <p class="mar-ver-5"><b style="font-family:engravers mt">Matières</b></p>
                                                        <?php }else{ ?>
                                                            <p class="mar-ver-5"><b style="font-family:engravers mt">Matière</b></p>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-files-o fa-3x text-danger"></i> </div>
                                                </div>
                                                <div class="progress progress-striped progress-xs">
                                                    <div style="width: 100%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-danger"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                                <h4> <?php echo $tablo['lib_niveauetude']; ?> </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div> 
                                <?php  }?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="font-family:andalus"> Effectif </h6>
                                        </div>
                                        <div class="panel-body">
                                            <!--Morris Area Chart placeholder-->
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                            <div id="demo-morris-color-donut" style="height:275px"></div>
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  }else{ ?>
                            <!--Widget-4 -->
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                            $requete1 = "SELECT count(*) as effectif FROM niveau_etude";
                                                            
                                                            echo $nb_classe = getNombreLigneParametre2($requete1);
                                                                        
                                                        ?>
                                                    </span>
                                                </h3>
                                                <?php 
                                                    if($nb_classe > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Niveau etude</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Niveau d'etude</b></p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-tasks fa-3x text-info"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                            $requete2 = "SELECT count(*) as effectif FROM matiere";
                                                            echo $nb_matiere = getNombreLigneParametre2($requete2);
                                                                        
                                                        ?>
                                                    </span></h3>
                                                <?php 
                                                    if($nb_matiere > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Matières</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Matière</b></p>
                                                <?php } ?>
                                                
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-files-o fa-3x text-danger"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-danger"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                             $requete3 = "SELECT count(id_pers) as effectif FROM personne WHERE type_pers='Etudiant'";
                                                            echo $nb_etudiant = getNombreLigneUsers2($requete3);
                                                                        
                                                        ?>
                                                    </span></h3>
                                                <?php 
                                                    if($nb_etudiant > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Etudiants</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Etudiant</b></p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-graduation-cap fa-3x text-success"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-success"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                            $requete4 = "SELECT count(id_pers) as effectif FROM personne WHERE type_pers='Enseignant'";
                                                            echo $nb_enseignant = getNombreLigneUsers2($requete4);
                                                                        
                                                        ?>
                                                    </span>
                                                </h3>
                                                <?php 
                                                    if($nb_enseignant > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Enseignants</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Enseignant</b></p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-users fa-3x text-info"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                            $requete5 = "SELECT count(*) as effectif FROM composer";
                                                            echo $nb_comp = getNombreLigneGestion2($requete5);
                                                                        
                                                        ?>
                                                    </span>
                                                </h3>
                                                <?php 
                                                    if($nb_comp > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Compositions</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Composition</b></p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-pencil fa-3x text-info"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                            $requete6 = "SELECT count(*) as effectif FROM inscription";
                                                            echo $nb_inscription = getNombreLigneGestion2($requete6);
                                                                        
                                                        ?>
                                                    </span></h3>
                                                <?php 
                                                    if($nb_inscription > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Inscriptions</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Inscription</b></p>
                                                <?php } ?>
                                                
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-money fa-3x text-danger"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-danger"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                            $requete7 = "SELECT count(id_pers) as effectif FROM personne WHERE type_pers='Personnel'";
                                                            echo $nb_personne = getNombreLigneUsers2($requete7);
                                                                        
                                                        ?>
                                                    </span></h3>
                                                <?php 
                                                    if($nb_personne > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Personnels</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Personnel</b></p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-user fa-3x text-success"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-success"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel widget">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-10">
                                                <h3 class="mar-no"> 
                                                    <span class="counter">
                                                        <?php 

                                                            $requete8 = "SELECT count(id_pers) as effectif FROM personne WHERE type_pers='Parent'";
                                                            echo $nb_parent = getNombreLigneUsers2($requete8);
                                                                        
                                                        ?>
                                                    </span>
                                                </h3>
                                                <?php 
                                                    if($nb_parent > 1){ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Tuteurs</b></p>
                                                <?php }else{ ?>
                                                    <p class="mar-ver-5"><b style="font-family:engravers mt">Tuteur</b></p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fa fa-user fa-3x text-info"></i> </div>
                                        </div>
                                        <div class="progress progress-striped progress-xs">
                                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <p> 4% higher than last month </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h6 class="panel-title" style="font-family:andalus"> Effectif </h6>
                                    </div>
                                    <div class="panel-body">
                                        <!--Morris Area Chart placeholder-->
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        <div id="demo-morris-color-donut" style="height:275px"></div>
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  } ?>
                        
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
         <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
       <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Flot Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.spline.js"></script>
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/moment-range/moment-range.js"></script>
        <script src="plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <!--Flot Order Bars Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
        <!--DataTables [ OPTIONAL ]-->
        <script src="plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <!--Morris.js [ OPTIONAL ]-->
        <script src="plugins/morris-js/morris.min.js"></script>
        <script src="plugins/morris-js/raphael-js/raphael.min.js"></script>        
        <!--Easy Pie Chart [ OPTIONAL ]-->
        <script src="plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/wizard.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/form-wizard.js"></script>
         <!--DataTables Sample [ SAMPLE ]-->
        <script src="js/demo/tables-datatables.js"></script>

        <script>

            // Dashboard.js
            // ====================================================================
            // This file should not be included in your project.
            // This is just a sample how to initialize plugins or components.
            //
            // - Designbudy.com -


            $(window).on('load', function() {

                

                // COLORFUL MORRIS DONUT CHART
                // =================================================================
                // Require MorrisJS Chart
                // -----------------------------------------------------------------
                // http://morrisjs.github.io/morris.js/
                // =================================================================
                Morris.Donut({
                    element: 'demo-morris-color-donut',
                    data: [

                        <?php 
                            $table ="SELECT type_pers, count(id_pers) as effectif
                                        FROM personne
                                        GROUP BY  type_pers ";
                                  $resul = Selection($table);
                                  foreach($resul as $ac){ ?>

                            {label: "<?php echo $ac['type_pers']; ?>", value: <?php echo $ac['effectif']; ?>},
                            
                        <?php } ?>
                    ],
                    colors: ['#E9422E', '#FAC552', '#3eb489', '#29b7d3'],
                    resize:true
                });

            });

        </script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:26:27 GMT -->
</html>