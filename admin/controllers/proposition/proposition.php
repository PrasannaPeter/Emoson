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

	//A supprimer
	static function get_pack()
	{
		$get_pack = M_Proposition::read_pack();
		return($get_pack);
	}

	static function add_proposition($idProjet, $idUtilisateur)
	{
		M_Proposition::add_proposition($idProjet, $idUtilisateur);
	}

	static function del_proposition($idProjet, $idUtilisateur)
	{
		M_Proposition::del_proposition($idProjet, $idUtilisateur);
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