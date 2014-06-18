
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Visualisation<span>du contrat</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.php">Accueil</a></li>
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
    <a class="btn btn-large btn-warning" href="index.php?module=projet&action=voir_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Voir contrat</span></a>
    <a class="btn btn-large btn-primary" href="index.php?module=projet&action=voir_contrat&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Contrat</span></a>
    <hr>

    </center>


<?php

    echo '<h2>Pack choisis</h2><br>';
    echo '<h2>Options supplémentaires</h2><br>';
    echo '<h2>Prix</h2><br>';
    echo '<h2>Etat paiement</h2><br>';

?>


</div>
</div>
</div>
