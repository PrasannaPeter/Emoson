<?php

// On inclus le modèle néccéssaire
require_once MODELS.'M_Pack.php';

class Pack
{
	// Function relative aux packs

	static function get_pack($idPack=NULL, $type=NULL)
	{
		// Si on a un ID
		if(!empty($idPack))
		{
			$get_pack = M_Pack::read_pack($idPack);
		}
		// Sinon on prend tout
		else
		{
			if(!empty($type))
			{

				$get_pack = M_Pack::read_pack($idPack=NULL, $type);
			}
			else
			{
				$get_pack = M_Pack::read_pack();
			}
		}

		return($get_pack);
	}


	static function compter_pack()
	{
		$compter_pack = M_Pack::compter_pack();
var_dump($compter_pack); exit;
		return $compter_pack;
	}


	static function tab_pack($type=NULL)
	{
			if(!empty($type))
			{
				$read_pack = Pack::get_pack($idPack=NULL, $type);
			}
			else
			{
				$read_pack = Pack::get_pack($idPack=NULL, $type=NULL);
			}

			// Boucle remplissage du tableau
			while($tab_pack = $read_pack->fetch())
			{
				?>
					<tr>
						<td><?php echo $tab_pack['titrePack']; ?></td>
						<td><?php echo $tab_pack['descPack']; ?></td>
						<td><?php echo $tab_pack['prixPack']." €"; ?></td>
						<td><?php if($tab_pack['positionPack'] == 0){ echo "<div class=\"label label-danger\">Désactivé</div>"; }else{ echo "<div class=\"label label-info\">".$tab_pack['positionPack']."</div>"; } ?></td>
						<td class="actions">
							<a href="index.php?module=pack&action=manage&type=modifier&idPack=<?php echo $tab_pack['idPack']; ?>" title="Editer" class="btn btn-default btn-xs btn-icon icon-left">
								<i class="entypo-trash"></i>
								Editer
							</a>

							<a href="index.php?module=pack&action=manage&type=supprimer&idPack=<?php echo $tab_pack['idPack']; ?>" title="Supprimer" class="btn btn-danger btn-xs btn-icon icon-left">
								<i class="entypo-pencil"></i>
								Supprimer
							</a>
						</td>
					</tr>
				<?php
			}
	}


	static function vignette_pack($type)
	{

		if(!empty($type))
		{
			$read_pack = Pack::get_pack($idPack=NULL, $type);
		}
		else
		{
			$read_pack = Pack::get_pack($idPack=NULL, $type=NULL);
		}

		if($type=="actif")
		{

			// Boucle remplissage du tableau
			while($tab_pack = $read_pack->fetch())
			{
                            ?><ul class="price-list span3 box-1">
	              <li class="pgk-title title-1"><?php echo $tab_pack['titrePack']; ?></li>
	              <li class="pgk-price title-2"><?php echo $tab_pack['prixPack']; ?> €</li>
	              <li style="min-height:150px;"><?php echo str_replace('- ', '<br />', $tab_pack['descPack']); ?></li>
	              <div class="radio-field">
	                <center>
	                  <input name="idPack" id="idPack_<?php echo $tab_pack['idPack']; ?>" type="radio" value="<?php echo $tab_pack['idPack']; ?>">
	                  <label for="idPack_<?php echo $tab_pack['idPack']; ?>" style="color:#316ec4;"><strong>Choisir</strong></label>
	                </center>
	              </div>
	            </ul><?php
			}
		}
		else if ($type =="admin")
		{
			echo '<select name ="idPack">';
			// Boucle remplissage du tableau
			while($tab_pack = $read_pack->fetch())
			{
	              echo '<option value="'.$tab_pack['idPack'].'">'.$tab_pack['titrePack'].'</option>';
			}

			echo '</select>';
		}
	}

	// Fonction CRUD
	// Retourne $typeNotif & $msgNotif si erreur

	static function set_pack($idPack, $titrePack, $descPack, $prixPack, $positionPack)
	{

		// Si on a pas d'ID, INSERT
		if(empty($idPack))
		{
			$type = "insert";

			$verif_sql = Pack::verif_sql($type, $titrePack);

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

				$error="ok";
				$sql_insert = M_Pack::insert_pack($titrePack, $descPack, $prixPack, $positionPack);
				return $error;
			}
		}
		// Sinon UPDATE
		Else
		{
			$type = "update";

			$verif_sql = Pack::verif_sql($type, $idPack);

			if(!empty($verif_sql))
			{
					$updatePack = "error";
					return($updatePack);
			}
			else
			{
				$sql_update = M_Pack::update_pack($idPack, $titrePack, $descPack, $prixPack, $positionPack);
				$updatePack = "ok";
				return($updatePack);
			}
		}
	}


	// static function set_Statut($idPack, $emailContact)
	// {
		// $update_statut = M_Pack::set_Statut($idPack, $emailContact);

		// if($update_statut == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le statut du pack a bien été modifié";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le statut du pack n'a pu être modifié";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_read($idPack, $positionPack)
	// {
		// $update_isRead = M_Pack::set_read($idPack, $positionPack);

		// if($update_isRead == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le pack sera désormais marqué comme \"lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le pack sera désormais marqué comme \"non lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_categorie($idPack, $telContact)
	// {
		// $update_categorie = M_Pack::set_categorie($idPack, $telContact);

		// if($update_categorie == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "La catégorie du pack a bien été modifiée";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "La catégorie du pack n'a pu être modifiée";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	static function del_pack($idPack)
	{
		$type = "delete";


		$verif_sql = Pack::verif_sql($type, $idPack);

		if(!empty($verif_sql))
		{
			$delPack = "error";
			return($delPack);
		}
		else
		{
			M_Pack::del_pack($idPack);
			$delPack = "ok";
			return($delPack);
		}
	}


	static function verif_sql($type, $idPack=NULL)
	{

		switch ($type)
		{
			case "insert":

				$verif_sql_insert = M_Pack::verif_insert_pack($idPack);

				if(!empty($verif_sql_insert['idPack']))
				{
					$error="error";
					return $error;
				}

			break;


			case "update":

				$verif_sql_insert = M_Pack::verif_insert_pack($idPack);

				if(!empty($verif_sql_insert['idPack']))
				{
					$error="error";
					return $error;
				}

			break;


			case "delete":

				$verif_sql_delete = M_Pack::verif_delete_pack($idPack);

				if(!empty($verif_sql_delete))
				{
					$typeNotif = "error";
					return $typeNotif;
				}

			break;
		}
	}
}

if(!$_GET['action'] == "manage" && !$_GET['module'] == "projet" && !$_GET['type'] == "ajouter")
    require_once('views/'.$controller.'/'.$controller.'.php');