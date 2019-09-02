<?php

    include("connexion/connexiongenerale.php");

    include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");

    if(isset($_SESSION["users"])){

        $id_personne = htmlspecialchars($_SESSION["users"]['id_pers']);

    }else{

        header("location:index.php?module=users&action=Deconnexion");
    }

    //Recuperation des matiere qui sont programmés dans la classe selectionnée

    if(isset($_POST['action']) && $_POST['action'] =="enseignant"){

        if(isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner")){
        
            $id_ens =htmlentities(htmlspecialchars($_POST['id_ens']));

            $sql="SELECT * FROM enseigner e, niveau_etude n
                        WHERE e.id_niveauetude = n.id_niveauetude
                        AND id_ens = ?
                        GROUP BY n.id_niveauetude";

                $requete = AfficherTout($sql);
                $param = array($id_ens); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();

                if($count >0){

                       echo '<option value="">Selectionner</option>';

                    while($c=$requete->fetch()){

                        echo '<option value ="'.$c['id_niveauetude'].'">'.$c['lib_niveauetude'].'</option>';    
                
                    }

                }else{
                    echo '<option value="">Aucun niveau d\'etude n\'est disponible.</option>'; 
                }

            
            
        }
    
    }

    // Recuperation des matiere qui sont programmés et enseignées dans la classe selectionnée apr l'enseiganant selectionné.

    if(isset($_POST['action']) && $_POST['action'] =="niveauetude"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner")
            && isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner")){
        
            $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));

            $id_ens = htmlentities(htmlspecialchars($_POST['id_ens']));

            $sql="SELECT * FROM enseigner e, matiere m
                        WHERE m.id_matiere = e.id_matiere
                        AND id_niveauetude = ?
                        AND id_ens = ?";

                $requete = AfficherTout($sql);
                $param = array($id_niveauetude,$id_ens); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();

                if($count >0){

                        echo '<option value="">Selectionner</option>';

                    while($c=$requete->fetch()){

                        echo '<option value ="'.$c['id_matiere'].'">'.$c['lib_matiere'].'</option>';    
                
                    }

                }else{
                    echo '<option value="">Aucune matière n\'est disponible.</option>'; 
                }

            
            
        }
    
    }


    // Recuperation des matiere qui sont enseignées dans la classe selectionnée et par l'enseignant selectionné

    if(isset($_POST['action']) && $_POST['action'] =="niveauetude_details"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") &&  isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner")){
        
            $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));
            $id_ens =htmlentities(htmlspecialchars($_POST['id_ens']));

            $sql="SELECT * FROM enseigner e, matiere m
                        WHERE e.id_matiere = m.id_matiere
                        AND id_niveauetude = ?
                        AND id_ens = ?";

                $requete = AfficherTout($sql);
                $param = array($id_niveauetude,$id_ens); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();

                if($count >0){

                        echo '<option value="">Selectionner</option>';

                    while($c=$requete->fetch()){

                        echo '<option value ="'.$c['id_matiere'].'">'.$c['lib_matiere'].'</option>';    
                
                    }

                }else{
                    echo '<option value="">Aucune matière n\'est disponible.</option>'; 
                }

            
            
        }else{
            echo "<option>Tous les champs sont obligatoires.</option>";
        }
    
    }


    // Recuperation des matiere qui sont enseignées dans la classe selectionnée et par l'enseignant selectionné

    if(isset($_POST['action']) && $_POST['action'] =="classe_ens"){

        if(isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner")){
        
            $id_classe = htmlspecialchars($_POST['id_classe']);

            $table1 = "matiere";

            $colonne1 ="id_matiere";

            $val_recuperer1 = "lib_matiere";

            $requete="SELECT id_matiere FROM enseigner
                        WHERE id_classe = '$id_classe'
                        AND id_ens = '$id_personne'";

                $resultat = Selection($requete);

                $count = $resultat->rowCount();

                if($count >0){

                        echo '<option value="">Selectionner</option>';

                    foreach($resultat as $c){

                        echo '<option value ="'.$c['id_matiere'].'">'.getChampsParametrage($val_recuperer1, $table1, $colonne1, $c['id_matiere']).'</option>';    
                
                    }

                }else{
                    echo '<option value="">Aucune matière n\'est disponible.</option>'; 
                }

            
            
        }else{
            echo "<option>Tous les champs sont obligatoires.</option>";
        }
    
    }


    // Recuperation des matiere qui sont programmés dans la classe selectionnée

    if(isset($_POST['action']) && $_POST['action'] =="matiere"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") 
            && isset($_POST['id_matiere']) && ($_POST['id_matiere'] !="Selectionner")
            && isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner")){
        
            $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));
            $id_matiere = htmlentities(htmlspecialchars($_POST['id_matiere']));
            $id_ens = htmlentities(htmlspecialchars($_POST['id_ens']));

                $sql="SELECT mois FROM emargement
                        WHERE id_ens = ?
                        AND id_niveauetude = ?
                        AND id_matiere = ?
                        GROUP BY mois";

                $requete = AfficherTout($sql);
                $param = array($id_ens,$id_niveauetude,$id_matiere); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();

                if($count >0){

                        echo '<option value="">Selectionner</option>';

                    while($c=$requete->fetch()){

                        if($c['mois']==1){
                            echo '<option value='.$c['mois'].'>Janvier</option>';
                        }else if($c['mois']==2){
                            echo '<option value='.$c['mois'].'>Fevrier</option>';
                        }else if($c['mois']==3){
                            echo '<option value='.$c['mois'].'>Mars</option>';
                        }else if($c['mois']==4){
                            echo '<option value='.$c['mois'].'>Avril</option>';
                        }else if($c['mois']==5){
                            echo '<option value='.$c['mois'].'>Mai</option>';
                        }else if($c['mois']==6){
                            echo '<option value='.$c['mois'].'>Juin</option>';
                        }else if($c['mois']==7){
                            echo '<option value='.$c['mois'].'>Juillet</option>';
                        }else if($c['mois']==8){
                            echo '<option value='.$c['mois'].'>Août</option>';
                        }else if($c['mois']==9){
                            echo '<option value='.$c['mois'].'>Septembre</option>';
                        }else if($c['mois']==10){
                            echo '<option value='.$c['mois'].'>Octobre</option>';
                        }else if($c['mois']==11){
                            echo '<option value='.$c['mois'].'>Novembre</option>';
                        }else{
                            echo '<option value='.$c['mois'].'>Décembre</option>';
                        }    
                
                    }

                }else{
                    echo '<option value="">Aucun mois n\'est disponible.</option>'; 
                }

            
            
        }
    
    }

    // Recuperation des mois que l'enseignant selectionné a enseigné dans la classe selectionnée.

    if(isset($_POST['action']) && $_POST['action'] =="mois"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") 
            && isset($_POST['id_matiere']) && ($_POST['id_matiere'] !="Selectionner")
            && isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner")
            && isset($_POST['mois']) && ($_POST['mois'] !="Selectionner")){
        
            $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));
            $id_matiere = htmlentities(htmlspecialchars($_POST['id_matiere']));
            $id_ens = htmlentities(htmlspecialchars($_POST['id_ens']));
            $mois = htmlentities(htmlspecialchars($_POST['mois']));

            $requete = "SELECT cout_heure FROM enseigner WHERE id_ens=? AND id_niveauetude=? AND id_matiere=?";
            $param = array($id_ens,$id_niveauetude,$id_matiere);

            $cout_heure = getChampsGestion($requete,$param);

            $sql="SELECT * FROM emargement e, matiere m, niveau_etude n, personne p
                        WHERE p.id_pers = e.id_ens
                        AND e.id_matiere = m.id_matiere
                        AND e.id_niveauetude = n.id_niveauetude
                        AND e.id_ens = ?
                        AND n.id_niveauetude = ?
                        AND m.id_matiere =?
                        AND mois = ?";

                $requete = AfficherTout($sql);
                $param = array($id_ens,$id_niveauetude,$id_matiere,$mois); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();

                $total_general = 0;

                if($count >0){

                    echo ' <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th class="text-center">Heures effectuées</th>
                                                <th class="text-center">Titre du cours</th>
                                                <th class="text-center">Date emargée</th>
                                                <th class="text-center">Cout/heure</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>';  

                                                while($tab=$requete->fetch()){

                                                $total_general = $total_general + $cout_heure*$tab['heure_effectue'];
                                            
                                     echo '<tr>
                                                <td class="text-center">'.$tab['heure_effectue'].'</td>
                                                <td class="text-center">'.$tab['titre_cours'].'</td>
                                                <td class="text-center">'.date('d-m-Y', strtotime($tab['date_em'])).'</td>
                                                <td class="text-center">'.$cout_heure.' FCFA</td>
                                                <td class="text-center">'.$cout_heure*$tab['heure_effectue'].' FCFA</td>
                                            </tr>'; 
                                             }
                               echo'</tbody>
                                        <tfooter>
                                            <th colspan="3"></th>
                                            <th colspan="2" class="text-center text-primary">Total : '.$total_general.' FCFA</th>
                                        </tfooter>
                                    </table>

                                    <div class="pull-right">
                                        <a href="index.php?module=users&action=imprimer_emargement&cood1='.$id_ens.'&cood2='.$id_matiere.'&cood3='.$id_niveauetude.'&cood4='.$mois.'" class="btn btn-info btn-xs"><i class="fa fa-print"> Imprimer</i></a>
                                    </div>
                            </div>'; 

                    }else{ 
                        echo '<div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Heure effectuée</th>
                                                <th class="text-center">Titre cours</th>
                                                <th class="text-center">Date emargée</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="text-center">Aucun emargement n\'a été effectué.</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                        </div>';
                    } 

            
            
        }
    
    }


    // On fait test pour verifier si l'enseignant sera remplace ou pas. s'il sera remplacé alors on recupere tous les enseignants de la classe ou il enseigne
    if(isset($_POST['action']) && $_POST['action'] =="remplacer"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") &&
            isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner") && isset($_POST['remplace'])){
        
            $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));
            $remplace = htmlentities(htmlspecialchars($_POST['remplace']));
            $id_ens = htmlentities(htmlspecialchars($_POST['id_ens']));

            if($remplace == "Oui"){

                $sql="SELECT * FROM enseigner e, personne p
                        WHERE p.id_pers = e.id_ens
                        AND e.id_niveauetude = ?
                        AND id_ens NOT IN (?)
                        GROUP BY id_ens";

                $requete = AfficherTout($sql);
                $param = array($id_niveauetude,$id_ens); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();

                if($count >0){

                    echo '
                        <div class="form-group">
                            <label for="ens_remp" class="control-label col-md-4"> Par </label>
                            <div class="col-md-8">
                                <select id="ens_remp" name="ens_remp" class="form-control" required>
                                    <option value="">Selectionner</option>';

                    while($c=$requete->fetch()){

                        echo '<option value="'.$c['id_ens'].'">'.$c['nom_pers'].' '.$c['prenom_pers'].'</option>';    
                
                    }
                        echo  '</select>
                            </div>
                        </div>';
                }else{
                    echo '<div class="form-group">
                            <label for="ens_remp" class="control-label col-md-4"> Par </label>
                            <div class="col-md-8">
                                <select id="ens_remp" name="ens_remp" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Aucun enseignant n\'est disponible.</option>
                                </select>
                            </div>
                        </div>'; 
                }

            }
            
        }
    
    }

    // Verifie si le champs remplacer enseignant et niveauetude non vide pour remplir le champs de l'enseignant remplant.
    if(isset($_POST['action']) && $_POST['action'] =="remplir_enseignant_remplacer"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") &&
            isset($_POST['id_ens']) && ($_POST['id_ens'] !="Selectionner") && isset($_POST['remplace'])){
        
            $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));
            $remplace = htmlentities(htmlspecialchars($_POST['remplace']));
            $id_ens = htmlentities(htmlspecialchars($_POST['id_ens']));

            if($remplace == "Oui"){

                $sql="SELECT * FROM enseigner e, personne p
                        WHERE p.id_pers = e.id_ens
                        AND e.id_niveauetude = ?
                        AND id_ens NOT IN (?)
                        GROUP BY id_ens";

                $requete = AfficherTout($sql);
                $param = array($id_niveauetude,$id_ens); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $count = $requete->rowCount();

                if($count >0){

                    echo '
                        <div class="form-group">
                            <label for="ens_remp" class="control-label col-md-4"> Par </label>
                            <div class="col-md-8">
                                <select id="ens_remp" name="ens_remp" class="form-control" required>
                                    <option value="">Selectionner</option>';

                    while($c=$requete->fetch()){

                        echo '<option value="'.$c['id_ens'].'">'.$c['nom_pers'].' '.$c['prenom_pers'].'</option>';    
                
                    }
                        echo  '</select>
                            </div>
                        </div>';
                }else{
                    echo '<div class="form-group">
                            <label for="ens_remp" class="control-label col-md-4"> Par </label>
                            <div class="col-md-8">
                                <select id="ens_remp" name="ens_remp" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Aucun enseignant n\'est disponible.</option>
                                </select>
                            </div>
                        </div>'; 
                }

            }
            
        }
    
    }

 ?>