
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Page<span>du projet</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

    <center>
    <a class="btn btn-large btn-success" href="index.php?module=projet&action=voir_projet&idProjet=1&<?php echo $get_projet['idProjet']; ?>" role="button"><i class="fa fa-user"></i> <span>Voir brief</span></a>

    <hr>

    </center>

     <?php

        if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}

        $get_projet = Projet::get_projet($idProjet);

    ?>


    <h2><?php echo $get_projet['titreProjet']; ?></h2>
    <br />


<?php




?>


</div>
</div>
</div>
