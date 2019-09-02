<?php
    include("connexion/connexiongenerale.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("verification.php");
    
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");

    include("entites/ClsPays.php");
    include("entites/ClsMatiere.php");
    include("entites/ClsClasse.php");
    include("entites/ClsParent.php");
    include("entites/ClsEtudiant.php");
    include("entites/ClsEnseignant.php");
    include("entites/ClsPersonnel.php");
    include("entites/ClsFrait.php");
    //include("entites/ClsAnneeAcademique.php");
    include("entites/ClsEmploiTemps.php");
    include("entites/ClsInscription.php");
    include("entites/ClsProgramme.php");
    include("entites/ClsComposer.php");
    include("entites/ClsEnseigner.php");
    include("entites/ClsPaiement.php");
    include("entites/ClsEmargement.php");
    include('entites/ClsAbsenceEtudiant.php');
    include('entites/ClsAbsenceEnseignant.php');
    include('entites/ClsMessage.php');
    include('entites/ClsEvenement.php');

    include('entites/ClsFiliere.php');
    include('entites/ClsMatiereConcours.php');
    include('entites/ClsComposerConcours.php');
    include('entites/ClsProgrammeConcours.php');
    include('entites/ClsNiveauEtude.php');
    include('entites/ClsCursus.php');
    include('entites/ClsScolarite.php');
    include('entites/ClsSoutenance.php');
    include('entites/ClsPreinscription.php');
    include('entites/ClsTypeFormation.php');
    include('entites/ClsCycle.php');
    include('entites/ClsUniteEnseignement.php');
    include('entites/ClsSpecialite.php');


    $requests = "SELECT lib_annee FROM annee_academique WHERE id_annee =?";
    $paramaters = array($id_an);

    $libelle_anneeAc = getChampsParametrage($requests, $paramaters);

?>
<header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="index.php?module=users&action=accueil" class="navbar-brand">
                            <i class="fa fa-cube brand-icon"></i>
                            <div class="brand-title">
                                <span class="brand-text" style="font-family:engravers mt">INPTIC</span>
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Navigation toogle button-->
                            <!--Profile toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="profilebtn" class="hidden-xs">
                                <a href="JavaScript:void(0);"> <i class="fa fa-user fa-lg"></i> </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Profile toogle button-->
                            <!--Messages Dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="fa fa-envelope fa-lg"></i> 
                                    <span class="badge badge-header badge-warning"><?php echo getNombreMessageRecu($id_personne); ?> </span> 
                                </a>
                                <!--Message dropdown menu-->
                                <div class="dropdown-menu dropdown-menu-md with-arrow">
                                    <div class="pad-all bord-btm">
                                        <div class="h4 text-muted text-thin mar-no">
                                            Tu as <?php echo getNombreMessageRecu($id_personne); ?> messages.
                                        </div>
                                    </div>
                                    <div class="nano scrollable">
                                        <div class="nano-content">
                                            <ul class="head-list">
                                                <!-- Dropdown list-->
                                                <?php 
                                                    $reque = "SELECT id_exp, nom_pers, prenom_pers, date FROM message m, personne p
                                                                WHERE id_ben = '$id_personne'
                                                                AND p.id_pers = m.id_exp
                                                                AND etat = 0
                                                                GROUP BY id_exp";
                                                    $resp = Selection($reque);

                                                    foreach ($resp as $value) { ?>
                                                       <li>
                                                        <a href="index.php?module=users&action=detailMessageRecu&cood=<?php echo $value['id_exp']; ?>" class="media">
                                                            <div class="media-left"> <img src="img/user.png" alt="Profile Picture" class="img-circle img-sm"> </div>
                                                            <div class="media-body">
                                                                <div class="text-nowrap"><?php echo $value['nom_pers']; ?></div>
                                                                <small class="text-muted"><?php echo date('d-m-Y', strtotime($value['date'])); ?></small> 
                                                            </div>
                                                        </a>
                                                    </li> 
                                                  <?php  } ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Dropdown footer-->
                                    <div class="pad-all bord-top">
                                        <a href="" class="btn-link text-dark box-block"> <i class="fa fa-angle-right fa-lg pull-right"></i>Voir tous les messages </a>
                                    </div>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End message dropdown-->
                            <!--Notification dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="fa fa-bell fa-lg"></i> <span class="badge badge-header badge-danger"><?php echo getNombrePaiementEtudiant($id_personne) + compteNombreCompEtudiantParent($id_personne) + compteNombreAbsence($id_personne)+ compteNombreAbsenceEnseignant($classe_etudiant); ?></span> </a>
                                <!--Notification dropdown menu-->
                                <div class="dropdown-menu dropdown-menu-md with-arrow">
                                    <div class="pad-all bord-btm">
                                        <div class="h4 text-muted text-thin mar-no"> Notification </div>
                                    </div>
                                    <div class="nano scrollable">
                                        <div class="nano-content">
                                            <ul class="head-list">
                                                <!-- Dropdown list-->
                                                <li>
                                                    <?php 
                                                        $req2 = "SELECT *  FROM paiement pe, personne p
                                                                WHERE p.id_pers = pe.id_etu
                                                                AND id_par = '$id_personne'
                                                                AND etat = 0 ";
                                                        $resp = Selection($req2); 
                                                                foreach ($resp as $valu) { ?>
                                                        <a href="index.php?module=gestion&action=paiementParent&cood=<?php echo $valu['id_pers']; ?>" class="media">
                                                            <div class="media-left"><span class="icon-wrap icon-circle bg-primary"> <i class="fa fa-money fa-lg"></i> </span> </div>
                                                            <div class="media-body">
                                                                <div class="text-nowrap">paye de <b><?php echo $valu['nom_pers'].' '.$valu['prenom_pers']; ?></b></div>
                                                                <small class="text-muted"><?php echo date('d-m-Y', strtotime($valu['date_paye'])); ?></small> 
                                                            </div>
                                                        </a>
                                                    <?php }?>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <?php

                                                        $requete ="SELECT * FROM composer c, personne p, matiere m
                                                                    WHERE p.id_pers = c.id_etu
                                                                    AND m.id_matiere = c.id_matiere
                                                                    AND id_par = '$id_personne'
                                                                    AND etat = 0 ";
                                                        
                                                        $resultat = Selection($requete); 
                                                        foreach($resultat as $tab){
                                                    ?>
                                                    <a href="index.php?module=gestion&action=noteEtudiantmatiere&cood1=<?php echo $tab['id_etu'] ?>&cood2=<?php echo $tab['id_matiere']; ?>&cood3=<?php echo $tab['trimestre'] ?>" class="media">
                                                        <span class="badge badge-success pull-right">90%</span>
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-danger"> <i class="fa fa-pencil fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap"><?php echo $tab['nom_pers'].' '.$tab['prenom_pers']; ?></div>
                                                            <small class="text-muted"><?php echo $tab['lib_matiere']; ?></small> 
                                                        </div>
                                                    </a>
                                                    <?php }?>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <?php

                                                        $requete ="SELECT * FROM absence_etudiant a, personne p, emargement e, matiere m
                                                                    WHERE p.id_pers = a.id_etu
                                                                    AND a.id_em = e.id_em
                                                                    AND e.id_matiere = m.id_matiere
                                                                    AND id_par = '$id_personne'
                                                                    AND etat = 0";
                                                        
                                                        $resultat = Selection($requete); 
                                                        foreach($resultat as $tab){
                                                    ?>
                                                    <a href="index.php?module=gestion&action=absenceEtudiantMatiereParent&cood=<?php echo $tab['id_etu'];?>&cood1=<?php echo $tab['id_matiere']; ?>" class="media">
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-info"> <i class="fa fa-file-word-o fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap"><?php echo $tab['nom_pers'].' '.$tab['prenom_pers']; ?></div>
                                                            <small class="text-muted"><?php echo $tab['lib_matiere']; ?></small><small class="text-muted pull-right"><?php echo $tab['date_em']; ?></small> 
                                                        </div>
                                                    </a>
                                                    <?php }?>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <?php

                                                        $requete ="SELECT * FROM absence_enseignant a, personne p, niveau_etude n
                                                                    WHERE p.id_pers = a.id_ens
                                                                    AND a.id_niveauetude = n.id_niveauetude
                                                                    AND n.id_niveauetude = '$classe_etudiant'
                                                                    AND etat = 0";
                                                        
                                                        $resultat = Selection($requete); 
                                                        foreach($resultat as $tab){
                                                    ?>
                                                    <a href="index.php?module=gestion&action=absEnseignantEtudiant" class="media">
                                                        <span class="label label-danger pull-right">Absence</span>
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-purple"> <i class="fa fa-comment fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap"><?php echo $tab['nom_pers'].' '.$tab['prenom_pers']; ?></div>
                                                            <small class="text-muted"><?php echo date('d-m-Y', strtotime($tab['date_abs'])); ?></small>
                                                        </div>
                                                    </a>
                                                    <?php } ?>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-success"> <i class="fa fa-user fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">New User Registered</div>
                                                            <small class="text-muted">4 minutes ago</small> 
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Dropdown footer-->
                                    <div class="pad-all bord-top">
                                        <a href="#" class="btn-link text-dark box-block"> <i class="fa fa-angle-right fa-lg pull-right"></i>Show All Notifications </a>
                                    </div>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End notifications dropdown-->
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            <!--Profile toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a href="index.php?module=parametrage&action=selectionnerAnnee"><b style="font-family:David">ANNEE - ACADEMIQUE : 
                                    <span class="annee text-info">
                                        <?php
                                            //echo //getChampsParametrage($requests, $paramaters); 
                                            echo $libelle_anneeAc;
                                        ?>
                                    </span>
                                    </b>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Profile toogle button-->
                            <!--User dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right"> <img class="img-circle img-user media-object" src="img/av1.png" alt="Profile Picture"> </span>
                                    <div class="username hidden-xs"><?php echo $prenom_personne.' '.$nom_personne; ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        <li>
                                            <a href="index.php?module=users&action=profile"> <i class="fa fa-user fa-fw"></i> Profile </a>
                                        </li>
                                        <li>
                                            <a href="index.php?module=users&action=listeMessageRecu">  <i class="fa fa-envelope fa-fw"></i> Messages recus </a>
                                        </li>
                                        <li>
                                            <a href="index.php?module=users&action=listeMessageEnvoye">  <i class="fa fa-envelope fa-fw"></i> Messages envoyés </a>
                                        </li>
                                        <li>
                                            <a href="index.php?module=users&action=Deconnexion"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="hidden-xs">
                                <a id="demo-toggle-aside" href="#">
                                <i class="fa fa-navicon fa-lg"></i>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Navigation toogle button-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>