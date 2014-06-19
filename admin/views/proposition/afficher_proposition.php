<?php

$type_proposition = $_GET['type_proposition'];

//Formulaire à partir de la page projet
if($type_proposition == "projet")
{
    if (!isset($_GET['idProjet']))
    {
        header('index.php?module=projet&action=afficher_projet');
    }
    else if(empty($_GET['idProjet']))
    {
        header('index.php?module=projet&action=afficher_projet');
    }
    else
    {
        require_once 'controllers/projet/projet.php';
        $idProjet = $_GET['idProjet'];
        $get_projet = Projet::get_projet($idProjet);

		$projet_proposer = Proposition::get_tab_proposition($idProjet, $type_proposition);
                        echo '<h1>Projet '.$get_projet['titreProjet'].'</h1>';
			echo '<h4>Ce projet est actuellement proposé à : </h4>';
			echo '<table class="table table-bordered datatable" >
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Offre</th>
                            <th>Validé</th>
							<th></th>
						</tr>
					</thead>
					<tbody>';
			while($tab_proposer = $projet_proposer->fetch())
			{?>
				<?php
                echo '<tr>';
				echo '<td>'.$tab_proposer['nomUtilisateur'].'</td>';
				echo '<td>'.$tab_proposer['prenomUtilisateur'].'</td>';
				        if($tab_proposer['acceptation'] == 0) {
                            echo '<td>Demandé</td>';
                        }
                        elseif($tab_proposer['acceptation'] == 1){
                            echo "<td>Accepté</td>";
                        }
                        elseif($tab_proposer['acceptation'] == 2) {
                            echo "<td>Décliné</td>";
                        }

                        if($tab_proposer['validation'] == 0){
                            echo '<td>Non</td>';
                        }
                        elseif($tab_proposer['validation'] == 1){
                            echo "<td>Oui</td>";
                        }

					echo '<td>';
                        if($tab_proposer['acceptation'] == 1 && $tab_proposer['validation'] == 0)
                        {
                            echo'<a href="index.php?module=proposition&action=manage&type=set_proposition&acceptation=1&validation=1&type_proposition=projet&idProjet='.$idProjet.'&idUtilisateur='.$tab_proposer['idUtilisateur'].'" class="btn btn-info btn-xs btn-icon icon-left"> Valider</a>';
                        }
                        echo '<a href="index.php?module=proposition&action=manage&type=del_proposition&type_proposition=projet&idProjet='.$idProjet.'&idUtilisateur='.$tab_proposer['idUtilisateur'].'" class="btn btn-danger btn-xs btn-icon icon-left"> Supprimer</a>';
                        echo'</td>';
                    ?>

				</tr>
			<?php
			}
   		?>
         </tbody>
        </table>
        <br>
        <br>

        <h4>Assigner des designers au projet</h4>

    	<p>Cocher les cases correspondantes aux designers à assigner à ce projet</p>
    	<p>Vous pouvez utiliser la fonction recherche</p>
        <!-- Formulaire d'ajout -->
    	<form method="POST" action="index.php?module=proposition&action=manage&type=add_proposition&type_proposition=projet<?php if(!empty($_GET['idProjet'])){ echo '&idProjet='.$_GET['idProjet'];}?>" class="vertical-form">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Assigner</th>
                    </tr>
                </thead>
                <tbody>
            <?php

            //require_once('controllers/utilisateur/utilisateur.php');
            $read_designer = Proposition::get_utilisateur();

            // Boucle remplissage du tableau
            while($tab_designer = $read_designer->fetch())
            {
                echo '<td>'.$tab_designer['nomUtilisateur'].'</td><td>'.$tab_designer['prenomUtilisateur'].'</td>';
                echo '<td><input type="checkbox" name="graphiste_assigner[]" title="Assigner le designer au projet" value="'.$tab_designer['idUtilisateur'].'"/></td>';
                echo '</tr>';
            }?>

                </tbody>
            </table>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                    <button class="btn btn-default" type="submit" name="submit" value="ok">Confirmer</button>
                </div>
            </div>
        </form>
    <?php }
}
//Formulaire à partir de la page utilisateur
else if ($type_proposition == "utilisateur")
{
    if (!isset($_GET['idUtilisateur']))
    {
        header('index.php?module=proposition&action=afficher_projet');
    }
    else if(empty($_GET['idUtilisateur']))
    {
        header('index.php?module=proposition&action=afficher_projet');
    }
    else
    {
        $idUtilisateur = $_GET['idUtilisateur'];

        $designer_proposer = Proposition::get_tab_proposition($idUtilisateur, $type_proposition);

        if(empty($designer_proposer))
        {
            echo "<p>Pas de resultat</p>";
        }
        else
        {
            echo '<h4>Ce designer à déja été proposé à </h4>
                    <table class="table table-bordered datatable" >
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Offre</th>
                            <th>Validé</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
            while($tab_proposer = $designer_proposer->fetch())
            {
            ?>
                <tr>
                    <?php
                    echo '<td>'.$tab_proposer['titreProjet'].'</td>';
                    echo '<td>'.$tab_proposer['descriptionProjet'].'</td>';
                    if($tab_proposer['acceptation'] == 0) {
                        echo '<td>Demandé</td>';
                    }
                    elseif($tab_proposer['acceptation'] == 1){
                        echo "<td>Accepté</td>";
                    }
                    elseif($tab_proposer['acceptation'] == 2){
                        echo "<td>Decliné</td>";
                    }

                    if($tab_proposer['validation'] == 0) {
                        echo '<td>Non</td>';
                    }
                    elseif($tab_proposer['validation'] == 1){
                        echo "<td>Oui</td>";
                    }
                    echo '<td>';
                            if($tab_proposer['acceptation'] == 1 && $tab_proposer['validation'] == 0)
                            {
                                echo'<a href="index.php?module=proposition&action=manage&type=set_proposition&acceptation=1&validation=1&type_proposition=utilisateur&idUtilisateur='.$idUtilisateur.'&idProjet='.$tab_proposer['idProjet'].'" class="btn btn-info btn-xs btn-icon icon-left"> Valider</a>';
                            }
                            echo '<a href="index.php?module=proposition&action=manage&type=del_proposition&type_proposition=utilisateur&idUtilisateur='.$idUtilisateur.'&idProjet='.$tab_proposer['idProjet'].'" class="btn btn-danger btn-xs btn-icon icon-left"> Supprimer</a>';
                       echo '</td>'; ?>
                </tr>
            <?php
            }
            echo '</tbody>
            </table>';
        }?>

            <br>
            <br>
        <h4>Proposer des projet à ce designer</h4>

        <p>Cocher les cases correspondantes aux projets à assigner à ce designer</p>
        <p>Vous pouvez utiliser la fonction recherche</p>
        <!-- Formulaire d'ajout -->
        <form method="POST" action="index.php?module=proposition&action=manage&type=add_proposition&type_proposition=utilisateur<?php if(!empty($_GET['idUtilisateur'])){ echo '&idUtilisateur='.$_GET['idUtilisateur'];}?>" class="vertical-form">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Etat</th>
                        <th>Assigner</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $read_projet = Proposition::get_projet();

                // Boucle remplissage du tableau
                while($tab_projet = $read_projet->fetch()){
                ?>
                    <tr>
                        <td><?php echo $tab_projet['titreProjet'].'</td><td>'.$tab_projet['descriptionProjet']; ?></td>
                        <td><?php if($tab_projet['isActiveProjet'] == "0")
                            {
                                echo  "En attente de validation";
                            }
                            else if ($tab_projet['isActiveProjet'] == "1")
                            {
                                echo  "En cours";
                            }
                            else if ($tab_projet['isActiveProjet'] == "2")
                            {
                                echo "Terminé";
                            } ?>
                        <td><input type="checkbox" name="projet_assigner[]" title="Assigner le projet au designer" value="<?php echo $tab_projet['idProjet']; ?>" <?php //if($get_assignation == "oui"){ echo "checked=\"checked\""; } ?> /></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button class="btn btn-default" type="submit" name="submit" value="ok">Confirmer</button>
                    </div>
                </div>
        </form>
        <?php
    }
}
?>