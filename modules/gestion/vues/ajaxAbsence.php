<?php

    include("connexion/connexiongenerale.php");
    include("modules/parametrage/modeles/methodeParametrage.php");
    include("modules/gestion/modeles/methodeGestion.php");
    include("modules/users/modeles/methodeUsers.php");


    // Recuperation des matiere qui sont programmés dans la classe selectionnée

    if(isset($_POST['action']) && $_POST['action'] =="absence"){

        if(isset($_POST['date_abs']) && isset($_POST['heure_debut']) &&  isset($_POST['heure_fin']) && isset($_POST['id_ens'])){
        
            $date_abs =htmlentities(htmlspecialchars($_POST['date_abs']));
            $heure_debut = htmlentities(htmlspecialchars($_POST['heure_debut']));
            $id_ens = htmlentities(htmlspecialchars($_POST['id_ens']));
            $heure_fin = htmlentities(htmlspecialchars($_POST['heure_fin']));
            // Recuperartion de la classe de la classe ou enseigne l'enseignant selectionné

            $requete = "SELECT id_niveauetude FROM emaragement WHERE id_ens=? AND date_em=? AND heure_debut=? AND heure_fin=?";
            $param = array($id_ens,$date_abs,$heure_debut,$heure_fin);

            $requete1 = "SELECT id_em FROM emargement WHERE id_ens=? AND date_em=? AND heure_debut=? AND heure_fin=?";
            $param1 = array($id_ens,$date_abs,$heure_debut,$heure_fin);
            // Recuperation de l'identifiant de la classe ou l'enseignant selectionné a enseigné a la date et heures qui sont specifiées.
            $id_niveauetude = getChampsGestion($requete,$param);
            // Recuperation de l'identifiant d'emargement' ou l'enseignant selectionné a enseigné a la date et l'heures  specifiées.
            $id_em = getChampsGestion($requete1,$param1);
            

            $sql2="SELECT * FROM emargement
						WHERE id_ens = ?
                        AND date_em = ?
                        AND heure_debut = ?
                        AND heure_fin = ?";

                $requete2 = AfficherTout($sql2);
                $param2 = array($id_ens,$date_abs,$heure_debut,$heure_fin); 
                //exécution de la requête de sélection et retour des résultats
                $requete2->execute($param2);
                $count2 = $requete2->rowCount();

                $total_general = 0;

                if($count2 >0){



                    echo ' 
                    	<h4>Information sur la seance </h4>
                    		<div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th class="text-center">Heures effectuées</th>
                                                <th class="text-center">Titre du cours</th>
                                                <th class="text-center">Date emargée</th>
                                                <th class="text-center">Heure debut</th>
                                                <th class="text-center">Heure fin</th>
                                            </tr>
                                        </thead>
                                        <tbody>'; ?>
                                            <?php 

                                                while($tab=$requete2->fetch()){
                                            ?>
                                            
                                            <?php echo '
                                            <tr>
                                                <td class="text-center">'.$tab['heure_effectue'].' heure</td>
                                                <td class="text-center">'.$tab['titre_cours'].'</td>
                                                <td class="text-center">'.$tab['date_em'].'</td>
                                                <td class="text-center">'.$tab['heure_debut'].'</td>
                                                <td class="text-center">'.$tab['heure_fin'].'</td>
                                            </tr>'; ?>
                                            <?php } ?>
                            <?php echo'</tbody>
                                    </table>
                            </div>';



                            echo ' 
                            	<h4>Liste des etudiants </h4>
                            	<div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th class="text-center">Noms</th>
                                                <th class="text-center">Prénoms</th>
                                                <th class="text-center">Affecter une absence</th>
                                                <th class="text-center">Absence déjà affectée</th>
                                            </tr>
                                        </thead>
                                        <tbody>'; ?>
                                            <?php 

                                            	$sql3 = "SELECT * FROM Personne p, inscription i 
                                            				WHERE i.id_etu = p.id_pers
                                            				AND id_niveauetude =?";

                                            	$requete3 = AfficherTout($sql3);
                                                $param3 = array($id_niveauetude); 
                                                //exécution de la requête de sélection et retour des résultats
                                                $requete3->execute($param3);

                                               while($tablo=$requete3->fetch()){

                                                // Verifiant si l'etudiant est absent
                                                $requete4 = "SELECT * FROM absence_etudiant WHERE id_etu=? AND id_em=?";
                                                $param4 = array($tablo['id_pers'],$id_em);
                                                $constante = existanceGestion($requete4,$param4);
                                            ?>
                                            
                                            <?php echo '
                                            <tr>
                                                <td class="text-center">'.$tablo['nom_pers'].'</td>
                                                <td class="text-center">'.$tablo['prenom_pers'].'</td>'; ?>
                                                <?php if($constante==0){ ?>
                                                    <?php   
                                                        echo '
                                                            <td class="text-center"><a href="index.php?module=gestion&action=affecter_absence&cood='.$tablo['id_etu'].'&cood1='.$id_em.'" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="fa fa-flash"></i></a></td> 
                                                            <td class="text-center"></td>';
                                                    ?>
                                                <?php }else{ ?>
                                                    <?php   
                                                        echo '
                                                            <td class="text-center"></td>
                                                            <td class="text-center"><span class="fa fa-remove text-danger"></span></td>'; 
                                                    ?>
                                                <?php } ?>
                                  
                                        <?php echo '</tr>'; ?>
                                            <?php } ?>
                            <?php echo'</tbody>
                                    </table>
                            </div>'; 
 

               }else{ 
                    echo '<div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th>Heures effectuées</th>
                                                <th>Titre cours</th>
                                                <th>Date emargée</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="text-center">Aucune seance n\'a été effectué.</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                        </div>';
                } 

            
            
        }
    
    }


    if(isset($_POST['action']) && $_POST['action'] =="classe"){

        if(isset($_POST['id_classe']) && isset($_POST['id_ens']) && ($_POST['id_classe'] !="Selectionner")){
        
            $id_classe = htmlspecialchars($_POST['id_classe']);
            $enseignant = htmlspecialchars($_POST['id_ens']);

            $requete="SELECT m.id_matiere, lib_matiere FROM enseigner e, matiere m
                        WHERE e.id_matiere = m.id_matiere
                        AND id_classe = '$id_classe'
                        AND id_ens = '$enseignant'";

                $resultat = Selection($requete);

                $count = $resultat->rowCount();

                if($count >0){

                        echo '<option>Selectionner</option>';

                    foreach($resultat as $c){

                        echo '<option value ="'.$c['id_matiere'].'">'.$c['lib_matiere'].'</option>';    
                
                    }

                }else{
                    echo '<option><i style ="color : red">Aucune matière n\'a été enregistrée.</i></option>'; 
                }

        }else{


        }
    }


    // Affichage des etudiant qui ont absenté dans selectionné dans la classe ou l'enseignant selectionné enseigne.

    if(isset($_POST['action']) && $_POST['action'] =="matiere"){

        if(isset($_POST['id_niveauetude']) && isset($_POST['id_ens']) &&  isset($_POST['id_matiere']) && ($_POST['id_matiere'] !="Selectionner")){
        
            $id_niveauetude =htmlentities(htmlspecialchars($_POST['id_niveauetude']));
            $id_ens = htmlentities(htmlspecialchars($_POST['id_ens']));
            $id_matiere = htmlentities(htmlspecialchars($_POST['id_matiere']));

            $sql2="SELECT * FROM absence_etudiant a, emargement e, personne p
                   WHERE e.id_em = a.id_em
                   AND p.id_pers = a.id_etu
                   AND id_ens = ?
                   AND id_matiere = ?
                   AND p.id_niveauetude = ?";

                $requete2 = AfficherTout($sql2);
                $param2 = array($id_ens,$id_matiere,$id_niveauetude); 
                //exécution de la requête de sélection et retour des résultats
                $requete2->execute($param2);

                $count2 = $requete2->rowCount();

                if($count2 >0){



                    echo ' 
                        <h4><b>Liste des absences des etudiants </b></h4>
                            <div class="table-responsive">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th class="text-center">Etudiant</th>
                                                <th class="text-center">Titre du cours</th>
                                                <th class="text-center">Type seance</th>
                                                <th class="text-center">Date cours</th>
                                                <th class="text-center">Heure debut</th>
                                                <th class="text-center">Heure fin</th>
                                                <th class="text-center">Just</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>'; ?>
                                            <?php 

                                                while($tab=$requete2->fetch()){
                                            ?>
                                            
                                            <?php echo '
                                            <tr>
                                                <td class="text-center">'. $tab['nom_pers'].' '.$tab['prenom_pers'].'</td>
                                                <td class="text-center">'.$tab['titre_cours'].'</td>
                                                <td class="text-center">'.$tab['type_seance'].'</td>
                                                <td class="text-center">'.date('d-m-Y', strtotime($tab['date_em'])).'</td>
                                                <td class="text-center">'.$tab['heure_debut'].'</td>
                                                <td class="text-center">'.$tab['heure_fin'].'</td>
                                                <td class="text-center">'.$tab['justification'].'</td>
                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=editer_absEtudiantEns&cood='.$tab['id_abs'].'" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <a  class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target=".'.$tab['id_abs'].'sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <div class="modal fade '.$tab['id_abs'].'sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Suppression d\'une absence</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=absence&parasup='.$tab['id_abs'].'" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                      <div>
                                                                            <table>
                                                                                <tr>
                                                                                    <td><b>Identifiant : </b></td><td>'.$tab['id_abs'].'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>Nom : </b></td><td>'.$tab['nom_pers'].'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>Prénom : </b></td><td>'.$tab['prenom_pers'].'</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td><b>Matière : </b></td><td>'.$tab['id_matiere'].'</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>Date du cours : </b></td><td>'.$tab['date_em'].'</td>
                                                                                </tr>
                                                                            </table><br>
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
                                        } ?>
                            <?php echo'</tbody>
                                    </table>
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
                                                <td colspan="5" class="text-center">Aucune absence n\'a été enregistrée.</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                        </div>';
                } 

            
            
        }
    
    }


 ?>