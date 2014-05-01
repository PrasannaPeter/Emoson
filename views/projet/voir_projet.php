<?php
	
	if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}

	$get_projet = Projet::get_projet($idProjet);

	echo '<h4>Détail du projet</h4>';
	echo '<p><strong>Titre projet : </strong>'.$get_projet['titreProjet'].'</p>';
	echo '<p><strong>Description projet : </strong>'.$get_projet['descriptionProjet'].'</p>';

	echo '<p><strong>Etat : </strong>';
		if($get_projet['isActiveProjet'] == 0) 
        {
            echo '<p>En cours de validation</p>';
        }
        elseif($get_projet['isActiveProjet'] == 1)
        {
            echo "<p>En cours</p>";
        }
        elseif($get_projet['isActiveProjet'] == 2)
        {
            echo "<p>Terminé</p>";
        }
	echo "</p>";
	echo '<h4>Info du contact</h4>';
	echo '<p><strong>Nom contact : </strong>'.$get_projet['nomUtilisateur'].'</p>';
	echo '<p><strong>Prénom contact : </strong>'.$get_projet['prenomUtilisateur'].'</p>';
	echo '<p><strong>Email contact : </strong><a href="mailto:'.$get_projet['emailUtilisateur'].'">'.$get_projet['emailUtilisateur'].'</a></p>';
	echo '<p><strong>N° de telephone contact : </strong>'.$get_projet['telUtilisateur'].'</p>';


?>