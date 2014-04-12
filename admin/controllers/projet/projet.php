<?php

// On inclus le mod�le n�cc�ssaire
require_once MODELS.'M_Projet.php';

class Projet
{
	// Function relative aux projets

	static function get_projet($idProjet=NULL, $titreProjet=NULL, $type=NULL)
	{
		// Si on a un ID
		if(!empty($idProjet))
		{
			$get_projet = M_Projet::read_projet($idProjet, $titreProjet=NULL, $type=NULL);
		}
		else if(!empty($titreProjet))
		{
			$get_projet = M_Projet::read_projet($idProjet=NULL, $titreProjet, $type=NULL);
		}
		else
		{
			if(!empty($type))
			{

				$get_projet = M_Projet::read_projet($idProjet=NULL, $titreProjet=NULL, $type);
			}
			else
			{
				$get_projet = M_Projet::read_projet();
			}
		}

		return($get_projet);
	}

	static function get_contact()
	{
		$get_contact = M_Projet::read_contact();
		return($get_contact);
	}



	static function get_assignation_projet($idGraphiste, $idProjet)
	{

		if(!empty($idProjet) && !empty($idGraphiste))
		{
			$get_assignation = M_Projet::read_assignation_projet($idProjet, $idGraphiste);
		}

		$get_assignation_projet = $get_assignation->fetch();
		if(!empty($get_assignation_projet['idProjet']))
		{
			$assignation = "oui";
		}

		return($assignation);
	}

	static function get_last_projet_entreprise($idEntreprise)
	{
		if(!empty($idEntreprise))
		{
			$get_last_projet_req = M_Projet::read_last_projet($idEntreprise);

			$get_last_projet = $get_last_projet_req->fetch();

		}

		return($get_last_projet);
	}



	static function tab_projet($type=NULL)
	{
			if(!empty($type))
			{
				$read_projet = Projet::get_projet($idProjet=NULL, $type);
			}
			else
			{
				$read_projet = Projet::get_projet($idProjet=NULL, $type=NULL);
			}

			// Boucle remplissage du tableau
			while($tab_projet = $read_projet->fetch())
			{
				?>
					<tr>
						<td><?php echo $tab_projet['isActiveProjet']; ?></td>
						<td><?php echo $tab_projet['titreProjet']; ?></td>
						<td><?php echo $tab_projet['descriptionProjet']; ?></td>
						<td><?php echo $tab_projet['dateDebutProjet']; ?></td>
						<td><?php echo $tab_projet['dateFinProjet']; ?></td>
						<td><?php echo $tab_projet['budgetMinProjet']; ?></td>
						<td><?php echo $tab_projet['budgetMaxProjet']; ?></td>
						<td><?php echo $tab_projet['nbPistes']; ?></td>
						<td class="actions">
							<a href="index.php?module=projet&action=manage&type=modifier&idProjet=<?php echo $tab_projet['idProjet']; ?>" title="Editer" class="btn btn-default btn-sm btn-icon icon-left">
								<i class="entypo-pencil"></i>
								Modifier
							</a>

							<a href="index.php?module=projet&action=manage&type=supprimer&idProjet=<?php echo $tab_projet['idProjet']; ?>" title="Supprimer" class="btn btn-danger btn-sm btn-icon icon-left">
								<i class="entypo-trash"></i>
								Supprimer
							</a>

							<a href="#" class="btn btn-info btn-sm btn-icon icon-left">
								<i class="entypo-info"></i>
								Voir
							</a>
							<a href="index.php?module=projet&action=assigner_graphiste&idProjet=<?php echo $tab_projet['idProjet']; ?>" class="btn btn-info btn-sm btn-icon icon-left">
								<i class="entypo-info"></i>
								Proposer ce projet
							</a>
						</td>
					</tr>
				<?php
			}
	}


	// Fonction CRUD
	// Retourne $typeNotif & $msgNotif si erreur

