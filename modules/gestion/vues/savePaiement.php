<?php
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
	include("entites/ClsPaiement.php");
	include("globale/verification.php");

	if(!empty($_POST['mois']) && !empty($id_an) && !empty($_POST['etudiant']) && !empty($_POST['frait']) && !empty($id_personne))
		{
			// Recupere l'annee académique et de l'identetité du personne à partir de la session
			$id_annee=htmlspecialchars($id_an);
			$mois=htmlspecialchars($_POST['mois']);
			$etudiant=htmlspecialchars($_POST['etudiant']);
			$frait=htmlspecialchars($_POST['frait']);
			$id_pers=htmlspecialchars($id_personne);

			$table1 = "paiement";
			$colonne1 = "id_etu";
			$colonne2 = "id_annee";

			$val_recuperer1 = "nom_pers";
			$val_recuperer2 = "prenom_pers";
			$colonne3 = "id_pers";
			$table2 = "personne";

			$colonne4 = "mois";

			$nom_etu = getChampsGestion($val_recuperer1, $table2, $colonne3, $etudiant);
			$prenom_etu = getChampsGestion($val_recuperer2, $table2, $colonne3, $etudiant);
			// Verifions si l'etudiant a deja paye ou pas
			if(existanceChampsGestion($table1, $colonne1, $etudiant, $colonne2, $id_annee, $colonne4, $mois)==0){

					$paiement = new Paiement();

					$paiement->setAnnee($id_annee);
					$paiement->setMois($mois);
					$paiement->setEtudiant($etudiant);
					$paiement->setFrait($frait);
					$paiement->setPersonnel($id_pers);

					$count = $paiement->ajouterPaiement();

					if($count>0){

						echo '<div style="text-align:center" class="text-mint"><b>Paiement créée avec succès.</b></div>';
					
					}else{

						echo '<div style="text-align:center; color:orange"><b>L\'insertion a echouée.</b></div>';
					
					}
					
			}else{
					echo '<div style="text-align:center; color:orange"><span style="color:yellow">'.$nom_etu.' '.$prenom_etu.'</span> a déjà payé le mois de '.$mois.'.</div></div>';
			}						
		
			
		}
		else
		{
			
			echo '<div style="text-align:center; color:orange"><b>Tous les champs sont obligatoires.</b></div>';
		}

?>