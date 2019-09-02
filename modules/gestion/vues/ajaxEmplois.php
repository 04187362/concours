<?php

    include("connexion/connexiongenerale.php");
    include('modules/gestion/modeles/methodeGestion.php');
    include('modules/parametrage/modeles/methodeParametrage.php');
    include('entites/ClsEmploiTemps.php');
    include('globale/verification.php');
?>

<?php if( isset($_POST['action']) && ($_POST['action'] =="niveauetude") && isset($_POST['id_niveauetude']) && ($_POST['id_niveauetude'] !="Selectionner")){

  $id_niveauetude = htmlspecialchars($_POST['id_niveauetude']);

  echo '<div style="padding-bottom: 10px">
    <a href="index.php?module=gestion&action=saisie_emploi_temps" class="btn btn-mint btn-sm" style ="border-radius:5px; margin-left:10px">
      <i class="glyphicon glyphicon-plus"></i>
    </a>
</div>
<div class="table-responsive">
    <table id="demo-dt-basic" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">Horaire</th>
                <th class="text-center">Lundi</th>
                <th class="text-center">Mardi</th>
                <th class="text-center">Mercredi</th>
                <th class="text-center">Jeudi</th>
                <th class="text-center">Vendredi</th>
                <th class="text-center">Samedi</th>
                <th class="text-center"></th>
            </tr>
        </thead>
    <tbody>'; ?>

          <?php
              $sql = "SELECT * FROM emploi_temps
                        WHERE id_niveauetude=?
                        AND id_anneeAc=?";
              $requete = afficherTout($sql); 
              $param = array($id_niveauetude,$id_an);
              //exécution de la requête de sélection et retour des résultats
              $requete->execute($param);
              //Conservation lignes par ligne des élements retournés
              foreach($requete as $tablo){

                $requete1 = "SELECT lib_matiere FROM matiere WHERE id_matiere=?";
                $param1 = array($tablo['lundi']);
                $param2 = array($tablo['mardi']);
                $param3 = array($tablo['mercredi']);
                $param4 = array($tablo['jeudi']);
                $param5 = array($tablo['vendredi']);
                $param6 = array($tablo['samedi']);
                
          ?>
                                <?php echo' <tr>
                                                <td class="text-center">'.$tablo['heure_debut'].' - '.$tablo['heure_fin'].'</td>
                                                <td class="text-center">'.getChampsParametrage($requete1,$param1).'</td>
                                                <td class="text-center">'.getChampsParametrage($requete1,$param2).'</td>
                                                <td class="text-center">'.getChampsParametrage($requete1,$param3).'</td>
                                                <td class="text-center">'.getChampsParametrage($requete1,$param4).'</td>
                                                <td class="text-center">'.getChampsParametrage($requete1,$param5).'</td>
                                                <td class="text-center">'.getChampsParametrage($requete1,$param6).'</td>

                                                <td class="text-center">
                                                    <a href="index.php?module=gestion&action=editer_emploi_temps&cood='.$tablo['id_emploi'].'" class="btn btn-warning btn-xs" style ="border-radius:5px"><i class="glyphicon glyphicon-pencil"></i></a> 
                                                    <a  class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target=".'.$tablo['id_emploi'].'sbs-example-modal-lg"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <div class="modal fade '.$tablo['id_emploi'].'sbs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                          <div class="modal-content">

                                                            <div class="modal-header" style ="background-color:rgb(155,40,20); color:white">
                                                              <button type="button" class="close badge" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                              </button>
                                                              <h4 class="modal-title" id="myModalLabel"><center>Supprimer emploi du temps</center></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form  method="POST" action="index.php?module=gestion&action=emploi_temps&&parasup='.$tablo['id_emploi'].'" class="form-horizontal form-label-left input_mask">
                                                                <center>
                                                                    <div class="form-group">
                                                                      <div class="table-responsive">
                                                                         <table>
                                                                              <tr>
                                                                                  <td><b>Identifiant : </b></td><td>'.$tablo['id_emploi'].'</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td><b>Heure : </b></td><td>'.$tablo['heure_debut'].' - '.$tablo['heure_fin'].'</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td><b>Lundi : </b></td><td>'.getChampsParametrage($requete1,$param1).'</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td><b>Mardi : </b></td><td>'.getChampsParametrage($requete1,$param2).'</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td><b>Mercredi : </b></td><td>'.getChampsParametrage($requete1,$param3).'</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td><b>Jeudi : </b></td><td>'.getChampsParametrage($requete1,$param4).'</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td><b>Vendredi : </b></td><td>'.getChampsParametrage($requete1,$param5).'</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td><b>Samedi : </b></td><td>'.getChampsParametrage($requete1,$param6).'</td>
                                                                              </tr>
                                                                              
                                                                          </table><br/>
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
                                            </tr>'; ?>
                <?php } ?>
        <?php echo '</tbody>
    </table>
</div>'; ?>

<?php }else{

    $id_classe = htmlspecialchars($_POST['id_classe']);
    $id_ens = htmlspecialchars($_POST['enseignant']);

  echo '
        <div class="table-responsive">
            <table id="demo-dt-basic" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Horaire</th>
                        <th class="text-center">Lundi</th>
                        <th class="text-center">Mardi</th>
                        <th class="text-center">Mercredi</th>
                        <th class="text-center">Jeudi</th>
                        <th class="text-center">Vendredi</th>
                        <th class="text-center">Samedi</th>
                    </tr>
                </thead>
                <tbody>'; ?>

                  <?php
                      $table ="emploi_temps";
                      $colonne ="id_classe";
                      $value = "id_emploi";
                      $resultat = afficherTableGestion1($table, $colonne, $id_classe, $value); 
                      foreach($resultat as $tablo){

                        $colonne2 = "id_matiere";
                        $table2 ="matiere";
                        $get_value2 = "lib_matiere";
                   echo' <tr>
                            <td class="text-center">'.$tablo['heure_debut'].' - '.$tablo['heure_fin'].'</td>'; ?>
                              <?php
                                  $table3 = "enseigner";
                                  $colonne3 = "id_matiere";
                                  $get_value3 = "id_ens";
                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
                                  if($id_ens == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['lundi'])){ 
                              ?>
                                      <?php echo '<td class="text-primary text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['lundi']).'</td>'; ?>

                              <?php }else{ ?>
                                      <?php echo '<td class="text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['lundi']).'</td>'; ?>
                              <?php } ?>

                              <?php
                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
                                  if($id_ens == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['mardi'])){ 
                              ?>
                                      <?php echo '<td class="text-primary text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['mardi']).'</td>'; ?>

                              <?php }else{ ?>
                                      <?php echo '<td class="text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['mardi']).'</td>'; ?>
                              <?php } ?>

                              <?php
                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
                                  if($id_ens == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['mercredi'])){ 
                              ?>
                                      <?php echo '<td class="text-primary text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['mercredi']).'</td>'; ?>

                              <?php }else{ ?>
                                      <?php echo '<td class="text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['mercredi']).'</td>'; ?>
                              <?php } ?>

                              <?php
                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
                                  if($id_ens == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['jeudi'])){ 
                              ?>
                                      <?php echo '<td class="text-primary text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['jeudi']).'</td>'; ?>

                              <?php }else{ ?>
                                      <?php echo '<td class="text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['jeudi']).'</td>'; ?>
                              <?php } ?>

                              <?php
                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
                                  if($id_ens == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['vendredi'])){ 
                              ?>
                                      <?php echo '<td class="text-primary text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['vendredi']).'</td>'; ?>

                              <?php }else{ ?>
                                      <?php echo '<td class="text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['vendredi']).'</td>'; ?>
                              <?php } ?>

                              <?php
                                  // Je recuppere l'identifiant de l'enseignant puis comparant ce dernier est egale a l'enseignant selectionne.
                                  if($id_ens == getChampsGestion2($get_value3, $table3, $colonne, $id_classe, $colonne3, $tablo['samedi'])){ 
                              ?>
                                      <?php echo '<td class="text-primary text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['samedi']).'</td>'; ?>

                              <?php }else{ ?>
                                      <?php echo '<td class="text-center">'.getChampsParametrage($get_value2, $table2, $colonne2, $tablo['samedi']).'</td>'; ?>
                              <?php } ?>
                                      
                
                    <?php echo '</tr>';  
                } ?>
      <?php echo '</tbody>
            </table>
        </div>
        <div class="text-right">
          <a class="btn btn-mint bn-xs" href="index.php?module=users&action=imprimer_emploiTempsEns&cood='.$id_classe.'"><i class="fa fa-print"></i> Imprimer</a>
        </div> 
      '; ?>

<?php  } ?>

