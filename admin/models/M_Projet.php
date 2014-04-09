<?php

class M_Projet extends Projet
{

	// Function relative aux projets

	static function read_projet($idProjet=NULL, $titreProjet=NULL, $type=NULL)
	{
		$bdd = PDO();


		if(!empty($idProjet))
		{
			$read_projet = $bdd->query('
				SELECT idProjet, titreProjet, descriptionProjet, dateDebutProjet, dateFinProjet, nbPistes, isActiveProjet, budgetMinProjet, budgetMaxProjet
				FROM projets
				WHERE idProjet ='.$idProjet.'
			');
			$read_projet = $read_projet->fetch();
		}
		else if(!empty($titreProjet))
		{
			$read_projet = $bdd->query('
				SELECT idProjet, titreProjet, descriptionProjet, dateDebutProjet, dateFinProjet, nbPistes, isActiveProjet, budgetMinProjet, budgetMaxProjet
				FROM projets
				WHERE titreProjet = "'.$titreProjet.'"
			');
		}
		else
		{
			$read_projet = '
				SELECT idProjet, titreProjet, descriptionProjet, dateDebutProjet, dateFinProjet, nbPistes, isActiveProjet, budgetMinProjet, budgetMaxProjet
				FROM projets
			';

			// Filtre
			if(!empty($type))
			{
				switch ($type)
				{
					case "classe":

						$lire_graphiste .= ', Classes WHERE idClasse = '.$idClasse.'';
					break;


					default :

						$lire_graphiste .= ', appartenir, classes
										WHERE Graphistes.idGraphiste = appartenir.idGraphiste
										AND appartenir.idClasse = classes.idClasse
										AND classes.anneeClasse = '.$type.'';

				}
			}

			$read_projet .= ' ORDER BY budgetMaxProjet';
			$read_projet = $bdd->query($read_projet);
		}

		return($read_projet);
	}


	static function projet_accepter($idProjet)
	{
		$bdd = PDO();
		$read_assignation_projet = $bdd->query('SELECT utilisateurs.idUtilisateur, nomUtilisateur, prenomUtilisateur, acceptation
												FROM utilisateurs, propose
												WHERE utilisateurs.idUtilisateur = propose.idUtilisateur
												AND idProjet = '.$idProjet.'');

		return($read_assignation_projet);
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


	static function insert_projet($titreProjet, $descriptionProjet, $dateDebutProjet, $dateFinProjet, $nbPistes, $isActiveProjet, $budgetMinProjet, $budgetMaxProjet)
	{
		$bdd = PDO();

		$sql_insert =$bdd->prepare('
			INSERT INTO projets(titreProjet, descriptionProjet, dateDebutProjet, dateFinProjet, isActiveProjet, budgetMinProjet, budgetMaxProjet)
			VALUES (:titreProjet, :descriptionProjet, :dateDebutProjet, :dateFinProjet, :nbPistes, :isActiveProjet, :budgetMinProjet, :budgetMaxProjet)
					');

		$sql_insert->execute(array(
						'titreProjet' => $titreProjet,
						'descriptionProjet' => $descriptionProjet,
						'dateDebutProjet' => $dateDebutProjet,
						'dateFinProjet' => $dateFinProjet,
						'nbPistes' => $nbPistes,
						'dateFinProjet' => $dateFinProjet,
						'isActiveProjet' => $isActiveProjet,
						'budgetMinProjet' => $budgetMinProjet,
						'budgetMaxProjet' => $budgetMaxProjet,
					));

		return($sql_insert);
	}


	static function update_projet($idProjet, $titreProjet, $descriptionProjet, $dateDebutProjet, $dateFinProjet, $nbPistes, $isActiveProjet, $budgetMinProjet, $budgetMaxProjet)
	{
		$bdd = PDO();
		$sql_update = $bdd->prepare('
			UPDATE projets
			SET titreProjet=:titreProjet, descriptionProjet=:descriptionProjet, dateDebutProjet=:dateDebutProjet, dateFinProjet=:dateFinProjet, nbPistes=:nbPistes, isActiveProjet=:isActiveProjet, budgetMinProjet=:budgetMinProjet, budgetMaxProjet=:budgetMaxProjet
			WHERE idProjet = '.$idProjet.'
		');

		$sql_update->execute(array(
						'titreProjet' => $titreProjet,
						'descriptionProjet' => $descriptionProjet,
						'dateDebutProjet' => $dateDebutProjet,
						'dateFinProjet' => $dateFinProjet,
						'nbPistes' => $nbPistes,
						'isActiveProjet' => $isActiveProjet,
						'budgetMinProjet' => $budgetMinProjet,
						'budgetMaxProjet' => $budgetMaxProjet
					));

		return($sql_update);
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


	static function del_projet($idProjet)
	{
		$bdd = PDO();

		$sql_delete = $bdd->query('
			DELETE FROM projets
			WHERE idProjet = '.$idProjet.'
		');
	}

	// Verification intégritée BDD

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
		$verif_sql_delete = $bdd->query('
			SELECT idProjet
			FROM faireprojet
			WHERE idProjet = '.$idProjet.'
		');

		$verif_sql_delete = $verif_sql_delete->fetch();

		return($verif_sql_delete['idProjet']);
	}

	static function del_graphiste_assigner($idProjet, $idGraphiste)
	{
		$bdd = PDO();
		$del_assigner_graphiste = $bdd->query('DELETE FROM propose WHERE idProjet='.$idProjet.' AND idUtilisateur='.$idGraphiste.'');
	}

	static function assigner_graphiste($idProjet, $idGraphiste)
	{
		$bdd= PDO();
		$assigner_graphiste = $bdd->query('INSERT INTO propose(idProjet, idUtilisateur, acceptation) VALUE('.$idProjet.','.$idGraphiste.',"non")');
	}

	static function get_designer()
	{

		$bdd= PDO();
		$get_designer = $bdd->query('SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur FROM Utilisateurs WHERE roleUtilisateur ="GRAPHISTE"');
		return($get_designer);

	}

}
