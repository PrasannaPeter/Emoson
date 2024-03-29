<?php
$idUtilisateur = $_SESSION['idUtilisateur'];
//print_r(error_reporting(E_ALL));
if (!empty($_GET['idProjet'])) {
    $idProjet = $_GET['idProjet'];
}

require_once('admin/controllers/utilisateur/utilisateur.php');
require_once('admin/controllers/projet/projet.php');
$get_projet = Projet::get_projet($idProjet);

?>

<!-- Content -->
<div id="content">
    <div id="title">
        <h1 class="inner title-2">Page<span> du projet <?php echo $get_projet['titreProjet']; ?></span>

            <ul class="breadcrumb-inner">
                <li> <a href="index.php">Accueil</a></li>
                <li> <a href="index.php?module=dashboard&action=afficher">Mon espace</a></li>
                <li> <a href="index.php?module=projet&action=voir_page_projet&idProjet=<?php echo $get_projet['idProjet']; ?>">Projet : <?php echo $get_projet['titreProjet']; ?></a></li>
            </ul>
        </h1>
    </div>
    <div class="inner">
        <!-- Content Inner -->
        <div class="content-inner candidate-list">

            <center>
                <a class="btn btn-large btn-info" href="index.php?module=projet&action=voir_page_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file-text"></i> <span>Page du projet</span></a>
                <?php
                if ($_SESSION['roleUtilisateur'] == "ENTREPRISE") {
                    ?>
                    <a class="btn btn-large btn-warning" href="index.php?module=projet&action=voir_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Voir brief</span></a>
                    <a class="btn btn-large btn-primary" href="index.php?module=projet&action=voir_contrat&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Contrat</span></a>
                    <?php }
                ?>
                <hr>

            </center>

            <?php
//Si user est une entreprise alors on lui affiche les designer
            if ($_SESSION['roleUtilisateur'] == "ENTREPRISE") {
                // si emoson a choisi les designers :
                require_once('admin/controllers/utilisateur/utilisateur.php');
                $info_designer = Utilisateur::get_utilisateur_in_projet($idProjet);

                //Prevoir une condition s'il n'ya pas de designer car elle ne fonctionne pas
                if (count($info_designer)) {
                    ?>
                    <h2>Voici les meilleurs designers pour votre projet</h2>
                    <form>
                        <div id="about-us-our-team" class="block">
                            <div class="block-content">
        <?php
        while ($tab_designer = $info_designer->fetch()) {
            $designer_img = Utilisateur::get_designer_img($tab_designer['idUtilisateur']);

            ?>
                                    <div class="team-worker" style="margin-left:200px;">
                                        <?php if(!empty($designer_img)){ ?>
                                        <div class="photo"><img src="style/designer_img/<?php echo $designer_img;?>" height="154" width="154" alt="<?php echo $tab_designer['nomUtilisateur'] ?>"></div>
                                        <?php }else{ ?>
                                        <div class="photo"><img src="style/images/pas-de-photo.jpg" height="154" width="154" alt="<?php echo $tab_designer['nomUtilisateur'] ?>"></div>
                                        <?php } ?>
                                        <div class="name"><?php echo $tab_designer['nomUtilisateur'] . ' ' . $tab_designer['prenomUtilisateur']; ?></div>
                                        <center><a target="blank" href="index.php?module=designer&action=profil&idProjet=<?php echo $_GET['idProjet']; ?>&idUtilisateur=<?php echo $tab_designer['idUtilisateur']; ?>">Voir profil</a></center>
                                    </div>
            <?php
        }
        ?>
                            </div>
                        </div>
                </div>
                <br>
                </form>
                <div class="clear"></div>
        <?php
    } else {
        // sinon afficher message comme quoi Emoson va choisir les designers et tenir au courant l'entreprise
        echo "<p>Pour le moment nous n'avons pas encore selectionné de designer.</p>
          <p>Nous vous tiendrons au courant lorsqu'un designer intéressant vous sera proposé.</p>";
    }
    echo '<hr>
  <br />';
}

//Si user est un designer, on recupere s'il a accepter le projet
if ($_SESSION['roleUtilisateur'] == "GRAPHISTE") {
    require_once(CONTROLLERS . "proposition/proposition.php");
    $get_accepter = Proposition::accepter($idUtilisateur = $_SESSION['idUtilisateur'], $idProjet);

    foreach ($get_accepter as $accepter) {
        $acceptation = $accepter['acceptation'];
        $validation = $accepter['validation'];
    }
}
?>
        <h2>Description</h2>

        <br />

        <div class="well">
<?php echo $get_projet['descriptionProjet']; ?>
        </div>

