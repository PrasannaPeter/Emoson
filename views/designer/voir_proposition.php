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
                    <table border="1">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Accepté</th>
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
                    if($tab_proposer['acceptation'] == 0) {echo '<td>Demandé</td>';}elseif($tab_proposer['acceptation'] == 1){echo "<td>Non</td>";}elseif($tab_proposer['acceptation'] == 2){echo "<td>Oui</td>";}
                    echo '<td>
                    	<a href="index.php?module=projet&action=manage&type=voir_projet&idProjet='.$tab_proposer['idProjet'].'"> Voir</a>
                    	<a href="index.php?module=proposition&action=manage&type=modif_proposition&acceptation=accepter&idUtilisateur='.$idUtilisateur.'&idProjet='.$tab_proposer['idProjet'].'"> Accepter</a>
                    	<a href="index.php?module=proposition&action=manage&type=modif_proposition&acceptation=decliner&idUtilisateur='.$idUtilisateur.'&idProjet='.$tab_proposer['idProjet'].'"> Décliner</a>
                    </td>'; ?>
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

    
    