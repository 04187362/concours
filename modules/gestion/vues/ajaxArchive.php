<?php

    include("connexion/connexiongenerale.php");
    include('modules/gestion/modeles/methodeGestion.php');
    include('modules/users/modeles/methodeUsers.php');
    include('modules/parametrage/modeles/methodeParametrage.php');
?>

<?php

	if(isset($_POST['action']) && $_POST['action'] =="annee_academique"){

        if(isset($_POST['anneeAc']) && ($_POST['anneeAc'] !="Selectionner")){
        
            $anneeAc = htmlspecialchars($_POST['anneeAc']);


                $requeste="SELECT * FROM archiver_composer 
							WHERE anneeAc = '$anneeAc'
							GROUP BY classe";

                $response = Selection($requeste);

                $coun = $response->rowCount();

                if($coun >0){

                        echo '<option value="">Selectionner</option>';

                    foreach($response as $var){

                        echo '<option>'. $var['classe'].'</option>';    
                
                    }

                }else{
                    echo '<option>Aucune classe n\'est disponible.</option>'; 
                }

            
            
        }
    
    }

	if(isset($_POST['action']) && $_POST['action'] =="classe"){

        if(isset($_POST['classe']) && ($_POST['classe'] !="Selectionner") &&
           isset($_POST['anneeAc']) && ($_POST['anneeAc'] !="Selectionner")){
        
            $classe = htmlspecialchars($_POST['classe']);
        	$anneeAc = htmlspecialchars($_POST['anneeAc']);

                $requeste="SELECT * FROM archiver_composer
                        WHERE anneeAc = '$anneeAc'
                        AND  classe = '$classe'
                        GROUP BY trimestre";

                $response = Selection($requeste);

                $coun = $response->rowCount();

                if($coun >0){

                        echo '<option value="">Selectionner</option>';

                    foreach($response as $var){

                        echo '<option>'. $var['trimestre'].'</option>';    
                
                    }

                }else{
                    echo '<option>Aucun trimestre n\'est disponible.</option>'; 
                }

            
            
        }
    
    }

	if(isset($_POST['action']) && $_POST['action'] =="trimestre"){
	
		if( isset($_POST['classe']) && ($_POST['classe'] !="Selectionner") &&
			isset($_POST['trimestre']) && ($_POST['trimestre'] !="Selectionner") &&
			isset($_POST['anneeAc']) && ($_POST['anneeAc'] !="Selectionner")){

		  	$anneeAc = htmlspecialchars($_POST['anneeAc']);
		  	$classe = htmlspecialchars($_POST['classe']);
		  	$trimestre = htmlspecialchars($_POST['trimestre']);

		  	echo '
		  	<hr>
		  	<p style"font-family:Imapct" class="text-center"><b>Archivage des resultats de la composition des etudiants par ordre de merite.</b></p>
		  	<hr>
		  	<div class="table-responsive">
		    <table id="demo-dt-basic" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th class="text-center">Etudiant</th>
		                <th class="text-center">Moyenne</th>
		                <th class="text-center">Mention</th>
		                <th class="text-center">Décision du juri</th>
		                <th></th>
		            </tr>
		        </thead>
		            <tbody>'; 
		                
			             	$requete = "SELECT nom_etu, prenom_etu, moy_admission, id_com, sum(note*coef)/somme_coef as moyenne
										FROM archiver_composer
										WHERE anneeAc = '$anneeAc'
										AND classe = '$classe'
										AND trimestre = '$trimestre'
										GROUP BY nom_etu, prenom_etu";

								//$note_final = 0;
			                    $resultat = Selection($requete); 

			                    foreach($resultat as $value){


							        echo '<tr>
						                            <td class="text-center">'.$value['nom_etu'].' '.$value['prenom_etu'].'</td>
						                            <td class="text-center">'.number_format($value['moyenne'],2).'</td>
						                            <td class="text-center">'; 
						                            	if($value['moyenne'] < 10 ){ 
						                            		 echo '<p class="text-danger">Insuffisant</p>'; 
						                            	     }else if($value['moyenne']>=10 && $value['moyenne'] <12){ 
						                            		     echo '<p>Passable</p>'; 
						                            	 }else if($value['moyenne'] >=12 && $value['moyenne'] <14){ 
						                            		echo '<p>Assez bien</p>'; 
						                            	 }else if($value['moyenne'] >=14 && $value['moyenne']< 16){ 
						                            		echo '<p>Bien</p>'; 
						                            	 }else if($value['moyenne'] >=16 && $value['moyenne'] < 18){ 
					 										 echo '<p>Très bien</p>'; 
						                            	 }else if($value['moyenne'] >=18 && $value['moyenne'] <20){ 
						                            		 echo '<p>Excelent</p>'; 
						                            	 }else{ 
						                            		 echo '<p>Honorable</p>'; 
						                            	 } 
						            		  echo '</td>
						            				<td class="text-center">';
						            					if($value['moyenne'] >= $value['moy_admission']){
						            						echo '<p class="text-center text-mint"><b>Admis(e)</b></p>';
						            					}else{
						            						echo '<p class="text-danger"><b>Ajourné(e)</b></p>';
						            					}	
						            		  echo '</td>
						                            <td class="text-center"><a href="index.php?module=gestion&action=detail_archive&cood='.$value['id_com'].'" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-eye-open"></i></a></td>
						                        </tr>'; 
						       }  
		        echo '</tbody>
		    </table>
		</div>'; 
	 }
	} 
?>


		