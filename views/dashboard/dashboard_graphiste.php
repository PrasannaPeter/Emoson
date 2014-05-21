
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Mon<span>Espace Designer Sonore</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.php">Accueil</a></li>
        <li> <a href="index.php?module=dashboard&action=afficher">Mon espace</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

    <div class="alert alert">
        <h6>Vous vous trouvez dans votre espace personalisé</h6>
        <p>Vous pourrez à partir de cet espace modifier votre profil ou ajouter des informations à votre portfolio.</p>
        <p>Vous recevrez ici également les notifications de vos projets en cours.</p>
    </div>

    <br>

    <center>
    <a class="btn btn-large btn-info" href="index.php?module=utilisateur&action=change_password" role="button"><i class="fa fa-cog"></i> <span>Modifier mdp.</span></a>
    <a class="btn btn-large btn-warning" href="index.php?module=designer&action=modifier_profil" role="button"><i class="fa fa-user"></i> <span>Modifier profil</span></a>
    <a class="btn btn-large btn-info" href="index.php?module=designer&action=modifier_portfolio" role="button"><i class="fa fa-music"></i> <span>Modifier portfolio</span></a>

    <hr>

    <!--a class="btn btn-large btn-info" href="index.php?module=projet&action=liste" role="button"><i class="fa fa-book"></i> <span>Voir les projets</span></a-->

    </center>

     <?php
    require_once('admin/controllers/utilisateur/utilisateur.php');
    $info_designer = Utilisateur::get_utilisateur($idUtilisateur=$_SESSION['idUtilisateur'], $type=NULL);
    if($info_designer['certifUtilisateur'] == true){

    require_once CONTROLLERS.'proposition/proposition.php';
    ?>

    <br>
    <div class="heading-l">
    <h2>Mes Projets</h2>
    </div>

    <div class="well">
        <?php
            require_once(CONTROLLERS."projet/projet.php");
            // @TODO : uniquement en cours / terminés
            $get_projet_proposition = Proposition::mes_projets($idUtilisateur=$_SESSION['idUtilisateur']);

            if(count($get_projet_proposition)){
                ?>
                <table class="table">
                    <thead>
                            <th>Titre</th>
                            <th>Entreprise</th>
                            <th>Etat</th>
                            <th>Offre</th>
                            <th>Validé par l'administrateur</th>
                            <th>Actions</th>
                    </thead>
                <?php
                foreach ($get_projet_proposition as $projet) {
                    echo "<tr>";
                    echo "<td>".$projet['titreProjet']."</td>";
                    //echo "<td>Nom entreprise</td>";
                    echo "<td>".$projet['raisonSocialeEntreprise']."</td>";
                    if($projet['isActiveProjet'] == 0)
                    {
                        echo '<td><span class=\'label label-info\'>En cours de validation</span></td>';
                    }
                    elseif($projet['isActiveProjet'] == 1)
                    {
                        echo "<td><span class='label label-info'>En cours</span></td>";
                    }
                    elseif($projet['isActiveProjet'] == 2)
                    {
                        echo "<td><span class='label label-success'>Terminé</span></td>";
                    }
                    if($projet['acceptation'] == 0)
                    {
                        echo '<td><span class=\'label label-info\'>Demandé</span></td>';
                    }
                    elseif($projet['acceptation'] == 1)
                    {
                        echo "<td><span class='label label-success'>Accepté</span></td>";
                    }
                    elseif($projet['acceptation'] == 2)
                    {
                        echo "<td><span class='label label-warning'>Decliné</span></td>";
                    }
                    if($projet['validation'] == 0)
                    {
                        echo "<td><span class='label label-warning'>Non</span></td>";
                    }
                    elseif($projet['validation'] == 1)
                    {
                        echo "<td><span class='label label-success'>Oui</span></td>";
                    }

                    echo '<td>';
                    if($projet['acceptation'] == 0)
                    {
                        echo '<a class=\'btn btn btn-success\' href="index.php?module=proposition&action=manage&type=set_proposition&type_proposition=designer&acceptation=1&validation=non&idUtilisateur='.$_SESSION['idUtilisateur'].'&idProjet='.$projet['idProjet'].'" role=\'button\'><i class=\'fa fa-check\'></i> <span>Accepter</span></a>';
                        echo '<a class=\'btn btn btn-error\' href="index.php?module=proposition&action=manage&type=set_proposition&type_proposition=designer&acceptation=2&validation=non&idUtilisateur='.$_SESSION['idUtilisateur'].'&idProjet='.$projet['idProjet'].'" role=\'button\'><i class=\'fa fa-times\'></i> <span>Décliner</span></a>';
                    }
   
                    echo "<a class='btn btn btn-info' href='index.php?module=projet&action=voir_page_projet&idProjet=".$projet['idProjet']."' role='button'><i class='fa fa-file-text'></i> <span>Détails</span></a>";

                    echo '</td>';

                   // echo "<td><span class='badge badge-success'>Mettre statut</span></td>";

                    echo "</tr>";
                }
                    ?></table><?php
            }else{
                ?>
                <p>Aucun projet</p>
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