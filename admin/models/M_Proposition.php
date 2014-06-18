<?php

class M_Proposition extends Proposition
{
	//Retourne toute les proposition faite à un designer
	static function get_tab_proposition($id, $type_proposition)
	{
		$bdd = PDO();
		if ($type_proposition=="utilisateur")
		{

			$get_tab_proposition = $bdd->query('SELECT DISTINCT projets.idProjet, titreProjet, descriptionProjet, acceptation, validation, isActiveProjet
													FROM propose, projets
													WHERE projets.idProjet = propose.idProjet
													AND propose.idUtilisateur = '.$id.'');
		}
		else if($type_proposition=="projet")
		{
			$get_tab_proposition = $bdd->query('SELECT DISTINCT utilisateurs.idUtilisateur, nomUtilisateur, prenomUtilisateur, acceptation, validation
												FROM utilisateurs, propose
												WHERE utilisateurs.idUtilisateur = propose.idUtilisateur
												AND idProjet = '.$id.'');

		}
		return($get_tab_proposition);
	}

	//Récup des infos des projets en cours ou terminé pour un designer
	static function mes_projets($idUtilisateur)
	{

		$bdd = PDO();

		if($_SESSION['roleUtilisateur'] == 'GRAPHISTE' )
		{
			$mes_projets = $bdd->query('SELECT DISTINCT projets.idProjet, titreProjet, descriptionProjet, acceptation, validation, isActiveProjet, raisonSocialeEntreprise
														FROM propose, projets, entreprises, utilisateurs
														WHERE projets.idProjet = propose.idProjet
														AND projets.idUtilisateur = utilisateurs.idUtilisateur
														AND utilisateurs.idUtilisateur = entreprises.idUtilisateur
														AND propose.idUtilisateur = '.$idUtilisateur.'');
		}
		elseif ($_SESSION['roleUtilisateur'] == "ENTREPRISE")
		{
			$mes_projets = $bdd->query('SELECT DISTINCT projets.idProjet, titreProjet, descriptionProjet, isActiveProjet, raisonSocialeEntreprise
														FROM projets, entreprises, utilisateurs
														WHERE projets.idUtilisateur = utilisateurs.idUtilisateur
														AND utilisateurs.idUtilisateur = entreprises.idUtilisateur
														AND utilisateurs.idUtilisateur = '.$idUtilisateur.'');
		}
		return($mes_projets);

	}

	static function accepter($idUtilisateur, $idProjet)
	{

		$bdd = PDO();

		$accepter = $bdd->query('SELECT acceptation, validation
								FROM propose
								WHERE idProjet = '.$idProjet.'
								AND idUtilisateur = '.$idUtilisateur.'');
		
		
		return $accepter;
	}

	static function add_proposition($idProjet, $idUtilisateur)
	{
		$bdd = PDO();
		$add_proposition = $bdd->query('INSERT INTO propose(idUtilisateur, idProjet, acceptation, validation) VALUE('.$idUtilisateur.','.$idProjet.', 0, 0)');
	}

	static function set_proposition($idProjet, $idUtilisateur, $acceptation, $validation)
	{
		$bdd = PDO();
		$set_propostition = $bdd->query('UPDATE propose
										SET acceptation = '.$acceptation.', validation = '.$validation.'
										WHERE idProjet = '.$idProjet.'
										AND idUtilisateur = '.$idUtilisateur.'');
	}

	static function del_proposition($idProjet, $idUtilisateur)
	{
		$bdd = PDO();
		$del_proposition = $bdd->query('DELETE FROM propose WHERE idUtilisateur='.$idUtilisateur.' AND idProjet='.$idProjet.'');
	}

	// A supprimer
	static function get_projet()
	{
		$bdd= PDO();

		/*$get_projet = $bdd->query('SELECT idProjet, titreProjet, descriptionProjet, isActiveProjet
									FROM projets
									WHERE projets.idProjet NOT IN (
									    SELECT idProjet
									    FROM propose)
									OR 1 < (SELECT COUNT(*)
									       	FROM propose)
									');*/
		$get_projet = $bdd->query('SELECT idProjet, titreProjet, descriptionProjet, isActiveProjet
									FROM projets
									WHERE isActiveProjet = 1 ');
		return($get_projet);
	}

	// A supprimer
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

	// A supprimer
	static function read_pack()
	{
		$bdd = PDO();

		$read_pack = $bdd->query('
			SELECT *
			FROM pack
		');

		return($read_pack);
	}

	// A supprimer
	static function get_utilisateur()
	{

		$bdd= PDO();
		/*$get_designer = $bdd->query('SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur
									FROM utilisateurs
									WHERE roleUtilisateur ="GRAPHISTE"
									AND utilisateurs.idUtilisateur NOT IN (
									    SELECT idUtilisateur
									    FROM propose)
									OR 1 < (SELECT COUNT(*)
									       	FROM propose) ');*/
		$get_designer = $bdd->query('SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur
									FROM utilisateurs
									WHERE roleUtilisateur ="GRAPHISTE"
									AND certifUtilisateur = 1');

		return($get_designer);

	}
        
}


?>