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

if(!empty($_POST['positionnementProjet'])){ $positionnementProjet = $_POST['positionnementProjet'];}else{$positionnementProjet=NULL;}
if(!empty($_POST['referencesProjet'])){ $referencesProjet = $_POST['referencesProjet'];}else{$referencesProjet=NULL;}
if(!empty($_POST['dontlikeProjet'])){ $dontlikeProjet = $_POST['dontlikeProjet'];}else{$dontlikeProjet=NULL;}
if(!empty($_POST['commentaireProjet'])){ $commentaireProjet = $_POST['commentaireProjet'];}else{$commentaireProjet=NULL;}
if(!empty($_POST['tailleEntreprise'])){ $tailleEntreprise = $_POST['tailleEntreprise'];}else{$tailleEntreprise=NULL;}
if(!empty($_POST['caEntreprise'])){$caEntreprise = $_POST['caEntreprise'];}else{$caEntreprise=NULL;}
if(!empty($_POST['ptsContactEntreprise'])){$ptsContactEntreprise = json_encode($_POST['ptsContactEntreprise']);}else{$ptsContactEntreprise=NULL;}
if(!empty($_POST['optionProjet'])){$optionProjet = $_POST['optionProjet'];}else{$optionProjet=NULL;}
if(!empty($_POST['nbARProjet'])){$nbARProjet = $_POST['nbARProjet'];}else{$nbARProjet = "0";}
if(!empty($_POST['nbDesignerSouhaite'])){$nbDesignerSouhaite = $_POST['nbDesignerSouhaite'];}else{$nbDesignerSouhaite = "0";}
if(!empty($_POST['idPack'])){$idPack = $_POST['idPack'];}
if(!empty($_POST['isActiveProjet'])){ $isActiveProjet = $_POST['isActiveProjet'];}else{ $isActiveProjet = "0";}

switch($type)
{
	case "ajouter" :

		// INSERT
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($idUtilisateur) && !empty($caEntreprise) && !empty($idPack) )
		{
			echo "cest bon ?"; exit;
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
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($idUtilisateur) && !empty($caEntreprise) && !empty($idPack))
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
		if(!empty($titreProjet) && !empty($descriptionProjet) && !empty($idUtilisateur) && !empty($caEntreprise) && !empty($idPack))
		{


			/*echo '<p>titreProjet :'. $titreProjet.'</p>';
			echo '<p>descriptionProjet :'. $descriptionProjet.'</p>';
			echo '<p>brandingProjet :'.$_FILES['fichier']['name'][0].'<p>';
			echo '<p>positionnementProjet :'. $positionnementProjet.'</p>';
			echo '<p>identiteProjet :'.$_FILES['fichier']['name'][1].'<p>';
			echo '<p>referencesProjet :'. $referencesProjet.'</p>';
			echo '<p>dontlikeProjet :'. $dontlikeProjet.'</p>';
			echo '<p>commentaireProjet :'. $commentaireProjet.'</p>';
			echo '<p>isActiveProjet :'. $isActiveProjet.'</p>';
			echo '<p>idUtilisateur :'. $idUtilisateur.'</p>';
			echo '<p>tailleEntreprise :'. $tailleEntreprise.'</p>';
			echo '<p>caEntreprise :'. $caEntreprise.'</p>';
			echo '<p>tailleEntreprise :'. $tailleEntreprise.'</p>';
			echo '<p>ptsContactEntreprise :'. $ptsContactEntreprise.'</p>';
			echo '<p>optionProjet :'. $optionProjet.'</p>';
			echo '<p>nbARProjet :'. $nbARProjet.'</p>';
			echo '<p>nbDesignerSouhaite :'. $nbDesignerSouhaite.'</p>';
			echo '<p>idPack :'. $idPack.'</p>';*/


			/*$verifBranding = Projet::verifFichier($_FILES['fichier']['name'][0], $_FILES['fichier']['tmp_name'][0], $_FILES['fichier']['size'][0]);
			$verifIdentite = Projet::verifFichier($_FILES['fichier']['name'][1], $_FILES['fichier']['tmp_name'][1], $_FILES['fichier']['size'][1] );

			if ($verifBranding == 'ok') 
			{
				$destination = 'public/brief_formulaire/branding/'.$_FILES['fichier']['name'][0]; 
				move_uploaded_file($_FILES['fichier']['tmp_name'][0], $destination);
			}
			
			if ($verifIdentite == 'ok') 
			{
				$destination = 'public/brief_formulaire/identite/'.$_FILES['fichier']['name'][1]; 
        		move_uploaded_file($_FILES['fichier']['tmp_name'][1], $destination);
			}*/

			
			
			$remplir_brief = Projet::set_projet($idProjet=NULL, $titreProjet, $descriptionProjet, $_FILES['fichier']['name'][0], $positionnementProjet, $_FILES['fichier']['name'][1], $referencesProjet, $dontlikeProjet, $commentaireProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);

			// Verifie l'action sinon erreur
			if($remplir_brief=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "MERCI pour votre confance !";
				$_SESSION['msgNotif'] = "Nous vous contactons dans les meilleurs délais pour vous sélectionner les meilleurs designers..";

				//Redirection vers page de payement a faire
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


}