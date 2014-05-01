<?php

// On récupère les informations du formulaire (si saisie)
if(isset($_GET['idProjet'])){if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}}
if(!empty($_GET['type'])){$type = $_GET['type'];}

if(!empty($_POST['titreProjet'])){$titreProjet = $_POST['titreProjet'];}
if(!empty($_POST['descriptionProjet'])){$descriptionProjet = $_POST['descriptionProjet'];}

if(isset($_GET['idUtilisateur'])){
	if(!empty($_GET['idUtilisateur'])){$idUtilisateur = $_GET['idUtilisateur'];}
}
else
{
	if(!empty($_POST['idUtilisateur'])){$idUtilisateur = $_POST['idUtilisateur'];}else{$idUtilisateur=NULL;}
}

if(!empty($_POST['tailleEntreprise'])){ $tailleEntreprise = $_POST['tailleEntreprise'];}
if(!empty($_POST['caEntreprise'])){$caEntreprise = $_POST['caEntreprise'];}
if(!empty($_POST['ptsContactEntreprise'])){$ptsContactEntreprise = json_encode($_POST['ptsContactEntreprise']);}else{$ptsContactEntreprise=NULL;}
if(!empty($_POST['optionProjet'])){$optionProjet = json_encode($_POST['optionProjet']);}else{$optionProjet=NULL;}
if(!empty($_POST['nbARProjet'])){$nbARProjet = $_POST['nbARProjet'];}
if(!empty($_POST['nbDesignerSouhaite'])){$nbDesignerSouhaite = $_POST['nbDesignerSouhaite'];}
if(!empty($_POST['idPack'])){$idPack = $_POST['idPack'];}
if(!empty($_POST['isActiveProjet'])){if($_POST['isActiveProjet'] == 'non'){$isActiveProjet = 0;}else{$isActiveProjet = $_POST['isActiveProjet'];}}

switch($type)
{
	case "ajouter" :

		// INSERT
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($isActiveProjet) && !empty($idUtilisateur) && !empty($caEntreprise) && !empty($nbARProjet) && !empty($nbDesignerSouhaite) && !empty($idPack) )
		{
			$set_projet = Projet::set_projet($idProjet=NULL, $titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);

			// Verifie l'action sinon erreur
			if($set_projet=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le Projet a bien été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Projet a bien été ajouté à l'application";
				header('Location:index.php?module=projet&action=afficher_projet');
			}
			else if($set_projet=="error_info")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Projet n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Projet entrée éxiste déjà dans la base";
				header('Location:index.php?module=projet&action=manage&type=ajouter');
			}
			else if($set_projet=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Projet n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Projet éxiste déjà dans la base";
				header('Location:index.php?module=projet&action=manage&type=ajouter');
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

			header('Location:index.php?module=projet&action=manage&type=ajouter');
		}


	break;

	case "modifier" :

		// UPDATE
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($idUtilisateur) && !empty($caEntreprise) && !empty($nbARProjet) && !empty($nbDesignerSouhaite) && !empty($idPack))
		{

			$set_projet = Projet::set_projet($idProjet, $titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);
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

				header('Location:index.php?module=projet&action=afficher_projet');
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

	case "valider_projet" :

		// Valider
		if(!empty($idProjet))
		{
			$valider_projet = Projet::valider_projet($idProjet);
			header('Location:index.php?module=projet&action=afficher_projet');
		}

		/*if(!empty($del_projet))
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
		}*/

	break;

	case "remplir_brief" :

		// INSERT
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($idUtilisateur) && !empty($caEntreprise) && !empty($nbARProjet) && !empty($nbDesignerSouhaite) && !empty($idPack))
		{
			$remplir_brief = Projet::set_projet($idProjet=NULL, $titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);

			// Verifie l'action sinon erreur
			if($remplir_brief=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Le Brief a bien été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Brief a bien été ajouté à l'application";

				//Redirection vers page de payement
				header('Location:index.php?module=dashboard&action=afficher');
			}
			else if($remplir_brief=="error_info")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Brief n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Brief entrée éxiste déjà dans la base";
				header('Location:index.php?module=entreprise&action=remplir_brief');
			}
			else if($remplir_brief=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Le Brief n'a pas été ajouté à l'application";
				$_SESSION['msgNotif'] = "Le Brief éxiste déjà dans la base";
				header('Location:index.php?module=entreprise&action=remplir_brief');
			}
		}
		// Formulaire incomplet => affichage du formulaire
		elseif(empty($_POST))
		{
			require_once VIEWS.$controller.'/remplir_brief.php';
		}
		else
		{

			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['lastForm'] = $_POST;

			header('Location:index.php?module=entreprise&action=remplir_brief');
		}

	break;

	case "voir_projet" :

		// VOIR
		if(!empty($idProjet))
		{
			header('Location:index.php?module=projet&action=voir_projet&idProjet='.$idProjet.'');
		}
		

	break;

	
}