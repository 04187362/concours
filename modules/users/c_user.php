
<?php
if (empty($_GET['action']))
{
	include("vues/v_login.php");
}
else
{
	//Récupération de l'action

	$action = $_GET['action'];

	switch($action)
	{
		case 'login':
		{
			include("vues/v_login.php");
			break;
		}

		case 'profile':
		{
			include("vues/profile.php");
			break;
		}

		case 'galerie':
		{
			include("vues/galerie.php");
			break;
		}

		case 'galerie_etablissement':
		{
			include("vues/galerie_etablissement.php");
			break;
		}

		case 'info_etudiant':
		{
			include("vues/info_etudiant.php");
			break;
		}

		// Personnel

		case 'personnel':
		{
			include("vues/v_personnel.php");
			break;
		}

		case 'saisie_personnel':
		{
			include("vues/v_saisie_personnel.php");
			break;
		}

		case 'editer_personnel':
		{
			include("vues/v_editer_personnel.php");
			break;
		}

		case 'savePersonnel':
		{
			include("vues/savePersonnel.php");
			break;
		}

		case 'updatePersonne':
		{
			include("vues/updatePersonne.php");
			break;
		}

		// parent

		case 'parent':
		{
			include("vues/v_parent.php");
			break;
		}

		case 'saisie_parent':
		{
			include("vues/v_saisie_parent.php");
			break;
		}

		case 'editer_parent':
		{
			include("vues/v_editer_parent.php");
			break;
		}

		case 'saveParent':
		{
			include("vues/saveParent.php");
			break;
		}


		// enseignant

		case 'enseignant':
		{
			include("vues/v_enseignant.php");
			break;
		}

		case 'saisie_enseignant':
		{
			include("vues/v_saisie_enseignant.php");
			break;
		}

		case 'editer_enseignant':
		{
			include("vues/v_editer_enseignant.php");
			break;
		}

		case 'saveEnseignant':
		{
			include("vues/saveEnseignant.php");
			break;
		}

		// etudiant

		case 'etudiant':
		{
			include("vues/v_etudiant.php");
			break;
		}

		case 'saisie_etudiant':
		{
			include("vues/v_saisie_etudiant.php");
			break;
		}

		case 'editer_etudiant':
		{
			include("vues/v_editer_etudiant.php");
			break;
		}

		case 'saveEtudiant':
		{
			include("vues/saveEtudiant.php");
			break;
		}

		case 'updateAcces':
		{
			include("vues/updateAcces.php");
			break;
		}

		case 'etudiantParent':
		{
			include("vues/etudiantParent.php");
			break;
		}

		// candidat

		case 'candidat':
		{
			include("vues/v_candidat.php");
			break;
		}

		case 'saisie_candidat':
		{
			include("vues/v_saisie_candidat.php");
			break;
		}

		case 'editer_candidat':
		{
			include("vues/v_editer_candidat.php");
			break;
		}

		case 'saveCandidat':
		{
			include("vues/saveCandidat.php");
			break;
		}


		// Message

		case 'detailMessageRecu':
		{
			include("vues/detailMessageRecu.php");
			break;
		}

		case 'detailMessageEnvoye':
		{
			include("vues/detailMessageEnvoye.php");
			break;
		}

		case 'listeMessageRecu':
		{
			include("vues/listeMessageRecu.php");
			break;
		}

		case 'listeMessageEnvoye':
		{
			include("vues/listeMessageEnvoye.php");
			break;
		}

		case 'saveMessage':
		{
			include("vues/saveMessage.php");
			break;
		}

		// Impression 

		case 'imprimer_emargement':
		{
			include("vues/imprimer_emargement.php");
			break;
		}

		case 'imprimer_bulletin':
		{
			include("vues/imprimer_bulletin.php");
			break;
		}

		case 'imprimer_paiement':
		{
			include("vues/imprimer_paiement.php");
			break;
		}

		case 'imprimer_inscription':
		{
			include("vues/imprimer_inscription.php");
			break;
		}

		case 'imprimer_preinscription':
		{
			include("vues/imprimer_preinscription.php");
			break;
		}

		case 'imprimer_listePreinscris':
		{
			include("vues/imprimer_listePreinscris.php");
			break;
		}

		case 'imprimer_listeAdmisConcours':
		{
			include("vues/imprimer_listeAdmisConcours.php");
			break;
		}

		case 'imprimer_releveNote_concours':
		{
			include("vues/imprimer_releveNote_concours.php");
			break;
		}

		case 'imprimer_emploiTemps':
		{
			include("vues/imprimer_emploiTemps.php");
			break;
		}

		case 'imprimer_emploiTempsEns':
		{
			include("vues/imprimer_emploiTempsEns.php");
			break;
		}

		case 'profile':
		{
			include("vues/profile.php");
			break;
		}

		case 'page_erreur':
		{
			include("vues/page_erreur.php");
			break;
		}
        
        case 'scolarite':
		{
			include("vues/v_scolarite.php");
			break;
		}

		case 'accueil':
		{
			include("vues/v_accueil.php");
			break;
		}

		case 'tableaubordscolarite':
		{
			include("vues/v_tableaubordscolarite.php");
			break;
		}

		case 'tableaubordconcours':
		{
			include("vues/v_tableaubordconcours.php");
			break;
		}


		case 'Deconnexion':
		{
			include("vues/Deconnexion.php");
			break;
		}
		

		default:
		{
			include("vues/Deconnexion.php");
			break;
		}

		
	}
}

?>