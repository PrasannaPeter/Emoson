
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

    <br />

    <center>
    <a class="btn btn-large btn-success" href="index.php?module=entreprise&action=modifier_profil" role="button"><i class="fa fa-briefcase"></i> <span>Modifier profil</span></a>
    <a class="btn btn-large btn-info" href="index.php?module=entreprise&action=modifier_info_entreprise" role="button"><i class="fa fa-user"></i> <span>Modifier info. entreprise</span></a>

    </center>

    <hr>

    <h2>Mes Projet</h2>
    <br />

    <div class="well">
        <?php
            require_once(CONTROLLERS."projet/projet.php");
            // @TODO : uniquement en cours / terminés
            $projets = Projet::get_projet();

            if(count($projets)){
                ?>
                <table class="table">
                    <thead>
                        <th>Titre</th>
                        <th>Entreprise</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </thead>
                <?php
                foreach ($projets as $projet) {
                    echo "<tr>";
                    echo "<td>".$projet['titreProjet']."</td>";
                    echo "<td>Nom entreprise</td>";
                    echo "<td><span class='badge badge-success'>Mettre statut</span></td>";
                    echo "<td><a class='btn btn btn-info' href='index.php?module=projet&action=voir_page_projet&idProjet=".$projet['idProjet']."' role='button'><i class='fa fa-file-text'></i> <span>Détails</span></a></td>";
                    echo "</tr>";
                }
                ?></table><?php
            }else{
                ?>
                <p>Aucun projet.</p>
                <?php
            } ?>
    </div>

    <center>
        <a class="btn btn-large btn-info" href="index.php?module=projet&action=liste" role="button"><i class="fa fa-folder"></i> <span>Voir les projets</span></a>
        <a class="btn btn-large btn-error" href="index.php?module=entreprise&action=remplir_brief" role="button"><i class="fa fa-plus"></i> <span>Nouveau brief</span></a>

    </center>

    <hr>

    <h2>Mes paiements</h2>
    <br />

    <div class="alert alert-info">
        <p>Aucun paiement enregistrés.</p>
    </div>

</div>
</div>
</div>
<?php
//require_once('views/designer/modifier_profil.php');
//require_once('views/entreprise/remplir_brief.php');