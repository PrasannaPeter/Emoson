<?php

	// On initialise les sessions
	session_start();

	// Outrepasse la connexion à l'administration avec un nom d'utilisateur et un mot de passe.
	$_SESSION['loginProf'] = "r00t";
	$_SESSION['nomUtilisateur'] = "General";
	$_SESSION['prenomUtilisateur'] = "Administrator";
	$_SESSION['departementUtilisateur'] = "RESSOURCES HUMAINES";
	
	// Redirection vers l'index.
	header('location:index.php');