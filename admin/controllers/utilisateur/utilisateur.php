f<?php

// On inclus le modèle néccéssaire
require_once MODELS.'M_Utilisateur.php';

class Utilisateur
{

	// Function relative a la connexion/changement mdp

	static function connexion($loginUtilisateur, $password, $type)
	{
/*		if(site_admin())
			$type = "ADMIN";
		else
			$type = NULL;*/

		// Requete qui selectionne les utilisateur/mdp
		$tableau_utilisateur = M_Utilisateur::verifUtilisateur($loginUtilisateur);
		if(is_object($tableau_utilisateur))
			$tableau_utilisateur = $tableau_utilisateur->fetch();

		if(count($tableau_utilisateur) > 1)
		{
			// Hashage du password
			$hash_password = sha1($loginUtilisateur.':'.$password);

			// Si la connexion est réussie
			if ( $hash_password == $tableau_utilisateur['passUtilisateur'] )
			{
				$_SESSION['connexion'] = "valide";
				$erreur_connexion = "noerror";

				// Complete les sessions (nom, prenom, service)
				$idUtilisateur = $tableau_utilisateur['idUtilisateur'];

				$infos_utilisateur = M_Utilisateur::read_utilisateur($idUtilisateur);

				$_SESSION['loginUtilisateur'] = $infos_utilisateur['loginUtilisateur'];
				$_SESSION['idUtilisateur'] = $infos_utilisateur['idUtilisateur'];
				$_SESSION['roleUtilisateur'] = $infos_utilisateur['roleUtilisateur'];
				$_SESSION['certifUtilisateur'] = $infos_utilisateur['certifUtilisateur'];
			}
			else
			{
				$connect['msgNotif'] = "Le nom du utilisateur et/ou le mot de passe saisis est incorrect.";
					return $connect;
			}
		}
		// Sinon ...
		else
		{
			$connect['msgNotif'] = "Le nom du utilisateur et/ou le mot de passe saisis est incorrect.";
				return $connect;
		}

		$connect = array
				('userInfo' => $tableau_utilisateur,
				 'msgNotif' => $erreur_connexion);

		switch ($connect['userInfo']['roleUtilisateur'])
		{
			case 'ADMIN':

				if(site_admin()){
					header('Location: index.php');
				}else{
					header('Location: admin/index.php');
				}
			break;

			case 'GRAPHISTE':
				header('Location: index.php?module=dashboard&action=afficher');
			break;

			case 'ENTREPRISE':
				header('Location: index.php?module=dashboard&action=afficher');
			break;

			default:
			echo "???";
				return $connect;
			break;
		}
		exit;
	}


	static function changer_mdp($loginUtilisateur, $old_password, $new_password, $new_password2)
	{
		// Requete SQL
		$get_mdp = M_Utilisateur::verifUtilisateur($loginUtilisateur);

		// Hashage de l'ancien mot de passe
		$hash_old_password = sha1($loginUtilisateur.':'.$old_password.'');

		// Si l'ancien mot de passe saisi correspond avec l'utilisateur
		if ($hash_old_password == $get_mdp['passUtilisateur'])
		{
			// Si les deux nouveaux mot de passes sont identiques
			if ( $new_password == $new_password2 )
			{
				$hash_new_password = sha1($loginUtilisateur.':'.$new_password.'');
				$hash_new_password = $new_password;

				// Requete SQL
				$set_mdp = M_Utilisateur::update_mdp($loginUtilisateur, $hash_new_password);

				$_SESSION['typeNotif'] = "sucess";
				$_SESSION['titreNotif'] = "Votre mot de passe a bien été modifié.";
			}
			// Sinon si ils sont différents
			else
			{
				$_SESSION['typeNotif'] = "error";
				$_SESSION['titreNotif'] = "Echec de la modification du mot de passe";
				$_SESSION['msgNotif'] = "Vous devez confirmer votre nouveau mot de passe.";

				if(site_admin())
					require_once(VIEWS.'utilisateur/change_password.php');
				else
					require_once(VIEWS.'change_password.php');
			}
		}
		// Sinon si mauvais mot de passe
		else
		{
			$_SESSION['typeNotif'] = "error";
			$_SESSION['titreNotif'] = "Echec de la modification du mot de passe";
			$_SESSION['msgNotif'] = "Votre ancien mot de passe n'est pas correct.";

			if(site_admin())
				require_once(VIEWS.'utilisateur/change_password.php');
			else
				require_once(VIEWS.'change_password.php');
		}

		return($message);
	}


	static function deconnexion()
	{
		// Détruit les sessions => déconnexion
		session_destroy();
		if(site_admin())
			header('Location:../index.php');
		else
			header('Location:index.php');
	}


	static function demander_certif_designer()
	{

 		M_Utilisateur::demander_certif($_SESSION['idUtilisateur']);
		header('Location:index.php?module=dashboard&action=afficher');
	}

	// Function relative aux tickets

