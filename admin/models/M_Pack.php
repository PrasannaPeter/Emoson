<?php

class M_Pack extends Pack
{

	// Function relative aux packs

	static function read_pack($idPack=NULL, $type=NULL)
	{
		$bdd = PDO();


		if(!empty($idPack))
		{
			$read_pack = $bdd->query('
				SELECT idPack, titrePack, descPack, prixPack, positionPack
				FROM pack
				WHERE idPack ='.$idPack.'
			');
			$read_pack = $read_pack->fetch();
		}
		else
		{
			$read_pack = '
				SELECT idPack, titrePack, descPack, prixPack, positionPack
				FROM pack
			';

			// Filtre
			if(!empty($type))
			{
				switch ($type)
				{
					case "actif" :
						$read_pack .= ' WHERE positionPack != 0 ORDER BY positionPack';
					break;
				}
			}

			$read_pack = $bdd->query($read_pack);
		}

		return($read_pack);
	}

	static function compoter_pack($idPack)
	{
		$bdd = PDO();

		$compoter_pack = $bdd->query('
			SELECT COUNT(idPack) AS nbPack
			FROM pack
		');

		$nbProjet = $compoter_pack->fetch();

		return $nbProjet;
	}


	static function insert_pack($titrePack, $descPack, $prixPack, $positionPack)
	{
		if(empty($positionPack))
			(int) $positionPack = 0;

		$bdd = PDO();

		$sql_insert =$bdd->prepare('
			INSERT INTO pack(titrePack, descPack, prixPack, positionPack)
			VALUES (:titrePack, :descPack, :prixPack, :positionPack)
					');
		$sql_insert->execute(array(
						'titrePack' => $titrePack,
						'descPack' => $descPack,
						'prixPack' => $prixPack,
						'positionPack' => $positionPack
					));

		return($sql_insert);
	}


	static function update_pack($idPack, $titrePack, $descPack, $prixPack, $positionPack)
	{
		$bdd = PDO();
		$sql_update = $bdd->prepare('
			UPDATE pack
			SET titrePack=:titrePack,
			descPack=:descPack,
			prixPack=:prixPack,
			positionPack=:positionPack,
			WHERE idPack = :idPack
		');

		$sql_update->execute(array(
						'titrePack' => $titrePack,
						'descPack' => $descPack,
						'prixPack' => $prixPack,
						'positionPack' => $positionPack
					));

	}


	// static function set_Statut($idPack, $emailContact)
	// {
		// $bdd = PDO();

		// $sql_update = $bdd->prepare('
			// UPDATE pack
			// SET emailContact =:emailContact
			// WHERE idPack = '.$idPack.'
		// ');

		// $sql_update->execute(array(
						// 'emailContact' => $emailContact
					// ));

		// return($sql_update);
	// }


	// static function set_read($idPack, $positionPack)
	// {
		// $bdd = PDO();

		// $sql_update = $bdd->prepare('
			// UPDATE pack
			// SET positionPack =:positionPack
			// WHERE idPack = '.$idPack.'
		// ');

		// $sql_update->execute(array(
						// 'positionPack' => $positionPack
					// ));

		// return($sql_update);
	// }


	static function del_pack($idPack)
	{
		$bdd = PDO();

		if(!empty($idPack))
		{
			$sql_delete = $bdd->query('
				DELETE FROM pack
				WHERE idPack = '.$idPack.'
			');
		}
	}



	// Verification intégritée BDD

	static function verif_insert_pack($titrePack)
	{
		$bdd = PDO();

		if(!empty($titrePack))
		{
			$verif_sql_insert = $bdd->query('
				SELECT idPack, titrePack FROM pack WHERE titrePack="'.$titrePack.'"
			');
			$sql_insert = $verif_sql_insert->fetch();
		}
		else
		{
			$verif_sql_insert = $bdd->query('
				SELECT idPack
				FROM pack
				WHERE idPack = "'.$idPack.'"
			');
			$sql_insert = $verif_sql_insert->fetch();
		}
		return($sql_insert);
	}

	static function verif_delete_pack($idPack)
	{
		$bdd = PDO();

		$verif_sql_delete = $bdd->query('
			SELECT idPack
			FROM projets
			WHERE idPack ='.$idPack.'
		');

		$verif_sql_delete = $verif_sql_delete->fetch();

		return($verif_sql_delete['idPack']);
	}

}
