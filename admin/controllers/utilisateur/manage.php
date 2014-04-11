<?php

// On récupère les informations du formulaire (si saisie)
if(!empty($_GET['idUtilisateur'])){$idUtilisateur = $_GET['idUtilisateur'];}
if(!empty($_GET['type'])){$type = $_GET['type'];}
if(!empty($_POST['nomUtilisateur'])){$nomUtilisateur = $_POST['nomUtilisateur'];}
if(!empty($_POST['prenomUtilisateur'])){$prenomUtilisateur = $_POST['prenomUtilisateur'];}
if(!empty($_POST['telUtilisateur'])){$telUtilisateur = $_POST['telUtilisateur'];}
if(!empty($_POST['loginUtilisateur'])){$loginUtilisateur = $_POST['loginUtilisateur'];}
if(!empty($_POST['passUtilisateur'])){$passUtilisateur = $_POST['passUtilisateur'];}
if(!empty($_POST['emailUtilisateur'])){$emailUtilisateur = $_POST['emailUtilisateur'];}
if(!empty($_POST['bioUtilisateur'])){$bioUtilisateur = $_POST['bioUtilisateur'];}
if(!empty($_POST['roleUtilisateur'])){$roleUtilisateur = $_POST['roleUtilisateur'];}
if($_POST['certifUtilisateur'] == "on"){$certifUtilisateur = 1;}else{$certifUtilisateur = 0;}

switch($type)
{
	case "ajouter" :
		// INSERT
		if(!empty($nomUtilisateur) && !empty($prenomUtilisateur) && !empty($loginUtilisateur) && !empty($passUtilisateur) && !empty($emailUtilisateur))
		{
			$set_utilisateur = Utilisateur::set_utilisateur($idUtilisateur=NULL, $nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur, $emailUtilisateur, $bioUtilisateur, $roleUtilisateur, $certifUtilisateur);
			if(site_admin()){
				// Verifie l'action sinon erreur
				if($set_utilisateur=="ok")
				{
					$_SESSION['typeNotif'] = "success";
					$_SESSION['titreNotif'] = "L'utilisateur a bien été ajouté à l'application";
					$_SESSION['msgNotif'] = "";
					header('Location:index.php?module=utilisateur&action=afficher_utilisateur');
				}
				else if($set_utilisateur=="error_info")
				{
					$_SESSION['typeNotif'] = "error";
					$_SESSION['titreNotif'] = "L'utilisateur n'a pas été ajouté à l'application";
					$_SESSION['msgNotif'] = "L'utilisateur entré éxiste déjà dans la base";
					header('Location:index.php?module=utilisateur&action=afficher_utilisateur');
				}
				else if($set_utilisateur=="error")
				{
					$_SESSION['typeNotif'] = "error";
					$_SESSION['titreNotif'] = "L'utilisateur n'a pas été ajouté à l'application";
					$_SESSION['msgNotif'] = "L'utilisateur éxiste déjà dans la base";
					header('Location:index.php?module=utilisateur&action=afficher_utilisateur');
				}
			}else{
				if($set_utilisateur=="ok")
				{
					$_SESSION['typeNotif'] = "success";
					$_SESSION['titreNotif'] = "Votre inscription à bien été prise en compte, vous pouvez maintenant vous connecter pour remplir votre portfolio";
					header('Location:index.php');
				}
				else
				{
					$_SESSION['typeNotif'] = "error";
					$_SESSION['titreNotif'] = "Votre inscription n'a pu aboutir en raison d'un problème technique";
					header('Location:index.php?module=designer&action=inscription_designer');
				}
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			if(site_admin()){
				require_once VIEWS.$controller.'/ajouter_'.$controller.'.php';
			}else{
				require_once VIEWS.'/designer/inscription_designer.php';
			}
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			$_SESSION['lastForm'] = $_POST;
			header('Location:index.php?module=utilisateur&action=manage&type=ajouter');
		}

	break;

	case "modifier" :

		// UPDATE
		if(!empty($idUtilisateur) && !empty($nomUtilisateur) && !empty($prenomUtilisateur) && !empty($loginUtilisateur) && !empty($emailUtilisateur))
		{
			$set_utilisateur = Utilisateur::set_utilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur, $emailUtilisateur, $bioUtilisateur, $roleUtilisateur, $certifUtilisateur);

			// Verifie l'action sinon erreur
			if($set_utilisateur=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'utilisateur n'a pas pu être modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=utilisateur&action=afficher_utilisateur');
			}
			else if($set_utilisateur=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'utilisateur a bien été modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=utilisateur&action=afficher_utilisateur');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			// Pré remplissage
			$get_utilisateur = Utilisateur::get_utilisateur($idUtilisateur);

			require_once VIEWS.$controller.'/ajouter_utilisateur.php';
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			header('Location:index.php?module=utilisateur&action=manage&type=modifier&idUtilisateur='.$idUtilisateur.'');
		}

	break;

	case "supprimer" :

		// DELETE
		if(!empty($idUtilisateur))
		{
			$del_utilisateur = Utilisateur::del_utilisateur($idUtilisateur);
		}

		if(!empty($del_utilisateur))
		{
			if($del_utilisateur=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'utilisateur n'a pas pu être supprimé";
				header('Location:index.php?module=utilisateur&action=afficher_utilisateur');
			}
			else if($del_utilisateur=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'utilisateur a bien été supprimé";
				header('Location:index.php?module=utilisateur&action=afficher_utilisateur');
			}
		}


	break;
}