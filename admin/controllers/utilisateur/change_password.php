<?php

$login = $_SESSION['loginUtilisateur'];

if(!empty($_POST))
{
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$new_password2 = $_POST['new_password2'];

	if(!empty($login) && !empty($old_password) && !empty($new_password) && !empty($new_password2))
	{
		$change_password = Utilisateur::changer_mdp($login, $old_password, $new_password, $new_password2);
	}
	else
	{
		$_SESSION['typeNotif'] = "error";
		$_SESSION['titreNotif'] = "Echec du changement de mot de passe";
		$_SESSION['msgNotif'] = "Vous devez remplir tout les champs du formulaire";

		if(site_admin())
			require_once(VIEWS.'utilisateur/change_password.php');
		else
			require_once(VIEWS.'change_password.php');
	}
}
else
{
	if(site_admin())
		require_once(VIEWS.'utilisateur/change_password.php');
	else
		require_once(VIEWS.'change_password.php');
}