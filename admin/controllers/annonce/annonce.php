<?php

// On inclus le modèle néccéssaire
require_once MODELS.'M_Annonce.php';

class Annonce
{
	// Function relative aux annonces

	static function get_annonce($id=NULL, $titre=NULL, $type=NULL)
	{
		// Si on a un ID
		if(!empty($id))
		{
			$get_annonce = M_Annonce::read_annonce($id, $titre=NULL, $type=NULL);
		}
		else if(!empty($titre))
		{
			$get_annonce = M_Annonce::read_annonce($id=NULL, $titre, $type=NULL);
		}
		else
		{
			if(!empty($type))
			{

				$get_annonce = M_Annonce::read_annonce($id=NULL, $titre=NULL, $type);
			}
			else
			{
				$get_annonce = M_Annonce::read_annonce();
			}
		}

		return($get_annonce);
	}


	//Tableau qui affiche le annonce
	static function tab_annonce($type=NULL)
		{
		if(!empty($type))
		{
			$read_annonce = Annonce::get_annonce($id=NULL,$titre, $type);
		}
		else
		{
			$read_annonce = Annonce::get_annonce($id=NULL,$titre=NULL, $type=NULL);
		}

		// Boucle remplissage du tableau
		while($tab_annonce = $read_annonce->fetch())
		{
			?>
			<tr>
				<td><?php echo $tab_annonce['id']; ?></td>
				<td><?php echo $tab_annonce['titre']; ?></td>
				<td><?php echo $tab_annonce['content']; ?></td>
				<td class="actions">
					<a href="index.php?module=annonce&action=manage&type=modifier&id=<?php echo $tab_annonce['id']; ?>" title="Editer" class="btn btn-default btn-xs btn-icon icon-left">
						<i class="entypo-pencil"></i>
						Modifier
					</a>

					<a href="index.php?module=annonce&action=manage&type=supprimer&id=<?php echo $tab_annonce['id']; ?>" title="Supprimer" class="btn btn-danger btn-xs btn-icon icon-left">
						<i class="entypo-trash"></i>
						Supprimer
					</a>
				</td>
			</tr>
		<?php
		}
	}


	// Fonction CRUD
	// Retourne $typeNotif & $msgNotif si erreur

	static function set_annonce($id=NULL, $titre, $content)
	{
		$annonce['titre'] = $titre;
		$annonce['content'] = $content;
		$annonce['date'] = date('D-m-Y');


		// Si on a pas d'ID, INSERT
		if(empty($id))
		{
			$type = "insert";

			$verif_sql = Annonce::verif_sql($type, $titre);

			if(!empty($verif_sql) && $verif_sql=="error_ID")
			{
				return $verif_sql;
			}
			else if(!empty($verif_sql) && $verif_sql=="error_info")
			{
				return $verif_sql;
			}
			else if(!empty($verif_sql) && $verif_sql=="error")
			{
				return $verif_sql;
			}
			else
			{
				$sql_insert = M_Annonce::insert_annonce($annonce);

				if($sql_insert)
					return $sql_insert = "ok";
				else
					return $sql_insert = "error";
			}

		}
		// Sinon UPDATE
		else
		{
			$annonce['id'] = $id;

			$type = "update";

			$verif_sql = Annonce::verif_sql($type, $titre, $id);

			if(!empty($verif_sql))
			{
					$updateAnnonce = "error";
					return($updateAnnonce);
			}
			else
			{
				$sql_update = M_Annonce::update_annonce($annonce);
				$updateAnnonce = "ok";
				return($updateAnnonce);
			}
		}
	}

	static function del_annonce($id)
	{
		$type = "delete";

		$verif_sql = Annonce::verif_sql($type, $titre=NULL, $id);

		if(!empty($verif_sql))
		{
			$delAnnonce = "error";
			return($delAnnonce);
		}
		else
		{
			M_Annonce::del_annonce($id);

			$delAnnonce = "ok";

			return($delAnnonce);
		}
	}

	static function verif_sql($type, $titre=NULL, $id=NULL)
	{

		switch ($type)
		{

			case "insert":

				$verif_sql_insert = M_Annonce::verif_insert_annonce($titre);

				if(!empty($verif_sql_insert['id']))
				{
					$error="error";
					return $error;
				}

			break;


			/*case "delete":

				$verif_sql_delete = M_Annonce::verif_delete_annonce($id);

				if(!empty($verif_sql_delete))
				{
					$typeNotif = "error";
					return $typeNotif;
				}

			break;
			*/
		}
	}
}

if(site_admin())
		require_once('views/'.$controller.'/'.$controller.'.php');