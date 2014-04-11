
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Modifier<span> mon profil</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" method="POST" action="index.php?module=utilisateur&action=manage&type=modifier<?php if(!empty($_GET['idUtilisateur'])){ echo '&idUtilisateur='.$_GET['idUtilisateur']; }else{} ?>">
 <fieldset>
    <div id="legend">
      <legend class=""><h2>Informations de contact</h2></legend><br />
    </div>
    <div class="control-group">
      <!-- Identifiant -->
      <label class="control-label"  for="loginUtilisateur">Identifiant</label>
      <div class="controls">
        <input type="text" id="loginUtilisateur" name="loginUtilisateur" placeholder="" class="input-xlarge">
        <p class="help-block">L'identifiant sera utilisé pour la connexion</p>
      </div>
    </div>
    <div class="control-group">
      <!-- Mot de passe-->
      <label class="control-label" for="passUtilisateur">Mot de passe</label>
      <div class="controls">
        <input type="password" id="passUtilisateur" name="passUtilisateur" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Nom -->
      <label class="control-label"  for="nomUtilisateur">Nom</label>
      <div class="controls">
        <input type="text" id="nomUtilisateur" name="nomUtilisateur" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Prénom -->
      <label class="control-label"  for="prenomUtilisateur">Prénom</label>
      <div class="controls">
        <input type="text" id="prenomUtilisateur" name="prenomUtilisateur" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="emailUtilisateur">E-mail</label>
      <div class="controls">
        <input type="text" id="emailUtilisateur" name="emailUtilisateur" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- N° Telephone -->
      <label class="control-label" for="telUtilisateur">N° Telephone</label>
      <div class="controls">
        <input type="text" id="telUtilisateur" name="telUtilisateur" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Confirmer</button>
      </div>
    </div>
  </fieldset>
</form>

    </div>
    <!-- /Content Inner -->

  </div>
</div>

<!-- /Content -->

