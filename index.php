<?php

// Initialisation
require_once 'core/init.php';

	// D�but de la tamporisation de sortie
	ob_start();

	// Si un module (controlleur) est specifi�, on regarde s'il existe
	if (!empty($_GET['module']))
	{
		$controller = $_GET['module'];
		$model = "M_".$_GET['module'];
		$action = (!empty($_GET['action'])) ? $_GET['action'] : 'index';

		// Si la classe du controlleur existe, on le charge
		if($controller!=NULL && file_exists(CONTROLLERS.'/'.$controller.'/'.$controller.'.php'))
		{
			// Affichage de la notification si pr�sente
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
			require_once(CONTROLLERS.'/'.$controller.'/'.$controller.'.php');

			// Si le controleur de l'action �xiste, on le charge
			if($action!=NULL && file_exists(CONTROLLERS.'/'.$controller.'/'.$action.'.php'))
			{
				require_once(CONTROLLERS.'/'.$controller.'/'.$action.'.php');
			}
			// Sinon on charge la vue si elle �xiste
			else if($action!=NULL && file_exists(VIEWS.'/'.$controller.'/'.$action.'.php'))
			{
				require_once(VIEWS.'/'.$controller.'/'.$action.'.php');
			}
			else
			{
				require_once VIEWS.'/global/404.php';
			}
		}
		// Sinon on charge la vue du dossier global si existe
		elseif($controller!=NULL && file_exists(VIEWS.'/global/'.$controller.'.php'))
		{
			require_once(VIEWS.'/global/'.$controller.'.php');
		}
		// Sinon, on affiche la page d'erreur !
		else
		{
			require_once VIEWS.'/global/404.php';
		}
	}
	// Page d'accueil
	else
	{
		require_once VIEWS.'/global/home.php';
	}

	// Fin de la tamporisation de sortie
	$content = ob_get_clean();

	// D�but du code HTML
	require_once VIEWS.'/global/header.php';

	if(!empty($_SESSION['loginError']))
	{
		?>
		<script type="text/javascript">
		$(document).ready(function()
		{
			$('#loginModal').modal('toggle');
			$('.modal-header h3').text("<?php echo($_SESSION['loginError']); ?>");
			$('.modal-header h3').css("color", "red");
		});
		</script>
		<?php
		unset($_SESSION['loginError']);
	}

	echo $content;

	// Fin du code HTML
	require_once VIEWS.'/global/footer.php';
