<?php

// On récupère les informations du formulaire (si saisie)
if(!empty($_GET['idUtilisateur'])){$idUtilisateur = $_GET['idUtilisateur'];}
if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}
if(!empty($_GET['acceptation']))
{
	if($_GET['acceptation'] == 'non') 
	{
		$acceptation = 0;
	}
	else
	{
		$acceptation = $_GET['acceptation'];
	}
}

if(!empty($_GET['validation']))
{
	if($_GET['validation'] == 'non') 
	{
		$validation = 0;
	}
	else
	{
		$validation = $_GET['validation'];
	}
}
if(isset($_GET['type_proposition'])){if(!empty($_GET['type_proposition'])){$type_proposition = $_GET['type_proposition'];}}
if(!empty($_GET['type'])){$type = $_GET['type'];}



switch($type)
{
	case "add_proposition" :

		//Si c'est le formulaire projet
		if($type_proposition == "projet")
		{
			//Projet::del_assigner_graphiste($idProjet);
			$nbRow = count($_POST['graphiste_assigner']);

			for($nb=0; $nb<$nbRow; $nb++)
			{
				Proposition::add_proposition($idProjet, $_POST['graphiste_assigner'][$nb]);
				header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition=projet&idProjet='.$idProjet.'');
			}
		}
		else if($type_proposition == "utilisateur")
		{
			//Projet::del_assigner_graphiste($idProjet);
			$nbRow = count($_POST['projet_assigner']);

			for($nb=0; $nb<$nbRow; $nb++)
			{
				Proposition::add_proposition($_POST['projet_assigner'][$nb], $idUtilisateur);
				header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition=utilisateur&idUtilisateur='.$idUtilisateur.'');
			}
		}

	break;

	case "set_proposition" :

		// UPDATE

		$set_utilisateur = Proposition::set_proposition($idProjet, $idUtilisateur, $acceptation, $validation);

		if ($type_proposition == "projet")
		{
			header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition=projet&idProjet='.$idProjet.'');
		}
		else if($type_proposition == "utilisateur")
		{
			header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition=utilisateur&idUtilisateur='.$idUtilisateur.'');
		}
		else if ($type_proposition == "designer")
		{
			header('Location:index.php?module=designer&action=voir_proposition&idUtilisateur='.$idUtilisateur.'');
		}
		

	break;

	case "del_proposition" :

		// DELETE
		if(!empty($idProjet) || !empty($idUtilisateur))
		{
			$del_proposition = Proposition::del_proposition($idProjet, $idUtilisateur);
		}
		else
		{
			echo 'les variables sont vides';
		}

		if(!empty($del_proposition))
		{
			if($del_proposition=="error")
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "L'assignation n'a pas pu être supprimé";
				$_SESSION['msgNotif'] = "";
				if($type_proposition == "projet")
				{
					header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition='.$type_proposition.'&idProjet='.$idProjet.'');
				}
				else if($type_proposition == "utilisateur")
				{
					header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition='.$type_proposition.'&idUtilisateur='.$idUtilisateur.'');	
				}

			}
			else if($del_proposition=="ok")
			{
				$_SESSION['typeNotif'] = "success";
				$_SESSION['titreNotif'] = "L'assignation a bien été supprimé";
				$_SESSION['msgNotif'] = "";
				if($type_proposition == "projet")
				{
					header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition='.$type_proposition.'&idProjet='.$idProjet.'');
				}
				else if($type_proposition == "utilisateur")
				{
					header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition='.$type_proposition.'&idUtilisateur='.$idUtilisateur.'');	
				}
			}
		}

		if($type_proposition == "projet")
		{
			header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition='.$type_proposition.'&idProjet='.$idProjet.'');
		}
		else if($type_proposition == "utilisateur")
		{
			header('Location:index.php?module=proposition&action=afficher_proposition&type_proposition='.$type_proposition.'&idUtilisateur='.$idUtilisateur.'');	
		}

	break;
}