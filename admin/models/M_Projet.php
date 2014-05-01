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
				SELECT idProjet, titreProjet, descriptionProjet, isActiveProjet, tailleEntreprise, caEntreprise, ptsContactEntreprise, optionProjet, nbARProjet, nbDesignerSouhaite, P.idPack, titrePack, nomUtilisateur, prenomUtilisateur, telUtilisateur, emailUtilisateur  
				FROM projets P, utilisateurs U, pack PA
				WHERE idProjet ='.$idProjet.'
				AND PA.idPack = P.idPack
				AND P.idUtilisateur = U.idUtilisateur
				AND roleUtilisateur = "ENTREPRISE"
			');
			$read_projet = $read_projet->fetch();
		}
		else if(!empty($titreProjet))
		{
			$read_projet = $bdd->query('
				SELECT idProjet, titreProjet, descriptionProjet, isActiveProjet, tailleEntreprise, caEntreprise, ptsContactEntreprise, optionProjet, nbARProjet, nbDesignerSouhaite, P.idPack, titrePack, nomUtilisateur, prenomUtilisateur, telUtilisateur, emailUtilisateur  
				FROM projets P, utilisateurs U, pack PA
				WHERE idProjet ='.$idProjet.'
				AND PA.idPack = P.idPack
				AND P.idUtilisateur = U.idUtilisateur
				AND roleUtilisateur = "ENTREPRISE"
			');
		}
		else
		{
			$read_projet = '
				SELECT idProjet, titreProjet, descriptionProjet, tailleEntreprise, caEntreprise, ptsContactEntreprise, optionProjet, nbARProjet, nbDesignerSouhaite, isActiveProjet, P.idPack, titrePack
				FROM projets P, pack PA
				WHERE PA.idPack = P.idPack
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
			FROM projets
			WHERE idProjet = '.$idProjet.'
		');

		$verif_sql_delete = $verif_sql_delete->fetch();

		return($verif_sql_delete['idProjet']);
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