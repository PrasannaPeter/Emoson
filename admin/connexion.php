<?php
// On charge les fichiers néccéssaires
require_once('core/init.php');
require_once('controllers/utilisateur/utilisateur.php');

if(!empty($_POST))
{
	if(!empty($_POST['login']) AND !empty($_POST['password']))
	{
		// On verifie la connexion
		$login = $_POST['login'];
		$password = $_POST['password'];

		$msgNotif = Utilisateur::connexion($login, $password, $type="ADMIN");
	}
	else if(!empty($_POST['login']) OR !empty($_POST['password']))
	{
		$msgNotif = "Vous devez saisir un nom d'utilisateur et un mot de passe";

	}
	else if(empty($_POST['login']) AND empty($_POST['password']))
	{
		$msgNotif = "Vous devez saisir un nom d'utilisateur et un mot de passe";

	}
}

require_once('views/global/header.php');
require_once('login.php');