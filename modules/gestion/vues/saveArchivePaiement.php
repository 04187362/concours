<?php
	
	include("modules/gestion/modeles/methodeGestion.php");
	include("modules/parametrage/modeles/methodeParametrage.php");
	include("modules/users/modeles/methodeUsers.php");

	include("entites/ClsArchivePaiement.php");
?>

<?php
	
	if(isset($_POST['annee'])){

              	$annee = htmlspecialchars($_POST['annee']);
              	// Recuperation du libelle de l'annee academique
              	$table = "annee_academique";
              	$colonne = "id_annee";
              	$val_recupere = "lib_annee";
              	$lib_annee = getChampsParametrage($val_recupere, $table, $colonne, $annee);
                // Recuperation de la somme totale du paiement des etudiant pourb une année scolaire donnée.
				$somme = sommeTotalPaiementEtudiant($annee);
				// Recuperation du nombre d'etudaint inscris dans tout etablissement;
				$table1 = "inscription";
				$effectif_ins =  getNombreLigneGestion1($table1);

				$archive = new ArchivePaiement();

		        $archive->setMontant($somme);

				$archive->setAnneeAc($lib_annee);

		        $archive->setNbreetu_ins($effectif_ins);

		        $count = $archive->ajouterArchivePaiement();
		        
		        // Cette methode retourne le nombre total de paiement des etudiants
		        $table2 = "paiement";
				$nbr_total = getNombreLigneGestion1($table2);
		        //Suppression des paiements des etudiants pour une année donnée
		        $nbre_paiementSupp = supprimePaiementEtudiant($annee);

		        if($count > 0){

		        	if($nbre_paiementSupp == $nbr_total){
		        		echo '
						<p style="color:white" class="text-center">Vous avez inserez <b>'.$count.'</b> ligne(s) sur <b>'.$count.'</b></p>
						<p style="color:white" class="text-center">Puis vous avez supprimez <b>'.$nbre_paiementSupp.'</b> ligne(s) sur <b>'.$nbr_total.'</b></p>
						<div style="text-align:center" class="text-mint">
							<b>Ce qui justifie que le succès de l\'archivage.</b>
						</div>';
		        	}else{
		        		echo '
						<p style="color:white" class="text-center">Vous avez inserez <b>'.$count.'</b> ligne(s) sur <b>'.$count.'</b></p>
						<p style="color:white" class="text-center">Puis vous avez supprimez <b>'.$nbre_paiementSupp.'</b> ligne(s) sur <b>'.$nbr_total.'</b></p>
						<div style="text-align:center; color:yellow">
							<b>Ce qui justifie que l\'archivage n\'a pas été bien fait.</b>
						</div>';
		        	}
								
				}else{
					echo '<div style="text-align:center; color:orange"><b>L\'opération a échouée.</b></div>';	
				}

    }

?>