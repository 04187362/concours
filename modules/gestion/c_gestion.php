
<?php
if (!empty($_GET['action']) && isset($_GET['action']))
{
	//Récupération de l'action
	
	$action = $_GET['action'];
	switch($action)
	{
	
		//------------------------Abonnement-----------------


		//Emplo du temps
		case 'emploi_temps':
		{
			include("vues/v_emploi_temps.php");
			break;
			
		}


		case 'saisie_emploi_temps':
		{
			include("vues/v_saisie_emploi_temps.php");
			break;
			
		}

		case 'emploiTempsParent':
		{
			include("vues/emploiTempsParent.php");
			break;
			
		}

		case 'editer_emploi_temps':
		{
			include("vues/v_editer_emploi_temps.php");
			break;
			
		}

		case 'saveEmploiTemps':
		{
			include("vues/saveEmploiTemps.php");
			break;
			
		}

		case 'emploiTempsEnseignant':
		{
			include("vues/emploiTempsEnseignant.php");
			break;
			
		}

		case 'emploiTempsEtudiant':
		{
			include("vues/emploiTempsEtudiant.php");
			break;
			
		}

		// Inscription

		case 'inscription':
		{
			include("vues/v_inscription.php");
			break;
			
		}

		case 'detail_inscription':
		{
			include("vues/v_detail_inscription.php");
			break;
			
		}

		case 'saisie_inscription':
		{
			include("vues/v_saisie_inscription.php");
			break;
			
		}

		case 'editer_inscription':
		{
			include("vues/v_editer_inscription.php");
			break;
			
		}

		case 'saveInscription':
		{
			include("vues/saveInscription.php");
			break;
			
		}

		// Paiement

		case 'paiement1':
		{
			include("vues/v_paiement1.php");
			break;
			
		}

		case 'paiement2':
		{
			include("vues/v_paiement2.php");
			break;
			
		}

		case 'saisie_paiement':
		{
			include("vues/v_saisie_paiement.php");
			break;
			
		}

		case 'editer_paiement':
		{
			include("vues/v_editer_paiement.php");
			break;
			
		}

		case 'savePaiement':
		{
			include("vues/savePaiement.php");
			break;
			
		}

		case 'paiementParent':
		{
			include("vues/paiementParent.php");
			break;
			
		}

		case 'paiementEtudiant':
		{
			include("vues/paiementEtudiant.php");
			break;
			
		}

		// Programme

		case 'programme':
		{
			include("vues/v_programme.php");
			break;
			
		}

		case 'detail_programme':
		{
			include("vues/v_detail_programme.php");
			break;
			
		}

		case 'saisie_programme':
		{
			include("vues/v_saisie_programme.php");
			break;
			
		}

		case 'editer_programme':
		{
			include("vues/v_editer_programme.php");
			break;
			
		}

		case 'saveProgramme':
		{
			include("vues/saveProgramme.php");
			break;
			
		}

		// composition

		case 'composition':
		{
			include("vues/v_composition.php");
			break;
			
		}

		case 'detail_composition':
		{
			include("vues/v_detail_composition.php");
			break;
			
		}

		case 'saisie_composition':
		{
			include("vues/v_saisie_composition.php");
			break;
			
		}

		case 'saisie_compEns':
		{
			include("vues/v_saisie_compEns.php");
			break;
			
		}

		case 'editer_composition':
		{
			include("vues/v_editer_composition.php");
			break;
			
		}

		case 'editer_compEns':
		{
			include("vues/v_editer_compEns.php");
			break;
			
		}

		case 'saveComposition':
		{
			include("vues/saveComposition.php");
			break;
			
		}

		case 'compositionEnseignant1':
		{
			include("vues/compositionEnseignant1.php");
			break;
			
		}

		case 'compositionEnseignant2':
		{
			include("vues/compositionEnseignant2.php");
			break;
			
		}

		case 'saisie_compositionEns':
		{
			include("vues/saisie_compositionEns.php");
			break;
			
		}

		case 'editer_compositionEns':
		{
			include("vues/editer_compositionEns.php");
			break;
			
		}

		case 'compoEtudiantParent':
		{
			include("vues/compoEtudiantParent.php");
			break;
			
		}

		case 'compoEtudiant':
		{
			include("vues/compoEtudiant.php");
			break;
			
		}

		case 'resultatEtudiantParent':
		{
			include("vues/resultatEtudiantParent.php");
			break;
			
		}

		case 'noteEtudiantmatiere':
		{
			include("vues/noteEtudiantmatiere.php");
			break;
			
		}
	//Impression du reçu de l'etudiant

		case 'imprimer_recu':
		{
			include("vues/imprimer_recu.php");
			break;
			
		}

		// Enseignement

		case 'enseignement':
		{
			include("vues/v_enseignement.php");
			break;
			
		}

		case 'detail_enseignement':
		{
			include("vues/v_detail_enseignement.php");
			break;
			
		}

		case 'saisie_enseignement':
		{
			include("vues/v_saisie_enseignement.php");
			break;
			
		}

		case 'editer_enseignement':
		{
			include("vues/v_editer_enseignement.php");
			break;
			
		}

		case 'saveEnseignement':
		{
			include("vues/saveEnseignement.php");
			break;
			
		}

		case 'matiereEnseignant':
		{
			include("vues/matiereEnseignant.php");
			break;
			
		}

		// spécailité

		case 'specialite':
		{
			include("vues/v_specialite.php");
			break;
			
		}

		case 'detail_specialite':
		{
			include("vues/v_detail_specialite.php");
			break;
			
		}

		case 'saisie_specialite':
		{
			include("vues/v_saisie_specialite.php");
			break;
			
		}

		case 'editer_specialite':
		{
			include("vues/v_editer_specialite.php");
			break;
			
		}

		case 'saveSpecialite':
		{
			include("vues/saveSpecialite.php");
			break;
			
		}

		case 'updateSpecialite':
		{
			include("vues/updateSpecialite.php");
			break;
			
		}

		// Emargement

		case 'emargement1':
		{
			include("vues/v_emargement1.php");
			break;
			
		}

		case 'emargement2':
		{
			include("vues/v_emargement2.php");
			break;
			
		}

		case 'saisie_emargement':
		{
			include("vues/v_saisie_emargement.php");
			break;
			
		}

		case 'editer_emargement':
		{
			include("vues/v_editer_emargement.php");
			break;
			
		}

		case 'saveEmargement':
		{
			include("vues/saveEmargement.php");
			break;
			
		}

		case 'detail_emargement':
		{
			include("vues/detail_emargement.php");
			break;
			
		}

		case 'detail_emargement_ens':
		{
			include("vues/detail_emargement_ens.php");
			break;
			
		}

		case 'emargement_enseignant1':
		{
			include("vues/emargement_enseignant1.php");
			break;
			
		}

		case 'emargement_enseignant2':
		{
			include("vues/emargement_enseignant2.php");
			break;
			
		}


		// Absence

		case 'absence':
		{
			include("vues/absence.php");
			break;
			
		}

		case 'liste_absence':
		{
			include("vues/liste_absence.php");
			break;
			
		}

		case 'affecter_absence':
		{
			include("vues/affecter_absence.php");
			break;
			
		}

		case 'editer_absenceEtudiant':
		{
			include("vues/v_editer_absenceEtudiant.php");
			break;
			
		}

		case 'editer_absEtudiantEns':
		{
			include("vues/editer_absEtudiantEns.php");
			break;
			
		}

		case 'saveAbsenceEtudiant':
		{
			include("vues/saveAbsenceEtudiant.php");
			break;
			
		}

		case 'listeAbsenceEtudiant':
		{
			include("vues/listeAbsenceEtudiant.php");
			break;
			
		}

		case 'absenceEtuidiantParent':
		{
			include("vues/absenceEtuidiantParent.php");
			break;
			
		}

		case 'absenceEtudiantParent2':
		{
			include("vues/absenceEtudiantParent2.php");
			break;
			
		}

		case 'absenceEtudiantMatiereParent':
		{
			include("vues/absenceEtudiantMatiereParent.php");
			break;
			
		}

		case 'absEtudiant':
		{
			include("vues/absEtudiant.php");
			break;
			
		}

		case 'absenceEnseignant':
		{
			include("vues/v_absenceEnseignant.php");
			break;
			
		}

		case 'absenceEnseignant2':
		{
			include("vues/v_absenceEnseignant2.php");
			break;
			
		}

		case 'saisie_absEnseignant':
		{
			include("vues/v_saisie_absEnseignant.php");
			break;
			
		}

		case 'editer_absEnseignant':
		{
			include("vues/v_editer_absEnseignant.php");
			break;
			
		}

		case 'saveAbsEnseignant':
		{
			include("vues/saveAbsEnseignant.php");
			break;
			
		}

		case 'updateAbsEnseignant':
		{
			include("vues/updateAbsEnseignant.php");
			break;
			
		}

		case 'absEnseignantEtudiant':
		{
			include("vues/absEnseignantEtudiant.php");
			break;
			
		}

		// resultats

		case 'detail_resultat':
		{
			include("vues/detail_resultat.php");
			break;
			
		}

		case 'resultat':
		{
			include("vues/resultat.php");
			break;
			
		}

		case 'deliberation_resultat':
		{
			include("vues/deliberation_resultat.php");
			break;
			
		}

		// Fichier ajax

		case 'ajaxGestion':
		{
			include("vues/ajaxGestion.php");
			break;
			
		}

		case 'ajaxEmplois':
		{
			include("vues/ajaxEmplois.php");
			break;
			
		}

		case 'ajaxResultat':
		{
			include("vues/ajaxResultat.php");
			break;
			
		}

		case 'ajaxEmargement':
		{
			include("vues/ajaxEmargement.php");
			break;
			
		}

		case 'ajaxMoyenneValidationTrim':
		{
			include("vues/ajaxMoyenneValidationTrim.php");
			break;
			
		}

		case 'statistique':
		{
			include("vues/statistique.php");
			break;
			
		}

		case 'statistiqueParent':
		{
			include("vues/statistiqueParent.php");
			break;
			
		}

		case 'stat':
		{
			include("vues/stat.php");
			break;
			
		}

		case 'ajaxAbsence':
		{
			include("vues/ajaxAbsence.php");
			break;
			
		}

		case 'ajaxArchive':
		{
			include("vues/ajaxArchive.php");
			break;
			
		}


		case 'saveGestion':
		{
			include("vues/saveGestion.php");
			break;
			
		}

		case 'updateGestion':
		{
			include("vues/updateGestion.php");
			break;
			
		}

		// Cursus

		case 'cursus':
		{
			include("vues/v_cursus.php");
			break;
			
		}

		case 'detail_cursus':
		{
			include("vues/v_detail_cursus.php");
			break;
			
		}

		case 'recapitulatif_cursus':
		{
			include("vues/recapitulatif_cursus.php");
			break;
			
		}

		case 'saisie_cursus':
		{
			include("vues/v_saisie_cursus.php");
			break;
			
		}

		case 'editer_cursus':
		{
			include("vues/v_editer_cursus.php");
			break;
			
		}

		case 'saveCursus':
		{
			include("vues/saveCursus.php");
			break;
			
		}

		case 'updateCursus':
		{
			include("vues/updateCursus.php");
			break;
		}

		// soutenance

		case 'soutenance':
		{
			include("vues/v_soutenance.php");
			break;
			
		}

		case 'detail_soutenance':
		{
			include("vues/v_detail_soutenance.php");
			break;
			
		}

		case 'saisie_soutenance':
		{
			include("vues/v_saisie_soutenance.php");
			break;
			
		}

		case 'editer_soutenance':
		{
			include("vues/v_editer_soutenance.php");
			break;
			
		}

		case 'saveSoutenance':
		{
			include("vues/saveSoutenance.php");
			break;
			
		}

		case 'updateSoutenance':
		{
			include("vues/updateSoutenance.php");
			break;
		}

		// Scolarité

		case 'scolarite':
		{
			include("vues/v_scolarite.php");
			break;
			
		}

		case 'detail_scolarite':
		{
			include("vues/v_detail_scolarite.php");
			break;
			
		}

		case 'saisie_scolarite':
		{
			include("vues/v_saisie_scolarite.php");
			break;
			
		}

		case 'editer_scolarite':
		{
			include("vues/v_editer_scolarite.php");
			break;
			
		}

		case 'saveScolarite':
		{
			include("vues/saveScolarite.php");
			break;
			
		}

		case 'updateScolarite':
		{
			include("vues/updateScolarite.php");
			break;
		}


		// Programme concours
		case 'progConcours':
		{
			include("vues/v_progConcours.php");
			break;
			
		}

		case 'detail_progConcours':
		{
			include("vues/v_detail_progConcours.php");
			break;
			
		}

		case 'saisie_progConcours':
		{
			include("vues/v_saisie_progConcours.php");
			break;
			
		}

		case 'editer_progConcours':
		{
			include("vues/v_editer_progConcours.php");
			break;
			
		}

		case 'saveProgConcours':
		{
			include("vues/saveProgConcours.php");
			break;
			
		}

		case 'updateProgConcours':
		{
			include("vues/updateProgConcours.php");
			break;
			
		}


		// Composition concours
		case 'compConcours':
		{
			include("vues/v_compConcours.php");
			break;
			
		}

		case 'detail_compConcours':
		{
			include("vues/v_detail_compConcours.php");
			break;
			
		}

		case 'saisie_compConcours':
		{
			include("vues/v_saisie_compConcours.php");
			break;
			
		}

		case 'editer_compConcours':
		{
			include("vues/v_editer_compConcours.php");
			break;
			
		}

		case 'saveCompConcours':
		{
			include("vues/saveCompConcours.php");
			break;
			
		}

		case 'updateCompConcours':
		{
			include("vues/updateCompConcours.php");
			break;
			
		}

		// Préinscription 
		case 'preinscription':
		{
			include("vues/v_preinscription.php");
			break;
			
		}

		case 'detail_preinscription':
		{
			include("vues/v_detail_preinscription.php");
			break;
			
		}


		case 'saisie_preinscription':
		{
			include("vues/v_saisie_preinscription.php");
			break;
			
		}

		case 'editer_preinscription':
		{
			include("vues/v_editer_preinscription.php");
			break;
			
		}

		case 'savePreinscription':
		{
			include("vues/savePreinscription.php");
			break;
			
		}

		case 'updatePreinscription':
		{
			include("vues/updatePreinscription.php");
			break;
			
		}

		// Resultat du concours
		case 'listeFiliereConcours':
		{
			include("vues/listeFiliereConcours.php");
			break;
			
		}

		case 'resultatConcours':
		{
			include("vues/resultatConcours.php");
			break;
			
		}

		case 'listeAdmisConcours':
		{
			include("vues/listeAdmisConcours.php");
			break;
			
		}

		case 'listeAjourneConcours':
		{
			include("vues/listeAjourneConcours.php");
			break;
			
		}

		case 'deliberation_concours':
		{
			include("vues/deliberation_concours.php");
			break;
			
		}

		case 'detail_resultatConcours':
		{
			include("vues/detail_resultatConcours.php");
			break;
			
		}

		//Page chargée par défaut si l'action est inconnue
		
		default:
		{
			include("vues/Deconnexion.php");
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