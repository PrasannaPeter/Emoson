<?php

// On récupère les informations du formulaire (si saisie)
if(isset($_GET['id'])){if(!empty($_GET['id'])){$id = $_GET['id'];}}
if(!empty($_GET['type'])){$type = $_GET['type'];}

if(!empty($_POST['titre'])){$titre = $_POST['titre'];}
if(!empty($_POST['content'])){$content = $_POST['content'];}

switch($type)
{
	case "ajouter" :

		// INSERT
		if(!empty($titre) && !empty($content))
		{
			$set_annonce = Annonce::set_annonce($id=NULL, $titre, $content);

			// Verifie l'action sinon erreur
			if($set_annonce=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'annonce a bien été ajouté à l'application";
				$_SESSION['msgNotif'] = "L'annonce a bien été ajouté à l'application";
				header('Location:index.php?module=annonce&action=afficher_annonce');
			}
			else if($set_annonce=="error_info")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'annonce n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "L'annonce entrée éxiste déjà dans la base";
				header('Location:index.php?module=annonce&action=manage&type=ajouter');
			}
			else if($set_annonce=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'annonce n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "L'annonce éxiste déjà dans la base";
				header('Location:index.php?module=annonce&action=manage&type=ajouter');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		elseif(empty($_POST))
		{
			require_once VIEWS.$controller.'/ajouter_'.$controller.'.php';
		}
		else
		{

			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['lastForm'] = $_POST;

			header('Location:index.php?module=annonce&action=manage&type=ajouter');
		}


	break;

	case "modifier" :

		// UPDATE
		if(!empty($titre) && !empty($content))
		{
			$set_annonce = Annonce::set_annonce($id, $titre, $content);

			// Verifie l'action sinon erreur
			if($set_annonce=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'annonce n'a pas pu être modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=annonce&action=afficher_annonce');
			}
			else if($set_annonce=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'annonce a bien été modifié";
				$_SESSION['msgNotif'] = "";

				header('Location:index.php?module=annonce&action=afficher_annonce');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			// Pré remplissage
			$get_annonce = Annonce::get_annonce($id);

			require_once VIEWS.$controller.'/ajouter_annonce.php';
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			header('Location:index.php?module=annonce&action=manage&type=modifier&id='.$id.'');
		}

	break;

	case "supprimer" :

		// DELETE
		if(!empty($id))
		{
			$del_annonce = Annonce::del_annonce($id);
		}

		if(!empty($del_annonce))
		{
			if($del_annonce=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'annonce n'a pas pu être supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=annonce&action=afficher_annonce');
			}
			else if($del_annonce=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'annonce a bien été supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=annonce&action=afficher_annonce');
			}
		}


	break;

}