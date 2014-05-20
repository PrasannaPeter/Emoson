<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Modifier<span> mon mot de passe</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">


    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form action="index.php?module=utilisateur&action=change_password" method="post" />
  <fieldset>

    <div class="control-group">
      <!-- Nom -->
      <label class="control-label"  for="nomUtilisateur">Ancien mot de passe :</label>
      <div class="controls">
        <input type="text" name="old_password" required="required" placeholder="" class="input-xlarge" value="">
      </div>
    </div>

    <div class="control-group">
      <!-- Nom -->
      <label class="control-label"  for="nomUtilisateur">Nouveau mot de passe :</label>
      <div class="controls">
        <input type="text" name="new_password" required="required" placeholder="" class="input-xlarge" value="">
      </div>
    </div>

    <div class="control-group">
      <!-- Nom -->
      <label class="control-label"  for="nomUtilisateur">Confirmer mot de passe :</label>
      <div class="controls">
        <input type="text" name="new_password2" required="required" placeholder="" class="input-xlarge" value="">
      </div>
    </div>

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

