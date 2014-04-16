<?php

// Initialisation
require_once 'core/init.php';

if($_SERVER['REQUEST_URI'] != $_SESSION['lastREQUEST_URI'])
	$_SESSION['lastForm'] = array();

$_SESSION['lastREQUEST_URI'] = $_SERVER['REQUEST_URI'];

// Si l'utilisateur est connecté, on charge la page
if($_SESSION['roleUtilisateur'] == "ADMIN")
{
	// Début de la tamporisation de sortie
	ob_start();

	// Si un module (controlleur) est specifié, on regarde s'il existe
	if (!empty($_GET['module']))
	{
		$controller = $_GET['module'];
		$model = "M_".$_GET['module'];
		$action = (!empty($_GET['action'])) ? $_GET['action'] : 'index';

		// Si la classe du controlleur existe, on le charge
		if($controller!=NULL && file_exists('controllers/'.$controller.'/'.$controller.'.php'))
		{
			// Affichage de la notification si présente
			if((!empty($_SESSION['typeNotif']) && !empty($_SESSION['titreNotif'])) OR (!empty($typeNotif) && !empty($titreNotif)))
			{

				$typeNotif = $_SESSION['typeNotif'];
				$titreNotif = $_SESSION['titreNotif'];
				$msgNotif = $_SESSION['msgNotif'];
				$_SESSION['typeNotif'] = "";
				$_SESSION['titreNotif'] = "";
				$_SESSION['msgNotif'] = "";

				$notification = notifications($typeNotif, $titreNotif, $msgNotif);
				echo $notification;
			}
			require_once('controllers/'.$controller.'/'.$controller.'.php');

			// Si le controleur de l'action éxiste, on le charge
			if($action!=NULL && file_exists('controllers/'.$controller.'/'.$action.'.php'))
			{
				require_once('controllers/'.$controller.'/'.$action.'.php');
			}
			// Sinon on charge la vue si elle éxiste
			else if($action!=NULL && file_exists('views/'.$controller.'/'.$action.'.php'))
			{
				require_once('views/'.$controller.'/'.$action.'.php');
			}
		}
		// Sinon, on affiche la page d'erreur !
		else
		{
			require_once 'views/global/home.php';
		}
	}
	// Module non specifié ou invalide ? On affiche page d'accueil
	else
	{
		require_once 'views/global/home.php';
	}

	// Fin de la tamporisation de sortie
	$content = ob_get_clean();

	// Début du code HTML
	require_once 'views/global/header.php';

	require_once 'views/global/sidebar.php';

	require_once 'views/global/topbody.php';

	echo $content;

	// Fin du code HTML
	require_once 'views/global/footer.php';
}
// Sinon on redirige sur la page de connexion
else
{
	header('Location:login.php');
}
