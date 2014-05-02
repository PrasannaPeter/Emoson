   <!-- Tableau contenant les designer qui ont accepté le projet -->
	<?php

    if (!isset($_GET['idUtilisateur']))
    {
        header('index.php?module=utilisateur&action=afficher_projet');
    }
    else if(empty($_GET['idUtilisateur']))
    {
        header('index.php?module=utilisateur&action=afficher_projet');
    }
    else
    {
        $idUtilisateur = $_GET['idUtilisateur'];

        require_once 'admin/controllers/proposition/proposition.php';
        $designer_proposer = Proposition::get_tab_proposition($idUtilisateur, $type_proposition="utilisateur");

        if(empty($designer_proposer))
        {
            echo "<p>Pas de resultat</p>";
        }
        else
        {
            echo '<br><br>
        			<caption>Les propositions </caption>
                    <table table-borderer datatable>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Etat</th>
                            <th>Offre</th>
                            <th>Validé par l\'administrateur</th>
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
                    if($tab_proposer['isActiveProjet'] == 0)
                        {
                            echo '<td>En cours de validation</td>';
                        }
                        elseif($tab_proposer['isActiveProjet'] == 1)
                        {
                            echo "<td>En cours</td>";
                        }
                        elseif($tab_proposer['isActiveProjet'] == 2)
                        {
                            echo "<td>Terminé</td>";
                        }
                        if($tab_proposer['acceptation'] == 0)
                        {
                            echo '<td>Demandé</td>';
                        }
                        elseif($tab_proposer['acceptation'] == 1)
                        {
                            echo "<td>Accepté</td>";
                        }
                        elseif($tab_proposer['acceptation'] == 2)
                        {
                                echo "<td>Decliné</td>";
                        }
                        if($tab_proposer['validation'] == 0)
                        {
                            echo '<td>Non</td>';
                        }
                        elseif($tab_proposer['validation'] == 1)
                        {
                            echo "<td>Oui</td>";
                        }


                    echo '
                        <td>
                    	<a href="index.php?module=projet&action=manage&type=voir_projet&idProjet='.$tab_proposer['idProjet'].'"> Voir</a>';
                        if($tab_proposer['validation'] == 1 && $tab_proposer['isActiveProjet'] == 1)
                        {
                            echo '<a href="#"> Travailler sur le projet</a>';
                        }
                    	if($tab_proposer['acceptation'] == 0)
                        {
                            echo '<a href="index.php?module=proposition&action=manage&type=set_proposition&type_proposition=designer&acceptation=1&validation=non&idUtilisateur='.$idUtilisateur.'&idProjet='.$tab_proposer['idProjet'].'"> Accepter</a>';
                            echo '<a href="index.php?module=proposition&action=manage&type=set_proposition&type_proposition=designer&acceptation=2&validation=non&idUtilisateur='.$idUtilisateur.'&idProjet='.$tab_proposer['idProjet'].'"> Décliner</a>';
                        }
                        elseif($tab_proposer['acceptation'] == 1 || $tab_proposer['acceptation'] == 2)
                        {
                            echo "";
                        }

                    echo '</td>'; ?>
                </tr>
            <?php
            }
            echo '</tbody>
            </table>
        	<br>
        	<br>';
        }
    }
    ?>