<?php
//Si l'utilisateur est une entreprise ou un designer qui a accepter le projet alors on affiche sinon il n'a accès qu'a la description
if ($_SESSION['roleUtilisateur'] == "ENTREPRISE" || ($acceptation == 1 && $validation == 1)) {
 ?>

            <hr>

            <!-- Afficher les fichiers affecter sur le projet -->
            <h2>Propositions</h2>
             <?php
                    
                        $info_fichier_lies = Projet::get_fichiers_lies($idProjet);
                        $nbARProjetMax = Projet::get_nb_AR_Projet($idProjet);
                        $nbARProjet = Projet::count_nb_AR_Projet($idProjet);
                        
                    ?>
            <br />
            <div class="well">
                <table class="table">
                    <thead>
                    <th>Proposé par</th>
                    <th>Date</th>
                    <th>Son</th>
                    <th>Nombre de tracks pour le projet <?php echo $nbARProjetMax ?> max</th>
                    </thead>
                    
                    <?php
                   $i=0;
                         while ($tab_info_fichier_lies = $info_fichier_lies->fetch()) {
                        $idDesignerProjet = $tab_info_fichier_lies['idUtilisateur'];   
                        $i=$i+1;
                    ?>
                    <tr>
                        <td><?php echo $tab_info_fichier_lies['nomUtilisateur'] ?></td>

                        <td><?php echo $tab_info_fichier_lies['dateUploadFichier'] ?></td>
                        <td>
                            <iframe width="100%" height="100" scrolling="no" frameborder="no"src="http://w.soundcloud.com/player/?url=<?php echo $tab_info_fichier_lies['libFichier'] ?>&auto_play=false&color=915f33&theme_color=00FF00"></iframe>
                        <td><?php echo $i ?>/<?php echo $nbARProjetMax ?> </td>
                    </tr>
                    <?php } ?>
                      
                </table>

    <?php if ($_SESSION['roleUtilisateur'] == "GRAPHISTE"): ?>
                                    
                 <h2>Ajouter un fichier</h2>
                  <?php if ($nbARProjet < $nbARProjetMax): ?>
                    <br />
                    <p>Copier l'url de votre track : </p>
                    <p>exemple https://soundcloud.com/prasana-peter/who-do-you-love-remix </p>        
                <form  method="POST" action="index.php?module=projet&action=manage&type=ajouter_fichiers_lies"> 
                    <div class="control-group">
                        <label class="control-label" for="lien">Lien</label>
                        <div class="controls">
                            <input type="text" id="libFichier" name="libFichier" placeholder="" class="input-xlarge">
                            <input type="hidden" id="idProjet" name="idProjet" value="<?php echo $get_projet['idProjet']; ?>" >
                            <input type="hidden" id="idUtilisateur" name="idUtilisateur" value="<?php echo $idUtilisateur ?>" >

                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                </form> 
                 <?php else: ?>
                    <p>Vous avez atteint le nombre de proposition possible pour le projet.</p>
                    <p>Contactez Brand 404 pour plus d'informations</p> 
                <?php endif; ?>
    <?php endif; ?>
            <hr>

            <h2>Discussion</h2>
            <br />
            <div class="wrap">
            <?php
            $idProjet = $_GET['idProjet'];

            $bdd = PDO();

            require_once(CONTROLLERS . 'commentaire/commentaire.php');

            // retrive comments with post id
            $comment_query = Commentaire::get_commentaire($idProjet);
            ?>
                <div class="comment-block well">
                <?php
                if (count($comment_query)) :
                    foreach ($comment_query as $comment) :
                        require_once(CONTROLLERS . 'utilisateur/utilisateur.php');
                        $comment['user'] = Utilisateur::get_utilisateur($comment['idUtilisateur']);
                        ?>
                            <div class="comment-item">
                                <div class="comment-post">
                            <?php echo date('d-m-Y_h:i:s', $comment['dateCommentaire']); ?> par <strong><?php echo $comment['user']['loginUtilisateur'] ?></strong> <span> : </span>
                            <?php echo $comment['texteCommentaire'] ?><br>
                                </div>
                            </div>
        <?php endforeach;
    else : echo "Aucun commentaire pour le moment.";
    endif; ?>
                </div>

                <h2>Ajouter un message</h2>
                <br>
                <!--comment form -->
                <form id="form" action="index.php?module=projet&action=ajouter_commentaire" method="post">
                    <!-- need to supply post id with hidden fild -->
                    <input type="hidden" name="idProjet" value="<?php echo $idProjet; ?>">
                    <input type="hidden" name="idUtilisateur" value="<?php echo $_SESSION['idUtilisateur']; ?>">
                    <label>
                        <textarea name="commentaire" id="commentaire" style="width:100%;" cols="30" rows="10" placeholder="Tappez votre commentaire ici...." required></textarea>
                    </label>
                    <button type="submit" class="btn btn-large btn-success" id="submitComment">Envoyer</button><br><br>
                </form>
            </div>
    <?php
}
?>
    </div>
</div>
</div>

