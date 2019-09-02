<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:55 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> details des resulats - INPTIC</title>
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
                  $id_niveauetude = htmlentities(htmlspecialchars($_GET['cood1']));
                  $semestre = htmlentities(htmlspecialchars($_GET['cood2']));

                  $requete = "SELECT * FROM composer c, personne p 
                              WHERE c.id_etu = p.id_pers
                              AND id_etu=? 
                              AND id_niveauetude=?
                              AND semestre =?";
                  $param = array($id_pers,$id_niveauetude,$semestre);

                  if(isset($_GET['cood']) && existanceUsers($requete,$param)){
                    $requete1 = "SELECT * FROM personne";
                    $param1 = array($id_pers);
                    $p = selection_condition($requete1,$param1);
                    //Recuperation du libellé du niveau d'etude
                    $requete2 = "SELECT lib_niveauetude FROM niveau_etude WHERE id_niveauetude=?";
                    $param2 = array($id_niveauetude);
                    $lib_niveauetude=getChampsParametrage($requete2,$param2);
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
                        <h3><i class="fa fa-home"></i> Université INPTIC </h3>
                        <div class="breadcrumb-wrapper">
                            <h3>Republique Gabonaise </h3>
                            <p><center>Unité*Travil*Justice</center></p>
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
                                                <b>Noms :</b> <span class="text-primary" style="font-family:Times New Roman"><?php echo $p['nom_pers'] ?></span><br />
                                                <b>Prénoms : </b> <span class="text-primary" style="font-family:Times New Roman"><?php echo $p['prenom_pers'] ?></span><br />
                                                <b>Sexe : </b> <?php echo $p['sexe_pers'] ?><br />
                                                
                                            </address>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <address>
                                                <strong><b>Année scolaire : <span style="font-family:Times New Roman"><?php echo $libelle_anneeAc;?>
                                                    </b></span></strong><br />
                                                <b>Trimestre : </b> <span style="font-family:Times New Roman"><?php echo $semestre; ?></span><br />
                                                <b>Classe : </b><span style="font-family:Times New Roman"> <?php echo $lib_niveauetude;
                                                    ?></span><br>
                                                
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pad-top">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-center"><span style="font-family: ravie">Relevé de notes</span></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed">
                                                            <thead>
                                                                <tr>
                                                                    <td class="text-center"><strong>Matières</strong></td>
                                                                    <td class="text-center"><strong>Coefficients</strong></td>
                                                                    <td class="text-center"><strong>Crédits</strong></td>
                                                                    <td class="text-center"><strong>Notes</strong></td>
                                                                    <td class="text-center"><strong>Mentions</strong></td>
                                                                    <td class="text-center"><strong>Enseignants</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $moyenne_finaleUE = 0;
                                                                    $countUE = 0;
                                                                    //Regroupement des UE programmé dans un niveau d'etude
                                                                    $sql4="SELECT *
                                                                        FROM personne e, composer c, matiere m, programme p, niveau_etude n, annee_academique a
                                                                        WHERE e.id_pers = c.id_etu 
                                                                        AND c.id_matiere = m.id_matiere 
                                                                        AND m.id_matiere = p.id_matiere 
                                                                        AND p.id_niveauetude = n.id_niveauetude
                                                                        AND n.id_niveauetude = e.id_niveauetude
                                                                        AND c.id_anneeAc = a.id_annee
                                                                        AND n.id_niveauetude = ?
                                                                        AND semestre = ?
                                                                        AND id_pers = ?
                                                                        AND c.id_anneeAc=?
                                                                        GROUP BY id_pers, c.id_ue";
                                                                    $requete4= AfficherTout($sql4);
                                                                    $param4= array($id_niveauetude,$semestre,$id_pers,$id_an); 
                                                                    //exécution de la requête de sélection et retour des résultats
                                                                    $requete4->execute($param4); 

                                                                    foreach($requete4 as $p4){
                                                                        $countUE ++;
                                                                        $id_ue = $p4['id_ue'];
                                                                        //Recuperation du libellé de l'U.E.
                                                                        $request = "SELECT lib_ue FROM unite_enseignement WHERE id_ue=?";
                                                                        $params = array($id_ue);
                                                                        echo '<tr><td colspan="6"><em><b>U.E - '.$countUE.' : </b>'.getChampsParametrage($request,$params).'</td></em></tr>';
                                                                        
                                                                        $somme_note = 0;
                                                                        
                                                                        $sql5 ="SELECT *
                                                                                FROM personne e, composer c, matiere m, programme p, niveau_etude n, annee_academique a
                                                                                WHERE e.id_pers = c.id_etu 
                                                                                AND c.id_matiere = m.id_matiere 
                                                                                AND m.id_matiere = p.id_matiere 
                                                                                AND p.id_niveauetude = n.id_niveauetude
                                                                                AND n.id_niveauetude = e.id_niveauetude
                                                                                AND c.id_anneeAc = a.id_annee
                                                                                AND n.id_niveauetude = ?
                                                                                AND semestre = ?
                                                                                AND id_pers = ?
                                                                                AND c.id_anneeAc=?
                                                                                AND c.id_ue=?
                                                                                GROUP BY id_pers, m.id_matiere";
                                                                        $requete5 = AfficherTout($sql5);
                                                                        $param5 = array($id_niveauetude,$semestre,$id_pers,$id_an,$id_ue); 
                                                                        //exécution de la requête de sélection et retour des résultats
                                                                        $requete5->execute($param5);
                                                                        foreach($requete5 as $p){
                                                                            //On recupere la note de l'examen et du devoir de la matiere
                                                                            $note_examen = getNoteExamenEtudiant($p['id_pers'], $p['semestre'], $p['id_matiere']);
                                                                            $note_devoir = getNoteDevoirEtudiant($p['id_pers'], $p['semestre'], $p['id_matiere']);
                                                                            //On recupere le coefficient de la matière du niveau d'etude de l'etudiant
                                                                            $coef_matiere = getCoefficientMatiere($p['id_matiere'], $id_niveauetude); 
                                                                            //On recupere le credit de la matière du niveau d'etude de l'etudiant
                                                                            $credit_matiere = getCreditMatiere($p['id_matiere'], $id_niveauetude);

                                                                            $note_final = ($note_examen + $note_devoir)/2;
                                                                            // Calcule de la somme des note;
                                                                            $somme_note = $somme_note + (($note_examen + $note_devoir)/2)*$coef_matiere;
                                                                    echo' <tr>
                                                                                <td class="text-center">'.$p['lib_matiere'].'</td>
                                                                                <td class="text-center">'.number_format($note_final,2).'</td>
                                                                                <td class="text-center">'.$coef_matiere.'</td>
                                                                                <td class="text-center">'.$credit_matiere.'</td>
                                                                                <td class="text-center">';

                                                                                        if($note_final < 10 ){ 
                                                                                            echo '<p>Insufisante</p>';
                                                                                        }else if($note_final >=10 && $note_final <12){ 
                                                                                            echo '<p>Passable</p>';
                                                                                        }else if($note_final >=12 && $note_final <14){ 
                                                                                            echo '<p>Assez bien</p>';
                                                                                        }else if($note_final >=14 && $note_final < 16){ 
                                                                                            echo '<p>Bien</p>';
                                                                                        }else if($note_final >=16 && $note_final < 18){ 
                                                                                            echo '<p>Très bien</p>';
                                                                                        }else if($note_final >=18 && $note_final <20){ 
                                                                                            echo '<p>Excelente</p>';
                                                                                        }else{ 
                                                                                            echo '<p>Honorable</p>';
                                                                                         } 
                                                                        echo '</td>
                                                                                <td class="text-center">';
                                                                                        //Recuperation du nom et prenom de l'enseignant qui de la matière affectée
                                                                                        $requete6 = "SELECT * FROM enseigner e, personne p WHERE p.id_pers=e.id_ens AND id_matiere=?";
                                                                                        $param6 = array($p['id_matiere']);
                                                                                        $enseignant = selection_condition($requete6,$param6);
                                                                                        echo $enseignant['nom_pers'].' '.$enseignant['prenom_pers']; 
                                                                                    
                                                                          echo '</td>
                                                                            </tr>';
                                                                        } 
                                                                        //Recuperation de la somme des coefficients des matières de l'UE.
                                                                        $somme_coefUE = getSommeCoefficientMatiereUE($id_ue,$id_niveauetude);
                                                                        //Recuperation de la somme des credits des matières de l'UE.
                                                                        $somme_creditUE = getSommeCreditMatiereUE($id_ue,$id_niveauetude);
                                                                        //Determination de la moyenne finale de l'U.E.
                                                                        $moyenne_finaleUE = $moyenne_finaleUE + number_format($somme_note/$somme_coefUE,2);
                                                                        echo '<tr class="text-center bg-gray">
                                                                                <td>Moyenne U.E </td><td><b>'.number_format($somme_note/$somme_coefUE,2).'</b></td><td>'.$somme_coefUE.'</td><td>'.$somme_creditUE.'</td><td></td><td></td>
                                                                            </tr>';
                                                                    } 
                                                                    //On compte le nombre de U.E enseigné dans un niveau d'etude.
									                                $nombreUE = nombreUE($id_niveauetude);
                                                                    //Determination de la moyenne generale
                                                                    $moyenne_generale = number_format($moyenne_finaleUE/$nombreUE,2);

                                                            echo '<tr>
                                                                    <td class="text-center text-primary"><b>Moyenne de l\'étudiant :</b></td>
                                                                    <td class="text-center bg-gray"><b>'.$moyenne_generale.'</b></td>
                                                                    <td></td>
                                                                    <td class="text-center">Max.classe : </td>
                                                                    
                                                                    <td class="text-center bg-gray"><b>'.number_format(getMoyenneMajor($id_niveauetude, $semestre),2).'</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center text-primary"><b>Rang de l\'étudiant : </b></td>
                                                                    <td class="text-center bg-gray"><b>';
                                                                                //Recuperation du rang de l'etudiant
                                                                                $requete7 = "SELECT rang FROM composer WHERE id_etu=? AND semestre =?";
                                                                                $param7 = array($id_pers,$semestre);
                                                                                echo  getChampsGestion($requete7,$param7);
                                                                            echo'</b>
                                                                    </td>
                                                                    <td></td>
                                                                    <td class="text-center">Moy.classe : </td>
                                                                    <td class="text-center bg-gray"><b>'.number_format((getMoyenneMajor($id_niveauetude,$semestre)+getMoyenneMinor($id_niveauetude, $semestre))/2, 2).'</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"><b>Effectif de la classe : </b></td>
                                                                    <td class="text-center bg-gray">'.getNombreEtudiantInscription($id_niveauetude).'</td>
                                                                    <td></td>
                                                                    <td class="text-center">Min.classe : </td>
                                                                    <td class="text-center bg-gray"><b>'.number_format(getMoyenneMinor($id_niveauetude, $semestre),2).'</b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed">
                                                            <tr>
                                                              <td class="text-center"><b>Décision du conseil des professeurs : </b></td>
                                                              <td class ="bg-gray">';
                                                                        if($semestre =="Semestre I"){
                                                                            // Recuperation de lomyenne d'admission du trimestre I
                                                                            $val_recuperer9 = "moy_trim1";
                                                                            $moy_trim1= 10;//getChampsParametrage($val_recuperer9, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                                            if($moyenne_generale >= $moy_trim1){ 
                                                                                if($p['sexe_pers'] =="Femme"){
                                                                                    echo '<p class="text-center text-primary"><b>Admise en classe superieure</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-primary"><b>Admis en classe superieure</b></p>';
                                                                                } 
                                                                                
                                                                            }else{ 
                                                                                if($p['sexe_pers'] =="Femme"){
                                                                                    echo '<p class="text-center text-danger"><b>Ajournée</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-danger"><b>Ajourné</b></p>';
                                                                                } 
                                                                            } 
                                                                        }else if($semestre =="Semestre II"){ 
                                                                            // Recuperation de lomyenne d'admission du trimestre II
                                                                            $val_recuperer10 = "moy_trim2";
                                                                            $moy_trim2= 10;//getChampsParametrage($val_recuperer10, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant.
                                                                            if($moyenne_generale >= $moy_trim2){ 
                                                                                if($p['sexe_pers'] =="Femme"){
                                                                                    echo '<p class="text-center text-primary"><b>Admise en classe superieure</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-primary"><b>Admis en classe superieure</b></p>';
                                                                                } 
                                                                            }else{ 
                                                                                if($p['sexe_pers'] =="Femme"){
                                                                                    echo '<p class="text-danger text-center"><b>Ajournée</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-danger text-center"><b>Ajourné</b></p>';
                                                                                } 
                                                                            } 
                                                                       }else{ 
                                                                             // Recuperation de lomyenne d'admission du trimestre III
                                                                            $val_recuperer11 = "moy_trim3";
                                                                            $moy_trim3= 10;//getChampsParametrage($val_recuperer11, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant.
                                                                            if($moyenne_generale >= $moy_trim3){ 
                                                                                if($p['sexe_pers'] =="Femme"){
                                                                                    echo '<p class="text-center text-primary"><b>Admise en classe superieure</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-primary"><b>Admis en classe superieure</b></p>';
                                                                                } 
                                                                            }else{ 
                                                                                if($p['sexe_pers'] =="Femme"){
                                                                                    echo '<p class="text-danger text-center"><b>Ajournée<b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-danger text-center"><b>Ajourné<b></p>';
                                                                                } 
                                                                            } 
                                                                        } ?>  
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Discipline : Heure d'absence non justifiées<b></td> 
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div> 
                                      <a href="index.php?module=gestion&action=resultat" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Retour</a> <span style="float : right"><a href="index.php?module=users&action=imprimer_bulletin&cood1=<?php echo $id_pers; ?>&cood2=<?php echo $id_niveauetude; ?>&cood3=<?php echo $semestre; ?>" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Imprimer</a></span> 
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
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/jquery-print/jQuery.print.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:33:57 GMT -->
</html>
