<?php

class M_Annonce extends Annonce
{

	// Function relative aux annonce

	static function read_annonce($idAnnonce=NULL, $titreAnnonce=NULL, $type=NULL)
	{
		$bdd = PDO();

		if(!empty($idAnnonce))
		{
            $read_annonce = $bdd->query("
                SELECT *
                FROM annonce
                WHERE id = ".$idAnnonce."
            ");

            $read_annonce = $read_annonce->fetch();

        }
		else
		{
			$read_annonce = '
				SELECT *
				FROM annonce
			';

			// Filtre
			// if(!empty($type))
			// {
			// 	switch ($type)
			// 	{
			// 		case "enattente":

			// 			$read_annonce .= " AND isActiveAnnonce = 0";
			// 		break;

			// 		case "encours":

			// 			$read_annonce .= " AND isActiveAnnonce = 1";
			// 		break;

			// 		case "termine":

			// 			$read_annonce .= " AND isActiveAnnonce = 2";
			// 		break;


			// 	}
			// }

			// $read_annonce .= ' ORDER BY titreAnnonce';
			$read_annonce = $bdd->query($read_annonce);
		}

		return($read_annonce);
	}


	static function insert_annonce($annonce)
	{
		$bdd = PDO();

		$sql_insert =$bdd->prepare('
			INSERT INTO annonce(titre, date, content)
			VALUES (:titre, :date, :content)
					');

		$sql_insert->execute(array(
						'titre' => $annonce['titre'],
						'date' => $annonce['date'],
						'content' => $annonce['content'],
					));

		return($sql_insert);
	}


	static function update_annonce($annonce)
	{
		$bdd = PDO();
		$sql_update = $bdd->prepare('
			UPDATE annonce
			SET titre=:titre, date=:date, content=:content
			WHERE id = '.$annonce['id'].'
		');

		$sql_update->execute(array(
						'titre' => $annonce['titre'],
						'date' => $annonce['date'],
						'content' => $annonce['content']
					));

		return($sql_update);
	}



	static function del_annonce($idAnnonce)
	{
		$bdd = PDO();

		$sql_delete = $bdd->query('
			DELETE FROM annonce
			WHERE id = '.$idAnnonce.'
		');
	}


	static function verif_insert_annonce($titre)
	{
		$bdd = PDO();

		if(!empty($titre))
		{
			$verif_sql_insert = $bdd->query('
				SELECT id FROM annonce WHERE titre="'.$titre.'"
			');
			$sql_insert = $verif_sql_insert->fetch();
		}

		return($sql_insert);
	}

	static function verif_delete_annonce($id)
	{
		$bdd = PDO();
		$verif_sql_delete = $bdd->query('
			SELECT id
			FROM annonce
			WHERE id = '.$id.'
		');

		$verif_sql_delete = $verif_sql_delete->fetch();

		return($verif_sql_delete['id']);
	}


}