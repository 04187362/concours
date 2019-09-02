<?php

	include("connexion/connexiongenerale.php");
  	include('modules/gestion/modeles/methodeGestion.php');
  	include("modules/parametrage/modeles/methodeParametrage.php");
  	include('entites/ClsEmploiTemps.php');
  	include("globale/verification.php");
?>

<?php

	if(!empty($_POST['classe']) && !empty($_POST['heure_debut']) && !empty($_POST['heure_fin']))
		{

			// Recupere l'annee académique et de l'identetité du personne à partir de la session
			$id_annee=htmlspecialchars($id_an);
			$id_classe=htmlspecialchars($_POST['classe']);
			$heure_debut=htmlspecialchars($_POST['heure_debut']);
			$heure_fin=htmlspecialchars($_POST['heure_fin']);
			$lundi=htmlspecialchars($_POST['lundi']);
			$mardi=htmlspecialchars($_POST['mardi']);
			$mercredi=htmlspecialchars($_POST['mercredi']);
			$jeudi=htmlspecialchars($_POST['jeudi']);
			$vendredi=htmlspecialchars($_POST['vendredi']);
			$samedi=htmlspecialchars($_POST['samedi']);

			$table = "emploi_temps";
			$colonne1 = "heure_debut";
			$colonne2 = "heure_fin";
			$colonne3 = "id_classe";
			$colonne4 = "id_anneeAc";

			if(existanceChampsGestion5($table, $colonne1, $heure_debut, $colonne2, $heure_fin, $colonne3, $id_classe, $colonne4, $id_annee)==0){

					$emploi_temps = new EmploiTemps();

					$emploi_temps->setHeure_debut($heure_debut);
					$emploi_temps->setHeure_fin($heure_fin);
					$emploi_temps->setAnneeAc($id_annee);
					$emploi_temps->setClasse($id_classe);
					$emploi_temps->setLundi($lundi);
					$emploi_temps->setMardi($mardi);
					$emploi_temps->setMercredi($mercredi);
					$emploi_temps->setJeudi($jeudi);
					$emploi_temps->setVendredi($vendredi);
					$emploi_temps->setSamedi($samedi);

					$count = $emploi_temps->ajouterEmploiTemps();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Emploi du temps crée avec succès</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion a échouée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange">Vous avez dejà enregistré une matières à la même heure, même classe et même année.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>