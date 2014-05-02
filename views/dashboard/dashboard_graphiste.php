
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
    <a class="btn btn-large btn-success" href="index.php?module=designer&action=modifier_profil" role="button"><i class="fa fa-user"></i> <span>Modifier profil</span></a>
    <a class="btn btn-large btn-info" href="index.php?module=designer&action=modifier_portfolio" role="button"><i class="fa fa-music"></i> <span>Modifier portfolio</span></a>

    <hr>

    <a class="btn btn-large btn-info" href="index.php?module=projet&action=liste" role="button"><i class="fa fa-book"></i> <span>Voir les projets</span></a>
    <a class="btn btn-large btn-error" href="index.php?module=designer&action=voir_proposition&idUtilisateur=<?php echo $_SESSION['idUtilisateur'] ?>" role="button">Voir les propositions de projet</a>
    </center>

     <?php
    require_once('admin/controllers/utilisateur/utilisateur.php');
    $info_designer = Utilisateur::get_utilisateur($idUtilisateur=$_SESSION['idUtilisateur'], $type=NULL);
    if($info_designer['certifUtilisateur'] == true){ ?>

    <h2>Mes Projet</h2>
    <br />

    <div class="alert alert-info">
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
                    echo "<td><a class='btn btn btn-success' href='index.php?module=projet&action=liste' role='button'><i class='fa fa-check'></i> <span>Accepter</span></a> ";
                    echo "<td><a class='btn btn btn-info' href='index.php?module=projet&action=liste' role='button'><i class='fa fa-file-text'></i> <span>Détails</span></a></td>";
                    echo "</tr>";
                }
                    ?></table><?php
            }else{
                ?>
                <p>Aucun projet.</p>
                <?php
            } ?>
    </div>

    <?php } ?>

    <?php    if($info_designer['certifUtilisateur'] == false){ ?>

    <hr>

    <!-- Modal -->
    <div id="soumettreCandidatureModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="soumettreCandidatureModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="soumettreCandidatureModalLabel">Envoyer votre candidature</h3>
      </div>
      <div class="modal-body">
        <p>Vous êtes sur le point d'envoyer votre candidature pour vérification.</p>
        <p>Merci de vérifier que vos informations sont correctes et que votre portfolio est complété.</p>
        <br />fol
          <form method="post" action='connexion.php' name="login_form">
            <center>
                <a class="btn btn-large btn-success" href="index.php?module=designer&action=soumettre_candidature" role="button">Valider</a>
                <a class="btn btn-large btn-defaut" href="#soumettreCandidatureModal" data-toggle="modal" role="button">Annuler</a>
            </center>
          </form>
      </div>
    </div>

    <?php
    // si la candidature n'a pas été envoyée
    // if(!Utilisateur::isCandidatureEnvoye($idUtilisateur)){ ?>
    <div class="alert alert-danger">
        <h6>Etat de la candidature</h6>
        <p>Vous devez compléter votre profil et portfolio avant de cliquer sur le bouton "Soumettre ma candidature".</p>
        <p>Plus votre candidature sera complète, plus vous aurez de chance d'être accepté.</p>
        <br />
        <center>
          <a class="btn btn-large btn-error" href="#soumettreCandidatureModal" role="button" data-toggle="modal">Soumettre ma candidature</a>
        </center>
    </div>
    <?php // }else{ ?>
    <div class="alert alert-info">
        <h6>Etat de la candidature</h6>
        <p>Nous examinons votre candidature.</p>
        <p>Vous serez prévenu par mail une fois notre décision prise concernant l'acceptation ou le rejet de votre candidature.</p>
        <br />
    </div>
    <?php // } ?>
    <?php    } ?>

</div>
</div>
</div>

<?php
//require_once('views/designer/modifier_profil.php');
//require_once('views/entreprise/remplir_brief.php');