	static function get_utilisateur($idUtilisateur=NULL, $loginUtilisateur=NULL, $type=NULL)
	{
		// Si on a un identifiant, on cherche les infos de la personne concernée
		if(!empty($loginUtilisateur))
		{
			$get_utilisateur = M_Utilisateur::read_utilisateur($loginUtilisateur);
		}
		// Si on a un ID
		if(!empty($idUtilisateur))
		{
			$get_utilisateur = M_Utilisateur::read_utilisateur($idUtilisateur);
		}
		// Sinon on prend tout
		else
		{
			if(!empty($type))
			{
				$get_utilisateur = M_Utilisateur::read_utilisateur($idUtilisateur=NULL, $loginUtilisateur=NULL, $type);
			}
			else
			{
				$get_utilisateur = M_Utilisateur::read_utilisateur();
			}
		}

		return($get_utilisateur);
	}

	static function get_utilisateur_in_projet($idProjet)
	{
		if(!empty($idProjet))
		{
			$get_utilisateur = M_Utilisateur::get_utilisateur_in_projet($idProjet);
		}
		return($get_utilisateur);
	}

	static function nb_utilisateur()
	{
		$nb_utilisateur = M_Utilisateur::nb_utilisateur();

		return($nb_utilisateur);
	}

	static function nb_designer()
	{
		$nb_designer = M_Utilisateur::nb_designer();

		return($nb_designer);
	}

	static function nb_entreprise()
	{
		$nb_entreprise = M_Utilisateur::nb_entreprise();

		return($nb_entreprise);
	}


	static function tab_utilisateur($type=NULL)
	{
			if(!empty($type))
			{
				$read_utilisateur = Utilisateur::get_utilisateur($idUtilisateur=NULL, $loginUtilisateur=NULL, $type);
			}
			else
			{
				$read_utilisateur = Utilisateur::get_utilisateur($idUtilisateur=NULL, $loginUtilisateur=NULL, $type=NULL);
			}

			// Boucle remplissage du tableau
			while($tab_utilisateur = $read_utilisateur->fetch())
			{
				?>
					<tr>
						<td><?php echo $tab_utilisateur['loginUtilisateur']; ?></td>
						<td><?php echo $tab_utilisateur['nomUtilisateur']." ".$tab_utilisateur['prenomUtilisateur']; ?></td>
						<td><?php echo $tab_utilisateur['emailUtilisateur']; ?></td>
						<td><?php echo $tab_utilisateur['telUtilisateur']; ?></td>
						<td><?php echo $tab_utilisateur['roleUtilisateur']; ?></td>
						<td class="actions">
							<a href="index.php?module=utilisateur&action=manage&type=modifier&idUtilisateur=<?php echo $tab_utilisateur['idUtilisateur']; ?>" title="Editer" class="btn btn-default btn-xs btn-icon icon-left">
								<i class="entypo-pencil"></i>
								Editer
							</a>

							<a href="index.php?module=utilisateur&action=manage&type=supprimer&idUtilisateur=<?php echo $tab_utilisateur['idUtilisateur']; ?>" title="Supprimer" class="btn btn-danger btn-xs btn-icon icon-left">
								<i class="entypo-trash"></i>
								Supprimer
							</a>
                                                        <?php if($tab_utilisateur['roleUtilisateur'] == "GRAPHISTE"){ ?>
							<a href="../index.php?module=designer&action=profil&idUtilisateur=<?php echo $tab_utilisateur['idUtilisateur']; ?>" class="btn btn-info btn-xs btn-icon icon-left">
								<i class="entypo-info"></i>
								Profil
							</a>
                                                        <?php } ?>
						<?php
						if ($tab_utilisateur['roleUtilisateur'] == "GRAPHISTE" && $tab_utilisateur['certifUtilisateur'] == "1")
						{?>
							<a href="../admin/index.php?module=proposition&action=afficher_proposition&type_proposition=utilisateur&idUtilisateur=<?php echo $tab_utilisateur['idUtilisateur']; ?>" class="btn btn-xs btn-success">
								<i class="entypo-info"></i>
								Proposer un projet
							</a>
						<?php
						}?>
						</td>

					</tr>
				<?php
			}
	}


	// Fonction CRUD
	// Retourne $typeNotif & $msgNotif si erreur

