
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

    ?>

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

    <center>
    <a class="btn btn-large btn-info" href="index.php?module=projet&action=voir_page_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file-text"></i> <span>Page du projet</span></a>
    <a class="btn btn-large btn-warning" href="index.php?module=projet&action=voir_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Voir brief</span></a>
    <a class="btn btn-large btn-primary" href="index.php?module=projet&action=voir_contrat&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Contrat</span></a>
    <hr>

    </center>


<?php

    echo '<h2>Détail du projet</h2>';
    echo '<p><strong>Titre projet : </strong>'.$get_projet['titreProjet'].'</p>';
    echo '<p><strong>Description projet : </strong>'.$get_projet['descriptionProjet'].'</p>';

    echo '<p><strong>Etat : </strong>';
    echo get_statut_projet($value);
    echo "</p>";
    echo "<br>";
    echo '<h2>Info du contact</h2>';
    echo '<p><strong>Nom contact : </strong>'.$get_projet['nomUtilisateur'].'</p>';
    echo '<p><strong>Prénom contact : </strong>'.$get_projet['prenomUtilisateur'].'</p>';
    echo '<p><strong>Email contact : </strong><a href="mailto:'.$get_projet['emailUtilisateur'].'">'.$get_projet['emailUtilisateur'].'</a></p>';
    echo '<p><strong>N° de telephone contact : </strong>'.$get_projet['telUtilisateur'].'</p>';


?>


</div>
</div>
</div>
