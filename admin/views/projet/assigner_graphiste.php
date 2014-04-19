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

    			echo '<h4>Ce projet à d&eacute;ja &eacute;t&eacute; propos&eacute; à </h4>';
    			echo '<table class="datatable" >
    					<thead>
    						<tr>
    							<th>Nom</th>
    							<th>Pr&eacute;nom</th>
    							<th>Accept&eacute;</th>
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
    					echo '<td><a href="index.php?module=projet&action=manage&type=del_assigner_graphiste&idProjet='.$idProjet.'&idGraphiste='.$tab_proposer['idUtilisateur'].'" class="btn btn-danger btn-sm btn-icon icon-left"> Supprimer la proposition</a></td>'; 
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
    	<form method="POST" action="index.php?module=projet&action=manage<?php if(!empty($_GET['idProjet'])){ echo '&idProjet='.$_GET['idProjet'];}?>&type=assigner_graphiste" class="vertical-form">
            <table class="datatable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Pr&eacute;nom</th>
                        <th>Assigner</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            $read_designer = Projet::get_designer($idDesigner = NULL, $type = NULL); 
      
            // Boucle remplissage du tableau
            while($tab_designer = $read_designer->fetch())
            {	
                //ne fonctionne pas
                /*if ($tab_designer['idUtilisateur'])
                {   
                    echo '<tr><td>'.$tab_designer['nomUtilisateur'].'</td><td>'.$tab_designer['prenomUtilisateur'].'</td>';
                    echo '<td><input type="checkbox" name="graphiste_assigner[]" title="Assigner le designer au projet" checked="checked" value="'.$tab_designer['idUtilisateur'].'"/></td>'; 
                    echo '</tr>';
                }
                else
                {
                    echo '<td>'.$tab_designer['nomUtilisateur'].'</td><td>'.$tab_designer['prenomUtilisateur'].'</td>';
                    echo '<td><input type="checkbox" name="graphiste_assigner[]" title="Assigner le designer au projet" value="'.$tab_designer['idUtilisateur'].'"/></td>';
                    echo '</tr>';
                }*/
                echo '<td>'.$tab_designer['nomUtilisateur'].'</td><td>'.$tab_designer['prenomUtilisateur'].'</td>';
                echo '<td><input type="checkbox" name="graphiste_assigner[]" title="Assigner le designer au projet" value="'.$tab_designer['idUtilisateur'].'"/></td>';
                echo '</tr>';
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
    
    