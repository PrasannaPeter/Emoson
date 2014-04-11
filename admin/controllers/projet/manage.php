<?php

// On récupère les informations du formulaire (si saisie)
if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}
if(!empty($_GET['idGraphiste'])){$idGraphiste = $_GET['idGraphiste'];}
if(!empty($_GET['type'])){$type = $_GET['type'];}

if(!empty($_POST['titreProjet'])){$titreProjet = $_POST['titreProjet'];}
if(!empty($_POST['descriptionProjet'])){$descriptionProjet = $_POST['descriptionProjet'];}
if(!empty($_POST['dateDebutProjet'])){$dateDebutProjet = DateFormat($_POST['dateDebutProjet'], "fr_to_mysql");}
if(!empty($_POST['dateFinProjet'])){$dateFinProjet = DateFormat($_POST['dateFinProjet'],'fr_to_mysql');}
if(!empty($_POST['budgetMinProjet'])){$budgetMinProjet = DateFormat($_POST['budgetMinProjet'], "fr_to_mysql");}
if(!empty($_POST['budgetMaxProjet'])){$budgetMaxProjet = DateFormat($_POST['budgetMaxProjet'],'fr_to_mysql');}

if(!empty($_POST['isActiveProjet'])){$isActiveProjet = $_POST['isActiveProjet'];}
if(!empty($_POST['nbPistes'])){$nbPistes = $_POST['nbPistes'];}

switch($type)
{
	case "ajouter" :

		// INSERT
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($dateDebutProjet) && !empty($dateFinProjet) && !empty($nbPistes))
		{
			$set_projet = Projet::set_projet($idProjet=NULL, $titreProjet, $descriptionProjet, $dateDebutProjet, $dateFinProjet, $nbPistes, $isActiveProjet, $budgetMinProjet, $budgetMaxProjet, $idContact);

			// Verifie l'action sinon erreur
			if($set_projet=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le Projet a bien été ajouté à l'application";
				$_SESSION['msgNotif'] = "";

				// Récupération de idProjet pour assigner des graphistes aux projets
				$get_projet = Projet::get_projet($idProjet=NULL, $titreProjet, $type=NULL);

				$get_id_projet = $get_projet->fetch();

				$idProjet = $get_id_projet['idProjet'];

				header('Location:index.php?module=projet&action=assigner_graphiste&idProjet='.$idProjet.'');
			}
			else if($set_projet=="error_info")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Projet n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Projet entrée éxiste déjà dans la base";
				header('Location:index.php?module=projet&action=manage&type=ajouter_projet');
			}
			else if($set_projet=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Projet n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Projet éxiste déjà dans la base";
				header('Location:index.php?module=projet&action=manage&type=ajouter_projet');
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
			$_SESSION['msgNotif'] = "";
			$_SESSION['lastForm'] = $_POST;

			header('Location:index.php?module=projet&action=manage&type=ajouter');
		}

	break;

	case "modifier" :

		// UPDATE
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($dateDebutProjet) && !empty($dateFinProjet) && !empty($nbPistes) && !empty($nomContact) && !empty($idProjet))
		{

			$set_projet = Projet::set_projet($idProjet, $titreProjet, $descriptionProjet, $dateDebutProjet, $dateFinProjet, $nbPistes, $nomContact, $isActiveProjet, $budgetMinProjet, $budgetMaxProjet);
			// Verifie l'action sinon erreur
			if($set_projet=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Projet n'a pas pu être modifié";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=projet&action=afficher_projet');
			}
			else if($set_projet=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le Projet a bien été modifié";
				$_SESSION['msgNotif'] = "";

				header('Location:index.php?module=projet&action=assigner_graphiste&idProjet='.$idProjet.'');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			// Pré remplissage
			$get_projet = Projet::get_projet($idProjet);

			require_once VIEWS.$controller.'/ajouter_projet.php';
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			header('Location:index.php?module=projet&action=manage&type=modifier&idProjet='.$idProjet.'');
		}

	break;

	case "supprimer" :

		// DELETE
		if(!empty($idProjet))
		{
			$del_projet = Projet::del_projet($idProjet);
		}

		if(!empty($del_projet))
		{
			if($del_projet=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Projet n'a pas pu être supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=projet&action=afficher_projet');
			}
			else if($del_projet=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le Projet a bien été supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=projet&action=afficher_projet');
			}
		}


	break;

	case "assigner_graphiste" :

		//Projet::del_assigner_graphiste($idProjet);
		$nbRow = count($_POST['graphiste_assigner']);

		for($nb=0; $nb<$nbRow; $nb++)
		{
			Projet::assigner_graphiste($idProjet, $_POST['graphiste_assigner'][$nb]);
			header('Location:index.php?module=projet&action=assigner_graphiste&idProjet='.$idProjet.'');
		}

	break;

	case "del_assigner_graphiste" :

		// DELETE
		if(!empty($idProjet) || !empty($idGraphiste))
		{
			$del_projet = Projet::del_graphiste_assigner($idProjet, $idGraphiste);
		}
		else
		{
			echo 'les variables sont vides';
		}

		if(!empty($del_projet))
		{
			if($del_projet=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'assignation n'a pas pu être supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=projet&action=assigner_graphiste&idProjet='.$idProjet.'');
			}
			else if($del_projet=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'assignation a bien été supprimé";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=projet&action=assigner_graphiste&idProjet='.$idProjet.'');
			}
		}

		header('Location:index.php?module=projet&action=assigner_graphiste&idProjet='.$idProjet.'');

	break;
}