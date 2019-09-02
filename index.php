<?php
// demarre la session
session_start();
include "globale/m_init.php";
// Début de la tamporisation de sortie

ob_start();
// Si un module est specifié, on regarde s'il existe
if (!empty($_GET['module']))
 {
  $module = dirname(__FILE__).'/modules/'.$_GET['module'].'/';
  // Si l'action est specifiée, on l'utilise, sinon, on tente une

  $controleurmodule=$module.'c_'.$_GET['module'].".php";
  			//Si le controleur existe alors on l'utilise
  if (is_file($controleurmodule)) 
    {

  	 include($controleurmodule);
  			// Sinon, on appelle l'accueil
    }
     else
   {
     // on include la page de connexion
     include 'modules/users/c_user.php';
    }
  // Module non specifié ou invalide ? On affiche la page d'accueil !
}
 else 
 {
 	// on include le fichier de connexion
   include 'modules/users/c_user.php';
}
// Fin de la tamporisation de sortie

?>