<?php

    include("connexion/connexiongenerale.php");
    include('modules/gestion/modeles/methodeGestion.php');
    include('modules/users/modeles/methodeUsers.php');
    include('modules/parametrage/modeles/methodeParametrage.php');
	include("globale/verification.php");
?>

<?php
	if(isset($_POST['action']) && $_POST['action'] =="remplir_semestre"){

        if(isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner")){
        
            $id_niveauetude = htmlspecialchars($_POST['id_niveauetude']);


                $sql="SELECT semestre FROM composer c, personne p
                        WHERE p.id_pers = c.id_etu
                        AND id_niveauetude = ?
                        GROUP BY semestre";

                $requete = AfficherTout($sql);
                $param = array($id_niveauetude); 
                //exécution de la requête de sélection et retour des résultats
                $requete->execute($param);

                $coun = $requete->rowCount();

                if($coun >0){

                        echo '<option>Selectionner</option>';

                    foreach($requete as $var){

                        echo '<option>'. $var['semestre'].'</option>';    
                
                    }

                }else{
                    echo '<option>Aucun semestre n\'est disponible.</option>'; 
                }

            
            
        }
    
    }
?>

<?php 
	if(isset($_POST['action']) && $_POST['action'] =="resultat_semestre"){
	
		if( 
			isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner") &&
			isset($_POST['semestre']) && ($_POST['semestre'] !="Selectionner")){

		  	//$id_filiere = htmlentities(htmlspecialchars($_POST['id_filiere']));
			$id_niveauetude = htmlentities(htmlspecialchars($_POST['id_niveauetude']));
		  	$semestre = htmlentities(htmlspecialchars($_POST['semestre']));
			  //isset($_POST['id_filiere']) && ($_POST['id_filiere'] !="Selectionner") &&
		  	echo '
		  	<hr>
		  	<p class="text-center" style="text-align:center;font-family:Times New Roman">Resultat de la composition des etudiants par ordre de merite.</p>
		  	<hr>
		  	<div class="table-responsive">
		    <table id="demo-dt-basic" class="table table-striped table-bordered">
		        <thead>
		            <tr class="bg-gray">
						<th>N°</th>
		                <th>Etudiant</th>
		                <th>Moyenne</th>
		                <th>Mention</th>
		                <th>Décision du juri</th>
		                <th></th>
		            </tr>
		        </thead>
		            <tbody>'; 
							// On recupere tous les etudiant qui on composer dans la salle selectionnée
			             	$sql = "SELECT *
										FROM personne e, composer c, matiere m, programme p, niveau_etude n, annee_academique a
										WHERE e.id_pers = c.id_etu 
										AND c.id_matiere = m.id_matiere 
										AND m.id_matiere = p.id_matiere 
										AND p.id_niveauetude = n.id_niveauetude
										AND n.id_niveauetude = e.id_niveauetude
										AND c.id_anneeAc = a.id_annee
										AND n.id_niveauetude = ?
										GROUP BY id_pers";

									//$note_final = 0;
									$requete = AfficherTout($sql);
									$param = array($id_niveauetude); 
									//exécution de la requête de sélection et retour des résultats
									$requete->execute($param);

									foreach($requete as $p){

										$id_pers = $p['id_pers'];
										$moyenne_finaleUE = 0;
										//Regroupement des UE programmé dans un niveau d'etude
										$sql3="SELECT *
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
										$requete3 = AfficherTout($sql3);
										$param3 = array($id_niveauetude,$semestre,$id_pers,$id_an); 
										//exécution de la requête de sélection et retour des résultats
										$requete3->execute($param3); 

										foreach($requete3 as $p3){
											$id_ue = $p3['id_ue'];

											$note_final = 0;

											$sql1 = "SELECT *
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
											//$note_final = 0;
											$requete1 = AfficherTout($sql1);
											$param1 = array($id_niveauetude,$semestre,$id_pers,$id_an,$id_ue); 
											//exécution de la requête de sélection et retour des résultats
											$requete1->execute($param1); 

											foreach($requete1 as $p1){
												//On recupere la note de l'examen et du devoir de l'etudiant
												$note_examen = getNoteExamenEtudiant($p1['id_pers'], $p1['semestre'], $p1['id_matiere']);
												$note_devoir = getNoteDevoirEtudiant($p1['id_pers'], $p1['semestre'], $p1['id_matiere']);
												//On recupere le coefficient de la matière du niveau d'etude de l'etudiant
												$coef_matiere = getCoefficientMatiere($p1['id_matiere'], $id_niveauetude); 
												//On calcule la moyenne finale de chaque matière, puis on fait leur somme
												$note_final = $note_final + (($note_examen + $note_devoir)/2)*$coef_matiere;

											}
											//Recuperation de la somme des coefficients des matières de l'UE.
											$somme_coefUE = getSommeCoefficientMatiereUE($id_ue,$id_niveauetude);
											//Determination de la moyenne finale de l'U.E.
											$moyenne_finaleUE = $moyenne_finaleUE + number_format($note_final/$somme_coefUE,2);

									}
							        //On compte le nombre de U.E enseigné dans un niveau d'etude.
									$nombreUE = nombreUE($id_niveauetude);
									//try{
										$moyenne_generale = number_format($moyenne_finaleUE/$nombreUE,2);
										// Mise a jour de la moyenne des l'etudiant.
							        	moyenneEtudiant($id_pers, $moyenne_generale, $semestre);
									/*}catch(Exception e){
										
									}*/
							         
								} 
						
									//Determination du rang de l'etudiant
							   		$rang = 0;
							        $sql2=" SELECT * FROM composer c, personne p 
							        			WHERE p.id_pers = c.id_etu
							        			AND id_niveauetude = ?
							        			AND semestre = ?
												AND c.id_anneeAc=?
							        			GROUP BY id_etu, semestre
							        			ORDER BY moyenne DESC";

							        $requete2 = AfficherTout($sql2);
									$param2 = array($id_niveauetude,$semestre,$id_an); 
									//exécution de la requête de sélection et retour des résultats
									$requete2->execute($param2); 

							        foreach ($requete2 as $value) { 

							        	$rang = $rang + 1;

							        	// Mise a jour du rang de l'etudiant
							        	rangEtudiant($value['id_etu'], $semestre, $rang);

							         echo '<tr>
													<td>'.$rang.'</td>
						                            <td>'.$value['nom_pers'].' '.$value['prenom_pers'].'</td>
						                            <td>'.$value['moyenne'].'</td>
						                            <td>'; ?>
						                            	<?php if($value['moyenne'] < 10 ){ 
						                            		 echo '<p>Insuffisant</p>'; 
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
						            				<td>'; 
						            									$table9 = "classe";
                                                                        $colonne9 = "id_classe"; 

                                                                        if($semestre =="Semestre I"){
                                                                            // Recuperation de lomyenne d'admission du trimestre I
                                                                            $val_recuperer9 = "moy_trim1";
                                                                            $moy_trim1=10;// getChampsParametrage($val_recuperer9, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                                            if($value['moyenne'] >= $moy_trim1){ 
                                                                            	if($value['sexe_pers'] =="Femme"){
                                                                            		echo 'Admise';
                                                                            	} else{
                                                                            		echo 'Admis';
                                                                            	}
                                                                            	
                                                                            }else{
                                                                            	if($value['sexe_pers'] =="Femme"){
                                                                            		echo 'Ajournée';
                                                                            	} else{
                                                                            		echo 'Ajourné';
                                                                            	} 
                                                                            	
                                                                            }

                                                                        }else if($semestre =="Semestre II"){ 
                                                                        	 // Recuperation de lomyenne d'admission du trimestre I
                                                                            $val_recuperer10 = "moy_trim2";
                                                                            $moy_trim2= 10;//getChampsParametrage($val_recuperer10, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                                            if($value['moyenne'] >= $moy_trim2){  
                                                                            	if($value['sexe_pers'] =="Femme"){
                                                                            		echo 'Admise';
                                                                            	} else{
                                                                            		echo '<b>Admis</b>';
                                                                            	}
                                                                            }else{ 
                                                                            	if($value['sexe_pers'] =="Femme"){
                                                                            		echo 'Ajournée';
                                                                            	} else{
                                                                            		echo 'Ajourné';
                                                                            	} 
                                                                            }
                                                                  		}else{ 
                                                                  			 // Recuperation de lomyenne d'admission du trimestre I
                                                                            $val_recuperer11 = "moy_trim3";
                                                                            $moy_trim3= 10;//getChampsParametrage($val_recuperer11, $table9, $colonne9, $id_classe);
                                                                            //On compaare la moyenne d'admission à celle de l'etudiant. 
                                                                            if($value['moyenne'] >= $moy_trim3){  
                                                                            	if($value['sexe_pers'] =="Femme"){
                                                                            		echo 'Admise';
                                                                            	} else{
                                                                            		echo 'Admis';
                                                                            	}
                                                                            }else{ 
                                                                            	if($value['sexe_pers'] =="Femme"){
                                                                            		echo 'Ajournée';
                                                                            	} else{
                                                                            		echo 'Ajourné';
                                                                            	} 
                                                                            }
                                                                   		} 
						            				 echo '</td>
						                            <td><a href="index.php?module=gestion&action=detail_resultat&cood='.$value['id_etu'].'&cood1='.$id_niveauetude.'&cood2='.$semestre.'" class="btn btn-default btn-xs text-center" style ="border-radius:5px"><i class="glyphicon glyphicon-eye-open"></i> Détails</a></td>
						                        </tr>';
						      }  
		         echo '</tbody>
		    </table>
		</div>'; 
	 }
	} 
?>




		