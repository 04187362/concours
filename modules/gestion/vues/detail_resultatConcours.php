<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> details des resulats - GESET</title>
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
                  
                  $id_pers = htmlentities(htmlspecialchars($_GET['cood']));
                  $requete = "SELECT * FROM personne p, filiere f 
                  WHERE p.id_filiere = f.id_filiere 
                  AND id_pers=?";
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
                        <h3><i class="fa fa-home"></i> Université GESET </h3>
                        <div class="breadcrumb-wrapper">
                            <h3>Republique du Gabon </h3>
                            <p><center>Unité*Travil*Progrès</center></p>
                        </div>
                    </div><br>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="invoice-wrapper">
                            <section class="invoice-container">
                                <div class="invoice-inner">
                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <address>
                                                <b>Nom :</b> <span class="text-primary" style="font-family:Times New Roman"><?php echo $p['nom_pers'] ?></span><br />
                                                <b>Prénom : </b> <span class="text-primary" style="font-family:Times New Roman"><?php echo $p['prenom_pers'] ?></span><br />
                                                <b>Sexe : </b> <?php echo $p['sexe_pers'] ?><br />
                                                
                                            </address>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <address>
                                                <strong><b>Année scolaire : <span style="font-family:Times New Roman"><?php echo $libelle_anneeAc ;?>
                                                    </b></span></strong><br />
                                                <b>Filière : </b><span style="font-family:Times New Roman"> <?php echo $p['lib_filiere']; ?></span><br>
                                                
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pad-top">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-center"><span style="font-family:Times New Roman">Relevé de notes</span></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed">
                                                            <thead>
                                                                <tr>
                                                                    <td class="text-center"><strong>Matières</strong></td>
                                                                    <td class="text-center"><strong>Coefficients</strong></td>
                                                                    <td class="text-center"><strong>Notes</strong></td>
                                                                    <td class="text-center"><strong>Mentions</strong></td>
                                                                    <td class="text-center"><strong></strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    
                                                                    $moyenne_general = 0;
                                                                    $moyenne = 0;
                                                                    $id_filiere = $p['id_filiere'];
                                                                    $sql1 ="SELECT * FROM matiere_concours m, programme_concours p, filiere f
                                                                            WHERE m.id_matiere = p.id_matiere 
                                                                            AND p.id_filiere = f.id_filiere   
                                                                            /*AND c.id_anneeAc = a.id_annee*/
                                                                            AND f.id_filiere=?
                                                                            AND id_annee = ?";

                                                                    $requete1 = AfficherTout($sql1); 
                                                                    $param1 = array($id_filiere,$id_an);
                                                                    //exécution de la requête de sélection et retour des résultats
                                                                    $requete1->execute($param1);
                                                                    //Conservation lignes par ligne des élements retournés
                                                                    while($tab=$requete1->fetch()){ 
                                                                        //Calcule de la moyenne du candidat
                                                                        $sql2 = "SELECT sum(note*coef) as moyenne, coef, note, lib_matiere
                                                                        FROM personne e, composer_concours c, matiere_concours m, programme_concours p, filiere f, annee_academique a
                                                                        WHERE e.id_pers = c.id_candidat 
                                                                        AND c.id_matiere = m.id_matiere
                                                                        AND m.id_matiere = p.id_matiere 
                                                                        AND p.id_filiere = f.id_filiere
                                                                        AND f.id_filiere= e.id_filiere
                                                                        AND c.id_anneeAc = a.id_annee
                                                                        AND id_pers = ?
                                                                        AND f.id_filiere=?
                                                                        AND c.id_anneeAc=?
                                                                        AND m.id_matiere=?";
                                                                        $param2 = array($id_pers,$id_filiere, $id_an,$tab['id_matiere']);
                                                                        $requete2 = AfficherTout($sql2);
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $requete2->execute($param2);
                                                                        //Conservation lignes par ligne des élements retournés
                                                                        while($tablo=$requete2->fetch()){ $moyenne = $moyenne + $tablo['moyenne']; 
                                                                        echo'<tr>
                                                                                <td class="text-center">'.$tablo['lib_matiere'].'</td>';
                                                                                    if(!empty($tablo['coef'])){
                                                                                    echo '<td class="text-center">'.$tablo['coef'].'</td>';
                                                                                    }else{ 
                                                                                        //Recuperation du coefficient d'une matiere 
                                                                                        $requete3 = "SELECT coef FROM programme_concours WHERE id_matiere = ? AND id_filiere =?";
                                                                                        $parameter = array($tab['id_matiere'],$id_filiere);
                                                                                
                                                                                        echo '<td class="text-center">'.getChampsParametrage($requete3,$parameter).'</td>';
                                                                                   } 
                                                                                   if(!empty($tablo['coef'])){ 
                                                                                        echo '<td class="text-center">'.number_format($tablo['note'],2).'</td>';
                                                                                   }else{ 
                                                                                        echo '<td class="text-center">0.00</td>';
                                                                                   } 
                                                                                echo '<td class="text-center">';
                                                                                      if($tablo['note'] < 10 ){ 
                                                                                             echo '<p>Insufisant</p>';
                                                                                      }else if($tablo['note'] >=10 && $tablo['note'] <12){ 
                                                                                        echo '<p>Passable</p>';
                                                                                      }else if($tablo['note'] >=12 && $tablo['note'] <14){ 
                                                                                        echo '<p>Assez bien</p>';
                                                                                      }else if($tablo['note'] >=14 && $tablo['note'] < 16){ 
                                                                                        echo '<p>Bien</p>';
                                                                                      }else if($tablo['note'] >=16 && $tablo['note'] < 18){
                                                                                        echo '<p>Très bien</p>';
                                                                                      }else if($tablo['note'] >=18 && $tablo['note'] <20){ 
                                                                                        echo '<p>Excelent</p>';
                                                                                      }else{ 
                                                                                        echo '<p>Honorable</p>';
                                                                                      }   
                                                                                    echo '</td>
                                                                                <td class="text-center"></td>
                                                                            </tr>';
                                                                       }
                                                                        //$moyenne = $moyenne + getNombreLigneGestion($sql2,$param2);
                                                                        
                                                                        //Calcule de la somme des coeficient d'une filiere
                                                                        $sql3="SELECT sum(coef) as effectif 
                                                                            FROM programme_concours 
                                                                            WHERE id_filiere =?";
                                                                        $param3 = array($id_filiere);
                                                                        //Calcule la somme des coefficients des matieres qui sont programmés dans une filiere.
                                                                        $somme_coef = getNombreLigneGestion($sql3,$param3);  
                                                                        //Calcule la moyenne des etudiants.
                                                                        $moyenne_general = ($moyenne/$somme_coef);
                                                                ?>
                                                                
                                                                <?php } ?>
                                                                <tr>
                                                                    <td class="text-center text-primary"><b>Moyenne du candidat :</b></td>
                                                                    <td class="text-center bg-gray"><b><?php echo number_format($moyenne_general,2); ?></b></td>
                                                                    <td></td>
                                                                    <td class="text-center">Max.classe : </td>
                                                                    
                                                                    <td class="text-center bg-gray">
                                                                        <b>
                                                                            <?php 
                                                                                 //Recuperation de la moyenne du major 
                                                                                $sql7 = "SELECT max(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param7 = array($p['id_filiere'], $id_an);
                                                                                echo number_format(getChampsGestion($sql7, $param7),2); 
                                                                            ?>
                                                                        </b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center text-primary"><b>Rang de l'étudiant : </b></td>
                                                                    <td class="text-center bg-gray"><b>
                                                                            <?php
                                                                                //Recuperation du rang du candidat
                                                                                $sql6 = "SELECT rang FROM composer_concours WHERE id_candidat=? AND id_anneeAc=?";
                                                                                $param6 = array($id_pers,$id_an);
                                                                                echo  getChampsGestion($sql6, $param6);
                                                                            ?></b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td class="text-center">Moy.classe : </td>
                                                                    <td class="text-center bg-gray"><b>
                                                                        <?php

                                                                             //Calcule de la moyenne de classe 
                                                                             //Recuperation de la moyenne du major 
                                                                                $sql10 = "SELECT max(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param10 = array($p['id_filiere'], $id_an);
                                                                                $moyenne_major = getChampsGestion($sql10, $param10);
                                                                                 //Recuperation de la moyenne du minor 
                                                                                $sql11 = "SELECT min(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param11 = array($p['id_filiere'], $id_an);
                                                                                $moyenne_minor = getChampsGestion($sql11, $param11);

                                                                            echo number_format(($moyenne_minor+$moyenne_major)/2, 2); 
                                                                        ?>
                                                                    </b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"><b>Nombre de candidats : </b></td>
                                                                    <td class="text-center bg-gray">
                                                                        <?php 
                                                                            // Calcule du nombre de candidat
                                                                            $sql5 = "SELECT count(*) FROM personne WHERE id_filiere =? AND type_pers='Candidat'";
                                                                            $param5=array($id_filiere);
                                                                            echo getNombreLigneGestion($sql5,$param5); 
                                                                        ?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td class="text-center">Min.classe : </td>
                                                                    <td class="text-center bg-gray">
                                                                        <b>
                                                                            <?php 
                                                                                 //Recuperation de la moyenne du minor 
                                                                                $sql8 = "SELECT min(moyenne) FROM composer_concours c, personne p 
                                                                                        WHERE p.id_pers = c.id_candidat
                                                                                        AND id_filiere =?
                                                                                        AND id_anneeAc = ?";
                                                                                $param8 = array($p['id_filiere'], $id_an);
                                                                                echo number_format(getChampsGestion($sql8, $param8),2);
                                                                            ?>
                                                                        </b>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed">
                                                            <tr>
                                                              <td class="text-center"><b>Décision du conseil des professeurs : </b></td>
                                                              <td class ="bg-gray text-center">
                                                                    <?php
                                                                        // Recuperation de la myenne d'admission du trimestre I
                                                                        $sql4 = "SELECT moyenne_admission FROM filiere WHERE id_filiere=?";
                                                                        $param4 = array($id_filiere);
                                                                        $moyenne_admission= getChampsParametrage($sql4, $param4);
                                                                        //On compare la moyenne d'admission à celle de l'etudiant. 
                                                                        if($moyenne_general >= $moyenne_admission){ 
                                                                            if($p['sexe_pers'] =="Femme"){
                                                                                echo '<b>Admise au concours</b>';
                                                                            }else{
                                                                                echo '<b>Admis au concours</b>';
                                                                            }
                                                                                                                    
                                                                        }else{
                                                                            if($p['sexe_pers'] =="Femme"){
                                                                                echo '<b>Ajournée</b>';
                                                                            } else{
                                                                                echo '<b>Ajourné</b>';
                                                                            } 
                                                                                                                    
                                                                        }
                                                                    ?> 
                                                                </td>
                                                            </tr>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div> 
                                      <a href="index.php?module=gestion&action=resultatConcours" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Retour</a> <span style="float : right"><a href="index.php?module=users&action=imprimer_releveNote_concours&cood=<?php echo $id_pers; ?>" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Imprimer</a></span> 
                                    </div>
                                </div>
                            </section>
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
                    <?php include("globale/menu_concours.php"); ?>
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
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/jquery-print/jQuery.print.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:57 GMT -->
</html>
