<?php

// On inclus le modèle néccéssaire
require_once MODELS.'M_Proposition.php';

class Proposition
{
	// Function relative aux propositions
	static function get_tab_proposition($id, $type_proposition)
	{
		$get_tab_proposition = M_Proposition::get_tab_proposition($id, $type_proposition);

		return($get_tab_proposition);

	}

	static function mes_projets($idUtilisateur)
	{
		$mes_projets = M_Proposition::mes_projets($idUtilisateur);

		return($mes_projets);

	}

	static function accepter($idUtilisateur, $idProjet)
	{
		$accepter = M_Proposition::accepter($idUtilisateur, $idProjet);

		return($accepter);

	}

	static function add_proposition($idProjet, $idUtilisateur)
	{
		M_Proposition::add_proposition($idProjet, $idUtilisateur);
	}

	static function set_proposition($idProjet, $idUtilisateur, $acceptation, $validation)
	{
		M_Proposition::set_proposition($idProjet, $idUtilisateur, $acceptation, $validation);
	}


	static function del_proposition($idProjet, $idUtilisateur)
	{
		M_Proposition::del_proposition($idProjet, $idUtilisateur);
	}

	//A supprimer
		static function get_pack()
		{
			$get_pack = M_Proposition::read_pack();
			return($get_pack);
		}

	static function get_projet()
	{
		$get_projet = M_Proposition::get_projet();
		return($get_projet);
	}

	static function get_utilisateur()
	{
		$get_utilisateur = M_Proposition::get_utilisateur();
		return($get_utilisateur);
	}

	
}


//require_once('/views/'.$controller.'/'.$controller.'.php');