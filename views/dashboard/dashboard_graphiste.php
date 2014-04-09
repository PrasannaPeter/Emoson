
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Mon<span>Espace designer sonore</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

    <div class="alert alert">
        <h6>Voici vos espace personalisé</h6>
        <p>Vous pourrez à partir de cet espace, modifier votre profil ou ajouter des informations à votre portfolio.</p>
        <p>C'est aussi ici que vous recevrez les notifications de vos projets en cours.</p>
    </div>

    <center>
    <a class="btn btn-large btn-success" href="index.php?module=designer&action=modifier_profil" role="button">Modifier profil</a>
    <a class="btn btn-large btn-info" href="index.php?module=designer&action=modifier_portfolio" role="button">Modifier portfolio</a>

    <hr>

    <a class="btn btn-large btn-info" href="index.php?module=projet&action=liste" role="button">Voir les projets</a>
    <a class="btn btn-large btn-success" href="index.php?module=projet&action=historique" role="button">Historique</a>
    </center>
    <br />

    <h2>Projet en cours</h2>
    <br />

    <div class="alert alert-info">
        <p>Aucun projet en cours.</p>
    </div>

    <hr>

    <div class="alert alert-danger">
        <h6>Etat de la candidature</h6>
        <p>Vous devez compléter votre profil et portfolio avant de cliquer sur le bouton "Soumettre ma candidature".</p>
        <p>Plus votre candidature sera complète, plus vous aurez de chance d'être accepté.</p>
        <br />
        <center><a class="btn btn-large btn-error" href="index.php?module=designer&action=soumettre_candidature" role="button">Soumettre ma candidature</a></center>
    </div>

</div>
</div>
</div>
<?php
//require_once('views/designer/modifier_profil.php');
//require_once('views/entreprise/remplir_brief.php');