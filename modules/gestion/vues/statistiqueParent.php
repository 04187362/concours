<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from www.designbudy.com/nyasa/default/charts-flot.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:35:04 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Statistique des compositions.</title>
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

                        $table1 ="composer";
                        $table2 = "personne";

                        $colonne1 ="id_etu";
                        $colonne2 ="id_pers";
                        $val_recuperer1 = "nom_pers";
                        $val_recuperer2 = "prenom_pers";

                        if(isset($_GET['cood']) && existanceParametrage($table2, $colonne2, $_GET['cood'])){

                          $id_etu = addslashes(htmlspecialchars($_GET['cood']));
                          
                          $table3 = "classe";
                          $colonne3 = "id_classe";
                          $val_recuperer3 = "id_classe";
                          $val_recuperer4 = "prix";

                          // Recuperation de la classe de l'etudiant 
                          $id_classe = getChampsUsers($val_recuperer3, $table2, $colonne2, $id_etu);
                          // Recuperation du prix a payer pour cette classe
                          $prix = getChampsParametrage($val_recuperer4, $table3, $colonne3, $id_classe);

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
                <section id="content-container">
                    <?php include('globale/menu2.php'); ?>

                    <header class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Ravie"> Etudiant </span> </h3>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li> <a href="#"> Accueil </a> </li>
                                <li class="active"> statistique </li>
                            </ol>
                        </div>
                    </header>
                    <!--Page content-->
                    <!--===================================================-->
                    <section id="page-content">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Evolution des notes de <b class="text-primary"><?php echo getChampsUsers($val_recuperer1, $table2, $colonne2, $id_etu).' '.getChampsUsers($val_recuperer2, $table2, $colonne2, $id_etu); ?></b></h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Flot Line Chart placeholder-->
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        <div id="demo-flot-line" style="height:400px"></div>
                                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <!--===================================================-->
                        <!-- End Flot Charts -->
                    </section>
                    <!--===================================================-->
                    <!--End page content-->
                </section>
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
            <button id="scroll-top" class="btn">
            <i class="fa fa-chevron-up"></i>
            </button>
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
        <!--Metismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Flot Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.min.js"></script>
        <!--Flot Pie Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.pie.min.js"></script>
        <!--Flot Order Bars Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.selection.js"></script>
        <script src="plugins/flot-charts/jquery.flot.orderBars.js"></script>
        <script src="plugins/flot-charts/jquery.flot.spline.js"></script>
        <script src="plugins/flot-charts/jquery.flot.time.js"></script>
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/moment-range/moment-range.js"></script>
        <script src="plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.stack.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script>

// Flot Chart.js
// This file should not be included in your project.
// ====================================================================
// This is just a sample how to initialize plugins or components.
//
// - Designbudy.com -

$(document).ready(function() {


    // FLOT CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var pageviews = [

            <?php 

                $table5 = "classe";
                $colonne5="id_classe";

                $i = 0;
                $table ="SELECT *
                         FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
                         WHERE e.id_pers = c.id_etu 
                         AND c.id_matiere = m.id_matiere 
                         AND m.id_matiere = p.id_matiere 
                         AND p.id_classe = cl.id_classe
                         AND cl.id_classe=e.id_classe
                         AND c.id_anneeAc = a.id_annee
                         AND cl.id_classe = '$id_classe'
                         AND trimestre = 'Trimestre I'
                         AND e.id_pers = '$id_etu'
                         GROUP BY m.id_matiere, id_pers";
                      $resul = Selection($table);
                      foreach($resul as $ac){ 
                        $i++;

                        $note_examen = getNoteExamenEtudiant($ac['id_pers'], $ac['trimestre'], $ac['id_matiere']);
                        $note_devoir = getNoteDevoirEtudiant($ac['id_pers'], $ac['trimestre'], $ac['id_matiere']);

                        $note_final = ($note_examen + $note_devoir)/2;
                        // Recuperation de l'etat de publicatrion du trimestre I.
                        $val_recuperer4 ="pub_trim1";
                        $pub_trim1 = getChampsParametrage($val_recuperer4, $table5, $colonne5, $id_classe);
                        // Verifiant si les resulats du trimestre I ont déjà été publié
                    if($pub_trim1 ==1 ){ ?>

                        [<?php echo $i; ?>, <?php echo $note_final; ?>],

              <?php } 
          } ?>
        ],
        unique_visitor = [
            <?php 
                $i1 = 0;
                $table1 ="SELECT *
                         FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
                         WHERE e.id_pers = c.id_etu 
                         AND c.id_matiere = m.id_matiere 
                         AND m.id_matiere = p.id_matiere 
                         AND p.id_classe = cl.id_classe
                         AND cl.id_classe=e.id_classe
                         AND c.id_anneeAc = a.id_annee
                         AND cl.id_classe = '$id_classe'
                         AND trimestre = 'Trimestre II'
                         AND e.id_pers = '$id_etu'
                         GROUP BY m.id_matiere, id_pers";
                      $resul1 = Selection($table1);
                      foreach($resul1 as $ac1){ 
                        $i1++;

                        $note_examen1 = getNoteExamenEtudiant($ac1['id_pers'], $ac1['trimestre'], $ac1['id_matiere']);
                        $note_devoir1 = getNoteDevoirEtudiant($ac1['id_pers'], $ac1['trimestre'], $ac1['id_matiere']);

                        $note_final1 = ($note_examen1 + $note_devoir1)/2;

                        // Recuperation de l'etat de publicatrion du trimestre II .
                        $val_recuperer5 ="pub_trim2";
                        $pub_trim2 = getChampsParametrage($val_recuperer5, $table5, $colonne5, $id_classe);
                        // Verifiant si les resulats du trimestre I ont déjà été publié
                        if($pub_trim2 ==1 ){ ?>
                             [<?php echo $i1; ?>, <?php echo $note_final1; ?>],
                    <?php }

             } ?>
        ],
        unique_brunel = [
            <?php 
                $i2 = 0;
                $table2 ="SELECT *
                         FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
                         WHERE e.id_pers = c.id_etu 
                         AND c.id_matiere = m.id_matiere 
                         AND m.id_matiere = p.id_matiere 
                         AND p.id_classe = cl.id_classe
                         AND cl.id_classe=e.id_classe
                         AND c.id_anneeAc = a.id_annee
                         AND cl.id_classe = '$id_classe'
                         AND trimestre = 'Trimestre III'
                         AND e.id_pers = '$id_etu'
                         GROUP BY m.id_matiere, id_pers";
                      $resul2 = Selection($table2);
                      foreach($resul2 as $ac2){ 
                        $i2++;

                        $note_examen2 = getNoteExamenEtudiant($ac2['id_pers'], $ac2['trimestre'], $ac2['id_matiere']);
                        $note_devoir2 = getNoteDevoirEtudiant($ac2['id_pers'], $ac2['trimestre'], $ac2['id_matiere']);

                        $note_final2 = ($note_examen2 + $note_devoir2)/2;
                        // Recuperation de l'etat de publicatrion du trimestre III .
                        $val_recuperer6 ="pub_trim3";
                        $pub_trim3 = getChampsParametrage($val_recuperer6, $table5, $colonne5, $id_classe);
                        // Verifiant si les resulats du trimestre I ont déjà été publié
                if($pub_trim3 ==1 ){ ?>
                [<?php echo $i2; ?>, <?php echo $note_final2; ?>],

          <?php }

            } ?>
        ];

    var plot = $.plot("#demo-flot-line", [{
        label: 'Trimestre I',
        data: pageviews,
        lines: {
            show: true,
            fill: true,
            lineWidth: 2,
            fillColor: {
                colors: ["rgba(255,255,255,.0)", "rgba(183,236,240,.8)"]
            }
        },
        points: {
            show: true,
            lineWidth: 2,
            fill: true,
            fillColor: "#ffffff",
            symbol: "circle",
            radius: 5
        }
    }, {
        label: 'Trimestre II',
        data: unique_visitor,
        lines: {
            show: true,
            lineWidth: 2,
            fill: false,
            fillColor: {
                colors: [{
                    opacity: 0.5
                }, {
                    opacity: 0.5
                }]
            }
        },
        points: {
            show: true,
            lineWidth: 2,
            fill: true,
            fillColor: "#ffffff",
            symbol: "circle",
            radius: 5
        }
    }, {
        label: 'Trimestre III',
        data: unique_brunel,
        lines: {
            show: true,
            lineWidth: 2,
            fill: false,
            fillColor: {
                colors: [{
                    opacity: 0.5
                }, {
                    opacity: 0.5
                }]
            }
        },
        points: {
            show: true,
            lineWidth: 2,
            fill: true,
            fillColor: "#ffffff",
            symbol: "circle",
            radius: 5
        }
    }], {
        series: {
            lines: {
                show: true
            },
            points: {
                show: true
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#37BC9B;', '#F6BB42;' ,'#A2BB42'],
        legend: {
            show: true,
            position: 'nw',
            margin: [15]

        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eeeeee",
            borderWidth: 1,
            borderColor: "#eeeeee"
        },
        xaxis: {
            ticks: [

                <?php 
                $p = 0;
                $tab ="SELECT *
                         FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
                         WHERE e.id_pers = c.id_etu 
                         AND c.id_matiere = m.id_matiere 
                         AND m.id_matiere = p.id_matiere 
                         AND p.id_classe = cl.id_classe
                         AND cl.id_classe=e.id_classe
                         AND c.id_anneeAc = a.id_annee
                         AND cl.id_classe = '1'
                         AND trimestre = 'Trimestre I'
                         AND e.id_pers = '$id_etu'
                         GROUP BY m.id_matiere, id_pers";
                      $res = Selection($tab);
                      foreach($res as $value){ 
                        $p++;

                        $note_examen = getNoteExamenEtudiant($value['id_pers'], $value['trimestre'], $value['id_matiere']);
                        $note_devoir = getNoteDevoirEtudiant($value['id_pers'], $value['trimestre'], $value['id_matiere']);
                        $coef_matiere = getCoefficientMatiere($value['id_matiere'], 1);

                        $note_final = ($note_examen + $note_devoir)/2;
            ?>
                [<?php echo $p; ?>, "<?php echo $value['lib_matiere']; ?>"],

            <?php } ?>
                
            ]
        }
    });


    // Flot tooltip
    // =================================================================
    $("<div id='demo-flot-tooltip'></div>").css({
        position: "absolute",
        display: "none",
        padding: "10px",
        color: "#fff",
        "text-align": "right",
        "background-color": "#1c1e21"
    }).appendTo("body");


    $("#demo-flot-line").bind("plothover", function(event, pos, item) {

        if (item) {
            var x = item.datapoint[0].toFixed(2),
                y = item.datapoint[1];
            $("#demo-flot-tooltip").html("<p class='h4'>" + item.series.label + "</p>" + y)
                .css({
                    top: item.pageY + 5,
                    left: item.pageX + 5
                })
                .fadeIn(200);
        } else {
            $("#demo-flot-tooltip").hide();
        }

    });



});


        </script>

    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/charts-flot.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:35:14 GMT -->
</html>