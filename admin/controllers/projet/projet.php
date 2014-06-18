<?php

// On inclus le modï¿½le nï¿½ccï¿½ssaire
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

	static function nb_projet()
	{
		$nb_projet = M_Projet::nb_projet();

		return($nb_projet);
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
			$read_projet = Projet::get_projet($idProjet=NULL, $libProjet=NULL, $type);
		}
		else
		{
			$read_projet = Projet::get_projet($idProjet=NULL, $libProjet=NULL, $type=NULL);
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
					echo "Terminï¿½";
				}
				else if ($tab_projet['isActiveProjet'] == "3")
				{
					echo "Non validï¿½";
				}
				?></td>
				<td class="actions">
					<a href="index.php?module=projet&action=manage&type=modifier&idProjet=<?php echo $tab_projet['idProjet']; ?>" title="Editer" class="btn btn-default btn-xs btn-icon icon-left">
						<i class="entypo-pencil"></i>
						Modifier
					</a>

					<a href="index.php?module=projet&action=manage&type=supprimer&idProjet=<?php echo $tab_projet['idProjet']; ?>" title="Supprimer" class="btn btn-danger btn-xs btn-icon icon-left">
						<i class="entypo-trash"></i>
						Supprimer
					</a>

					<a href="index.php?module=projet&action=manage&type=voir_projet&idProjet=<?php echo $tab_projet['idProjet']; ?>" class="btn btn-info btn-xs btn-icon icon-left">
						<i class="entypo-info"></i>
						Voir
					</a>

					<?php
					if($tab_projet['isActiveProjet'] == "0")
					{
					?>
						<a href="index.php?module=projet&action=manage&type=valider_projet&idProjet=<?php echo $tab_projet['idProjet']; ?>" class="btn btn-xs btn-gold">
							<i class="entypo-info"></i>
							Valider
						</a>
					<?php
					}
					if ($tab_projet['isActiveProjet'] == "1")
					{
					?>
					<a href="index.php?module=proposition&action=afficher_proposition&type_proposition=projet&idProjet=<?php echo $tab_projet['idProjet']; ?>" class="btn btn-xs btn-success">
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

	static function set_projet($titreProjet, $descriptionProjet, $brandingProjet, $positionnementProjet, $identiteProjet, $referencesProjet, $dontlikeProjet, $commentaireProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack)
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
				$sql_insert = M_Projet::insert_projet($titreProjet, $descriptionProjet, $brandingProjet, $positionnementProjet, $identiteProjet, $referencesProjet, $dontlikeProjet, $commentaireProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);

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
				$sql_update = M_Projet::update_projet($titreProjet, $descriptionProjet, $brandingProjet, $positionnementProjet, $identiteProjet, $referencesProjet, $dontlikeProjet, $commentaireProjet, $isActiveProjet, $idUtilisateur, $tailleEntreprise, $caEntreprise, $ptsContactEntreprise, $optionProjet, $nbARProjet, $nbDesignerSouhaite, $idPack);
				$updateProjet = "ok";
				return($updateProjet);
			}
		}
	}


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

		M_Projet::valider_projet($idProjet);

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

	static function verifFichier($name, $tmp_name, $size)
    {
		$extensionsAutorisees = array("doc", "docx", "pdf");

<<<<<<< HEAD
		// si un fichier a bien ï¿½tï¿½ transfï¿½rï¿½
        if (is_uploaded_file($tmp_name)) 
=======
		// si un fichier a bien été transféré
        if (is_uploaded_file($tmp_name))
>>>>>>> 0f0ab1fcc961e7545a08f4a509340743b21b0706
        {
            $extraireExtension = explode(".", $name);
            $extension = $extraireExtension[1];
<<<<<<< HEAD
            // Contrï¿½le de l'extension du fichier
            if (!(in_array($extension, $extensionsAutorisees))) 
=======
            // Contrôle de l'extension du fichier
            if (!(in_array($extension, $extensionsAutorisees)))
>>>>>>> 0f0ab1fcc961e7545a08f4a509340743b21b0706
            {
            	$_SESSION['typeNotif'] = "error";
                $_SESSION['titreNotif'] = 'Votre fichier '.$name.' n\a pas l\'extension attendue('.$extensionsAutorisees.')';

                if($_SESSION['role'] == "ENTREPRISE")
                {
                	header('Location:index.php?module=entreprise&action=remplir_brief');
                }
                else if ($_SESSION['role'] == "ADMIN") {
                	header('Location:index.php?module=projet&action=manage&type=ajouter');
                }
            }

            if ($size > 8000000)
            {
                $_SESSION['typeNotif'] = "error";
                $_SESSION['titreNotif'] = 'Votre fichier '.$name.'est trop volumineux';

                if($_SESSION['role'] == "ENTREPRISE")
                {
                	header('Location:index.php?module=entreprise&action=remplir_brief');
                }
                else if ($_SESSION['role'] == "ADMIN") {
                	header('Location:index.php?module=projet&action=manage&type=ajouter');
                }
            }
            return 'ok';
	    }
    }


        
<<<<<<< HEAD
         //Recuperation des donnï¿½es get_fichiers_lies
         static function get_fichiers_lies($idProjet)
=======
    //Recuperation des données get_fichiers_lies
	static function get_fichiers_lies($idProjet)
>>>>>>> 0f0ab1fcc961e7545a08f4a509340743b21b0706
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

	static function count_get_nb_AR_Projet($idProjet)
	{
		$get_nb_AR_Projet = M_Projet::count_get_nb_AR_Projet($idProjet);  
		return($get_nb_AR_Projet);
	}
<<<<<<< HEAD
        
        static function deleteTrackByAdmin($idFichier)
	{
            $verif_sql_delete = M_Projet::deleteTrack($idFichier);
            echo $verif_sql_delete;
            die();
            if(!empty($verif_sql_delete))
            {
                     $typeNotif = "ok";
                    return $typeNotif;
                   
            }  else {
                     $typeNotif = "error";
                    return $typeNotif;
            }
        }
        
=======

		// static function set_Statut($idProjet, $emailContact)
	// {
		// $update_statut = M_Projet::set_Statut($idProjet, $emailContact);

		// if($update_statut == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le statut du projet a bien ï¿½tï¿½ modifiï¿½";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le statut du projet n'a pu ï¿½tre modifiï¿½";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_read($idProjet, $nbPistes)
	// {
		// $update_isRead = M_Projet::set_read($idProjet, $nbPistes);

		// if($update_isRead == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "Le projet sera dï¿½sormais marquï¿½ comme \"lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "Le projet sera dï¿½sormais marquï¿½ comme \"non lu\"";
			// $_SESSION['msgNotif'] = "";
		// }
	// }


	// static function set_categorie($idProjet, $telContact)
	// {
		// $update_categorie = M_Projet::set_categorie($idProjet, $telContact);

		// if($update_categorie == true)
		// {
			// $_SESSION['typeNotif'] = "success";
			// $_SESSION['titreNotif'] = "La catï¿½gorie du projet a bien ï¿½tï¿½ modifiï¿½e";
			// $_SESSION['msgNotif'] = "";
		// }
		// else
		// {
			// $_SESSION['typeNotif'] = "error";
			// $_SESSION['titreNotif'] = "La catï¿½gorie du projet n'a pu ï¿½tre modifiï¿½e";
			// $_SESSION['msgNotif'] = "";
		// }
	// }
>>>>>>> 0f0ab1fcc961e7545a08f4a509340743b21b0706
}

//if(site_admin())
		//require_once('views/'.$controller.'/'.$controller.'.php');
