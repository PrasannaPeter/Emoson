<?php

// On initialise les sessions
session_start();

/**
 * Configuration des liens
 */

$app = "emoson";
define('ROOT',$_SERVER['DOCUMENT_ROOT']);
define('ROOT_APP',ROOT.'/'.$app.'/admin');


// Inclusion du fichier de configuration (qui définit des constantes)
require_once ROOT_APP.'/core/config.php';

// Inclusion du fichier des notifications & date
require_once ROOT_APP.'/core/notifications.php';
require_once ROOT_APP.'/core/date.php';
require_once ROOT_APP.'/core/listes.php';
require_once ROOT_APP.'/core/debug.php';

// Connexion à la base de données
function PDO($DB_NAME=NULL)
{
	if(!empty($DB_NAME))
	{
		try
		{
			$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".$DB_NAME, DB_USER, DB_PASSWORD);
		}
		catch(exeption $e)
		{
			die('Erreur : '.$e->getMessage());
		}

		$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$req=$bdd->query('SET NAMES "'.DB_CHARSET.'"');
	}
	Else
	{
		try
		{
			$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		}
		catch(exeption $e)
		{
			die('Erreur : '.$e->getMessage());
		}

		$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$req=$bdd->query('SET NAMES "'.DB_CHARSET.'"');
	}
	return $bdd;
}


// Vérifie si l'utilisateur est connecté
function is_connected()
{
	return !empty($_SESSION['loginUtilisateur']);
}

function site_admin()
{
	return strstr($_SERVER['REQUEST_URI'], 'admin/');
}
// Ajouté include security