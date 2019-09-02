<?php 

    include("modules/parametrage/modeles/methodeParametrage.php");

    if(isset($_POST['action']) && $_POST['action'] =="moyenne_trimestre"){ 

       if(isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner") 
            && isset($_POST['trimestre']) && ($_POST['trimestre'] !="Selectionner")){

            $id_classe = htmlspecialchars($_POST['id_classe']);
            $trimestre = htmlspecialchars($_POST['trimestre']);

            $table9 = "classe";
            $colonne9 = "id_classe";
            
            if($trimestre =="Trimestre I"){
                // Recuperation de la moyenne d'admission de la classe selectionné.
                $val_recuperer9 = "moy_trim1";
                $moy_trim1 = getChampsParametrage($val_recuperer9, $table9, $colonne9, $id_classe);

                echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Moy Adm </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="text" id="moyenne" name="moyenne" value='.$moy_trim1.' class="form-control" required >
                            </div>
                        </div>
                     </div>

                    <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <div class="form-group">
                                    <input type="submit" class="btn btn btn-primary">
                                </div>
                            </div>
                    </div>';

            }else if($trimestre =='Trimestre II'){
                // Recuperation de la moyenne d'admission de la classe selectionné.
                $val_recuperer10 = "moy_trim2";
                $moy_trim2 = getChampsParametrage($val_recuperer10, $table9, $colonne9, $id_classe);
                echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Moyenne </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="text" id="moyenne" name="moyenne" value='.$moy_trim2.' class="form-control" required >
                            </div>
                        </div>
                     </div>
                     <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <div class="form-group">
                                    <input type="submit" class="btn btn btn-primary">
                                </div>
                            </div>
                    </div>';
            }else{
                // Recuperation de la moyenne d'admission de la classe selectionné.
                $val_recuperer11 = "moy_trim3";
                $moy_trim3 = getChampsParametrage($val_recuperer11, $table9, $colonne9, $id_classe); 
                echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Moyenne </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="text" id="moyenne" name="moyenne" value='.$moy_trim3.' class="form-control" required >
                            </div>
                        </div>
                     </div>
                     <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <div class="form-group">
                                    <input type="submit" class="btn btn btn-primary">
                                </div>
                            </div>
                    </div>';
            }
            


       } 
    }


    if(isset($_POST['action']) && $_POST['action'] =="classe_pub"){

        if(isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner")){
        
            $id_classe = htmlspecialchars($_POST['id_classe']);


                $requeste="SELECT trimestre FROM composer c, personne p
                        WHERE p.id_pers = c.id_etu
                        AND id_classe = '$id_classe'
                        GROUP BY trimestre";

                $response = Selection($requeste);

                $coun = $response->rowCount();

                if($coun >0){

                        echo '<option>Selectionner</option>';

                    foreach($response as $var){

                        echo '<option>'. $var['trimestre'].'</option>';    
                
                    }

                }else{
                    echo '<option>Aucun trimestre n\'est disponible.</option>'; 
                }

            
            
        }
    
    }


    if(isset($_POST['action']) && $_POST['action'] =="etat_publication"){ 

       if(isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner") 
            && isset($_POST['trimestre']) && ($_POST['trimestre'] !="Selectionner")){

            $id_classe = htmlspecialchars($_POST['id_classe']);
            $trimestre = htmlspecialchars($_POST['trimestre']);

            $table9 = "classe";
            $colonne9 = "id_classe";
            
            if($trimestre =="Trimestre I"){
                // Recuperation de la moyenne d'admission de la classe selectionné.
                $val_recuperer9 = "moy_trim1";
                $moy_trim1 = getChampsParametrage($val_recuperer9, $table9, $colonne9, $id_classe);

                echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Moy Adm </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="text" id="moyenne" name="moyenne" value='.$moy_trim1.' class="form-control" required >
                            </div>
                        </div>
                     </div>';

            }else if($trimestre =='Trimestre II'){
                // Recuperation de la moyenne d'admission de la classe selectionné.
                $val_recuperer10 = "moy_trim2";
                $moy_trim2 = getChampsParametrage($val_recuperer10, $table9, $colonne9, $id_classe);
                echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Moyenne </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="text" id="moyenne" name="moyenne" value='.$moy_trim2.' class="form-control" required >
                            </div>
                        </div>
                     </div>';
            }else{
                // Recuperation de la moyenne d'admission de la classe selectionné.
                $val_recuperer11 = "moy_trim3";
                $moy_trim3 = getChampsParametrage($val_recuperer11, $table9, $colonne9, $id_classe); 
                echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Moyenne </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="text" id="moyenne" name="moyenne" value='.$moy_trim3.' class="form-control" required >
                            </div>
                        </div>
                     </div>';
            }
            


       } 
    }



    if(isset($_POST['action']) && $_POST['action'] =="trimestre_pub"){
    
        if( isset($_POST['id_classe']) && ($_POST['id_classe'] !="Selectionner") &&
            isset($_POST['trimestre']) && ($_POST['trimestre'] !="Selectionner")){

            $id_classe = htmlspecialchars($_POST['id_classe']);
            $trimestre = htmlspecialchars($_POST['trimestre']);

            
            $table1 = "classe";
            $colonne1 = "id_classe";

            if($trimestre =="Trimestre I"){
                $val_recuperer1 = 'pub_trim1';
                // Recuperation de la valeur de publication tu trimestre I
                $pub_trim1 = getChampsParametrage($val_recuperer1, $table1, $colonne1, $id_classe);
                // Verifiant si les resultats du trimestre I n'ont pas été publié.
                if($pub_trim1==0){
                     echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Etat pub </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="submit" class="btn btn-danger btn-xs" value="Publié les resultats">
                            </div>
                        </div>
                     </div>';
                }else{
                    echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Etat pub </label>
                            <div class="col-md-8 col-xs-8">
                                <span class="label label-mint">les resultats ont été publié</span>
                            </div>
                        </div>
                     </div>';
                }
            }else if($trimestre =="Trimestre II"){
                $val_recuperer2 = 'pub_trim2';
                // Recuperation de la valeur de publication tu trimestre I
                $pub_trim2 = getChampsParametrage($val_recuperer2, $table1, $colonne1, $id_classe);
                // Verifiant si les resultats du trimestre I n'ont pas été publié.
                if($pub_trim2==0){
                     echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Etat pub </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="submit" class="btn btn-danger btn-xs" value="Publié les resultats">
                            </div>
                        </div>
                     </div>';
                }else{
                    echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Etat pub </label>
                            <div class="col-md-8 col-xs-8">
                                <span class="label label-mint">les resultats ont été publié</span>
                            </div>
                        </div>
                     </div>';
                }
            }else{
                $val_recuperer3 = 'pub_trim3';
                // Recuperation de la valeur de publication tu trimestre I
                $pub_trim3 = getChampsParametrage($val_recuperer3, $table1, $colonne1, $id_classe);
                // Verifiant si les resultats du trimestre I n'ont pas été publié.
                if($pub_trim3==0){
                     echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Etat pub </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="submit" class="btn btn-danger btn-xs" value="Publié les resultats">
                            </div>
                        </div>
                     </div>';
                }else{
                    echo '<div class="col-md-4">
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Etat pub </label>
                            <div class="col-md-8 col-xs-8">
                                <span class="label label-mint">les resultats ont été publié</span>
                            </div>
                        </div>
                     </div>';
                }
            }

        } 
    } 

    // Affichage de la moyenne d'admission d'une filiere
    if(isset($_POST['action']) && $_POST['action'] =="moyValidationFiliereConcours"){ 

       if(isset($_POST['id_filiere']) && ($_POST['id_filiere'] !="Selectionner")){

            $id_filiere =htmlentities(htmlspecialchars($_POST['id_filiere']));
            
            // Recuperation de la moyenne d'admission de la filiere selectionné.
                $requete = "SELECT moyenne_admission FROM filiere WHERE id_filiere=?";
                $param = array($id_filiere);
                $moyenne_admission = getChampsParametrage($requete,$param);

                echo '
                        <div class="form-group">
                            <label for="moyenne" class="control-label col-md-4 col-xs-4"> Moyonne Admission </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="text" id="moyenne" name="moyenne" value='.$moyenne_admission.' class="form-control" required >
                            </div>
                        </div>
                     

                    <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <div class="form-group">
                                    <input type="submit" class="btn btn btn-primary">
                                </div>
                            </div>
                    </div>';

       } 
    }

    //Publication des resultats du concours

    if(isset($_POST['action']) && $_POST['action'] =="publicationResultatConcours"){
    
        if( isset($_POST['id_filiere']) && ($_POST['id_filiere'] !="Selectionner")){

            $id_filiere =htmlentities(htmlspecialchars($_POST['id_filiere']));
                // Recuperation de la valeur de publication
                $requete = "SELECT etat_publication FROM filiere WHERE id_filiere=?";
                $param = array($id_filiere);
                $etat_publication = getChampsParametrage($requete,$param);
                // Verifiant si les resultats du trimestre I n'ont pas été publié.
                if($etat_publication==0){
                     echo '
                        <div class="form-group">
                            <label class="control-label col-md-4 col-xs-4"> Etat publication </label>
                            <div class="col-md-8 col-xs-8">
                                <input type="submit" class="btn btn-primary btn-xs" value="Publier les resultats">
                            </div>
                        </div>';
                }else{
                    echo '
                        <div class="form-group">
                            <label class="control-label col-md-4 col-xs-4"> Etat publication : </label>
                            <div class="col-md-8 col-xs-8">
                                <span class="text-mint">les resultats ont déjà été publié</span>
                            </div>
                        </div>';
                }

        } 
    } 


?>