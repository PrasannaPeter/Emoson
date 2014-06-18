
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Visualisation<span>d'un brief</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

     <?php

    if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}

    $get_projet = Projet::get_projet($idProjet);

    $nb_designer_actuel = Projet::nb_designer_actuel($idProjet);
   
    foreach ($nb_designer_actuel as $tab_nb_designer) {
        $nb_designer = $tab_nb_designer['nb_designer_actuel'];
    }
    ?>

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

    <center>
    <a class="btn btn-large btn-info" href="index.php?module=projet&action=voir_page_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file-text"></i> <span>Page du projet</span></a>
    <a class="btn btn-large btn-warning" href="index.php?module=projet&action=voir_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Voir brief</span></a>
    <a class="btn btn-large btn-primary" href="index.php?module=projet&action=voir_contrat&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Contrat</span></a>
    <hr>

    </center>

    <h2>Détail du projet</h2>
    <p><strong>Titre projet : </strong><?php echo $get_projet['titreProjet']; ?></p>
    <p><strong>Description projet : </strong><?php echo $get_projet['descriptionProjet'];?></p>
    <p><strong>Strategie de branding : </strong><?php echo 'public/brief_formulaire/branding/'.$get_projet['brandingProjet'];?></p>
    <p><strong>Positionnement : </strong><?php echo $get_projet['positionnementProjet'];?></p>
    <p><strong>Identité visuelle : </strong><?php echo 'public/brief_formulaire/identite/'.$get_projet['identiteProjet'];?></p>
    <p><strong>Références musicales : </strong><?php echo $get_projet['referencesProjet'];?></p>
    <p><strong>Ce que vous ne souhaitez pas : </strong><?php echo $get_projet['dontlikeProjet'];?></p>
    <p><strong>Commentaires : </strong><?php echo $get_projet['commentaireProjet'];?></p>
    <p><strong>Pack : </strong><?php echo $get_projet['titrePack'];?></p>
    <p><strong>Voix off : </strong><?php 
            if ($get_projet['optionProjet'] == "1"){
                echo "Entre 1 à 5 messages par mois"; 
            }
            else if ($get_projet['optionProjet'] == "2"){
                echo  "Entre 5 à 10 messages par mois";
            }
            else if ($get_projet['optionProjet'] == "3"){
                echo  "Plus de 10</li>";
            }
            else if ($get_projet['optionProjet'] == "NULL"){
                echo  "Aucun";
            }?>
    <p><strong>Nombre d'aller-retour : </strong><?php echo $get_projet['nbARProjet'];?></p>
    <p><strong>Nombre de designer souhaité : </strong><?php echo $get_projet['nbDesignerSouhaite'];?></p>
    <p><strong>Nombre de designer actuel : </strong><?php echo $nb_designer; ?></p>
    <p><strong>Etat : <?php
                if ($get_projet['isActiveProjet'] == "0")
                {
                    echo  "<span class='label label-info'>En attente de validation </span>";
                }
                else if ($get_projet['isActiveProjet'] == "1")
                {
                    echo  "<span class='label label-info'> En cours </span>";
                }
                else if ($get_projet['isActiveProjet'] == "2")
                {
                    echo "<span class='label label-info'> Terminé </span>";
                }?></strong></p>
    <hr>
    <h2>Information de l'entreprise</h2>
    <br>
    <div class="well">
        <p><strong>Nom : </strong><?php echo $get_projet['nomUtilisateur']; ?></p>
        <p><strong>Prénom : </strong><?php echo $get_projet['prenomUtilisateur']; ?></p>
        <p><strong>Email  : </strong><a href="mailto:<?php echo $get_projet['emailUtilisateur']; ?>"><?php echo $get_projet['emailUtilisateur'];?></a></p>
        <p><strong>N° de telephone : </strong><?php echo $get_projet['telUtilisateur']; ?></p>
    </div>
</div>
</div>
</div>
