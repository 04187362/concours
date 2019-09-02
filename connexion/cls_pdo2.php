<?php
//PDO2,classe qui hérite le PDO 
class PDO2 extends PDO 
{
	private static $instance;
	// __construct: héritage public obligatoire par héritage de PDO
	public function __construct( ) 
	{
	
	}
	//Vérifie que son instance n'existe pas (non initialisée) avant de créer une nouvelle
	public static function getInstance() 
	{
		if (!isset(self::$instance)) 
		{
			try 
			{
				//Création du tableau pour l'activation des exceptions PDO(PHP Data Objects)
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				// Connexion à la base de données
				self::$instance = new PDO('mysql:host=localhost;dbname=gestionscolarite;charset=utf8', 'root', '');
			}
				catch (PDOException $e) //Gestion des exceptions
			{
				// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
			}
		}
		return self::$instance;
	}
// Fin PDO2

}
?>