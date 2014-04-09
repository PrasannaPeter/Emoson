<?php

// On récupère les informations du formulaire (si saisie)
if(!empty($_GET['idEntreprise'])){$idEntreprise = $_GET['idEntreprise'];}
if(!empty($_GET['type'])){$type = $_GET['type'];}
if(!empty($_POST['raisonSocialeEntreprise'])){$raisonSocialeEntreprise = $_POST['raisonSocialeEntreprise'];}
if(!empty($_POST['secteurEntreprise'])){$secteurEntreprise = $_POST['secteurEntreprise'];}
if(!empty($_POST['siteWebEntreprise'])){$siteWebEntreprise = $_POST['siteWebEntreprise'];}else{$siteWebEntreprise = "non";}
if(!empty($_POST['adresseEntreprise'])){$adresseEntreprise = $_POST['adresseEntreprise'];}
if(!empty($_POST['villeEntreprise'])){$villeEntreprise = $_POST['villeEntreprise'];}
if(!empty($_POST['CPEntreprise'])){$CPEntreprise = $_POST['CPEntreprise'];}
if(!empty($_POST['typeEntreprise'])){$typeEntreprise = $_POST['typeEntreprise'];}

switch($type)
{
	case "ajouter" :

		// INSERT
		if(!empty($raisonSocialeEntreprise) && !empty($secteurEntreprise) && !empty($siteWebEntreprise) && !empty($adresseEntreprise) && !empty($villeEntreprise) && !empty($CPEntreprise) && !empty($typeEntreprise))
		{
			$set_entreprise = Entreprise::set_entreprise($idEntreprise=NULL, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $typeEntreprise);

			// Verifie l'action sinon erreur
			if($set_entreprise=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'entreprise a bien été ajouté à l'application";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=entreprise&action=afficher_entreprise');
			}
			else if($set_entreprise=="error_info")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'entreprise n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "L'entreprise entrée éxiste déjà dans la base";
				header('Location:index.php?module=entreprise&action=afficher_entreprise');
			}
			else if($set_entreprise=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'entreprise n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "L'entreprise éxiste déjà dans la base";
				header('Location:index.php?module=entreprise&action=afficher_entreprise');
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
			header('Location:index.php?module=entreprise&action=manage&type=ajouter');
		}

	break;

	case "modifier" :

		// UPDATE
		if(!empty($raisonSocialeEntreprise) && !empty($secteurEntreprise) && !empty($siteWebEntreprise) && !empty($adresseEntreprise) && !empty($villeEntreprise) && !empty($CPEntreprise) && !empty($typeEntreprise))
		{
			$set_entreprise = Entreprise::set_entreprise($idEntreprise, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $typeEntreprise);

			// Verifie l'action sinon erreur
			if($set_entreprise=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'entreprise n'a pas pu être modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=entreprise&action=afficher_entreprise');
			}
			else if($set_entreprise=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'entreprise a bien été modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=entreprise&action=afficher_entreprise');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			// Pré remplissage
			$get_entreprise = Entreprise::get_entreprise($idEntreprise);

			require_once VIEWS.$controller.'/ajouter_entreprise.php';
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			header('Location:index.php?module=entreprise&action=manage&type=modifier&idEntreprise='.$idEntreprise.'');
		}

	break;

	case "supprimer" :

		// DELETE
		if(!empty($idEntreprise))
		{
			$del_entreprise = Entreprise::del_entreprise($idEntreprise);
		}

		if(!empty($del_entreprise))
		{
			if($del_entreprise=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'entreprise n'a pas pu être supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=entreprise&action=afficher_entreprise');
			}
			else if($del_entreprise=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'entreprise a bien été supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=entreprise&action=afficher_entreprise');
			}
		}


	break;
}