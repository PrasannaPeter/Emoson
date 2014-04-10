
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Mon<span>Espace Entreprise</span>
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
        <p>Vous pourrez à partir de cet espace, suivre l'avancé de vos projets ou bien en créer un nouveau, mais aussi vos informations concernant votre abonnement.</p>
        <p>C'est aussi ici que vous recevrez les notifications de vos projets en cours.</p>
    </div>

    <center>
    <a class="btn btn-large btn-success" href="index.php?module=entreprise&action=modifier_info_entreprise" role="button">Modifier info. entreprise</a>
    <a class="btn btn-large btn-info" href="index.php?module=entreprise&action=modifier_profil" role="button">Modifier compte perso.</a>

    <hr>

    <a class="btn btn-large btn-info" href="index.php?module=projet&action=liste" role="button">Voir les projets</a>
    <a class="btn btn-large btn-error" href="index.php?module=entreprise&action=remplir_brief" role="button">Nouveau brief</a>
    </center>
    <br />

    <h2>Projets</h2>
    <br />

    <div class="alert alert-info">
        <p>Aucun projet.</p>
    </div>

    <hr>

    <h2>Mes paiements</h2>
    <br />

    <div class="alert alert-info">
        <p>Aucun paiement enregistrés.</p>
    </div>

    <hr>

</div>
</div>
</div>
<?php
//require_once('views/designer/modifier_profil.php');
//require_once('views/entreprise/remplir_brief.php');