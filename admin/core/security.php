<?php

// Sécurise les données entrantes et sortantes 

	class Security
	{
		// Données entrantes
		// Sécurise une donnée de formulaire afin de l'utiliser dans une requêtes SQL et éviter les injections 
		// (Ne pas utiliser addslashes() ni les magic_quotes !)
		
		public static function bdd_entrance($string)
		{
			// On regarde si le type de string est un nombre entier (int)
			if(ctype_digit($string))
			{
				$string = intval($string);
			}
			// Pour tous les autres types
			else
			{
				$string = mysql_real_escape_string($string);
				$string = addcslashes($string, '%_');
			}
				
			return $string;

		}
		
		// Données sortantes
		// Cette fonction permet de rentre les balises XHTML inopérante (sauf ( ; { } )

		public static function html($string)
		{
			return htmlentities($string);
		}
	}
	
	
	// Désactive les magic_quote
	
	// if(get_magic_quotes_gpc()) {
        // $_POST = array_map('stripslashes', $_POST);
        // $_GET = array_map('stripslashes', $_GET);
        // $_COOKIE = array_map('stripslashes', $_COOKIE);
// }


	// Sécurise une donnée de formulaire afin de l'utiliser dans une requêtes SQL et éviter les injections 
	// (Ne pas utiliser addslashes() ni les magic_quotes !)
	
	// public	function secure($string)
	// {
		// On regarde si le type de string est un nombre entier (int)
		// if(ctype_digit($string))
		// {
			// $string = intval($string);
		// }
		// Pour tous les autres types
		// else
		// {
			// $string = mysql_real_escape_string($string);
			// $string = addcslashes($string, '%_');
		// }
		
		// return $string;
	// }
	
	
	// Cette fonction permet de rentre les balises XHTML inopérante (sauf ( ; { } )
	// public function xss($string)
	// {
		// $string = htmlentities($string);
		// return $string;
	// }
?>