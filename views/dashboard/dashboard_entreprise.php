
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Mon<span>Espace Entreprise</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.php">Accueil</a></li>
        <li> <a href="index.php?module=dashboard&action=afficher.html">Mon espace</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

    <div class="alert alert">
        <h6>Vous vous trouvez dans votre espace personalisé</h6>
        <p>Vous pourrez à partir de cet espace suivre l'avancé de vos projets ou bien en créer un nouveau</p>
        <p>Vous pourrez également consulter aussi vos informations concernant votre abonnement.</p>
        <p>C'est aussi ici que vous recevrez les notifications de vos projets en cours.</p>
    </div>

    <br />

    <center>
    <a class="btn btn-large btn-info" href="index.php?module=utilisateur&action=change_password" role="button"><i class="fa fa-cog"></i> <span>Modifier mdp.</span></a>
    <a class="btn btn-large btn-warning" href="index.php?module=entreprise&action=modifier_profil" role="button"><i class="fa fa-briefcase"></i> <span>Modifier profil</span></a>
    <a class="btn btn-large btn-info" href="index.php?module=entreprise&action=modifier_info_entreprise" role="button"><i class="fa fa-user"></i> <span>Modifier info. entreprise</span></a>

    </center>

    <hr>
    <div class="heading-l">
    <h2>Mes Projets</h2>
    </div>
    <br />

    <div class="well">
        <?php
            require_once(CONTROLLERS."projet/projet.php");
            require_once(CONTROLLERS."entreprise/entreprise.php");
            // @TODO : uniquement en cours / terminés
            //$projets = Projet::get_projet();

            require_once CONTROLLERS.'proposition/proposition.php';
            $get_projet_proposition = Proposition::mes_projets($idUtilisateur=$_SESSION['idUtilisateur']);

            if(count($get_projet_proposition)){
                ?>
                <table class="table">
                    <thead>
                        <th>Titre</th>
                        <th>Entreprise</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </thead>
                <?php



                foreach ($get_projet_proposition as $projet) {
                    echo "<tr>";
                    echo "<td>".$projet['titreProjet']."</td>";
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

                    echo "<td><a class='btn btn btn-info' href='index.php?module=projet&action=voir_page_projet&idProjet=".$projet['idProjet']."' role='button'><i class='fa fa-file-text'></i> <span>Détails</span></a></td>";

                    echo '</td>';

                   // echo "<td><span class='badge badge-success'>Mettre statut</span></td>";

                    echo "</tr>";
                }
                /*
                Yacine : Valentin j'ai retirer ta fonction
                foreach ($projets as $projet) {
                    $get_entreprise = Entreprise::get_entreprise($id=NULL, $type['byUserId'] = $projet['idUtilisateur']);
                    dump($get_entreprise->fetch());
                    echo "<tr>";
                    echo "<td>".$projet['titreProjet']."</td>";
                    echo "<td>".$projet['nomEntreprise']."</td>";
                    echo "<td>".get_statut_projet($value)."</td>";
                    echo "<td><a class='btn btn btn-info' href='index.php?module=projet&action=voir_page_projet&idProjet=".$projet['idProjet']."' role='button'><i class='fa fa-file-text'></i> <span>Détails</span></a></td>";
                    echo "</tr>";
                }*/
                


                ?></table><?php
            }else{
                ?>
                <p>Aucun projet</p>
                <?php
            } ?>
    </div>

    <center>
        <!--a class="btn btn-large btn-info" href="index.php?module=projet&action=liste" role="button"><i class="fa fa-folder"></i> <span>Voir les projets</span></a-->
        <a class="btn btn-large btn-error" href="index.php?module=entreprise&action=remplir_brief" role="button"><i class="fa fa-plus"></i> <span>Nouveau brief</span></a>

    </center>

    <hr>

    <div class="heading-l">
    <h2>Mes paiements</h2>
    </div>

    <br />

    <div class="alert alert-info">
        <p>Aucun paiement enregistré.</p>
    </div>

</div>
</div>
</div>
<?php
//require_once('views/designer/modifier_profil.php');
//require_once('views/entreprise/remplir_brief.php');