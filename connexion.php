<?php

// On charge les fichiers néccéssaires
require_once('core/init.php');
require_once('admin/controllers/utilisateur/utilisateur.php');

unset($msgNotif);

if(empty($_POST['login']) OR empty($_POST['password']))
{
	$_SESSION['loginError']  = "Vous devez saisir un nom d'utilisateur et un mot de passe";
}
elseif(!empty($_POST['login']) AND !empty($_POST['password']))
{
	// On verifie la connexion
	$login = $_POST['login'];
	$password = $_POST['password'];

	$connect = Utilisateur::connexion($login, $password, $type=NULL);

	$_SESSION['loginError'] = $connect['msgNotif'];
}

header('Location:index.php');

?>
