
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
    <a class="btn btn-large btn-info" href="index.php?module=projet&action=voir_page_projet&idProjet=<?php echo $get_projet['idProjet']; ?>" role="button"><i class="fa fa-user"></i> <span>Page du projet</span></a>

    <hr>

    </center>

    <h2><?php echo $get_projet['titreProjet']; ?></h2>
    <br />


<?php

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


</div>
</div>
</div>
