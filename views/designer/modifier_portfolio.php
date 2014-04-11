
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Modifier<span> mon portfolio</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" method="POST" action="index.php?module=utilisateur&action=manage&type=modifier_portfolio<?php if(!empty($_GET['idUtilisateur'])){ echo '&idUtilisateur='.$_GET['idUtilisateur']; }else{} ?>">
  <fieldset>
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
      <!-- Creer une liste déroulante -->
      <label class="control-label" for="typeLinkAdd">Type</label>
      <div class="controls">
        <input type="text" id="typeLinkAdd" name="typeLinkAdd" placeholder="" class="input-xlarge">
      </div>
    </div>
  </fieldset>
  <br />
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Ajouter un compte externe</h2></legend><br />
    </div>
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <button class="btn" style="background-color:orange;"><i class="icon-music"></i> | Soundclound</button>
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

    </div>
    <!-- /Content Inner -->

  </div>
</div>

<!-- /Content -->

