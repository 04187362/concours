
<?php
if (!empty($_GET['action']))
{
	//Récupération de l'action
	$action = $_GET['action'];

	switch($action)
	{
	
		//------------------------Abonnement-----------------
		
		//pays
		
		

		case 'pays_concours':
		{
			include("vues/v_pays_concours.php");
			break;
			
		}
		case 'pays':
		{
			include("vues/v_pays.php");
			break;
			
		}

		case 'savePays':
		{
			include("vues/savePays.php");
			break;
			
		}

		case 'saisie_pays':
		{
			include("vues/v_saisie_pays.php");
			break;
			
		}

		case 'saisie_paysConcours':
		{
			include("vues/v_saisie_paysConcours.php");
			break;
			
		}

		case 'editer_pays':
		{
			include("vues/v_editer_pays.php");
			break;
			
		}

		case 'editer_paysConcours':
		{
			include("vues/v_editer_paysConcours.php");
			break;
			
		}

		case 'updatePays':
		{
			include("vues/updatePays.php");
			break;
			
		}


		// Heure

		case 'heure':
		{
			include("vues/v_heure.php");
			break;
			
		}

		case 'saveHeure':
		{
			include("vues/saveHeure.php");
			break;
			
		}

		case 'edit_heure':
		{
			include("vues/edit_heure.php");
			break;
			
		}

		case 'updateHeure':
		{
			include("vues/updateHeure.php");
			break;
			
		}


		//annee
		case 'annee':
		{
			include("vues/v_annee.php");
			break;
			
		}

		case 'saveAnnee':
		{
			include("vues/saveAnnee.php");
			break;
			
		}


		case 'edit_annee':
		{
			include("vues/edit_annee.php");
			break;
			
		}

		case 'updateAnnee':
		{
			include("vues/updateAnnee.php");
			break;
			
		}

		case 'selectionnerAnnee':
		{
			include("vues/selectionnerAnnee.php");
			break;
			
		}

		//matiere
		case 'matiere':
		{
			include("vues/v_matiere.php");
			break;
			
		}

		case 'saveMatiere':
		{
			include("vues/saveMatiere.php");
			break;
			
		}

		case 'saisie_matiere':
		{
			include("vues/v_saisie_matiere.php");
			break;
			
		}

		case 'editer_matiere':
		{
			include("vues/v_editer_matiere.php");
			break;
			
		}

		case 'updateMatiere':
		{
			include("vues/updateMatiere.php");
			break;
			
		}

		//frait
		case 'frait':
		{
			include("vues/v_frait.php");
			break;
			
		}

		case 'frais_concours':
		{
			include("vues/v_frais_concours.php");
			break;
			
		}

		case 'saveFrait':
		{
			include("vues/saveFrait.php");
			break;
			
		}


		case 'editer_frais':
		{
			include("vues/v_editer_frais.php");
			break;
			
		}

		case 'editer_fraisConcours':
		{
			include("vues/v_editer_fraisConcours.php");
			break;
			
		}

		case 'saisie_frais':
		{
			include("vues/v_saisie_frais.php");
			break;
			
		}

		case 'saisie_fraisConcours':
		{
			include("vues/v_saisie_fraisConcours.php");
			break;
			
		}

		case 'updateFrait':
		{
			include("vues/updateFrait.php");
			break;
			
		}

		//fAnnée académique
		case 'anneeAcademique':
		{
			include("vues/v_anneeAcademique.php");
			break;
			
		}

		case 'anneeAcadConcours':
		{
			include("vues/v_anneeAcadConcours.php");
			break;
			
		}

		case 'anneeAcadConcours':
		{
			include("vues/v_anneeAcadConcours.php");
			break;
			
		}

		case 'miseAjourAnneeAcademique':
		{
			include("vues/miseAjourAnneeAcademique.php");
			break;
			
		}

		case 'actualiserAnneAcademique':
		{
			include("vues/actualiserAnneAcademique.php");
			break;
			
		}


		case 'editer_anneeAcademique':
		{
			include("vues/v_editer_anneeAcademique.php");
			break;
			
		}

		case 'editer_anneeAcadConcours':
		{
			include("vues/v_editer_anneeAcadConcours.php");
			break;
			
		}

		case 'saisie_anneeAcademique':
		{
			include("vues/v_saisie_anneeAcademique.php");
			break;
			
		}

		case 'saisie_anneeAcadConcours':
		{
			include("vues/v_saisie_anneeAcadConcours.php");
			break;
			
		}

		case 'saveAnneeAcademique':
		{
			include("vues/saveAnneeAcademique.php");
			break;
			
		}

		case 'updateAnneeAcademique':
		{
			include("vues/updateAnneeAcademique.php");
			break;
			
		}

		// Image

		case 'ajouter_evenement':
		{
			include("vues/ajouter_evenement.php");
			break;
			
		}

		case 'saveEvenement':
		{
			include("vues/saveEvenement.php");
			break;
			
		}

		// Niveau etude
		case 'niveauEtude':
		{
			include("vues/v_niveauEtude.php");
			break;
			
		}

		case 'saveNiveauEtude':
		{
			include("vues/saveNiveauEtude.php");
			break;
			
		}


		case 'editer_niveauEtude':
		{
			include("vues/v_editer_niveauEtude.php");
			break;
			
		}

		case 'saisie_niveauEtude':
		{
			include("vues/v_saisie_niveauEtude.php");
			break;
			
		}

		case 'updateNiveauEtude':
		{
			include("vues/updateNiveauEtude.php");
			break;
			
		}

		//Matiere concours
		case 'matiereConcours':
		{
			include("vues/v_matiereConcours.php");
			break;
			
		}

		case 'saveMatiereConcours':
		{
			include("vues/saveMatiereConcours.php");
			break;
			
		}

		case 'saisie_matiereConcours':
		{
			include("vues/v_saisie_matiereConcours.php");
			break;
			
		}

		case 'editer_matiereConcours':
		{
			include("vues/v_editer_matiereConcours.php");
			break;
			
		}

		case 'updateMatiereConcours':
		{
			include("vues/updateMatiereConcours.php");
			break;
			
		}

		//Type de formation
		case 'typeFormation':
		{
			include("vues/v_typeFormation.php");
			break;
			
		}


		case 'saveTypeFormation':
		{
			include("vues/saveTypeFormation.php");
			break;
			
		}

		case 'saisie_typeFormation':
		{
			include("vues/v_saisie_typeFormation.php");
			break;
			
		}

		case 'editer_typeForConcours':
		{
			include("vues/v_editer_typeForConcours.php");
			break;
			
		}

		case 'updateTypeFormation':
		{
			include("vues/updateTypeFormation.php");
			break;
			
		}

		//Cycle
		case 'cycle':
		{
			include("vues/v_cycle.php");
			break;
			
		}

		case 'saveCycle':
		{
			include("vues/saveCycle.php");
			break;
			
		}

		case 'saisie_cycle':
		{
			include("vues/v_saisie_cycle.php");
			break;
			
		}

		case 'editer_cycle':
		{
			include("vues/v_editer_cycle.php");
			break;
			
		}

		case 'updateCycle':
		{
			include("vues/updateCycle.php");
			break;
			
		}

		//Unité enseignement
		case 'uniteEnseignement':
		{
			include("vues/v_uniteEnseignement.php");
			break;
			
		}

		case 'detail_uniteEnseignement':
		{
			include("vues/v_detail_uniteEnseignement.php");
			break;
			
		}

		case 'saveUniteEnseignement':
		{
			include("vues/saveUniteEnseignement.php");
			break;
			
		}

		case 'saisie_uniteEnseignement':
		{
			include("vues/v_saisie_uniteEnseignement.php");
			break;
			
		}

		case 'editer_uniteEnseignement':
		{
			include("vues/v_editer_uniteEnseignement.php");
			break;
			
		}

		case 'updateUniteEnseignement':
		{
			include("vues/updateUniteEnseignement.php");
			break;
			
		}

		//Filière
		case 'filiere':
		{
			include("vues/v_filiere.php");
			break;
			
		}

		case 'filiere_concours':
		{
			include("vues/v_filiere_concours.php");
			break;
			
		}

		case 'saveFiliere':
		{
			include("vues/saveFiliere.php");
			break;
			
		}

		case 'saisie_filiereConcours':
		{
			include("vues/v_saisie_filiereConcours.php");
			break;
			
		}

		case 'editer_filiereConcours':
		{
			include("vues/v_editer_filiereConcours.php");
			break;
			
		}

		case 'updateFiliere':
		{
			include("vues/updateFiliere.php");
			break;
			
		}

		//Page chargée par défaut si l'action est inconnue
		
		default:
		{
			include("vues/accueil.php");
			break;
		}
	}
}

//Si l'action n'est pas spécifiée
else
{
	include("vues/v_accueil.php");
}
?>