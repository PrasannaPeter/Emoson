
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
<?php
  require_once('admin/controllers/utilisateur/utilisateur.php');
  $info_user = Utilisateur::get_utilisateur($idUtilisateur=$_SESSION['idUtilisateur'], $type=NULL);
?>
    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" method="POST" action="index.php?module=utilisateur&action=manage&type=modifier<?php if(!empty($info_user['idUtilisateur'])){ echo '&idUtilisateur='.$info_user['idUtilisateur']; }else{} ?>">
 <fieldset>
    <div id="legend">
      <legend class=""><h2>Informations de contact</h2></legend><br />
    </div>
    <div class="control-group">
      <!-- Identifiant -->
      <label class="control-label"  for="loginUtilisateur">Identifiant</label>
      <div class="controls">
        <input type="text" id="loginUtilisateur" name="loginUtilisateur" placeholder="" class="input-xlarge" value="<?php if(!empty($info_user['loginUtilisateur'])){ echo $info_user['loginUtilisateur']; } ?>">
        <p class="help-block">L'identifiant sera utilisé pour la connexion</p>
      </div>
    </div>
    <div class="control-group">
      <!-- Mot de passe-->
      <label class="control-label" for="passUtilisateur">Mot de passe</label>
      <div class="controls">
        <input type="password" id="passUtilisateur" name="passUtilisateur" placeholder="" class="input-xlarge" disabled="disabled">
      </div>
    </div>

    <div class="control-group">
      <!-- Nom -->
      <label class="control-label"  for="nomUtilisateur">Nom</label>
      <div class="controls">
        <input type="text" id="nomUtilisateur" name="nomUtilisateur" placeholder="" class="input-xlarge" value="<?php if(!empty($info_user['nomUtilisateur'])){ echo $info_user['nomUtilisateur']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- Prénom -->
      <label class="control-label"  for="prenomUtilisateur">Prénom</label>
      <div class="controls">
        <input type="text" id="prenomUtilisateur" name="prenomUtilisateur" placeholder="" class="input-xlarge" value="<?php if(!empty($info_user['prenomUtilisateur'])){ echo $info_user['prenomUtilisateur']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="emailUtilisateur">E-mail</label>
      <div class="controls">
        <input type="text" id="emailUtilisateur" name="emailUtilisateur" placeholder="" class="input-xlarge" value="<?php if(!empty($info_user['emailUtilisateur'])){ echo $info_user['emailUtilisateur']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- N° Telephone -->
      <label class="control-label" for="telUtilisateur">N° Telephone</label>
      <div class="controls">
        <input type="text" id="telUtilisateur" name="telUtilisateur" placeholder="" class="input-xlarge" value="<?php if(!empty($info_user['telUtilisateur'])){ echo $info_user['telUtilisateur']; } ?>">
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

