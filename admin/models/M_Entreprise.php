<?php

class M_Entreprise extends Entreprise
{

	// Function relative aux entreprises

	static function read_entreprise($idEntreprise=NULL, $type=NULL)
	{
		$bdd = PDO();


		if(!empty($idEntreprise))
		{
			$read_entreprise = $bdd->query('
				SELECT idEntreprise, raisonSocialeEntreprise, secteurEntreprise, siteWebEntreprise, adresseEntreprise, villeEntreprise, CPEntreprise, idUtilisateur, numSiretEntreprise, typeEntreprise
				FROM entreprises
				WHERE idEntreprise ='.$idEntreprise.'
			');
			$read_entreprise = $read_entreprise->fetch();
		}
		else
		{
			$read_entreprise = '
				SELECT idEntreprise, raisonSocialeEntreprise, secteurEntreprise, siteWebEntreprise, adresseEntreprise, villeEntreprise, CPEntreprise, idUtilisateur, numSiretEntreprise, typeEntreprise
				FROM entreprises
			';

			// Filtre
			if(!empty($type))
			{
				if(!empty($type['byUserId']))
					$read_entreprise .= " WHERE idUtilisateur = ".$type['byUserId'];
			}

			$read_entreprise = $bdd->query($read_entreprise);
		}

		return($read_entreprise);
	}

	static function compter_projet($idEntreprise)
	{
		$bdd = PDO();

		$compter_projet = $bdd->query('
			SELECT COUNT(idProjet) AS nbProjet
			FROM projets, entreprises
			WHERE entreprises.idEntreprise = projets.idEntreprise
			AND projets.idEntreprise = '.$idEntreprise.'
		');

		$nbProjet = $compter_projet->fetch();

		return $nbProjet;
	}


	static function insert_entreprise($raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur=NULL, $numSiretEntreprise=NULL, $typeEntreprise)
	{
		$bdd = PDO();

		$sql_insert =$bdd->prepare('
			INSERT INTO Entreprises(raisonSocialeEntreprise, secteurEntreprise, siteWebEntreprise, adresseEntreprise, villeEntreprise, CPEntreprise, idUtilisateur, numSiretEntreprise, typeEntreprise)
			VALUES (:raisonSocialeEntreprise, :secteurEntreprise, :siteWebEntreprise, :adresseEntreprise, :villeEntreprise, :CPEntreprise, :idUtilisateur, :numSiretEntreprise, :typeEntreprise)
					');
		$sql_insert->execute(array(
						'raisonSocialeEntreprise' => $raisonSocialeEntreprise,
						'secteurEntreprise' => $secteurEntreprise,
						'siteWebEntreprise' => $siteWebEntreprise,
						'adresseEntreprise' => $adresseEntreprise,
						'villeEntreprise' => $villeEntreprise,
						'CPEntreprise' => $CPEntreprise,
						'idUtilisateur' => $idUtilisateur,
						'numSiretEntreprise' => $numSiretEntreprise,
						'typeEntreprise' => $typeEntreprise,
					));

		return($sql_insert);
	}


	static function update_entreprise($idEntreprise, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur=NULL, $numSiretEntreprise=NULL, $typeEntreprise)
	{
		$bdd = PDO();
		$sql_update = $bdd->prepare('
			UPDATE Entreprises
			SET raisonSocialeEntreprise=:raisonSocialeEntreprise,
			secteurEntreprise=:secteurEntreprise,
			siteWebEntreprise=:siteWebEntreprise,
			adresseEntreprise=:adresseEntreprise,
			villeEntreprise=:villeEntreprise,
			CPEntreprise=:CPEntreprise,
			idUtilisateur=:idUtilisateur,
			numSiretEntreprise=:numSiretEntreprise,
			typeEntreprise=:typeEntreprise
			WHERE idEntreprise = :idEntreprise
		');

		$sql_update->execute(array(
						'raisonSocialeEntreprise' => $raisonSocialeEntreprise,
						'secteurEntreprise' => $secteurEntreprise,
						'siteWebEntreprise' => $siteWebEntreprise,
						'adresseEntreprise' => $adresseEntreprise,
						'villeEntreprise' => $villeEntreprise,
						'CPEntreprise' => $CPEntreprise,
						'idUtilisateur' => $idUtilisateur,
						'numSiretEntreprise' => $numSiretEntreprise,
						'typeEntreprise' => $typeEntreprise,
						'idEntreprise' => $idEntreprise
					));

	}


	// static function set_Statut($idEntreprise, $emailContact)
	// {
		// $bdd = PDO();

		// $sql_update = $bdd->prepare('
			// UPDATE Entreprises
			// SET emailContact =:emailContact
			// WHERE idEntreprise = '.$idEntreprise.'
		// ');

		// $sql_update->execute(array(
						// 'emailContact' => $emailContact
					// ));

		// return($sql_update);
	// }


	// static function set_read($idEntreprise, $adresseEntreprise)
	// {
		// $bdd = PDO();

		// $sql_update = $bdd->prepare('
			// UPDATE Entreprises
			// SET adresseEntreprise =:adresseEntreprise
			// WHERE idEntreprise = '.$idEntreprise.'
		// ');

		// $sql_update->execute(array(
						// 'adresseEntreprise' => $adresseEntreprise
					// ));

		// return($sql_update);
	// }


	static function del_entreprise($idEntreprise)
	{
		$bdd = PDO();

		if(!empty($idEntreprise))
		{
			$sql_delete = $bdd->query('
				DELETE FROM entreprises
				WHERE idEntreprise = '.$idEntreprise.'
			');
		}
	}



	// Verification int�grit�e BDD

	static function verif_insert_entreprise($raisonSocialeEntreprise)
	{
		$bdd = PDO();

		if(!empty($raisonSocialeEntreprise))
		{
			$verif_sql_insert = $bdd->query('
				SELECT idEntreprise, raisonSocialeEntreprise FROM entreprises WHERE raisonSocialeEntreprise="'.$raisonSocialeEntreprise.'"
			');
			$sql_insert = $verif_sql_insert->fetch();
		}
		else
		{
			$verif_sql_insert = $bdd->query('
				SELECT idEntreprise
				FROM entreprises
				WHERE idEntreprise = "'.$idEntreprise.'"
			');
			$sql_insert = $verif_sql_insert->fetch();
		}
		return($sql_insert);
	}

	static function verif_delete_entreprise($idEntreprise)
	{
		$bdd = PDO();

		$verif_sql_delete = $bdd->query('
			SELECT idEntreprise
			FROM projets
			WHERE idEntreprise ='.$idEntreprise.'
		');

		$verif_sql_delete = $verif_sql_delete->fetch();

		return($verif_sql_delete['idEntreprise']);                
	}

}
