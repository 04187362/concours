<?php

    include_once ("connexion/connexiongenerale.php");

    include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/users/modeles/methodeUsers.php");
    include("modules/gestion/modeles/methodeGestion.php");

    /************************************************ Ajax Partie Concours *****************************************************/
        
    // Recuperation des matiere programmé dans une filiere
    if(isset($_POST['action']) && $_POST['action'] =="rempli_matiere"){

        if(isset($_POST['id_filiere']) && ($_POST['id_filiere'] !="Selectionner")){
        
            $id_filiere = htmlspecialchars($_POST['id_filiere']);

            $sql="SELECT * FROM programme_concours p, matiere_concours m
                  WHERE p.id_matiere = m.id_matiere
                  AND id_filiere = ?";

                $requete = AfficherTout($sql);
                $param = array($id_filiere); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count1 = $requete->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_matiere'].'">'.$tablo['lib_matiere'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucune matière n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }

    // Recuperation des candidat d'une filiere
    if(isset($_POST['action']) && $_POST['action'] =="remplir_candidat"){

        if(isset($_POST['id_filiere']) && ($_POST['id_filiere'] !="Selectionner")){
        
            $id_filiere = htmlspecialchars($_POST['id_filiere']);

            $sql="SELECT * FROM personne p, preinscription pr
                  WHERE p.id_pers = pr.id_candidat
                  AND type_pers ='Candidat'
                  AND id_filiere = ?";

                $requete = AfficherTout($sql);
                $param = array($id_filiere); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count1 = $requete->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_pers'].'">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucun candidat n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }
/**********************************************************Fin Partie Concours*********************************************/

/************************************************ Ajax Partie Etablissement *****************************************************/

    // Recuperation des niveaux d'une filiere
    if(isset($_POST['action']) && $_POST['action'] =="rempli_niveau"){

        if(isset($_POST['id_filiere']) && ($_POST['id_filiere'] !="Selectionner")){
        
            $id_filiere = htmlspecialchars($_POST['id_filiere']);

            $sql="SELECT * FROM niveau_etude
                  WHERE id_filiere = ?";

                $requete = AfficherTout($sql);
                $param = array($id_filiere); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count1 = $requete->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_niveauetude'].'">'.$tablo['lib_niveauetude'].' ('.$tablo['frais'].')</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucun niveau n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }

    // Recuperation de tous etudiants d'un niveau d'etude
    if(isset($_POST['action']) && $_POST['action'] =="remplir_etudiantNiveau"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") ){
   
            $id_niveauetude = htmlspecialchars($_POST['id_niveauetude']);

            $sql="SELECT * FROM personne
                 WHERE type_pers='Etudiant'
                 AND id_niveauetude=?";

                $requete = AfficherTout($sql); 
                $param = array($id_niveauetude);
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count1 = $requete->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_pers'].'">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucun etudiant n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }
    
    // Recuperation des etudiants incris dans un niveau d'etude
    if(isset($_POST['action']) && $_POST['action'] =="remplir_etudiant"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") ){
   
            $id_niveauetude = htmlspecialchars($_POST['id_niveauetude']);

            $sql="SELECT * FROM niveau_etude i, personne p
                        WHERE i.id_niveauetude = p.id_niveauetude
                        AND id_niveauetude=?";

                $requete = AfficherTout($sql); 
                $param = array($id_niveauetude);
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count1 = $requete->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_pers'].'">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucun etudiant n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }

    // Recuperation des UE qui sont programmés au niveau d'etude selectionné selectionné
    if(isset($_POST['action']) && $_POST['action'] =="remplir_ue"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner")){
        
                $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));

                $sql="SELECT * FROM programme p, unite_enseignement u
                      WHERE u.id_ue = p.id_ue
                      AND p.id_niveauetude = ?
                      GROUP BY u. id_ue";

                $requete = AfficherTout($sql);
                $param = array($id_niveauetude); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();
                if($count >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_ue'].'">'.$tablo['lib_ue'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucune UE n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }

    // Recuperation des matiere d'une unité d'enseignement qui sont programmées dans un niveau etude.
    if(isset($_POST['action']) && $_POST['action'] =="remplir_matiere"){

        if(isset($_POST['id_ue']) && ($_POST['id_ue'] !="Selectionner") 
        && isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner")){
        
            $id_ue = htmlentities(htmlspecialchars($_POST['id_ue']));
            $id_niveauetude = htmlentities(htmlspecialchars($_POST['id_niveauetude']));

            $sql="SELECT * FROM matiere m, programme p, niveau_etude n
                  WHERE m.id_matiere = p.id_matiere
                  AND p.id_niveauetude = n.id_niveauetude
                  AND id_ue = ?
                  AND n.id_niveauetude=?";

                $requete = AfficherTout($sql);
                $param = array($id_ue,$id_niveauetude); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count1 = $requete->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_matiere'].'">'.$tablo['lib_matiere'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucune matière n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }

    // Recuperation des specialité d'une filiere
    if(isset($_POST['action']) && $_POST['action'] =="remplir_specialite"){

        if(isset($_POST['id_filiere']) && ($_POST['id_filiere'] !="Selectionner")){
        
            $id_filiere = htmlspecialchars($_POST['id_filiere']);

            $sql="SELECT * FROM specialite
                  WHERE id_filiere = ?";

                $requete = AfficherTout($sql);
                $param = array($id_filiere); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count1 = $requete->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_spe'].'">'.$tablo['lib_spe'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucune spécialité n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }

    /**************************************************Fin partie Etablissemnt*******************************************/

     // Recuperation des matiere qui sont programmées et enseignées le niveau d'etude selectionné
    if(isset($_POST['action']) && $_POST['action'] =="remplir_matiereEtab"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") && 
            isset($_POST['id_ue']) && ($_POST['id_ue'] !="Selectionner")){
        
                $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));
                $id_ue =htmlentities(htmlspecialchars($_POST['id_ue']));

                $sql=" SELECT * FROM enseigner e, matiere m
                        WHERE m.id_matiere = e.id_matiere
                        AND id_niveauetude = ?
                        AND e.id_ue = ?";

                $requete = AfficherTout($sql);
                $param = array($id_niveauetude, $id_ue); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();
                if($count >0){

                        echo '<option value="">Selectionner</option>';

                    while($tablo=$requete->fetch()){

                        echo '<option value ="'.$tablo['id_matiere'].'">'.$tablo['lib_matiere'].'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucune matière n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }

    // Recuperation des matiere qui sont programmés dans la classe selectionnée

    /*if(isset($_POST['action']) && $_POST['action'] =="emploi"){

        if(isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner")){
        
            $id_classe = htmlspecialchars($_POST['id_classe']);

            $table = "matiere";

            $colonne ="id_matiere";

            $val_recuperer = "lib_matiere";

            $requete="SELECT id_matiere FROM programme
                        WHERE id_classe = '$id_classe'";

                $resultat = Selection($requete);

                $count = $resultat->rowCount();

                if($count >0){

                        echo '<option></option>';

                    foreach($resultat as $c){

                        echo '<option value ="'.$c['id_matiere'].'">'.getChampsParametrage($val_recuperer, $table, $colonne, $c['id_matiere']).'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucune matière n\'est disponible !</i></option>'; 
                }

            
            
        }
    
    }

    if(isset($_POST['action']) && $_POST['action'] =="etudiant"){

        if(isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner")){
        
            $id_cl = htmlspecialchars($_POST['id_classe']);

            $table1 = "personne";

            $colonne1 ="id_pers";

            $val_recuperer1 = "nom_pers";

            $val_recuperer2 = "prenom_pers";

            $requete1="SELECT * FROM inscription i, personne p
                        WHERE i.id_etu = p.id_pers
                        AND id_classe = '$id_cl'";

                $resultat1 = Selection($requete1);

                $count1 = $resultat1->rowCount();

                if($count1 >0){

                        echo '<option value="">Selectionner</option>';

                    foreach($resultat1 as $c1){

                        echo '<option value ="'.$c1['id_etu'].'">'.getChampsUsers($val_recuperer1, $table1, $colonne1, $c1['id_etu']).' '.getChampsParametrage($val_recuperer2, $table1, $colonne1, $c1['id_etu']).'</option>';    
                
                    }

                }else{
                    echo '<option value=""><i style ="color : red">Aucun etudiant n\'est disponible.</i></option>'; 
                }

            
            
        }
    
    }*/


    // Recuperation des matiere qui sont enseignées dans des classes d'un enseignant

    if(isset($_POST['action']) && $_POST['action'] =="matiere_enseignant"){

        if(isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner") 
            && isset($_POST['id_matiere']) && ($_POST['id_matiere'] !="Selectionner")
            && isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner")){

            $matiere = htmlspecialchars($_POST['id_matiere']);
            $classe = htmlspecialchars($_POST['id_classe']);
        
            echo  '<div>
                        <a href="index.php?module=gestion&action=saisie_compEns" class="btn btn-success btn-sm" style ="border-radius:5px; margin-left:10px">
                                       <i class="glyphicon glyphicon-plus"></i>
                         </a>
                        </div><br>

                        <div class="table-responsive">
                            <table id="demo-dt-basic" class="table table-striped table-bordered">
                                <thead>
                                            <tr>
                                                <th class="text-center">Etudiant</th>
                                                <th class="text-center">Nombre de matière</th>
                                                <td class="text-center"></td>
                                            </tr>
                                </thead>
                                <tbody>'; 

                                $requeste ="SELECT id_etu, nom_pers, prenom_pers, count(id_com) as effectif  FROM composer c, matiere m, programme pr, personne p, classe cl
                                                            WHERE p.id_pers = c.id_etu
                                                            AND c.id_matiere = m.id_matiere
                                                            AND m.id_matiere = pr.id_matiere
                                                            AND pr.id_classe = cl.id_classe
                                                            AND p.id_classe = cl.id_classe
                                                            AND cl.id_classe = '$classe'
                                                            AND m.id_matiere = '$matiere'
                                                            GROUP BY id_pers, nom_pers, prenom_pers";
                                $resultat = Selection($requeste);
                                foreach($resultat as $tablo){ 

                                    echo '<tr>
                                            <td class="text-center">'.$tablo['nom_pers'].' '.$tablo['prenom_pers'].'</td>
                                            <td class="text-center"><span class="btn btn-default btn-xs"><i class="fa fa-table"></i> '.$tablo['effectif'].'</span></td>
                                            <td class="text-center">
                                                    <a href="index.php?module=gestion&action=compositionEnseignant2&cood='.$tablo['id_etu'].'&cood2='.$matiere.'" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-eye-open"></i></a> 
                                                    <a  class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target=".'.$tablo['id_etu'].'sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <div class="modal fade '.$tablo['id_etu'].'sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d\'un etudiant</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=composition1&parasup='.$tablo['id_etu'].'" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                      <div>
                                                                        <p><b>Attention ! Vous allez supprimer tous les examens et devoirs effectué par </b></p>
                                                                            <p><b>'.$tablo['nom_pers'].' '.$tablo['nom_pers'].'</b></p>
                                                                          <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Non</button>
                                                                          <button type="submit" name="supprimer" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Oui</button>
                                                                        
                                                                      </div>
                                                                    </div>
                                                                  </center>
                                                              </form>
                                                             </div>

                                                          </div>
                                                        </div>
                                                    </div>
                                            </td>
                                          </tr>';

                                } 

                        echo  '</tbody>
                            </table>
                        </div>'; 
            
        }
    
    }


    if(isset($_POST['action']) && $_POST['action'] =="etudiantParent"){

        if(isset($_POST['id_etudiant']) && ($_POST['id_etudiant'] !="Selectionner")){
        
            $id_etudiant = htmlspecialchars($_POST['id_etudiant']);


                $requeste="SELECT trimestre FROM composer
                        WHERE id_etu = '$id_etudiant'
                        GROUP BY trimestre";

                $response = Selection($requeste);

                $coun = $response->rowCount();

                if($coun >0){

                        echo '<option value="">Selectionner</option>';

                    foreach($response as $var){

                        echo '<option>'. $var['trimestre'].'</option>';    
                
                    }

                }else{
                    echo '<option value="">Aucune composition n\'a été effectuée.</option>'; 
                }

            
            
        }
    
    }


    // Recuperation des matiere qui sont enseignées dans des classes d'un enseignant

    if(isset($_POST['action']) && $_POST['action'] =="trimestre"){

        if(isset($_POST['id_etudiant']) && ($_POST['id_etudiant'] !="Selectionner") 
            && isset($_POST['trimestre']) && ($_POST['trimestre'] !="Selectionner")){

            $id_etudiant = htmlspecialchars($_POST['id_etudiant']);
            $trimestre = htmlspecialchars($_POST['trimestre']);

            // Recuperation de la classe de l'etudiant.

            $val_recup = "id_classe";
            $val_recup1 = "sexe_pers";
            $tab = "personne";
            $colonn = "id_pers";
            $id_classe = getChampsParametrage($val_recup, $tab, $colonn, $id_etudiant);
            $sexe_pers = getChampsParametrage($val_recup1, $tab, $colonn, $id_etudiant);

            // Determination du rang de l'etudiant.
            //rangEtudiantClasse($id_classe, $trimestre);
        
                        echo  '
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Matière</th>
                                                <th class="text-center">Coefficient</th>
                                                <th class="text-center">Note</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Mention</th>
                                                <th class="text-center">Enseignant</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                                $note_total = 0;
                                                $requeste ="SELECT *
                                                            FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
                                                            WHERE e.id_pers = c.id_etu 
                                                            AND c.id_matiere = m.id_matiere 
                                                            AND m.id_matiere = p.id_matiere 
                                                            AND p.id_classe = cl.id_classe
                                                            AND cl.id_classe=e.id_classe
                                                            AND c.id_anneeAc = a.id_annee
                                                            AND cl.id_classe = '$id_classe'
                                                            AND trimestre = '$trimestre'
                                                            AND e.id_pers = '$id_etudiant'
                                                            GROUP BY m.id_matiere, id_pers";
                                                $resultat = Selection($requeste);
                                                foreach($resultat as $p){ 

                                                    $note_examen = getNoteExamenEtudiant($p['id_pers'], $p['trimestre'], $p['id_matiere']);
                                                    $note_devoir = getNoteDevoirEtudiant($p['id_pers'], $p['trimestre'], $p['id_matiere']);
                                                    $coef_matiere = getCoefficientMatiere($p['id_matiere'], $id_classe);

                                                    $note_final = ($note_examen + $note_devoir)/2;

                                                    $note_coef =(($note_examen + $note_devoir)/2)*$coef_matiere;

                                                    $note_total = $note_total + (($note_examen + $note_devoir)/2)*$coef_matiere;
                                                    // Calcule la somme des coeficients
                                                    $table = "programme";
                                                    $colonne = "id_classe";

                                                    $somme_coef =  getSommeCoefficient($id_classe);

                                                    $moyenne_generale = $note_total/$somme_coef ;
                                                
                                 echo '<tr>
                                                <td class="text-center">'.$p['lib_matiere'].'</td>
                                                <td class="text-center">'.$coef_matiere.'</td>
                                                <td class="text-center">'.number_format($note_final,2).'</td>
                                                <td class="text-center">'.$note_coef.'</td>
                                                <td class="text-center">'; 
                                                 

                                               if($note_final < 10 ){ 
                                                        echo '<p class="text-danger">Insufisant</p>'; 
                                               }else if($note_final >=10 && $note_final <12){ 
                                                        echo '<p>Passable</p>'; 
                                               }else if($note_final >=12 && $note_final <14){ 
                                                        echo '<p>Assez bien</p>'; 
                                               }else if($note_final >=14 && $note_final < 16){ 
                                                        echo '<p>Bien</p>'; 
                                               }else if($note_final >=16 && $note_final < 18){ 
                                                         echo '<p>Très bien</p>'; 
                                               }else if($note_final >=18 && $note_final <20){ 
                                                          echo '<p>Excelent</p>'; 
                                               }else{ 
                                                          echo '<p>Honorable</p>'; 
                                               }
                                         echo ' </td>
                                                <td class="text-center">'; 

                                                                            $val_recuperer6 = "id_ens";
                                                                            $table6 = "enseigner";
                                                                            $colonne6 = "id_matiere";

                                                                            $id_ens = getChampsGestion($val_recuperer6, $table6, $colonne6, $p['id_matiere']);


                                                                            $val_recuperer5 ="nom_pers";
                                                                            $val_recuperer6 ="prenom_pers";
                                                                            $table5 = "personne";
                                                                            $colonne5 = "id_pers";
                                                                            echo getChampsUsers($val_recuperer5, $table5, $colonne5, $id_ens).' '.getChampsUsers($val_recuperer6, $table5, $colonne5, $id_ens); 

                                                                            $table7 = "composer";
                                                                            $colonne7 = "id_etu";
                                                                            $colonne8 = "trimestre";
                                                                            $val_recuperer7 = "rang"; 
                                                        
                                             echo  '</td>
                                            </tr>'; 
                                         } 

                                    echo '
                                            <tr>
                                                <td class="text-center"><b>Total</b></td><td class="text-center">'.getSommeCoefficient($id_classe).'</td><td></td><td class="text-center">'.number_format($note_total,2).'</td><td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-primary"><b>Moyenne de l\'etudiant</b></td><td class="text-center bg-gray text-danger"><b>'.number_format($note_total/getSommeCoefficient($id_classe),2).'</b></td><td class="text-center"></td><td class="text-center"> </td><td class="text-center"><b>Max.classe</b></td><td class="text-center bg-gray"><b>'.number_format(getMoyenneMajor($id_classe,$trimestre),2).'</b></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center text-primary"><b>Rang de l\'etudiant</b></td><td class="text-center bg-gray"><b>'.getChampsGestion2($val_recuperer7, $table7, $colonne7, $id_etudiant, $colonne8, $trimestre).'</b></td>
                                                <td class="text-center">Mention</td><td class="text-center">'; 
                                             

                                                    if($moyenne_generale < 10 ){ 
                                                         echo '<p class="text-danger">Insufisant</p>'; 
                                                    }else if($moyenne_generale >=10 && $moyenne_generale <12){ 
                                                                 echo '<p class="text-danger">Passable</p>';
                                                    }else if($moyenne_generale >=12 && $moyenne_generale <14){
                                                                 echo '<p class="text-info">Assez bien</p>'; 
                                                    }else if($moyenne_generale >=14 && $moyenne_generale < 16){ 
                                                                 echo '<p class="text-info">Bien</p>';
                                                    }else if($moyenne_generale >=16 && $moyenne_generale < 18){ 
                                                                 echo '<p class="text-info">Très bien</p>';
                                                    }else if($moyenne_generale >=18 && $moyenne_generale <20){ 
                                                                 echo '<p class="text-info">Excelent</p>'; 
                                                    }else{ 
                                                                echo '<p class="text-info">Honorable</p>'; 
                                                    } 
                                          echo '</td>
                                                <td class="text-center"><b>Moy.classe</b></td><td class="text-center bg-gray" colspan="2"><b>'.number_format((getMoyenneMajor($id_classe,$trimestre)+getMoyenneMinor($id_classe,$trimestre))/2,2).'</b></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>Effectif de la classe</b></td><td class="text-center bg-gray">'.getNombreEtudiantInscription($id_classe).'</td><td class="text-center text-danger"></td><td class="text-center"> </td><td class="text-center"><b>Min.classe</b></td><td class="text-center bg-gray" colspan="2"><b>'.number_format(getMoyenneMinor($id_classe, $trimestre),2).'</b></td>
                                            </tr>
                                            '; 

                                    echo  '</tbody>
                                    </table>
                                
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <tr>
                                            <td class="text-center"><b>Décision du conseil des professeurs : </b></td>
                                            <td class ="bg-gray">'; 

                                                    

                                                                        $table9 = "classe";
                                                                        $colonne9 = "id_classe"; 

                                                                        if($trimestre =="Trimestre I"){
                                                                            // Recuperation de lomyenne d'admission du trimestre I
                                                                            $val_recuperer9 = "moy_trim1";
                                                                            $moy_trim1= getChampsParametrage($val_recuperer9, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                                            if($moyenne_generale >= $moy_trim1){
                                                                                if($sexe_pers =="Femme"){
                                                                                    echo '<p class="text-center text-primary"><b>Admise en classe supérieure</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-primary"><b>Admis en classe supérieure</b></p>';
                                                                                }  
                                                                                
                                                                            }else{ 
                                                                                if($sexe_pers =="Femme"){
                                                                                    echo '<p class="text-center text-danger"><b>Ajournée</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-danger"><b>Ajourné</b></p>';
                                                                                } 
                                                                                
                                                                            }

                                                                        }else if($trimestre =="Trimestre II"){ 
                                                                             // Recuperation de lomyenne d'admission du trimestre I
                                                                            $val_recuperer10 = "moy_trim2";
                                                                            $moy_trim2= getChampsParametrage($val_recuperer10, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                                            if($moyenne_generale >= $moy_trim2){  
                                                                                if($sexe_pers =="Femme"){
                                                                                    echo '<p class="text-center text-primary"><b>Admise en classe supérieure</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-primary"><b>Admis en classe supérieure</b></p>';
                                                                                }
                                                                            }else{ 
                                                                                if($sexe_pers =="Femme"){
                                                                                    echo '<p class="text-center text-danger"><b>Ajournée</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-danger"><b>Ajourné</b></p>';
                                                                                } 
                                                                            }
                                                                        }else{ 
                                                                             // Recuperation de lomyenne d'admission du trimestre I
                                                                            $val_recuperer11 = "moy_trim3";
                                                                            $moy_trim3= getChampsParametrage($val_recuperer11, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                                            if($moyenne_generale >= $moy_trim3){  
                                                                                if($sexe_pers =="Femme"){
                                                                                    echo '<p class="text-center text-primary"><b>Admise en classe supérieure</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-primary"><b>Admis en classe supérieure</b></p>';
                                                                                }
                                                                            }else{ 
                                                                                if($sexe_pers =="Femme"){
                                                                                    echo '<p class="text-center text-danger"><b>Ajournée</b></p>';
                                                                                } else{
                                                                                    echo '<p class="text-center text-danger"><b>Ajourné</b></p>';
                                                                                } 
                                                                            }
                                                                        } 
                                                    
                                         echo '</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><b>Discipline : Heure d\'absence non justifiées<b></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>'; 
            
         }
    
    } 


    // Recuperation des matiere qui sont enseignées dans des classes d'un enseignant

    if(isset($_POST['action']) && $_POST['action'] =="trimestre_etuParent"){

        if(isset($_POST['id_etudiant']) && ($_POST['id_etudiant'] !="Selectionner") 
            && isset($_POST['trimestre']) && ($_POST['trimestre'] !="Selectionner")){

            $id_etudiant = htmlspecialchars($_POST['id_etudiant']);
            $trimestre = htmlspecialchars($_POST['trimestre']);

            // Recuperation de la classe de l'etudiant.

            $val_recup = "id_classe";
            $tab = "personne";
            $colonn = "id_pers";
            $id_classe = getChampsParametrage($val_recup, $tab, $colonn, $id_etudiant);

            // Determination du rang de l'etudiant.

            //rangEtudiantClasse($id_classe, $trimestre);
        
                        echo  '
                                <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Identifiant</th>
                                                <th class="text-center">Matière</th>
                                                <th class="text-center">Effectif</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                                $note_total = 0;
                                                $requeste ="SELECT m.id_matiere, lib_matiere, count(id_com) as effectif
                                                            FROM personne e, composer c, matiere m, programme p, classe cl, annee_academique a
                                                            WHERE e.id_pers = c.id_etu 
                                                            AND c.id_matiere = m.id_matiere 
                                                            AND m.id_matiere = p.id_matiere 
                                                            AND p.id_classe = cl.id_classe
                                                            AND cl.id_classe=e.id_classe
                                                            AND c.id_anneeAc = a.id_annee
                                                            AND cl.id_classe = '$id_classe'
                                                            AND trimestre = '$trimestre'
                                                            AND e.id_pers = '$id_etudiant'
                                                            GROUP BY m.id_matiere";
                                                $resultat = Selection($requeste);
                                                foreach($resultat as $p){ 

                                                    
                                                
                                        echo '<tr>
                                                <td class="text-center">'.$p['id_matiere'].'</td>
                                                <td class="text-center">'.$p['lib_matiere'].'</td>
                                                <td class="text-center"><b>'.$p['effectif'].'</b></td>';

                                                if(compteNombreCompEtudiant($id_etudiant, $p['id_matiere'], $trimestre) > 0 ){
                                                    echo '<td class="text-center"><a href="index.php?module=gestion&action=noteEtudiantmatiere&cood1='.$id_etudiant.'&cood2='.$p['id_matiere'].'&cood3='.$trimestre.'" class="btn btn-mint btn-xs" style ="border-radius:5px">'.compteNombreCompEtudiant($id_etudiant, $p['id_matiere'], $trimestre).'</a> </td>';
                                                }else{
                                                    echo '<td class="text-center"><a href="index.php?module=gestion&action=noteEtudiantmatiere&cood1='.$id_etudiant.'&cood2='.$p['id_matiere'].'&cood3='.$trimestre.'" class="btn btn-default btn-xs" style ="border-radius:5px">'.compteNombreCompEtudiant($id_etudiant, $p['id_matiere'], $trimestre).'</a> </td>';
                                                }
                                                
                                        echo  '</tr>
                                        <tbody>'; 
                                         }

                                echo   '</table>
                                </div>
                                <div> 
                                    <span style="float : right"><a href="index.php?module=users&action=imprimer_listePreinscris&cood=<?php echo $id_filiere; ?>" class="btn btn-default btn-xs"><i class="fa fa-print"></i> Imprimer</a></span> 
                                </div>
                            '; 
            
         }
    
    } 

    if(isset($_POST['action']) && $_POST['action'] =="form_message"){

        echo '
            <div class="col-md-10 col-sm-10 col-xs-9 form-group" style="margin-bottom:10px">
                <input type="textarea"  name="sujet" class="form-control" required  placeholder="Taper votre message ici">
            </div>
            <div class="col-xs-1">
                <button type="submit" name="submit" class="btn btn-success btn-xs">Envoyer <i class="glyphicon glyphicon-ok-sign"></i></button>
            </div>
        ';

    }


 ?>