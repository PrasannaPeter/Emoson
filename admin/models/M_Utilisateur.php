<?php

class M_Utilisateur extends Utilisateur
{

	// Function relative a la connexion/changement mdp


	static function verifUtilisateur($loginUtilisateur, $type=NULL)
	{
		$bdd = PDO();

		if(!empty($type))
		{
			// Requete qui selectionne les utilisateur/mdp
			$utilisateurs = $bdd->query('
				SELECT idUtilisateur, loginUtilisateur, passUtilisateur, idUtilisateur, roleUtilisateur, loginUtilisateur
				FROM utilisateurs
				WHERE roleUtilisateur = "'.$type.'"
				AND loginUtilisateur = "'.$loginUtilisateur.'"
			');

			return($utilisateurs);
		}
		else
		{
			// Requete SQL
			$get_mdp = $bdd->query('
				SELECT idUtilisateur, passUtilisateur, roleUtilisateur, loginUtilisateur
				FROM utilisateurs
				WHERE loginUtilisateur ="'.$loginUtilisateur.'"
			');
			$get_mdp = $get_mdp->fetch();

			return($get_mdp);
		}
	}


	static function update_mdp($loginUtilisateur, $hash_new_password)
	{
		$bdd = PDO();

		// Requete SQL
		$set_mdp = $bdd->prepare('
			UPDATE utilisateurs
			SET passUtilisateur = :passUtilisateur
			WHERE loginUtilisateur = :loginUtilisateur
		');

		$set_mdp->execute(array(
								  'passUtilisateur' => $hash_new_password,
								  'loginUtilisateur' => $loginUtilisateur
								 ));

		return($set_mdp);
	}


	static function demander_certif($idUtilisateur)
	{
		$bdd = PDO();

		// Requete SQL
		$demander_certif = $bdd->prepare('
			UPDATE utilisateurs
			SET certifUtilisateur = 2
			WHERE idUtilisateur = :idUtilisateur
		');

		$demander_certif->execute(array(
								  'idUtilisateur' => $idUtilisateur
								 ));

		return($demander_certif);
	}


	// Function relative aux utilisateurs

	static function read_utilisateur($idUtilisateur=NULL, $loginUtilisateur=NULL,$type=NULL)
	{
		$bdd = PDO();

		if(!empty($idUtilisateur))
		{
			$lire_utilisateur = $bdd->query('
				SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, telUtilisateur, loginUtilisateur, emailUtilisateur, roleUtilisateur, bioUtilisateur, certifUtilisateur
				FROM utilisateurs
				WHERE idUtilisateur ='.$idUtilisateur.'
			');
			$read_utilisateur = $lire_utilisateur->fetch();
		}
		else if(!empty($loginUtilisateur))
		{
			$lire_utilisateur = $bdd->query('
				SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, telUtilisateur, loginUtilisateur, emailUtilisateur, roleUtilisateur, bioUtilisateur, certifUtilisateur
				FROM utilisateurs
				WHERE idUtilisateur ='.$idUtilisateur.'
			');
			$read_utilisateur = $lire_utilisateur->fetch();
		}
		else
		{
			$req = '
				SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, telUtilisateur, loginUtilisateur, emailUtilisateur, roleUtilisateur, bioUtilisateur, certifUtilisateur
				FROM utilisateurs
			';

			switch ($type) {
				case 'admin':
					$req .= " WHERE roleUtilisateur = 'ADMIN' ";
				break;

				case 'graphiste':
					$req .= " WHERE roleUtilisateur = 'GRAPHISTE' ";
				break;

				case 'enattente':
					$req .= " WHERE certifUtilisateur = 2 AND roleUtilisateur = 'GRAPHISTE' ";
				break;

				case 'contact':
					//$req .= " WHERE idEntreprise != NULL ";
					$req .= " WHERE roleUtilisateur = 'ENTREPRISE' ";

				break;

				default:
					# code...
				break;
			}

			$read_utilisateur = $bdd->query($req);

		}

		return($read_utilisateur);
	}

	static function get_utilisateur_in_projet($idProjet)
	{
		$bdd = PDO();

		$read_projet_utilisateur = $bdd->query('SELECT *
												FROM propose P, utilisateurs U
												WHERE P.idUtilisateur = U.idUtilisateur
												AND acceptation = 1
												AND validation = 1
												AND idProjet = '.$idProjet.'
			');
		return($read_projet_utilisateur);
	}

	static function nb_utilisateur()
	{
		$bdd = PDO();

		$nb_utilisateur = $bdd->query('SELECT COUNT(*) as nbUtilisateur
												FROM utilisateurs
												WHERE roleUtilisateur = "GRAPHISTE"
												OR roleUtilisateur = "ENTREPRISE"
			');
		return($nb_utilisateur);
	}

	static function nb_designer()
	{
		$bdd = PDO();

		$nb_designer = $bdd->query('SELECT COUNT(*) as nbDesigner
									FROM utilisateurs
									WHERE roleUtilisateur = "GRAPHISTE"
			');
		return($nb_designer);
	}

	static function nb_entreprise()
	{
		$bdd = PDO();

		$nb_entreprise = $bdd->query('SELECT COUNT(*) as nbEntreprise
												FROM utilisateurs
												WHERE roleUtilisateur = "ENTREPRISE"
			');
		return($nb_entreprise);
	}

	static function get_projet_utilisateur($idUtilisateur)
	{
		$bdd = PDO();

		$read_projet_utilisateur = $bdd->query('
				SELECT COUNT(*) AS nbProjet
				FROM projets
				WHERE idUtilisateur = '.$idUtilisateur.'
			');

		return($read_projet_utilisateur);
	}


	static function insert_utilisateur($nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur, $emailUtilisateur, $bioUtilisateur, $roleUtilisateur, $certifUtilisateur)
	{
		$bdd = PDO();

		$sql_insert =$bdd->prepare('
			INSERT INTO utilisateurs(nomUtilisateur, prenomUtilisateur, telUtilisateur, loginUtilisateur, passUtilisateur, emailUtilisateur, bioUtilisateur, roleUtilisateur, certifUtilisateur)
			VALUES (:nomUtilisateur, :prenomUtilisateur, :telUtilisateur, :loginUtilisateur, :passUtilisateur, :emailUtilisateur, :bioUtilisateur, :roleUtilisateur, :certifUtilisateur)
		');

		$sql_insert = $sql_insert->execute(array(
						'nomUtilisateur' => $nomUtilisateur,
						'prenomUtilisateur' => $prenomUtilisateur,
						'telUtilisateur' => $telUtilisateur,
						'loginUtilisateur' => $loginUtilisateur,
						'passUtilisateur' => $passUtilisateur,
						'emailUtilisateur' => $emailUtilisateur,
						'bioUtilisateur' => $bioUtilisateur,
						'roleUtilisateur' => $roleUtilisateur,
						'certifUtilisateur' => $certifUtilisateur,
					));

               if(!empty($sql_insert)){
                   $lastUserId = $bdd->lastInsertId();
                   $_SESSION['lastInsertId'] = $lastUserId;
               }
		return($sql_insert);
	}

	static function update_utilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $telUtilisateur, $loginUtilisateur, $passUtilisateur=NULL, $emailUtilisateur, $bioUtilisateur, $roleUtilisateur, $certifUtilisateur)
	{
		$bdd = PDO();

		$sql_update = $bdd->prepare('
			UPDATE utilisateurs
			SET nomUtilisateur=:nomUtilisateur, prenomUtilisateur=:prenomUtilisateur, telUtilisateur=:telUtilisateur, loginUtilisateur=:loginUtilisateur, emailUtilisateur=:emailUtilisateur, bioUtilisateur=:bioUtilisateur, roleUtilisateur=:roleUtilisateur, certifUtilisateur=:certifUtilisateur
			WHERE idUtilisateur = '.$idUtilisateur.'
		');
		$sql_update = $sql_update->execute(array(
						'nomUtilisateur' => $nomUtilisateur,
						'prenomUtilisateur' => $prenomUtilisateur,
						'telUtilisateur' => $telUtilisateur,
						'loginUtilisateur' => $loginUtilisateur,
						'emailUtilisateur' => $emailUtilisateur,
						'bioUtilisateur' => $bioUtilisateur,
						'roleUtilisateur' => $roleUtilisateur,
						'certifUtilisateur' => $certifUtilisateur,
					));

		return($sql_update);
	}


	static function del_utilisateur($idUtilisateur)
	{
		$bdd = PDO();

		$sql_delete = $bdd->query('
			DELETE FROM utilisateurs
			WHERE idUtilisateur = '.$idUtilisateur.'
		');

		return $sql_delete;

	}


	// Verification intégritée BDD

	static function verif_login_utilisateurBDD($loginUtilisateur)
	{
		$bdd = PDO();

		$verif_sql_insert = $bdd->query('
				SELECT idUtilisateur, loginUtilisateur
				FROM utilisateurs
				WHERE loginUtilisateur = "'.$loginUtilisateur.'"
			');

			$sql_insert = $verif_sql_insert->fetch();

		return($sql_insert);
	}

        //verif email user lors de l inscription
        static function verif_email_utilisateurBDD($emailUtilisateur)
	{
		$bdd = PDO();

                $verif_sql_insert = $bdd->query('
                        SELECT idUtilisateur,loginUtilisateur
                        FROM utilisateurs
                        WHERE emailUtilisateur = "'.$emailUtilisateur.'"
                ');

                $sql_insert = $verif_sql_insert->fetch();

		return($sql_insert);
	}

        //update verif si login existe deja
        static function verif_update_utilisateurBDD($loginUtilisateur)
	{
		$bdd = PDO();

                $verif_sql_insert = $bdd->query('
                        SELECT count(loginUtilisateur) as nbLogin
                        FROM utilisateurs
                        WHERE loginUtilisateur = "'.$loginUtilisateur.'"
                ');

                $sql_insert = $verif_sql_insert->fetch();

		return($sql_insert);
	}

        //verif email user lors de la modification
        static function verif_update_email_utilisateurBDD($emailUtilisateur)
	{
		$bdd = PDO();

                $verif_sql_insert = $bdd->query('
                       SELECT count(loginUtilisateur) as nbLoginEmail
                        FROM utilisateurs
                        WHERE emailUtilisateur = "'.$emailUtilisateur.'"
                ');

                $sql_insert = $verif_sql_insert->fetch();
		return($sql_insert);
	}

	static function verif_delete_utilisateur($idUtilisateur)
	{
		$bdd = PDO();

		$verif_sql_delete = $bdd->query('
			SELECT idUtilisateur
			FROM projets
			WHERE idUtilisateur ='.$idUtilisateur.'
		');

		$verif_sql_delete = $verif_sql_delete->fetch();

		return($verif_sql_delete['idUtilisateur']);
	}

        static function add_compte_soundcloud($idUtilisateur,$soundcloudID)
	{
		$bdd = PDO();

		$sql =$bdd->prepare('
			INSERT INTO compte_soundcloud(compte_soundcloud_designer_id,compte_soundcloud_soundcloud_id)
			VALUES (:idUtilisateur, :soundcloudID)
		');

                $sql_insert = $sql->execute(array(
                                'idUtilisateur' => $idUtilisateur,
                                'soundcloudID' => $soundcloudID
                        ));

		return($sql_insert);
	}

        static function verif_compte_soundcloud($idUtilisateur)
	{
		$bdd = PDO();

		$verif_sql = $bdd->query('
			SELECT compte_soundcloud_designer_id
			FROM compte_soundcloud
			WHERE compte_soundcloud_designer_id ='.$idUtilisateur.'
		');

		$verif_sql_compte_soundcloud = $verif_sql->fetch();

		return($verif_sql_compte_soundcloud['compte_soundcloud_designer_id']);
	}

        static function get_compte_soundcloud($idUtilisateur)
	{
		$bdd = PDO();

		$verif_sql = $bdd->query('
			SELECT compte_soundcloud_soundcloud_id
			FROM compte_soundcloud
			WHERE compte_soundcloud_designer_id ='.$idUtilisateur.'
		');

		$verif_sql_compte_soundcloud = $verif_sql->fetch();
		return($verif_sql_compte_soundcloud['compte_soundcloud_soundcloud_id']);
	}


         static function add_designer_img($idUtilisateur,$img)
	{
		$bdd = PDO();

		$sql =$bdd->prepare('
			INSERT INTO designer_img(designer_img_designer_id,designer_img_url)
			VALUES (:idUtilisateur, :img)
		');

                $sql_insert = $sql->execute(array(
                                'idUtilisateur' => $idUtilisateur,
                                'img' => $img
                        ));

		return($sql_insert);
	}

         static function get_designer_img($idUtilisateur)
	{
		$bdd = PDO();

		$verif_sql = $bdd->query('
			SELECT designer_img_url
			FROM designer_img
			WHERE designer_img_designer_id ='.$idUtilisateur.'
		');

		$verif_sql_compte_soundcloud = $verif_sql->fetch();

		return($verif_sql_compte_soundcloud['designer_img_url']);
	}

        static function update_designer_img($idUtilisateur,$img)
	{
		$bdd = PDO();

		$sql = $bdd->prepare('
			UPDATE designer_img
			SET designer_img_url=:designer_img_url
			WHERE designer_img_designer_id = '.$idUtilisateur.'
		');
		$sql_update = $sql->execute(array(
                                                'designer_img_url' => $img
					));

		return($sql_update);
	}
         static function verif_designer_img($idUtilisateur)
	{
		$bdd = PDO();

		$verif_sql = $bdd->query('
			SELECT designer_img_designer_id
			FROM designer_img
			WHERE designer_img_designer_id ='.$idUtilisateur.'
		');

		$verif_sql_compte_soundcloud = $verif_sql->fetch();

		return($verif_sql_compte_soundcloud['designer_img_designer_id']);
	}

        static function deleteCompteSoundcloud($idUtilisateur)
	{
		$bdd = PDO();

		$sql_delete = $bdd->query('
			DELETE FROM compte_soundcloud
			WHERE compte_soundcloud_designer_id = '.$idUtilisateur.'
		');

		return $sql_delete;

	}


}
