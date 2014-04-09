   <!-- Tableau contenant les designer qui ont accepté le projet -->
    
   <?php 
   		
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
            $idProjet = $_GET['idProjet'];
        
		

    		$projet_proposer = Projet::get_tab_projet_accepter($idProjet);
    		
    		if(empty($projet_proposer))
    		{ 
    			echo "<p>Pas de resultat</p>";
    		}
    		else
    		{
    			echo '<p>Ce projet à déja été proposé à </p>';
    			echo '<table border="1" >
    					<thead>
    						<tr>
    							<th>Nom</th>
    							<th>Prénom</th>
    							<th>Accepté</th>
    							<th></th>
    						</tr>
    					</thead>
    					<tbody>';
    			while($tab_proposer = $projet_proposer->fetch())
    			{?>
    				<tr>
    					<?php 
    					echo '<td>'.$tab_proposer['nomUtilisateur'].'</td>';
    					echo '<td>'.$tab_proposer['prenomUtilisateur'].'</td>';
    					echo '<td>'.$tab_proposer['acceptation'].'</td>';
    					echo '<td><a href="index.php?module=projet&action=manage&type=del_assigner_graphiste&idProjet='.$idProjet.'&idGraphiste='.$tab_proposer['idUtilisateur'].'"> Supprimer la proposition</a></td>'; ?>
    				</tr>	
    			<?php
    			}	
       		}?>
             </tbody>
            </table>
            <br>
            <br>
        
        <h4>Assigner des designers au projet</h4>
    			
    	<p>Cocher les cases correspondantes aux designers à assigner à ce projet</p>
    	<p>Vous pouvez utiliser la fonction recherche</p>
        <!-- Formulaire d'ajout -->
    	<form method="POST" action="index.php?module=projet&action=manage<?php if(!empty($_GET['idProjet'])){ echo '&idProjet='.$_GET['idProjet'];}?>&type=assigner_graphiste" class="vertical-form">
            <table class="datatable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Assigner</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            $read_designer = Projet::get_designer($idDesigner = NULL, $type = NULL); 
                
            /*if(!empty($_POST))
            {
                dump($_POST['designer_assigner']);	
            }*/        
            // Boucle remplissage du tableau
            while($tab_designer = $read_designer->fetch())
            {	
                ?>
                    <tr>
                        <td><?php echo $tab_designer['nomUtilisateur'].'</td><td>'.$tab_designer['prenomUtilisateur']; ?></td>
                        <td><input type="checkbox" name="graphiste_assigner[]" title="Assigner le designer au projet" value="<?php echo $tab_designer['idUtilisateur']; ?>" <?php //if($get_assignation == "oui"){ echo "checked=\"checked\""; } ?> /></td>
                        
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
    
    