	static function set_utilisateur($idUtilisateur=NULL, $nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur=NULL, $emailUtilisateur, $bioUtilisateur, $roleUtilisateur, $certifUtilisateur)
	{
		if(!$certifUtilisateur){
			$certifUtilisateur = 0;
                }

		// Si on a pas d'ID, INSERT
		if(empty($idUtilisateur))
		{
			$type = "insert";

			$verif_sql = Utilisateur::verif_sql($type, $loginUtilisateur,$emailUtilisateur);

			if(!empty($verif_sql) && $verif_sql=="error_ID")
			{
				return $verif_sql;
			}
			else if(!empty($verif_sql) && $verif_sql=="error_info")
			{
				return $verif_sql;
			}
			else if(!empty($verif_sql) && $verif_sql=="error")
			{
				return $verif_sql;
			}
                         else if(!empty($verif_sql) && $verif_sql=="errorEmailExist")
			{
				return $verif_sql;
			}
                        else if(!empty($verif_sql) && $verif_sql=="errorUserExist")
			{
				return $verif_sql;
			}
			else
			{
				$passUtilisateur = sha1($loginUtilisateur.':'.$passUtilisateur);

				$sql_insert = M_Utilisateur::insert_utilisateur($nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur, $emailUtilisateur, $bioUtilisateur, $roleUtilisateur, $certifUtilisateur);

					if($sql_insert == true)
					{
						$error = "ok";
					}
					else
					{
						$error = "error";
						$_SESSION['msgNotif'] = "Vous ne pouvez pas supprimer le utilisateur, certainement car il est encore assigné à un projet.";
					}

				return $error;
			}

		}
		// Sinon UPDATE
		Else
		{
			$type = "update";

			$sql_update = M_Utilisateur::update_utilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur, $emailUtilisateur, $bioUtilisateur, $roleUtilisateur, $certifUtilisateur);

			if($sql_update == true)
			{
				$updateUtilisateur = "ok";
			}
			else
			{
				$updateUtilisateur = "error";
			}

			return($updateUtilisateur);

		}
	}


	static function del_utilisateur($idUtilisateur)
	{
		$type = "delete";

		$verif_sql = Utilisateur::verif_sql($type, $loginUtilisateur=NULL, $idUtilisateur);

		if(!empty($verif_sql))
		{
			$delUtilisateur = "error";
			return($delUtilisateur);
		}
		else
		{
			$delUtilisateur = M_Utilisateur::del_utilisateur($idUtilisateur);

			if($delUtilisateur == true)
			{
				$delUtilisateur = "ok";
			}
			else
			{
				$delUtilisateur = "error";
				$_SESSION['msgNotif'] = "Vous ne pouvez pas supprimer le utilisateur, certainement car il est encore assigné à un projet.";
			}

			return($delUtilisateur);
		}
	}


	static function verif_sql($type, $loginUtilisateur=NULL, $emailUtilisateur=NULL,$idUtilisateur=NULL)
	{
		switch ($type)
		{
			case "insert":

				$verif_sql_insert = M_Utilisateur::verif_login_utilisateurBDD($loginUtilisateur);

                                if(!empty($verif_sql_insert['idUtilisateur']))
				{
					$error="errorUserExist";
					return $error;
				}

                                $verif_sql_insertEmail = M_Utilisateur::verif_email_utilisateurBDD($emailUtilisateur);
                                if(!empty($verif_sql_insertEmail['idUtilisateur'])){

                                        $error="errorEmailExist";
					return $error;
                                }

			break;


			case "update":

				$verif_sql_insert = M_Utilisateur::verif_login_utilisateurBDD($loginUtilisateur);

				if(!empty($verif_sql_insert['idUtilisateur']))
				{
					$error="errorUserExist";
					return $error;
                                }

			break;


			case "delete":
				$idUtilisateur = $_GET['idUtilisateur'];
				// $verif_sql_delete = M_Utilisateur::verif_delete_utilisateur($idUtilisateur);

				if(!empty($verif_sql_delete))
				{
					$typeNotif = "error";
					return $typeNotif;
				}

			break;
		}
	}


        static function get_compte_soundcloud($idUtilisateur)
	{
            	$get_compte_soundcloud = M_Utilisateur::get_compte_soundcloud($idUtilisateur);
		return($get_compte_soundcloud);
	}

        static function souncloud_utilisateur($idUtilisateur,$soundcloudID)
	{
            $verif_sql = M_Utilisateur::verif_compte_soundcloud($idUtilisateur);
            if(!empty($verif_sql))
            {
                    $error = "errorUserExist";
                    return $error;
            }
            else
            {
                $verif_sql_insert = M_Utilisateur::add_compte_soundcloud($idUtilisateur,$soundcloudID);
                if(!empty($verif_sql_insert['idUtilisateur']))
                {
                        $error="error";
                        return $error;
                }else{
                        $error="ok";
                        return $error;
                }
            }

	}

        static function modifier_designer_img($idUtilisateur,$img)
	{
            $verif_sql = M_Utilisateur::verif_designer_img($idUtilisateur);
            if(!empty($verif_sql))
            {
                $get_compte_soundcloud = M_Utilisateur::update_designer_img($idUtilisateur,$img);
		return($get_compte_soundcloud);
            }  else {
                $get_compte_soundcloud = M_Utilisateur::add_designer_img($idUtilisateur,$img);
		return($get_compte_soundcloud);
            }

	}

        static function get_designer_img($idUtilisateur)
	{
            	$get_designer_img = M_Utilisateur::get_designer_img($idUtilisateur);
		return($get_designer_img);
	}

        static function deleteCompteSoundcloud($idUtilisateur)
	{
            $verif_sql_delete = M_Utilisateur::deleteCompteSoundcloud($idUtilisateur);

            if(!empty($verif_sql_delete))
            {
                     $typeNotif = "ok";
                    return $typeNotif;

            }  else {
                     $typeNotif = "error";
                    return $typeNotif;
            }
        }


}
if(site_admin() && !empty($controller))
{
	if($_GET['action'] != "change_password")
	{
		require_once('views/'.$controller.'/'.$controller.'.php');
	}
}