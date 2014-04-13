<?php

// On récupère les informations du formulaire (si saisie)
if(!empty($_GET['idPack'])){$idPack = $_GET['idPack'];}
if(!empty($_GET['type'])){$type = $_GET['type'];}
if(!empty($_POST['titrePack'])){$titrePack = $_POST['titrePack'];}
if(!empty($_POST['descPack'])){$descPack = $_POST['descPack'];}
if(!empty($_POST['prixPack'])){$prixPack = $_POST['prixPack'];}
if(!empty($_POST['positionPack'])){$positionPack = $_POST['positionPack'];}

switch($type)
{
	case "ajouter" :

		// INSERT
		if(!empty($titrePack) && !empty($descPack) && !empty($prixPack))
		{
			$set_pack = Pack::set_pack($idPack=NULL, $titrePack, $descPack, $prixPack, $positionPack);

			// Verifie l'action sinon erreur
			if($set_pack=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le pack a bien été ajouté à l'application";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=pack&action=afficher_pack');
			}
			else if($set_pack=="error_info")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le pack n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le pack entrée éxiste déjà dans la base";
				header('Location:index.php?module=pack&action=afficher_pack');
			}
			else if($set_pack=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le pack n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le pack éxiste déjà dans la base";
				header('Location:index.php?module=pack&action=afficher_pack');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			require_once VIEWS.$controller.'/ajouter_'.$controller.'.php';
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			header('Location:index.php?module=pack&action=manage&type=ajouter');
		}

	break;

	case "modifier" :

		// UPDATE
		if(!empty($titrePack) && !empty($descPack) && !empty($prixPack))
		{
			$set_pack = Pack::set_pack($idPack, $titrePack, $descPack, $prixPack, $positionPack);

			// Verifie l'action sinon erreur
			if($set_pack=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le pack n'a pas pu être modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=pack&action=afficher_pack');
			}
			else if($set_pack=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le pack a bien été modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=pack&action=afficher_pack');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			// Pré remplissage
			$get_pack = Pack::get_pack($idPack);

			require_once VIEWS.$controller.'/ajouter_pack.php';
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			header('Location:index.php?module=pack&action=manage&type=modifier&idPack='.$idPack.'');
		}

	break;

	case "supprimer" :

		// DELETE
		if(!empty($idPack))
		{
			$del_pack = Pack::del_pack($idPack);
		}

		if(!empty($del_pack))
		{
			if($del_pack=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le pack n'a pas pu être supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=pack&action=afficher_pack');
			}
			else if($del_pack=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le pack a bien été supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=pack&action=afficher_pack');
			}
		}

	break;
}