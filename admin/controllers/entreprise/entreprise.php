<?php

// On inclus le modèle néccéssaire
require_once MODELS.'M_Entreprise.php';

class Entreprise
{
	// Function relative aux entreprises

	static function get_entreprise($idEntreprise=NULL, $type=NULL)
	{
		// Si on a un ID
		if(!empty($idEntreprise))
		{
			$get_entreprise = M_Entreprise::read_entreprise($idEntreprise);
		}
		// Sinon on prend tout
		else
		{
			if(!empty($type))
			{

				$get_entreprise = M_Entreprise::read_entreprise($idEntreprise=NULL, $type);
			}
			else
			{
				$get_entreprise = M_Entreprise::read_entreprise();
			}
		}

		return($get_entreprise);
	}


	static function compter_projet($idEntreprise)
	{
		if(!empty($idEntreprise))
		{
			$compter_projet = M_Entreprise::compter_projet($idEntreprise);
		}

		return $compter_projet;
	}


	static function tab_entreprise($type=NULL)
	{
			if(!empty($type))
			{
				$read_entreprise = Entreprise::get_entreprise($idEntreprise=NULL, $type);
			}
			else
			{
				$read_entreprise = Entreprise::get_entreprise($idEntreprise=NULL, $type=NULL);
			}

			// Boucle remplissage du tableau
			while($tab_entreprise = $read_entreprise->fetch())
			{
				$compter_projet = Entreprise::compter_projet($tab_entreprise['idEntreprise']);

				?>
					<tr>
						<td><?php echo $tab_entreprise['raisonSocialeEntreprise']; ?></td>
						<td><?php echo $tab_entreprise['secteurEntreprise']; ?></td>
						<td><?php echo $tab_entreprise['siteWebEntreprise']; ?></td>
						<td><?php echo $tab_entreprise['adresseEntreprise']; ?></td>
						<td><?php echo $tab_entreprise['villeEntreprise']; ?></td>
						<td><?php echo $tab_entreprise['CPEntreprise']; ?></td>
						<td><?php echo $tab_entreprise['libType']; ?></td>
						<td><?php echo $compter_projet['nbProjet']; ?></td>
						<td class="actions">
						<center>
							<li><a class="view tooltip" href="index.php?module=entreprise&action=detail_entreprise&idEntreprise=<?php echo $tab_entreprise['idEntreprise']; ?>" title="Détail">Voir les détails</a></li>
							<li><a class="edit tooltip" href="index.php?module=entreprise&action=manage&type=modifier&idEntreprise=<?php echo $tab_entreprise['idEntreprise']; ?>" title="Editer">Editer</a></li>
							<li><a class="delete tooltip" href="index.php?module=entreprise&action=manage&type=supprimer&idEntreprise=<?php echo $tab_entreprise['idEntreprise']; ?>" title="Supprimer">Supprimer</a>
						</center>
						</td>
					</tr>
				<?php
			}
	}


	// Fonction CRUD
	// Retourne $typeNotif & $msgNotif si erreur

	static function set_entreprise($idEntreprise=NULL, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur=NULL, $numSiretEntreprise,  $typeEntreprise)
	{

		// Si on a pas d'ID, INSERT
		if(empty($idEntreprise))
		{
			$type = "insert";

			$verif_sql = Entreprise::verif_sql($type, $raisonSocialeEntreprise);

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
				$sql_insert = M_Entreprise::insert_entreprise($raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur, $numSiretEntreprise, $typeEntreprise);
				return $error;
			}
		}
		// Sinon UPDATE
		Else
		{
			$type = "update";

			$verif_sql = Entreprise::verif_sql($type, $idEntreprise);

			if(!empty($verif_sql))
			{
					$updateEntreprise = "error";
					return($updateEntreprise);
			}
			else
			{
				$sql_update = M_Entreprise::update_entreprise($idEntreprise, $raisonSocialeEntreprise, $secteurEntreprise, $siteWebEntreprise, $adresseEntreprise, $villeEntreprise, $CPEntreprise, $idUtilisateur, $numSiretEntreprise, $typeEntreprise);
				$updateEntreprise = "ok";
				return($updateEntreprise);
			}
		}
	}


	// static function set_Statut($idEntreprise, $emailContact)
	// {
		// $update_statut = M_Entreprise::set_Statut($idEntreprise, $emailContact);

		// if($update_statut == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le statut du entreprise a bien été modifié";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le statut du entreprise n'a pu être modifié";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_read($idEntreprise, $adresseEntreprise)
	// {
		// $update_isRead = M_Entreprise::set_read($idEntreprise, $adresseEntreprise);

		// if($update_isRead == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le entreprise sera désormais marqué comme \"lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le entreprise sera désormais marqué comme \"non lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_categorie($idEntreprise, $telContact)
	// {
		// $update_categorie = M_Entreprise::set_categorie($idEntreprise, $telContact);

		// if($update_categorie == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "La catégorie du entreprise a bien été modifiée";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "La catégorie du entreprise n'a pu être modifiée";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	static function del_entreprise($idEntreprise)
	{
		$type = "delete";


		$verif_sql = Entreprise::verif_sql($type, $idEntreprise);

		if(!empty($verif_sql))
		{
			$delEntreprise = "error";
			return($delEntreprise);
		}
		else
		{
			M_Entreprise::del_entreprise($idEntreprise);
			$delEntreprise = "ok";
			return($delEntreprise);
		}
	}


	static function verif_sql($type, $idEntreprise=NULL)
	{

		switch ($type)
		{
			case "insert":

				$verif_sql_insert = M_Entreprise::verif_insert_entreprise($idEntreprise);

				if(!empty($verif_sql_insert['idEntreprise']))
				{
					$error="error";
					return $error;
				}

			break;


			case "update":

				$verif_sql_insert = M_Entreprise::verif_insert_entreprise($idEntreprise);

				if(!empty($verif_sql_insert['idEntreprise']))
				{
					$error="error";
					return $error;
				}

			break;


			case "delete":

				$verif_sql_delete = M_Entreprise::verif_delete_entreprise($idEntreprise);

				if(!!empty($verif_sql_delete))
				{
					$typeNotif = "error";
					return $typeNotif;
				}

			break;
		}
	}
}

require_once('views/'.$controller.'/'.$controller.'.php');