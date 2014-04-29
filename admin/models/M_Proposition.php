<?php 

class M_Proposition extends Proposition
{
	//Retourne toute les proposition faite à un designer
	static function get_tab_proposition($id, $type_proposition)
	{
		$bdd = PDO();
		if ($type_proposition=="utilisateur")
		{
			
			$get_tab_proposition = $bdd->query('SELECT DISTINCT projets.idProjet, titreProjet, descriptionProjet, acceptation
													FROM propose, projets
													WHERE projets.idProjet = propose.idProjet
													AND propose.idUtilisateur = '.$id.'');
		}
		else if($type_proposition=="projet")
		{	
			$get_tab_proposition = $bdd->query('SELECT DISTINCT utilisateurs.idUtilisateur, nomUtilisateur, prenomUtilisateur, acceptation
												FROM utilisateurs, propose
												WHERE utilisateurs.idUtilisateur = propose.idUtilisateur
												AND idProjet = '.$id.'');
			
		}
		return($get_tab_proposition);
	}

	static function add_proposition($idProjet, $idUtilisateur)
	{
		$bdd = PDO();
		$assigner_projet = $bdd->query('INSERT INTO propose(idUtilisateur, idProjet, acceptation) VALUE('.$idUtilisateur.','.$idProjet.', 0)');
	}

	static function del_proposition($idProjet, $idUtilisateur)
	{
		$bdd = PDO();
		$del_assigner_projet = $bdd->query('DELETE FROM propose WHERE idUtilisateur='.$idUtilisateur.' AND idProjet='.$idProjet.'');
	}
	
	// A supprimer
	static function get_projet()
	{
		$bdd= PDO();
		$get_projet = $bdd->query('SELECT idProjet, titreProjet, descriptionProjet, isActiveProjet FROM projets');
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
		$get_designer = $bdd->query('SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur 
									FROM Utilisateurs 
									WHERE roleUtilisateur ="GRAPHISTE"');
		return($get_designer);

	}

}


?>