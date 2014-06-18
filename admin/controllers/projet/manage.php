<?php

// On récupère les informations du formulaire (si saisie)
if(isset($_GET['idProjet'])){if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}}
if(!empty($_GET['type'])){$type = $_GET['type'];}
if(!empty($_POST['titreProjet'])){$titreProjet = $_POST['titreProjet'];}
if(!empty($_POST['descriptionProjet'])){$descriptionProjet = $_POST['descriptionProjet'];}
if(isset($_GET['idUtilisateur'])){if(!empty($_GET['idUtilisateur'])){$idUtilisateur = $_GET['idUtilisateur'];}}else{if(!empty($_POST['idUtilisateur'])){$idUtilisateur = $_POST['idUtilisateur'];}else{$idUtilisateur=NULL;}}
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
if(!empty($_POST['libFichier'])){ $libFichier = $_POST['libFichier'];}
if(!empty($_POST['idProjet'])){ $idProjet = $_POST['idProjet'];}

switch($type)
{
	// INSERT
	case "ajouter" :
		
		if(!empty($titreProjet) || !empty($descriptionProjet) || !empty($positionnementProjet) || !empty($referencesProjet) || !empty($dontlikeProjet) || !empty($commentaireProjet) || !empty($idUtilisateur) || !empty($caEntreprise) || !empty($idPack))
		{

			// Si il n'y a pas de fichier alors on met a NULL
			if(isset($_FILES['fichier']['name'][0]) && empty($_FILES['fichier']['name'][0]))
			{
				$_FILES['fichier']['name'][0] = NULL;	
			}

			if(isset($_FILES['fichier']['name'][1]) &&empty($_FILES['fichier']['name'][1]))
			{
				$_FILES['fichier']['name'][1] = NULL;	
			}

			$verifBranding = Projet::verifFichier($_FILES['fichier']['name'][0], $_FILES['fichier']['tmp_name'][0], $_FILES['fichier']['size'][0]);
			$verifIdentite = Projet::verifFichier($_FILES['fichier']['name'][1], $_FILES['fichier']['tmp_name'][1], $_FILES['fichier']['size'][1] );

			if ($verifBranding == 'ok') 
			{
				$destination = '../public/brief_formulaire/branding/'.$_FILES['fichier']['name'][0]; 
				move_uploaded_file($_FILES['fichier']['tmp_name'][0], $destination);
			}
			
			if ($verifIdentite == 'ok') 
			{
				$destination = '../public/brief_formulaire/identite/'.$_FILES['fichier']['name'][1]; 
	    		move_uploaded_file($_FILES['fichier']['tmp_name'][1], $destination);
			}

			$set_projet = Projet::set_projet($titreProjet, $descriptionProjet, $_FILES['fichier']['name'][0], $positionnementProjet, $_FILES['fichier']['name'][1], $referencesProjet, $dontlikeProjet, $commentaireProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);

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
				$_SESSION['msgNotif'] = "Le Projet entrée existe déjà dans la base";
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
		if(!empty($titreProjet) || !empty($descriptionProjet) || !empty($positionnementProjet) || !empty($referencesProjet) || !empty($dontlikeProjet) || !empty($commentaireProjet) || !empty($idUtilisateur) || !empty($caEntreprise) || !empty($idPack))
		{

			$set_projet = Projet::set_projet($idProjet, $titreProjet, $descriptionProjet, $_FILES['fichier']['name'][0], $positionnementProjet, $_FILES['fichier']['name'][1], $referencesProjet, $dontlikeProjet, $commentaireProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);
			
			// Verifie l'action sinon erreur
			/*if($set_projet=="error")
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
			}*/
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

	break;

	case "remplir_brief" :

		// INSERT
		if(!empty($titreProjet) || !empty($descriptionProjet) || !empty($positionnementProjet) || !empty($referencesProjet) || !empty($dontlikeProjet) || !empty($commentaireProjet) || !empty($idUtilisateur) || !empty($caEntreprise) || !empty($idPack))
		{

			// Si il n'y a pas de fichier alors on met a NULL
			if(empty($_FILES['fichier']['name'][0]))
			{
				$_FILES['fichier']['name'][0] = NULL;	
			}

			if(empty($_FILES['fichier']['name'][1]))
			{
				$_FILES['fichier']['name'][1] = NULL;	
			}
			$verifBranding = Projet::verifFichier($_FILES['fichier']['name'][0], $_FILES['fichier']['tmp_name'][0], $_FILES['fichier']['size'][0]);
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
			}
			
			$remplir_brief = Projet::set_projet($titreProjet, $descriptionProjet, $_FILES['fichier']['name'][0], $positionnementProjet, $_FILES['fichier']['name'][1], $referencesProjet, $dontlikeProjet, $commentaireProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);

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
        
        case "demande_view_add_fichiers_lies" :
            require_once VIEWS.$controller.'/add_fichiers_lies.php';
	break;  
    
    	case "ajouter_fichiers_lies" :

		// INSERT
		if(!empty($libFichier) && !empty($idUtilisateur) && !empty($idProjet))
		{   
                        $dateUploadFichier = date('Y-m-d');

			$res = Projet::insert_fichiers_lies($libFichier, $dateUploadFichier, $idProjet, $idUtilisateur);

			// Verifie l'action sinon erreur
			if($res=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "Votre fichier a bien été ajouté";
				$_SESSION['msgNotif'] = "Votre fichier a bien été ajouté";
				header("Location:index.php?module=projet&action=voir_page_projet&idProjet=$idProjet");
                        }
			else if($res=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Votre fichier n'a pas été ajouté";
				$_SESSION['msgNotif'] = "Votre fichier n'a pas été ajouté";
				header("Location:index.php?module=projet&action=voir_page_projet&idProjet=$idProjet");
			}
		}
		// Formulaire incomplet => affichage du formulaire
		else
		{

			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['msgNotif'] = "Vous devez remplir tout les champs du formulaire";
			$_SESSION['lastForm'] = $_POST;

			header("Location:index.php?module=projet&action=voir_page_projet&idProjet=$idProjet");
		}


	break;
        
          case "voir_projet" :
            require_once VIEWS.$controller.'/voir_projet.php';
	break; 
    
      //only admin
        case "deleteTrack" :
            // DELETE Compte Soundcloud
                if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}
                if(!empty($_GET['idFichier'])){$idFichier = $_GET['idFichier'];}
                    
		if(!empty($idProjet))
		{
			$deleteTrack = Projet::deleteTrackByAdmin($idFichier);
		}

		if(!empty($deleteTrack))
		{
			if($deleteTrack=="error")
			{
			
                                echo "Le track n'a pas pu être supprimé";
				header('Location:index.php?module=projet&action=manage&type=voir_projet&idProjet='.$idProjet);}
			else if($deleteTrack=="ok")
			{
				 echo "Le track a bien été supprimé";
                                header('Location:index.php?module=projet&action=manage&type=voir_projet&idProjet='.$idProjet);}
		}
        break;    
}