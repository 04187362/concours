<div id="mainnav">
                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                                        <!--Category name-->
                                        <li class="list-header">Navigation</li>
                                        <li><a href="index.php?module=users&action=accueil"><i class="fa fa-home"></i> Accueil</a></li>
                                        <li><a href="index.php?module=users&action=tableaubordconcours"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
                                        <li><a href="index.php?module=parametrage&action=pays_concours"><i class="fa fa-flag"></i>Pays </a></li>
                                        <li><a href="index.php?module=parametrage&action=anneeAcadConcours"><i class="fa fa-calendar"></i> Annee Académique</a></li>
                                        <li><a href="index.php?module=gestion&action=specialite"><i class="fa fa-tasks"></i>Spécialité </a></li>
                                        <li><a href="index.php?module=parametrage&action=filiere_concours"><i class="fa fa-sitemap"></i>Filière </a></li>
                                        <li><a href="index.php?module=users&action=candidat"><i class="fa fa-user"></i>Candidat </a></li>
                                        <li><a href="index.php?module=gestion&action=preinscription"><i class="fa fa-money"></i>Inscription </a></li>
                                        <li><a href="index.php?module=parametrage&action=frais_concours"><i class="fa fa-money"></i>Frais </a></li>
                                        <li><a href="index.php?module=parametrage&action=matiereConcours"><i class="fa fa-files-o"></i> Matière</a></li>
                                        <li><a href="index.php?module=gestion&action=progConcours"><i class="fa fa-gift"></i>Programme </a></li>
                                        <?php
                                                if($type_personne == "Personnel"){ 

                                                    if($role == "Directeur General"){ ?>
                                                    <!--Menu du concours-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-pencil"></i>
                                                        <span class="menu-title">Examens</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=compConcours"><i class="fa fa-caret-right"></i>Composition </a></li>
                                                            <li><a href="index.php?module=gestion&action=deliberation_concours"><i class="fa fa-caret-right"></i>Déliberation </a></li>
                                                            <li><a href="index.php?module=gestion&action=listeFiliereConcours"><i class="fa fa-caret-right"></i>Resultat </a></li>
                                                        </ul>
                                                    </li>
                                                   
                                                    

                                                <?php  }else if($role == "Directeur des Etudes"){ ?>
                                                    
                                                    <!--Menu du concours-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-graduation-cap"></i>
                                                        <span class="menu-title">Concours</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=pays"><i class="fa fa-caret-right"></i>Pays </a></li>
                                                            <li><a href="index.php?module=parametrage&action=anneeAcademique"><i class="fa fa-caret-right"></i> Annee Acad</a></li>
                                                            <li><a href="index.php?module=parametrage&action=typeFormation"><i class="fa fa-caret-right"></i>Type formation </a></li>
                                                            <li><a href="index.php?module=parametrage&action=cycle"><i class="fa fa-caret-right"></i>Cycle </a></li>
                                                            <li><a href="index.php?module=parametrage&action=filiere"><i class="fa fa-caret-right"></i>Filière </a></li>
                                                            <li><a href="index.php?module=parametrage&action=niveauEtude"><i class="fa fa-caret-right"></i>Niveau etude</a></li>
                                                            <li><a href="index.php?module=users&action=candidat"><i class="fa fa-caret-right"></i>Candidat </a></li>
                                                            <li><a href="index.php?module=gestion&action=preinscription"><i class="fa fa-caret-right"></i>Préinscription </a></li>
                                                            <li><a href="index.php?module=parametrage&action=matiereConcours"><i class="fa fa-caret-right"></i> Matière</a></li>
                                                            <li><a href="index.php?module=gestion&action=progConcours"><i class="fa fa-caret-right"></i>Programme </a></li>
                                                            <li><a href="index.php?module=gestion&action=compConcours"><i class="fa fa-caret-right"></i>Composition </a></li>
                                                            <li><a href="index.php?module=gestion&action=deliberation_concours"><i class="fa fa-caret-right"></i>Déliberation </a></li>
                                                            <li><a href="index.php?module=gestion&action=listeFiliereConcours"><i class="fa fa-caret-right"></i>Resultat </a></li>
                                                            
                                                        </ul>
                                                    </li>

                                                <?php  }else{ ?>
                                                    <!--Menu du concours-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-graduation-cap"></i>
                                                        <span class="menu-title">Concours</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=pays"><i class="fa fa-caret-right"></i>Pays </a></li>
                                                            <li><a href="index.php?module=parametrage&action=anneeAcademique"><i class="fa fa-caret-right"></i> Annee Acad</a></li>
                                                            <li><a href="index.php?module=parametrage&action=typeFormation"><i class="fa fa-caret-right"></i>Type formation </a></li>
                                                            <li><a href="index.php?module=parametrage&action=cycle"><i class="fa fa-caret-right"></i>Cycle </a></li>
                                                            <li><a href="index.php?module=parametrage&action=filiere"><i class="fa fa-caret-right"></i>Filière </a></li>
                                                            <li><a href="index.php?module=parametrage&action=niveauEtude"><i class="fa fa-caret-right"></i>Niveau etude</a></li>
                                                            <li><a href="index.php?module=users&action=candidat"><i class="fa fa-caret-right"></i>Candidat </a></li>
                                                            <li><a href="index.php?module=gestion&action=preinscription"><i class="fa fa-caret-right"></i>Préinscription </a></li>
                                                            <li><a href="index.php?module=parametrage&action=matiereConcours"><i class="fa fa-caret-right"></i> Matière</a></li>
                                                            <li><a href="index.php?module=gestion&action=progConcours"><i class="fa fa-caret-right"></i>Programme </a></li>
                                                            <li><a href="index.php?module=gestion&action=compConcours"><i class="fa fa-caret-right"></i>Composition </a></li>
                                                            <li><a href="index.php?module=gestion&action=listeFiliereConcours"><i class="fa fa-caret-right"></i>Resultat </a></li>
                                                            <li><a href="index.php?module=gestion&action=deliberation_concours"><i class="fa fa-caret-right"></i>Déliberation </a></li>
                                                            
                                                        </ul>
                                                    </li>
                                                <?php   } ?>

                                        <?php }else{ ?>

                                            <!--Menu du concours-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-graduation-cap"></i>
                                                        <span class="menu-title">Concours</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=pays"><i class="fa fa-caret-right"></i>Pays </a></li>
                                                            <li><a href="index.php?module=parametrage&action=anneeAcademique"><i class="fa fa-caret-right"></i> Annee Acad</a></li>
                                                            <li><a href="index.php?module=parametrage&action=typeFormation"><i class="fa fa-caret-right"></i>Type formation </a></li>
                                                            <li><a href="index.php?module=parametrage&action=cycle"><i class="fa fa-caret-right"></i>Cycle </a></li>
                                                            <li><a href="index.php?module=parametrage&action=filiere"><i class="fa fa-caret-right"></i>Filière </a></li>
                                                            <li><a href="index.php?module=parametrage&action=niveauEtude"><i class="fa fa-caret-right"></i>Niveau etude</a></li>
                                                            <li><a href="index.php?module=users&action=candidat"><i class="fa fa-caret-right"></i>Candidat </a></li>
                                                            <li><a href="index.php?module=gestion&action=preinscription"><i class="fa fa-caret-right"></i>Préinscription </a></li>
                                                            <li><a href="index.php?module=parametrage&action=matiereConcours"><i class="fa fa-caret-right"></i> Matière</a></li>
                                                            <li><a href="index.php?module=gestion&action=progConcours"><i class="fa fa-caret-right"></i>Programme </a></li>
                                                            <li><a href="index.php?module=gestion&action=compConcours"><i class="fa fa-caret-right"></i>Composition </a></li>
                                                            <li><a href="index.php?module=gestion&action=listeFiliereConcours"><i class="fa fa-caret-right"></i>Resultat </a></li>
                                                            <li><a href="index.php?module=gestion&action=deliberation_concours"><i class="fa fa-caret-right"></i>Déliberation </a></li>
                                                            
                                                        </ul>
                                                    </li>

                                        <?php   } ?>
                                        
                                    </ul>
                                    <!--Widget-->
                                    <!--================================-->
                                    <div class="mainnav-widget">
                                        <!-- Show the button on collapsed navigation -->
                                        <div class="show-small">
                                            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                            <i class="fa fa-desktop"></i>
                                            </a>
                                        </div>
                                        <!-- Hide the content on collapsed navigation -->
                                        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                            <ul class="list-group">
                                                <li class="list-header pad-no pad-ver">Server Status</li>
                                                <li class="mar-btm">
                                                    <span class="label label-primary pull-right">15%</span>
                                                    <p>CPU Usage</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                            <span class="sr-only">15%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mar-btm">
                                                    <span class="label label-purple pull-right">75%</span>
                                                    <p>Bandwidth</p>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                            <span class="sr-only">75%</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--================================-->
                                    <!--End widget-->
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->
                    </div>