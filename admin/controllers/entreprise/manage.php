<?php

// On récupère les informations du formulaire (si saisie)
if(!empty($_GET['idEntreprise'])){$idEntreprise = $_GET['idEntreprise'];}
if(!empty($_GET['type'])){$type = $_GET['type'];}
if(!empty($_POST['raisonSocialeEntreprise'])){$raisonSocialeEntreprise = $_POST['raisonSocialeEntreprise'];}
if(!empty($_POST['secteurEntreprise'])){$secteurEntreprise = $_POST['secteurEntreprise'];}
if(!empty($_POST['siteWebEntreprise'])){$siteWebEntreprise = $_POST['siteWebEntreprise'];}else{$siteWebEntreprise = "Aucun";}
if(!empty($_POST['adresseEntreprise'])){$adresseEntreprise = $_POST['adresseEntreprise'];}
if(!empty($_POST['villeEntreprise'])){$villeEntreprise = $_POST['villeEntreprise'];}
if(!empty($_POST['CPEntreprise'])){$CPEntreprise = $_POST['CPEntreprise'];}
if(!empty($_POST['numSiretEntreprise'])){$numSiretEntreprise = $_POST['numSiretEntreprise'];}else{$numSiretEntreprise = "";}
if(!empty($_POST['typeEntreprise'])){$typeEntreprise = $_POST['typeEntreprise'];}

require_once CONTROLLERS.'/utilisateur/utilisateur.php';

// recup front inscription :
if(!empty($_POST['idUtilisateur'])){$idUtilisateur = $_POST['idUtilisateur'];}
if(!empty($_POST['nomUtilisateur'])){$nomUtilisateur = $_POST['nomUtilisateur'];}
if(!empty($_POST['prenomUtilisateur'])){$prenomUtilisateur = $_POST['prenomUtilisateur'];}
if(!empty($_POST['telUtilisateur'])){$telUtilisateur = $_POST['telUtilisateur'];}
if(!empty($_POST['loginUtilisateur'])){$loginUtilisateur = $_POST['loginUtilisateur'];}
if(!empty($_POST['passUtilisateur'])){$passUtilisateur = $_POST['passUtilisateur'];}
if(!empty($_POST['emailUtilisateur'])){$emailUtilisateur = $_POST['emailUtilisateur'];}

// security because user can modify html and send bad value
if(!site_admin() && $type=="modifier"){
	$idUtilisateur = $_SESSION['idUtilisateur'];
}