	static function set_projet($idProjet=NULL, $titreProjet, $descriptionProjet, $dateDebutProjet, $dateFinProjet, $nbPistes, $nomContact, $isActiveProjet, $emailContact, $telContact, $budgetMinProjet, $budgetMaxProjet)
	{
		// Si on a pas d'ID, INSERT
		if(empty($idProjet))
		{
			$type = "insert";

			$verif_sql = Projet::verif_sql($type, $titreProjet);

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

				$sql_insert = M_Projet::insert_projet($titreProjet, $descriptionProjet, $dateDebutProjet, $dateFinProjet, $nbPistes, $nomContact, $isActiveProjet, $emailContact, $telContact, $budgetMinProjet, $budgetMaxProjet);

				return $sql_insert;
			}

		}
		// Sinon UPDATE
		else
		{
			$type = "update";

			$verif_sql = Projet::verif_sql($type, $titreProjet, $idProjet);

			if(!empty($verif_sql))
			{
					$updateProjet = "error";
					return($updateProjet);
			}
			else
			{
				$sql_update = M_Projet::update_projet($idProjet, $titreProjet, $descriptionProjet, $dateDebutProjet, $dateFinProjet, $nbPistes, $nomContact, $isActiveProjet, $emailContact, $telContact, $budgetMinProjet, $budgetMaxProjet);
				$updateProjet = "ok";
				return($updateProjet);
			}
		}
	}


	// static function set_Statut($idProjet, $emailContact)
	// {
		// $update_statut = M_Projet::set_Statut($idProjet, $emailContact);

		// if($update_statut == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le statut du projet a bien �t� modifi�";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le statut du projet n'a pu �tre modifi�";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_read($idProjet, $nbPistes)
	// {
		// $update_isRead = M_Projet::set_read($idProjet, $nbPistes);

		// if($update_isRead == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le projet sera d�sormais marqu� comme \"lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le projet sera d�sormais marqu� comme \"non lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_categorie($idProjet, $telContact)
	// {
		// $update_categorie = M_Projet::set_categorie($idProjet, $telContact);

		// if($update_categorie == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "La cat�gorie du projet a bien �t� modifi�e";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "La cat�gorie du projet n'a pu �tre modifi�e";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	static function del_projet($idProjet)
	{
		$type = "delete";

		$verif_sql = Projet::verif_sql($type, $titreProjet=NULL, $idProjet);

		if(!empty($verif_sql))
		{
			$delProjet = "error";
			return($delProjet);
		}
		else
		{
			M_Projet::del_projet($idProjet);

			$delProjet = "ok";

			return($delProjet);
		}
	}


	static function verif_sql($type, $titreProjet=NULL, $idProjet=NULL)
	{

		switch ($type)
		{

			case "insert":

				$verif_sql_insert = M_Projet::verif_insert_projet($titreProjet);

				if(!empty($verif_sql_insert['idProjet']))
				{
					$error="error";
					return $error;
				}

			break;


			case "delete":

				$verif_sql_delete = M_Projet::verif_delete_projet($idProjet);

				if(!empty($verif_sql_delete))
				{
					$typeNotif = "error";
					return $typeNotif;
				}

			break;
		}
	}

	static function del_graphiste_assigner($idProjet, $idGraphiste)
	{
		M_Projet::del_graphiste_assigner($idProjet, $idGraphiste);
	}

	static function assigner_graphiste($idProjet, $idGraphiste)
	{
		M_Projet::assigner_graphiste($idProjet, $idGraphiste);
	}

	static function get_designer()
	{
		$get_designer = M_Projet::get_designer();
		return($get_designer);
	}

	static function get_tab_projet_accepter($idProjet)
	{
		$get_assignation = M_Projet::get_tab_projet_accepter($idProjet);
		return($get_assignation);

	}
}

if(site_admin())
		require_once('views/'.$controller.'/'.$controller.'.php');