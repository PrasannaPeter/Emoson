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

	static function nb_designer_actuel($idProjet)
	{
		$nb_designer_actuel = M_Projet::nb_designer_actuel($idProjet);
		return($nb_designer_actuel);
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


	//Tableau qui affiche le projet
	static function tab_projet($type=NULL)
	{
		if(!empty($type))
		{
			$read_projet = Projet::get_projet($idProjet=NULL,$libProjet, $type);
		}
		else
		{
			$read_projet = Projet::get_projet($idProjet=NULL,$libProjet, $type=NULL);
		}

		// Boucle remplissage du tableau
		while($tab_projet = $read_projet->fetch())
		{
			?>
			<tr>
				<td><?php echo $tab_projet['idProjet']; ?></td>
				<td><?php echo $tab_projet['titreProjet']; ?></td>
				<td><?php

				if ($tab_projet['isActiveProjet'] == "0")
				{
					echo  "En attente de validation";
				}
				else if ($tab_projet['isActiveProjet'] == "1")
				{
					echo  "En cours";
				}
				else if ($tab_projet['isActiveProjet'] == "2")
				{
					echo "Termin�";
				}
				else if ($tab_projet['isActiveProjet'] == "3")
				{
					echo "Non valid�";
				}
				?></td>
				<td class="actions">
					<a href="index.php?module=projet&action=manage&type=modifier&idProjet=<?php echo $tab_projet['idProjet']; ?>" title="Editer" class="btn btn-default btn-sm btn-icon icon-left">
						<i class="entypo-pencil"></i>
						Modifier
					</a>

					<a href="index.php?module=projet&action=manage&type=supprimer&idProjet=<?php echo $tab_projet['idProjet']; ?>" title="Supprimer" class="btn btn-danger btn-sm btn-icon icon-left">
						<i class="entypo-trash"></i>
						Supprimer
					</a>

					<a href="index.php?module=projet&action=manage&type=voir_projet&idProjet=<?php echo $tab_projet['idProjet']; ?>" class="btn btn-info btn-sm btn-icon icon-left">
						<i class="entypo-info"></i>
						Voir
					</a>

					<?php
					if($tab_projet['isActiveProjet'] == "0")
					{
					?>
						<a href="index.php?module=projet&action=manage&type=valider_projet&idProjet=<?php echo $tab_projet['idProjet']; ?>" class="btn btn-gold">
							<i class="entypo-info"></i>
							Valider
						</a>
					<?php
					}
					if ($tab_projet['isActiveProjet'] == "1")
					{
					?>
					<a href="index.php?module=proposition&action=afficher_proposition&type_proposition=projet&idProjet=<?php echo $tab_projet['idProjet']; ?>" class="btn btn-success">
						<i class="entypo-info"></i>
						Proposer ce projet
					</a>
					<?php
					}
					?>


				</td>
			</tr>
		<?php
		}
	}


	// Fonction CRUD
	// Retourne $typeNotif & $msgNotif si erreur

	static function set_projet($idProjet=NULL, $titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise,  $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack)
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

				$sql_insert = M_Projet::insert_projet($titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);

				if($sql_insert)
					return $sql_insert = "ok";
				else
					return $sql_insert = "error";
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
				$sql_update = M_Projet::update_projet($idProjet, $titreProjet, $descriptionProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);
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

	static function valider_projet($idProjet)
	{

		/*$type = "valider";

		$verif_sql = Projet::verif_sql($type, $titreProjet=NULL, $idProjet);

		if(!empty($verif_sql))
		{
			$delProjet = "error";
			return($delProjet);
		}
		else
		{*/
			M_Projet::valider_projet($idProjet);

			/*$delProjet = "ok";

			return($delProjet);
		}*/
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


			/*case "delete":

				$verif_sql_delete = M_Projet::verif_delete_projet($idProjet);

				if(!empty($verif_sql_delete))
				{
					$typeNotif = "error";
					return $typeNotif;
				}

			break;
			*/
		}
	}
        
         //Recuperation desdonnée get_fichiers_lies
         static function get_fichiers_lies($idProjet)
	{
		$get_fichiers_lies = M_Projet::get_fichiers_lies($idProjet);
		return($get_fichiers_lies);
	}
        
         //insertion de song get_fichiers_lies
         static function insert_fichiers_lies($libFichier, $dateUploadFichier, $idProjet, $idUtilisateur)
	{
		$insert_fichiers_lies = M_Projet::insert_fichiers_lies($libFichier, $dateUploadFichier, $idProjet, $idUtilisateur);
		if(!empty($insert_fichiers_lies))
		{
                          $res = "ok";
                    return($res);
		}
		else
		{
                     $res = "error";
                    return($res);
		}
	}
        
        static function get_nb_AR_Projet($idProjet)
	{
            	$get_nb_AR_Projet = M_Projet::get_nb_AR_Projet($idProjet);  
		return($get_nb_AR_Projet);
	}
        
        static function count_nb_AR_Projet($idProjet)
	{
            	$get_nb_AR_Projet = M_Projet::count_nb_AR_Projet($idProjet);  
		return($get_nb_AR_Projet);
	}
}

if(site_admin())
		require_once('views/'.$controller.'/'.$controller.'.php');