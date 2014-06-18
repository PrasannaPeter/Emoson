<?php

class M_Projet extends Projet
{

	// Function relative aux projets

	static function read_projet($idProjet=NULL, $titreProjet=NULL, $type=NULL)
	{
		$bdd = PDO();

		if(!empty($idProjet))
		{
            $read_projet = $bdd->query("
                SELECT *
                FROM projets P, utilisateurs U, pack PA
                WHERE idProjet = ".$idProjet."
                AND PA.idPack = P.idPack
                AND roleUtilisateur = 'ENTREPRISE'
                AND P.idUtilisateur = U.idUtilisateur
            ");

            $read_projet = $read_projet->fetch();

        }
        else if(!empty($titreProjet))
        {
            $read_projet = $bdd->query('
                SELECT *
				FROM projets P, utilisateurs U, pack PA
				WHERE titreProjet ='.$titreProjet.'
				AND PA.idPack = P.idPack
				AND P.idUtilisateur = U.idUtilisateur
				AND roleUtilisateur = "ENTREPRISE"
			');
		}
		else
		{
			$read_projet = '
				SELECT *
				FROM projets P, pack PA
				WHERE PA.idPack = P.idPack
			';

			// Filtre
			if(!empty($type))
			{
				switch ($type)
				{
					case "enattente":

						$read_projet .= " AND isActiveProjet = 0";
					break;

					case "encours":

						$read_projet .= " AND isActiveProjet = 1";
					break;

					case "termine":

						$read_projet .= " AND isActiveProjet = 2";
					break;


				}
			}

			$read_projet .= ' ORDER BY titreProjet';
			$read_projet = $bdd->query($read_projet);
		}

		return($read_projet);
	}


	static function read_last_projet($budgetMinProjet)
	{
		$bdd = PDO();

		$read_last_projet = $bdd->query('
			SELECT MAX(idProjet)
			FROM projets
			WHERE budgetMinProjet = '.$budgetMinProjet.'
		');

		return($read_last_projet);
	}

	static function read_contact()
	{
		$bdd = PDO();

		$read_contact = $bdd->query('
			SELECT *
			FROM utilisateurs
			WHERE roleUtilisateur = "ENTREPRISE"
		');

		return($read_contact);
	}

	static function nb_designer_actuel($idProjet)
	{
		$bdd = PDO();

		$nb_designer_actuel = $bdd->query('
			SELECT COUNT(idUtilisateur) AS nb_designer_actuel
			FROM propose
			WHERE idProjet = '.$idProjet.'
		');

		return($nb_designer_actuel);
	}


	static function insert_projet($titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise,  $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack)
	{
		$bdd = PDO();

		$sql_insert =$bdd->prepare('
			INSERT INTO projets(titreProjet, descriptionProjet, isActiveProjet, idUtilisateur, tailleEntreprise, caEntreprise, ptsContactEntreprise, optionProjet, nbARProjet, nbDesignerSouhaite, idPack)
			VALUES (:titreProjet, :descriptionProjet, :isActiveProjet, :idUtilisateur, :tailleEntreprise, :caEntreprise, :ptsContactEntreprise, :optionProjet, :nbARProjet, :nbDesignerSouhaite, :idPack)
					');

		$sql_insert->execute(array(
						'titreProjet' => $titreProjet,
						'descriptionProjet' => $descriptionProjet,
						'isActiveProjet' => $isActiveProjet,
						'idUtilisateur' => $idUtilisateur,
						'tailleEntreprise' => $tailleEntreprise,
						'caEntreprise' => $caEntreprise,
						'ptsContactEntreprise' => $ptsContactEntreprise,
						'optionProjet' => $optionProjet,
						'nbARProjet' => $nbARProjet,
						'nbDesignerSouhaite' => $nbDesignerSouhaite,
						'idPack' => $idPack,
					));

		return($sql_insert);
	}


	static function update_projet($idProjet, $titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise,  $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack)
	{
		$bdd = PDO();
		$sql_update = $bdd->prepare('
			UPDATE projets
			SET titreProjet=:titreProjet, descriptionProjet=:descriptionProjet, isActiveProjet=:isActiveProjet, idUtilisateur=:idUtilisateur, tailleEntreprise=:tailleEntreprise, caEntreprise=:caEntreprise, ptsContactEntreprise=:ptsContactEntreprise, optionProjet=:optionProjet, nbARProjet=:nbARProjet, nbDesignerSouhaite=:nbDesignerSouhaite, idPack=:idPack
			WHERE idProjet = '.$idProjet.'
		');

		$sql_update->execute(array(
						'titreProjet' => $titreProjet,
						'descriptionProjet' => $descriptionProjet,
						'isActiveProjet' => $isActiveProjet,
						'idUtilisateur' => $idUtilisateur,
						'tailleEntreprise' => $tailleEntreprise,
						'caEntreprise' => $caEntreprise,
						'ptsContactEntreprise' => $ptsContactEntreprise,
						'optionProjet' => $optionProjet,
						'nbARProjet' => $nbARProjet,
						'nbDesignerSouhaite' => $nbDesignerSouhaite,
						'idPack' => $idPack
					));

		return($sql_update);
	}



	static function del_projet($idProjet)
	{
		$bdd = PDO();

		$sql_delete = $bdd->query('
			DELETE FROM projets
			WHERE idProjet = '.$idProjet.'
		');
	}

	static function valider_projet($idProjet)
	{
		$bdd = PDO();

		$sql_valider = $bdd->query('UPDATE projets
									SET isActiveProjet = 1
									WHERE idProjet = '.$idProjet.'
		');
	}

	// Verification int�grit�e BDD

	static function verif_insert_projet($titreProjet)
	{
		$bdd = PDO();

		if(!empty($titreProjet))
		{
			$verif_sql_insert = $bdd->query('
				SELECT idProjet FROM projets WHERE titreProjet="'.$titreProjet.'"
			');
			$sql_insert = $verif_sql_insert->fetch();
		}

		return($sql_insert);
	}

	static function verif_delete_projet($idProjet)
	{
		$bdd = PDO();
		$sql = $bdd->query('
			SELECT idProjet
			FROM projets
			WHERE idProjet = '.$idProjet.'
		');

		$verif_sql_delete = $sql->fetch();

		return($verif_sql_delete['idProjet']);
	}
        
       // recuperation des données fichiers_lies
        static function get_fichiers_lies($idProjet)
	{
		$bdd = PDO();
		$sql = $bdd->query('
			SELECT *, nomUtilisateur
			FROM fichiers_lies, utilisateurs
			WHERE fichiers_lies.idUtilisateur = utilisateurs.idUtilisateur
                        AND idProjet = '.$idProjet.'
		');

		return($sql);
	}
        
        // insertion des données fichiers_lies
        static function insert_fichiers_lies($libFichier, $dateUploadFichier, $idProjet, $idUtilisateur)
	{

		$bdd = PDO();
		$sql_insert = $bdd->query("
			INSERT INTO fichiers_lies(libFichier, dateUploadFichier, idProjet, idUtilisateur)
			VALUES ('$libFichier', '$dateUploadFichier', '$idProjet', '$idUtilisateur')
					");
                return($sql_insert); 
	}
        
        static function get_nb_AR_Projet($idProjet)
	{
		$bdd = PDO();

		$nb_AR_Projet = $bdd->query('SELECT nbARProjet
                                                        FROM projets 
                                                        WHERE idProjet = '.$idProjet.'
		');
                $verif_sql = $nb_AR_Projet->fetch();

		return($verif_sql['nbARProjet']);
	}
        
        static function count_nb_AR_Projet($idProjet)
	{
		$bdd = PDO();

		$count_nb_AR_Projet = $bdd->query('SELECT count(idFichier)as nb
                                                        FROM fichiers_lies 
                                                        WHERE idProjet = '.$idProjet.'
		');
                $verif_sql = $count_nb_AR_Projet->fetch();

		return($verif_sql['nb']);
	}
        
}

	// static function set_Statut($idProjet, $emailContact)
	// {
		// $bdd = PDO();

		// $sql_update = $bdd->prepare('
			// UPDATE projets
			// SET emailContact =:emailContact
			// WHERE idProjet = '.$idProjet.'
		// ');

		// $sql_update->execute(array(
						// 'emailContact' => $emailContact
					// ));

		// return($sql_update);
	// }


	// static function set_read($idProjet, $nbPistes)
	// {
		// $bdd = PDO();

		// $sql_update = $bdd->prepare('
			// UPDATE projets
			// SET nbPistes =:nbPistes
			// WHERE idProjet = '.$idProjet.'
		// ');

		// $sql_update->execute(array(
						// 'nbPistes' => $nbPistes
					// ));

		// return($sql_update);
	// }