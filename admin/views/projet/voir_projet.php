<?php
	
	if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}

	$get_projet = Projet::get_projet($idProjet);
          echo '<h4>Détail du projet '.$get_projet['titreProjet'].'</h4>';
          ?>
<div class="panel panel-primary" style="padding:15px;background-color:#f5f5f6">
		<?php
        if(!empty($get_projet['descriptionProjet'])){ echo '<p><strong>Description projet : </strong>'.$get_projet['descriptionProjet'].'</p>';}
        if(!empty($get_projet['brandingProjet'])){echo '<p><strong>Branding projet : </strong>'.$get_projet['brandingProjet'].'</p>';}
	if(!empty($get_projet['positionnementProjet'])){echo '<p><strong>Positionnement projet : </strong>'.$get_projet['positionnementProjet'].'</p>';}
	if(!empty($get_projet['identiteProjet'])){echo '<p><strong>Identité : </strong>'.$get_projet['identiteProjet'].'</p>';}
	if(!empty($get_projet['referencesProjet'])){echo '<p><strong>Réferences : </strong>'.$get_projet['referencesProjet'].'</p>';}
	if(!empty($get_projet['dontlikeProjet'])){echo '<p><strong>Ce que vous ne voulez pas voir : </strong>'.$get_projet['dontlikeProjet'].'</p>';}
	if(!empty($get_projet['commentaireProjet'])){echo '<p><strong>Commentaire projet : </strong>'.$get_projet['commentaireProjet'].'</p>';}
	if(!empty($get_projet['tailleEntreprise'])){echo '<p><strong>Taille : </strong>';
		if ($get_projet['tailleEntreprise'] == "1")
		{
			echo  "1 &agrave; 10 personnes -TPE";
		}
		else if ($get_projet['tailleEntreprise'] == "2")
		{
			echo  "10 &agrave; 250 personnes - Petite et Moyenne entreprises";
		}
		else if ($get_projet['tailleEntreprise'] == "3")
		{
			echo  "251 et 5000 : Entreprise &agrave; taille intermédiaire";
		}
		else if ($get_projet['tailleEntreprise'] == "4")
		{
			echo  "+ de 5000 salariés : Grandes entreprises";
		}
		else
		{
			echo  "Aucun";
		}
                echo "</p>";}
	if(!empty($get_projet['caEntreprise'])){ echo '<p><strong>Chiffre d\'affaire : </strong>';
		if ($get_projet['caEntreprise'] == "1")
		{
			echo  "0 à 500 000€";
		}
		else if ($get_projet['caEntreprise'] == "2")
		{
			echo  "entre 500 000 € et 1 millions d’Euros";
		}
		else if ($get_projet['caEntreprise'] == "3")
		{
			echo  "plus d’1 millions d’euros";
		}
                echo "</p>"; }
	if(!empty($get_projet['ptsContactEntreprise'])){ echo '<p><strong>Points : </strong></p>';
		$pts = json_decode($get_projet['ptsContactEntreprise']);
		echo '<ul>';
		for ($i = 0; $i < count($pts); $i++)
		{
			if ($pts[$i] == "1")
			{
				echo "<li>Téléphonie</li>"; 
			}
			else if ($pts[$i] == "2")
			{
				echo  "<li>Point de vente</li>";
			}
			else if ($pts[$i] == "3")
			{
				echo  "<li>Lieu accueillant du public</li>";
			}
			else if ($pts[$i] == "4")
			{
				echo  "<li>Vidéo</li>";
			}
			else if ($pts[$i] == "5")
			{
				echo  "<li>Siteweb</li>";
			}
			else if ($pts[$i] == "6")
			{
				echo  "<li>Application</li>";
			}
			else if ($pts[$i] == "7")
			{
				echo  "<li>Spot Radio</li>";
			}
			else if ($pts[$i] == "8")
			{
				echo  "<li>Spot TV</li>";
			}
			else if ($pts[$i] == "9")
			{
				echo  "<li>Social media : Facebook, Twitter, instagram, youtube..Etc…</li>";
			}
			else if ($pts[$i] == "10</li>")
			{
				echo  "<li>webradio</li>";
			}
			else if ($pts[$i] == "NULL")					{
				echo  "Aucun";
			}
		}
                        echo '</ul>';}
	if(!empty($get_projet['optionProjet'])){ echo '<p><strong>Options : </strong>';
		
		if ($get_projet['optionProjet'] == "1")
		{
			echo  "0 à 500 000€";
		}
		else if ($get_projet['optionProjet'] == "2")
		{
			echo  "entre 500 000 € et 1 millions d’Euros";
		}
		else if ($get_projet['optionProjet'] == "3")
		{
			echo  "plus d’1 millions d’euros";
		}
                }
        if(!empty($get_projet['nbARProjet'])){echo '<p><strong>Aller-Retour : </strong>'.$get_projet['nbARProjet'].'</p>';}
        if(!empty($get_projet['nbDesignerSouhaite'])){echo '<p><strong>Nombre de designer : </strong>'.$get_projet['nbDesignerSouhaite'].'</p>';}
        if(!empty($get_projet['titrePack'])){echo '<p><strong>Pack : </strong>'.$get_projet['titrePack'].'</p>';}
	if(!empty($get_projet['isActiveProjet'])){echo '<p><strong>Etat : </strong>';
		if ($get_projet['isActiveProjet'] == "0")
		{
			echo  "En attente de validation";
		}
		else if ($get_projet['isActiveProjet'] == "1")
		{
			echo  "En cours";
		}
		else if ($get_projet['isActiveProjet'] == "2")
		{
			echo "Terminé";
		}
        echo "</p>";}
         ?> 
		</div>
            
                <?php echo '<h4>Informations du contact</h4>'; ?>
