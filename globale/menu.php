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
                                        <?php
                                                if($type_personne == "Personnel"){ 

                                                    if($role == "Directeur General"){ ?>
                                                   
                                                    <!--Menu list item-->
                                                    <li><a href="index.php?module=users&action=tableaubordscolarite"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
                                                    <!--Category name-->
                                                    <li class="list-header">Components</li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-desktop"></i>
                                                        <span class="menu-title">Parametrage</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=pays"><i class="fa fa-caret-right"></i>Pays </a></li>
                                                            <li><a href="index.php?module=parametrage&action=frait"><i class="fa fa-caret-right"></i>Frais </a></li>
                                                            <li><a href="index.php?module=parametrage&action=cycle"><i class="fa fa-caret-right"></i>Cycle </a></li>
                                                            <li><a href="index.php?module=parametrage&action=filiere"><i class="fa fa-caret-right"></i>Filière </a></li>
                                                            <li><a href="index.php?module=parametrage&action=niveauEtude"><i class="fa fa-caret-right"></i>Niveau etude</a></li>
                                                            <li><a href="index.php?module=parametrage&action=uniteEnseignement"><i class="fa fa-caret-right"></i>U.E</a></li>
                                                            <li><a href="index.php?module=parametrage&action=matiere"><i class="fa fa-caret-right"></i>Matière </a></li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-table"></i>
                                                        <span class="menu-title">Gestion</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=programme"><i class="fa fa-caret-right"></i>Programme </a></li>
                                                            <li><a href="index.php?module=gestion&action=enseignement"><i class="fa fa-caret-right"></i>Enseignement </a></li>
                                                            <li><a href="index.php?module=gestion&action=emploi_temps"><i class="fa fa-caret-right"></i>Emplois temps </a></li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-user"></i>
                                                        <span class="menu-title">Utilisateur</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=users&action=parent"><i class="fa fa-caret-right"></i> Parent</a></li>
                                                            <li><a href="index.php?module=users&action=enseignant"><i class="fa fa-caret-right"></i> Enseignant</a></li>
                                                            <li><a href="index.php?module=users&action=etudiant"><i class="fa fa-caret-right"></i> Etudiant</a></li>
                                                            <li><a href="index.php?module=users&action=personnel"><i class="fa fa-caret-right"></i> Agent</a></li>
                                                        </ul>
                                                    </li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-edit"></i>
                                                        <span class="menu-title">Examens</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=composition"><i class="fa fa-caret-right"></i>Composition </a></li>
                                                            <li><a href="index.php?module=gestion&action=resultat"><i class="fa fa-caret-right"></i>Resulatats </a></li>
                                                            <li><a href="index.php?module=gestion&action=deliberation_resultat"><i class="fa fa-caret-right"></i>Délibération </a></li>
                                                        </ul>
                                                    </li>

                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-money"></i>
                                                        <span class="menu-title">Paiement</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=frait"><i class="fa fa-caret-right"></i> Frais</a></li>
                                                            <li><a href="index.php?module=gestion&action=inscription"><i class="fa fa-caret-right"></i>Inscription </a></li>
                                                            <li><a href="index.php?module=gestion&action=scolarite"><i class="fa fa-caret-right"></i>Scolarité </a></li>
                                                            <li><a href="index.php?module=gestion&action=cursus"><i class="fa fa-caret-right"></i>Cursus </a></li>
                                                            <li><a href="index.php?module=gestion&action=soutenance"><i class="fa fa-caret-right"></i>Soutenance </a></li>
                                                        </ul>
                                                    </li>

                                                     <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-money"></i>
                                                        <span class="menu-title">Emargement</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=emargement1"><i class="fa fa-caret-right"></i> Liste</a></li>
                                                            <li><a href="index.php?module=gestion&action=detail_emargement"><i class="fa fa-caret-right"></i> Details</a></li>
                                                        </ul>
                                                    </li>

                                                     <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-cogs"></i>
                                                        <span class="menu-title">Absence</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=liste_absence"><i class="fa fa-caret-right"></i> Etudiants</a></li>
                                                            <li><a href="index.php?module=gestion&action=absenceEnseignant"><i class="fa fa-caret-right"></i> Enseignants</a></li>
                                                        </ul>
                                                    </li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-line-chart"></i>
                                                        <span class="menu-title">Statistique</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=statistique"><i class="fa fa-caret-right"></i> Statistique </a></li>
                                                            <li><a href="index.php?module=gestion&action=stat"><i class="fa fa-caret-right"></i> Morris Chart </a></li>
                                                        </ul>
                                                    </li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-camera"></i>
                                                        <span class="menu-title">Galerie</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=users&action=galerie"><i class="fa fa-caret-right"></i> Etudiant</a></li>
                                                            <li><a href="index.php?module=users&action=galerie_etablissement"><i class="fa fa-caret-right"></i> Etablissement</a></li>
                                                        </ul>
                                                    </li>

                                                <?php  }else if($role == "Directeur des Etudes"){ ?>
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-desktop"></i>
                                                        <span class="menu-title">Parametrage</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=pays"><i class="fa fa-caret-right"></i>Pays </a></li>
                                                            <li><a href="index.php?module=parametrage&action=matiere"><i class="fa fa-caret-right"></i>Matière </a></li>
                                                            <li><a href="index.php?module=parametrage&action=classe"><i class="fa fa-caret-right"></i>Classe </a></li>
                                                            <li><a href="index.php?module=parametrage&action=anneeAcademique"><i class="fa fa-caret-right"></i> Annee-academique</a></li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-table"></i>
                                                        <span class="menu-title">Gestion</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=programme1"><i class="fa fa-caret-right"></i>Programme </a></li>
                                                            <li><a href="index.php?module=gestion&action=enseignement1"><i class="fa fa-caret-right"></i>Enseignement </a></li>
                                                            <li><a href="index.php?module=gestion&action=emploi_temps"><i class="fa fa-caret-right"></i>Emplois temps </a></li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-user"></i>
                                                        <span class="menu-title">Utilisateur</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=users&action=enseignant"><i class="fa fa-caret-right"></i> Enseignant</a></li>
                                                            <li><a href="index.php?module=users&action=personnel"><i class="fa fa-caret-right"></i> Personnel</a></li>
                                                        </ul>
                                                    </li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-edit"></i>
                                                        <span class="menu-title">Examens</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=composition1"><i class="fa fa-caret-right"></i>Composition </a></li>
                                                            <li><a href="index.php?module=gestion&action=resultat"><i class="fa fa-caret-right"></i>Resulatats </a></li>
                                                            <li><a href="index.php?module=gestion&action=deliberation_resultat"><i class="fa fa-caret-right"></i>Délibération </a></li>
                                                        </ul>
                                                        </ul>
                                                    </li>

                                                     <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-money"></i>
                                                        <span class="menu-title">Emargement</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=emargement1"><i class="fa fa-caret-right"></i> Liste</a></li>
                                                            <li><a href="index.php?module=gestion&action=detail_emargement"><i class="fa fa-caret-right"></i> Details</a></li>
                                                        </ul>
                                                    </li>

                                                     <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-cogs"></i>
                                                        <span class="menu-title">Absence</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=liste_absence"><i class="fa fa-caret-right"></i> Liste absence</a></li>
                                                        </ul>
                                                    </li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-line-chart"></i>
                                                        <span class="menu-title">Statistique</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="charts-flot.html"><i class="fa fa-caret-right"></i> Flot Chart </a></li>
                                                            <li><a href="charts-morris.html"><i class="fa fa-caret-right"></i> Morris Chart </a></li>
                                                        </ul>
                                                    </li>

                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-camera"></i>
                                                        <span class="menu-title">Galerie</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=users&action=galerie"><i class="fa fa-caret-right"></i> Etudiant</a></li>
                                                            <li><a href="index.php?module=users&action=galerie_etablissement"><i class="fa fa-caret-right"></i> Etablissement</a></li>
                                                        </ul>
                                                    </li>

                                                <?php  }else{ ?>

                                                    <!--Menu list item-->
                                                    <li><a href="index.php?module=users&action=accueil"><i class="fa fa-caret-right"></i> Tableau de bord</a></li>
                                                    <!--Category name-->
                                                    <li class="list-header">Components</li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-desktop"></i>
                                                        <span class="menu-title">Parametrage</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=pays"><i class="fa fa-caret-right"></i>Pays </a></li>
                                                            <li><a href="index.php?module=parametrage&action=classe"><i class="fa fa-caret-right"></i>Classe </a></li>
                                                            <li><a href="index.php?module=parametrage&action=anneeAcademique"><i class="fa fa-caret-right"></i> Annee-academique</a></li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-user"></i>
                                                        <span class="menu-title">Utilisateur</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=users&action=parent"><i class="fa fa-caret-right"></i> Parent</a></li>
                                                            <li><a href="index.php?module=users&action=etudiant"><i class="fa fa-caret-right"></i> Etudiant</a></li>
                                                        </ul>
                                                    </li>

                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-money"></i>
                                                        <span class="menu-title">Frais scolaire</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=parametrage&action=frait"><i class="fa fa-caret-right"></i> Frais</a></li>
                                                            <li><a href="index.php?module=gestion&action=inscription"><i class="fa fa-caret-right"></i>Inscription </a></li>
                                                            <li><a href="index.php?module=gestion&action=paiement1"><i class="fa fa-caret-right"></i> Paiement</a></li>
                                                        </ul>
                                                    </li>

                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-money"></i>
                                                        <span class="menu-title">Emargement</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="index.php?module=gestion&action=emargement1"><i class="fa fa-caret-right"></i> Liste</a></li>
                                                            <li><a href="index.php?module=gestion&action=detail_emargement"><i class="fa fa-caret-right"></i> Details</a></li>
                                                        </ul>
                                                    </li>
                                                    <!--Menu list item-->
                                                    <li>
                                                        <a href="#">
                                                        <i class="fa fa-line-chart"></i>
                                                        <span class="menu-title">Statistique</span>
                                                        <i class="arrow"></i>
                                                        </a>
                                                        <!--Submenu-->
                                                        <ul class="collapse">
                                                            <li><a href="charts-flot.html"><i class="fa fa-caret-right"></i> Flot Chart </a></li>
                                                            <li><a href="charts-morris.html"><i class="fa fa-caret-right"></i> Morris Chart </a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index.php?module=users&action=galerie"><i class="fa fa-camera"></i> Galerie</a></li>

                                                <?php   } ?>

                                        <?php }else if($type_personne == "Enseignant"){ ?>

                                            <!--Menu list item-->
                                                <li><a href="index.php?module=users&action=tableaubordscolarite"><i class="fa fa-dashboard"></i> Tableau bord</a></li>                                                                                           
                                                <li><a href="index.php?module=gestion&action=emploiTempsEnseignant"><i class="fa fa-clock-o"></i> Emplois temps</a></li>
                                                
                                                <!--Menu list item-->
                                                <li>
                                                    <a href="#">
                                                    <i class="fa fa-edit"></i>
                                                    <span class="menu-title">Examens</span>
                                                    <i class="arrow"></i>
                                                    </a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="index.php?module=gestion&action=compositionEnseignant1"><i class="fa fa-caret-right"></i>Composition </a></li>
                                                        <li><a href="index.php?module=gestion&action=resultat"><i class="fa fa-caret-right"></i>Resulatats </a></li>
                                                    </ul>
                                                </li>

                                                 <!--Menu list item-->
                                                <li>
                                                    <a href="#">
                                                    <i class="fa fa-money"></i>
                                                    <span class="menu-title">Emargement</span>
                                                    <i class="arrow"></i>
                                                    </a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="index.php?module=gestion&action=emargement_enseignant1"><i class="fa fa-caret-right"></i> Liste</a></li>
                                                        <li><a href="index.php?module=gestion&action=detail_emargement_ens"><i class="fa fa-caret-right"></i> Details</a></li>
                                                    </ul>
                                                </li>

                                                 <!--Menu list item-->
                                                <li>
                                                    <a href="#">
                                                    <i class="fa fa-cogs"></i>
                                                    <span class="menu-title">Absence</span>
                                                    <i class="arrow"></i>
                                                    </a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="index.php?module=gestion&action=listeAbsenceEtudiant"><i class="fa fa-caret-right"></i> Liste absence</a></li>
                                                        <li><a href="index.php?module=gestion&action=absence"><i class="fa fa-caret-right"></i> Affectation</a></li>
                                                    </ul>
                                                </li>
                                                

                                        <?php    }else if($type_personne == "Parent"){ ?>
                                            <!--Menu list item--> 
                                                <li><a href="index.php?module=users&action=tableaubordscolarite"><i class="fa fa-dashboard"></i> Tableau bord</a></li>                                                                                         
                                                <li><a href="index.php?module=users&action=etudiantParent"><i class="fa fa-mortar-board"></i> Etudiant</a></li>
                                                <li><a href="index.php?module=gestion&action=absenceEtuidiantParent"><i class="fa fa-cogs"></i> Absence</a></li>
                                                <li><a href="index.php?module=gestion&action=compoEtudiantParent"><i class="fa fa-pencil"></i> Composition</a></li>
                                                <li><a href="index.php?module=gestion&action=resultatEtudiantParent"><i class="fa fa-folder-open"></i> Resultat</a></li>
                                        
                                        <?php    }else{ ?>
                                                <li><a href="index.php?module=users&action=tableaubordscolarite"><i class="fa fa-dashboard"></i> Tableau bord</a></li>
                                                <li><a href="index.php?module=gestion&action=paiementEtudiant"><i class="fa fa-money"></i> Paiement</a></li>
                                                <li>
                                                    <a href="#">
                                                    <i class="fa fa-cogs"></i>
                                                    <span class="menu-title">Absence</span>
                                                    <i class="arrow"></i>
                                                    </a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="index.php?module=gestion&action=absEtudiant"><i class="fa fa-caret-right"></i> Etudiant</a></li>
                                                        <li><a href="index.php?module=gestion&action=absEnseignantEtudiant"><i class="fa fa-caret-right"></i> Enseignant</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="index.php?module=gestion&action=compoEtudiant"><i class="fa fa-pencil"></i> Composition</a></li>
                                                <li><a href="index.php?module=gestion&action=emploiTempsEtudiant"><i class="fa fa-clock-o"></i> Emploi temps</a></li>
                                        <?php    } ?>
                                        
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