switch($type)
{
	case "ajouter" :

		// INSERT
		if(!empty($raisonSocialeEntreprise) && !empty($secteurEntreprise) && !empty($siteWebEntreprise) && !empty($adresseEntreprise) && !empty($villeEntreprise) && !empty($CPEntreprise) && !empty($typeEntreprise))
		{
			
			//echo $idEntreprise=NULL.' '.$raisonSocialeEntreprise.' '.$secteurEntreprise.' '.$siteWebEntreprise.' '.$adresseEntreprise.' '.$villeEntreprise.' '.$CPEntreprise.' '.$idUtilisateur.' '.$numSiretEntreprise.' '.$typeEntreprise;

			$set_entreprise = Entreprise::set_entreprise($idEntreprise=NULL, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur, $numSiretEntreprise, $typeEntreprise);

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
			//echo $idEntreprise, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur, $numSiretEntreprise, $typeEntreprise;

			$set_entreprise = Entreprise::set_entreprise($idEntreprise, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur, $numSiretEntreprise, $typeEntreprise);
				
			if(site_admin()){
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
			}else{
				// Verifie l'action sinon erreur
				if($set_entreprise=="error")
				{
					$_SESSION['typeNotif'] = "error";
					$_SESSION['titreNotif'] = "Une erreur est survenue lors de la modification des informations de l'entreprise";
					$_SESSION['msgNotif'] = "";
					header('Location:index.php?module=entreprise&action=modifier_info_entreprise');
				}
				else if($set_entreprise=="ok")
				{
					$_SESSION['typeNotif'] = "success";
					$_SESSION['titreNotif'] = "Les informations de l'entreprise ont bien été modifiées";
					$_SESSION['msgNotif'] = "";
					header('Location:index.php?module=entreprise&action=modifier_info_entreprise');
				}
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else if(empty($_POST['submit']))
		{
			if(site_admin()){
			// Pré remplissage
				$get_entreprise = Entreprise::get_entreprise($idEntreprise);
				require_once VIEWS.$controller.'/ajouter_entreprise.php';
			}else{
				require_once VIEWS.'/entreprise/modifier_info_entreprise.php';
			}
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

	case "inscription_entreprise" :
		

		if(!empty($nomUtilisateur) && !empty($prenomUtilisateur) && !empty($loginUtilisateur) && !empty($passUtilisateur) && !empty($emailUtilisateur))
		{
                        $certifUtilisateur = 0;
			$roleUtilisateur = "ENTREPRISE";
			$set_utilisateur = Utilisateur::set_utilisateur($idUtilisateur=NULL, $nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur, $emailUtilisateur, $bioUtilisateur=NULL, $roleUtilisateur, $certifUtilisateur);
			if($set_utilisateur=="error_info")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'utilisateur n'a pas été ajouté à l'application.";
				$_SESSION['msgNotif'] = "L'utilisateur entrée existe déjà dans la base.";
				header('Location:index.php?module=entreprise&action=inscription_entreprise');
			}
			else if($set_utilisateur=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'utilisateur n'a pas été ajouté à l'application.";
				$_SESSION['msgNotif'] = "L'utilisateur existe déjà dans la base.";
				header('Location:index.php?module=entreprise&action=inscription_entreprise');
			}
                        else if($set_utilisateur=="errorEmailExist")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'adresse mail que vous avez renseigné est déjà assignée à un compte Utilisateur.";
				$_SESSION['msgNotif'] =  "L'adresse mail que vous avez renseigné est déjà assignée à un compte Utilisateur.";
				header('Location:index.php?module=entreprise&action=inscription_entreprise');
			}
		}
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "";
			require_once 'views/entreprise/inscription_entreprise.php';
			return;
		}
                
		$idUtilisateur = $_SESSION['lastInsertId'];
		unset($_SESSION['lastInsertId']);

		if(!empty($idUtilisateur))
		{

			// INSERT
			if(!empty($raisonSocialeEntreprise) && !empty($secteurEntreprise) && !empty($siteWebEntreprise) && !empty($adresseEntreprise) && !empty($villeEntreprise) && !empty($CPEntreprise) && !empty($numSiretEntreprise) && !empty($typeEntreprise))
			{
				$set_entreprise = Entreprise::set_entreprise($idEntreprise=NULL, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur, $numSiretEntreprise, $typeEntreprise);

				// Verifie l'action sinon erreur
				if($set_entreprise=="ok")
				{
					$_SESSION['typeNotif'] = "success";
					$_SESSION['titreNotif'] = "Votre inscription à bien été prise en compte, vous devez maintenant vous connecter pour accéder à votre espace perso";
					$_SESSION['msgNotif'] = "";
					header('Location:index.php');
				}
				else if($set_entreprise=="error_info")
				{
					$_SESSION['typeNotif'] = "error";
					$_SESSION['titreNotif'] = "Votre inscription n'a pu aboutir en raison d'un problème technique";
					header('Location:index.php?module=entreprise&action=inscription_entreprise');
				}
				else if($set_entreprise=="error")
				{
					$_SESSION['typeNotif'] = "error";
					$_SESSION['titreNotif'] = "Votre inscription n'a pu aboutir en raison d'un problème technique.";
					header('Location:index.php?module=entreprise&action=inscription_entreprise');
				}
			}
			// Formulaire incomplet => affichage du formulaire
			else if(empty($_POST['submit']))
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
				$_SESSION['msgNotif'] = "";
				require_once 'views/entreprise/inscription_entreprise.php';
			}
			else
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
				$_SESSION['msgNotif'] = "";
				header('Location:index.php?module=entreprise&action=inscription_entreprise');
			}
		}
	
	break;
}