<div class="panel panel-primary">
                <div class='texteProjet' style="padding:15px;background-color:#f5f5f6">
		<?php
        if(!empty($get_projet['nomUtilisateur'])){echo '<p><strong>Nom du contact : </strong>'.$get_projet['nomUtilisateur'].'</p>';}
        if(!empty($get_projet['prenomUtilisateur'])){echo '<p><strong>Prénom du contact : </strong>'.$get_projet['prenomUtilisateur'].'</p>';}
        if(!empty($get_projet['emailUtilisateur'])){echo '<p><strong>Email du contact : </strong><a href="mailto:'.$get_projet['emailUtilisateur'].'">'.$get_projet['emailUtilisateur'].'</a></p>';}
        if(!empty($get_projet['telUtilisateur'])){echo '<p><strong>N° de telephone contact : </strong>'.$get_projet['telUtilisateur'].'</p>';}
        ?> </div>
                </div> <?php
        echo "</p>";
	echo '<h4>Sons</h4>';
        $info_fichier_lies = Projet::get_fichiers_lies($idProjet);
        $nbARProjetMax = Projet::get_nb_AR_Projet($idProjet);
        $nbARProjet = Projet::count_nb_AR_Projet($idProjet);
?>
<div class="well">
    <?php    if ($nbARProjet>0): ?>
                <table class="table">
                    <thead>
                    <th>Proposé par</th>
                    <th>Date</th>
                    <th>Son</th>
                    <th>Nombre de tracks pour le projet <?php echo $nbARProjetMax ?> max</th>
                    <th>Action</th>
                    </thead>
                    
                    <?php
                   $i=0;
                         while ($tab_info_fichier_lies = $info_fichier_lies->fetch()) {
                        $idDesignerProjet = $tab_info_fichier_lies['idUtilisateur'];   
                        $i=$i+1;
                    ?>
                    <tr>
                        <td><?php echo $tab_info_fichier_lies['nomUtilisateur'] ?></td>

                        <td><?php echo $tab_info_fichier_lies['dateUploadFichier'] ?></td>
                        <td>
                            <iframe width="100%" height="100" scrolling="no" frameborder="no"src="http://w.soundcloud.com/player/?url=<?php echo $tab_info_fichier_lies['libFichier'] ?>&auto_play=false&color=915f33&theme_color=00FF00"></iframe>
                        <td><?php echo $i ?>/<?php echo $nbARProjetMax ?> </td>
                        <td>          
                            <a href="index.php?module=projet&action=manage&type=deleteTrack&idProjet=<?php echo $idProjet; ?>&idFichier=<?php echo $tab_info_fichier_lies['idFichier']; ?>"<button class="btn btn-danger btn-large"><i class="icon-white icon-trash"> </i> supprimer </button></a>
                        </td>
                    </tr>
                    <?php } ?>
                 </table>
    <?php   else: ?>
            Pas de proposition de son pour l'instant...
    <?php endif; ?> </div>

                    
                      
