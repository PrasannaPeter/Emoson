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
					$req .= " WHERE certifUtilisateur = 0 AND roleUtilisateur = 'GRAPHISTE' ";
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

		if(!empty($sql_insert))
			$_SESSION['lastInsertId'] = $bdd->lastInsertId();

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

	//Retourne toute les proposition faite à un designer
	static function get_tab_designer_accepter($idUtilisateur)
	{
		$bdd = PDO();
		$read_assignation_designer = $bdd->query('SELECT projets.idProjet, titreProjet, descriptionProjet, dateDebutProjet, dateFinProjet, budgetMinProjet, budgetMaxProjet, etatProjet, acceptation
												FROM propose_projet, projets
												WHERE projets.idProjet = propose_projet.idProjet
												AND idUtilisateur = '.$idUtilisateur.'');

		return($read_assignation_designer);
	}

	//retourne si la propoposition a été acceptée ou non
	static function get_designer_accepter($idUtilisateur, $idProjet)
	{
		$bdd = PDO();
		$read_assignation_designer = $bdd->query('SELECT acceptation
												FROM propose_projet
												WHERE idUtilisateur = '.$idUtilisateur.'
												AND idProjet = '.$idProjet.'');

		return($read_assignation_designer);
	}

	static function del_projet_assigner($idProjet, $idUtilisateur)
	{
		$bdd = PDO();
		$del_assigner_projet = $bdd->query('DELETE FROM propose_projet WHERE idUtilisateur='.$idUtilisateur.' AND idProjet='.$idProjet.'');
	}

	static function assigner_projet($idUtilisateur, $idProjet)
	{
		$bdd = PDO();
		$assigner_projet = $bdd->query('INSERT INTO propose_projet(idUtilisateur, idProjet, acceptation) VALUE('.$idUtilisateur.','.$idProjet.',"non")');
	}

	static function get_projet()
	{

		$bdd= PDO();
		$get_projet = $bdd->query('SELECT idProjet, titreProjet, descriptionProjet, dateDebutProjet, dateFinProjet, budgetMinProjet, budgetMaxProjet, etatProjet FROM projets');
		return($get_projet);

	}

}
