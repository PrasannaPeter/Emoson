
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Modifier<span> mon Portfolio</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">
<?php
  require_once('admin/controllers/utilisateur/utilisateur.php');
  $info_designer = Utilisateur::get_utilisateur($idUtilisateur=$_SESSION['idUtilisateur'], $type=NULL);
  $compte_soundcloud = Utilisateur::get_compte_soundcloud($idUtilisateur=$_SESSION['idUtilisateur']);
  echo $compte_soundcloud;
?>
<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="index.php?module=utilisateur&action=manage&type=modifier_portfolio<?php if(!empty($info_designer['idUtilisateur'])){ echo '&idUtilisateur='.$info_designer['idUtilisateur']; }else{} ?>">
    
    <div id="legend">
        <legend class=""><h2>Ajouter votre photo</h2></legend><br />
    </div>
    <p>Telechargez une photo pour l'ajouter à votre portfolio.</p>
    <p>Extension possible: "jpeg", "jpg", "gif"</p>
    <p>Taille max: 1000000</p>
    <br />
    <div class="control-group">
        <label class="control-label" for="maphoto">Ma photo</label>
        <div class="controls">
            <input type="file" id="urlLinkAdd" name="maphoto" placeholder="" class="input-xlarge">
        </div>
    </div>
    
<!--    <fieldset>
    <div id="legend">
      <legend class=""><h2>Ajouter un lien</h2></legend><br />
    </div>
    <p>Saisissez un lien et un type de lien pour l'ajouter à votre portfolio.</p>
    <p>Exemple pour une vidéo youtube : "https://www.youtube.com/watch?v=Jrm5"</p>
    <br />
    <div class="control-group">
      <label class="control-label" for="urlLinkAdd">URL</label>
      <div class="controls">
        <input type="text" id="urlLinkAdd" name="urlLinkAdd" placeholder="" class="input-xlarge">
      </div>
    </div>
    <div class="control-group">
       Creer une liste déroulante 
      <label class="control-label" for="typeLinkAdd">Type</label>
      <div class="controls">
        <input type="text" id="typeLinkAdd" name="typeLinkAdd" placeholder="" class="input-xlarge">
      </div>
    </div>
  </fieldset>-->
  <br />
<?php if ($compte_soundcloud <> ''): ?>
     <fieldset>
    <div id="legend">
      <legend class=""><h2>Voir votre compte externe</h2></legend><br />
    </div>
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <a href="index.php?module=soundcloud&action=voirCompteSoundcloud" title="Voir votre compte externe"><img src="style/images/picto_soundcloud.png"></a>
        </div>
      </div>
      <br/>
  </fieldset> 
<?php else: ?>
      <fieldset>
    <div id="legend">
      <legend class=""><h2>Ajouter un compte externe</h2></legend><br />
    </div>
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <a href="index.php?module=soundcloud&action=soundcloud" title="Connecter avec un compte Soundcloud"><img src="style/images/btn-connect-sc-l.png"></a>
        </div>
      </div>
      <br/>
  </fieldset>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Confirmer</button>
      </div>
    </div>
</form>
        
<?php endif; ?>
    </div>
    <!-- /Content Inner -->

  </div>
</div>

<!-- /Content -->

