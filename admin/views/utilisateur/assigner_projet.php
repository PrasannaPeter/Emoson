   <!-- Tableau contenant les designer qui ont accepté le projet -->
    
   <?php 
        
        if (!isset($_GET['idUtilisateur']))
        {
            header('index.php?module=utilisateur&action=afficher_graphiste');
        }
        else if(empty($_GET['idUtilisateur']))
        {
            header('index.php?module=utilisateur&action=afficher_graphiste');
        }  
        else
        {
            $idUtilisateur = $_GET['idUtilisateur'];

            $designer_proposer = Utilisateur::get_tab_designer_accepter($idUtilisateur);
            
            if(empty($designer_proposer))
            { 
                echo "<p>Pas de resultat</p>";
            }
            else
            {
                echo '<p>Ce designer à déja été proposé à </p>';
                echo '<table border="1" >
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Budget mix</th>
                                <th>Budget max</th>
                                <th>Etat</th>
                                <th>Acceptation</th>
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
                        echo '<td>'.$tab_proposer['dateDebutProjet'].'</td>';
                        echo '<td>'.$tab_proposer['dateFinProjet'].'</td>';
                        echo '<td>'.$tab_proposer['budgetMinProjet'].'</td>';
                        echo '<td>'.$tab_proposer['budgetMaxProjet'].'</td>';
                        echo '<td>'.$tab_proposer['etatProjet'].'</td>';
                        echo '<td>'.$tab_proposer['acceptation'].'</td>';
                        echo '<td><a href="index.php?module=utilisateur&action=manage&type=del_assigner_projet&idProjet='.$tab_proposer['idProjet'].'&idUtilisateur='.$idUtilisateur.'"> Supprimer la proposition</a></td>'; ?>
                    </tr>   
                <?php
                }   
            }?>
             </tbody>
            </table>
            <br>
            <br>
        
        <h4>Proposer des projet à ce designer</h4>
                
        <p>Cocher les cases correspondantes aux projets à assigner à ce designer</p>
        <p>Vous pouvez utiliser la fonction recherche</p>
        <!-- Formulaire d'ajout -->
        <form method="POST" action="index.php?module=utilisateur&action=manage<?php if(!empty($_GET['idUtilisateur'])){ echo '&idUtilisateur='.$_GET['idUtilisateur'];}?>&type=assigner_projet" class="vertical-form">
            <table class="datatable">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Budget min</th>
                        <th>Budget max</th>
                        <th>Etat</th>
                        <th>Assigner</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        $read_projet = Utilisateur::get_projet($idProjet = NULL, $type = NULL); 
            
        /*if(!empty($_POST))
        {
            dump($_POST['projet_assigner']);  
        } */       
        
        // Boucle remplissage du tableau
        while($tab_projet = $read_projet->fetch())
        {   
            //$accepter = Utilisateur::get_designer_accepter($idUtilisateur, $tab_projet['idProjet']);          
            ?>
                <tr>
                    <td><?php echo $tab_projet['titreProjet'].'</td><td>'.$tab_projet['descriptionProjet']; ?></td>
                    <td><?php echo $tab_projet['dateDebutProjet'].'</td><td>'.$tab_projet['dateFinProjet']; ?></td>
                    <td><?php echo $tab_projet['budgetMinProjet'].'</td><td>'.$tab_projet['budgetMaxProjet']; ?></td>
                    <td><?php echo $tab_projet['etatProjet'].'</td>'; ?>
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
    ?>

    
    