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
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <section id="content-container">
                    <?php include('globale/menu2.php'); ?>

                    <header class="pageheader">
                        <h3><i class="fa fa-home"></i> <span style="font-family:Times New Roman"> Statistique </span> </h3>
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
                            

                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Satistique des compositions</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="demo-dt-basic" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Trimestre</th>
                                                        <th class="text-center">Total</th>
                                                        <th class="text-center">Pourcentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                        $tri1 = 0;
                                                        $tri2 = 0;
                                                        $tri3 = 0;

                                                        $requ=" SELECT * FROM composer c, personne p 
                                                                   WHERE p.id_pers = c.id_etu
                                                                   GROUP BY id_etu, trimestre";

                                                        $resu2 = Selection($requ);

                                                        foreach ($resu2 as $val) { 
                                                            if($val['trimestre'] == 'Trimestre I'){
                                                                $tri1 = $tri1 + $val['moyenne'];
                                                            }else if($val['trimestre'] == 'Trimestre II'){
                                                                $tri2 = $tri2 + $val['moyenne'];
                                                            }else{
                                                                $tri3 = $tri3 + $val['moyenne'];
                                                            }
                                                    } ?>
                                                    <tr>
                                                        <td class="text-center">Trimestre I</td>
                                                        <td class="text-center"><?php echo $tri1 ; ?></td>
                                                        <td class="text-center"><?php echo number_format(($tri1 /($tri1 + $tri2 + $tri3))*100,2) ; ?>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">Trimestre II</td>
                                                        <td class="text-center"><?php echo $tri2 ; ?></td>
                                                        <td class="text-center"><?php echo number_format(($tri2 /($tri1 + $tri2 + $tri3))*100,2) ; ?>%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">Trimestre III</td>
                                                        <td class="text-center"><?php echo $tri3 ; ?></td>
                                                        <td class="text-center"><?php echo number_format(($tri3 /($tri1 + $tri2 + $tri3))*100,2) ; ?>%</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Satistique des compositions</h3>
                                        </div>
                                        <div class="panel-body">
                                            <!--Flot Pie Chart placeholder -->
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                            <div id="demo-donut-chart" style="height:250px"></div>
                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Satistique des paiements</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                        <table id="demo-dt-basic" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Mois</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $requ2=" SELECT mois, sum(montant) as somme
                                                            FROM paiement p, frait f
                                                            WHERE p.id_frait = f.id_frait
                                                            GROUP BY  mois 
                                                            ORDER BY mois ASC";

                                                    $resu3 = Selection($requ2);

                                                    foreach ($resu3 as $val1) { ?> 
                                                        <tr>
                                                            <td class="text-center">
                                                            <?php if($val1['mois'] == "1"){ 
                                                               echo "Janvier";
                                                                }else if($val1['mois']=="2"){ 
                                                                echo "Fevrier";
                                                                }else if($val1['mois']=="3"){
                                                                 echo "Mars";
                                                                }else if($val1['mois']=="4"){ 
                                                                echo "Avril";
                                                                }else if($val1['mois']=="5"){ 
                                                                 echo "Mai";
                                                                }else if($val1['mois']=="6"){ 
                                                                echo "Juin";
                                                                }else if($val1['mois']=="7"){ 
                                                                    echo "Juillet";
                                                                }else if($val1['mois']=="8"){ 
                                                                    echo "Août";
                                                                }else if($val1['mois']=="9"){ 
                                                                    echo "Septembre";
                                                                }else if($val1['mois']=="10"){ 
                                                                    echo "Octobre";
                                                                }else if($val1['mois']=="11"){ 
                                                                    echo "Novembre";
                                                                }else{ 
                                                                    echo "Décembre";
                                                                } 
                                                            ?>
                                                            </td>
                                                            <td class="text-center"><?php echo $val1['somme'] ; ?> FCFA</td>
                                                        </tr> 
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>   
                            </div>

                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Satistique de paiement</h3>
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
                $i = 0;
                $table ="SELECT mois, sum(montant) as somme
                            FROM paiement p, frait f
                            WHERE p.id_frait = f.id_frait
                            GROUP BY  mois 
                            ORDER BY mois ASC";
                      $resul = Selection($table);
                      foreach($resul as $ac){ 

                        $i++;
            ?>
                [<?php echo $i; ?>, <?php echo $ac['somme']; ?>],

            <?php } ?>
        ];

    var plot = $.plot("#demo-flot-line", [{
        label: 'paiement',
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
        colors: ['#37BC9B;', '#F6BB42'],
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
                    $tab ="SELECT mois, sum(montant) as somme
                                FROM paiement p, frait f
                                WHERE p.id_frait = f.id_frait
                                GROUP BY  mois 
                                ORDER BY mois ASC ";
                          $resu = Selection($tab);
                          foreach($resu as $value){ 

                            $p++;

                            if($value['mois'] == "1"){ ?>
                               [<?php echo $p; ?>, "Janvier"],
                            <?php }else if($value['mois']=="2"){ ?>
                                [<?php echo $p; ?>, "Fevrier"],
                            <?php }else if($value['mois']=="3"){ ?>
                                [<?php echo $p; ?>, "Mars"],
                            <?php }else if($value['mois']=="4"){ ?>
                                [<?php echo $p; ?>, "Avril"],
                            <?php }else if($value['mois']=="5"){ ?>
                                [<?php echo $p; ?>, "Mai"],
                            <?php }else if($value['mois']=="6"){ ?>
                                [<?php echo $p; ?>, "Juin"],
                            <?php }else if($value['mois']=="7"){ ?>
                                [<?php echo $p; ?>, "Juillet"],
                            <?php }else if($value['mois']=="8"){ ?>
                                [<?php echo $p; ?>, "Août"],
                            <?php }else if($value['mois']=="9"){ ?>
                                [<?php echo $p; ?>, "Septembre"],
                            <?php }else if($value['mois']=="10"){ ?>
                                [<?php echo $p; ?>, "Octobre"],
                            <?php }else if($value['mois']=="11"){ ?>
                                [<?php echo $p; ?>, "Novembre"],
                            <?php }else{ ?>
                                [<?php echo $p; ?>, "Décembre"],
                            <?php } ?>
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




    

    // FLOT STYLED DONUT CHART
    // =================================================================
    // Require Donut Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var dataSet = [
            <?php

            $trim1 = 0;
            $trim2 = 0;
            $trim3 = 0;

            $requete=" SELECT * FROM composer c, personne p 
                       WHERE p.id_pers = c.id_etu
                       GROUP BY id_etu, trimestre";

            $resultat2 = Selection($requete);

            foreach ($resultat2 as $value) { 
                if($value['trimestre'] == 'Trimestre I'){
                    $trim1 = $trim1 + $value['moyenne'];
                }else if($value['trimestre'] == 'Trimestre II'){
                    $trim2 = $trim2 + $value['moyenne'];
                }else{
                    $trim3 = $trim3 + $value['moyenne'];
                }
            ?>
            <?php } ?>


    {
        label: "Trimestre I",
        data: 4119630000,
        color: "#177bbb",
        data: <?php echo $trim1; ?>
    }, {
        label: "Trimestre II",
        data: 1012960000,
        color: "#a6c600",
        data: <?php echo $trim2; ?>
    }, {
        label: "Trimestre III",
        data: 727080000,
        color: "#8669CC",
        data: <?php echo $trim3; ?>
    }
    
    ];

    $.plot('#demo-donut-chart', dataSet, {
        series: {
            pie: {
                show: true,
                innerRadius: 0.5
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true,
            clickable: true
        },
       tooltip: true,
       tooltipOpts: {
           content: "%p.0%, %s",
           defaultTheme: false
       },
    });


});


        </script>

    </body>

<!-- Mirrored from www.designbudy.com/nyasa/default/charts-flot.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 14:35:14 GMT -->
</html>