
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
  $info_designer = Utilisateur::get_utilisateur($idUtilisateur=$_SESSION['idUtilisateur'], $type=NULL);
?>

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" method="POST" action="index.php?module=utilisateur&action=manage&type=modifier_profil<?php if(!empty($info_designer['idUtilisateur'])){ echo '&idUtilisateur='.$info_designer['idUtilisateur']; }else{} ?>">
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Informations Personnelles</h2></legend><br />
    </div>

    <div class="control-group">
      <!-- Nom -->
      <label class="control-label"  for="nomUtilisateur">Nom</label>
      <div class="controls">
        <input type="text" id="nomUtilisateur" name="nomUtilisateur" required="required" placeholder="" class="input-xlarge" value="<?php if(!empty($info_designer['nomUtilisateur'])){ echo $info_designer['nomUtilisateur']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- Prénom -->
      <label class="control-label"  for="prenomUtilisateur">Prénom</label>
      <div class="controls">
        <input type="text" id="prenomUtilisateur" name="prenomUtilisateur" required="required" placeholder="" class="input-xlarge" value="<?php if(!empty($info_designer['prenomUtilisateur'])){ echo $info_designer['prenomUtilisateur']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="emailUtilisateur">E-mail</label>
      <div class="controls">
        <input type="email" id="emailUtilisateur" name="emailUtilisateur" data-validate="email" required="required" class="input-xlarge" value="<?php if(!empty($info_designer['emailUtilisateur'])){ echo $info_designer['emailUtilisateur']; } ?>">
        <p class="help-block">Veuillez renseigner une adresse mail valide</p>
      </div>
    </div>

    <div class="control-group">
      <!-- N° Telephone -->
      <label class="control-label" for="telUtilisateur">N° Telephone</label>
      <div class="controls">
        <input type="text" required="required" id="telUtilisateur" name="telUtilisateur" placeholder="" class="input-xlarge" value="<?php if(!empty($info_designer['telUtilisateur'])){ echo $info_designer['telUtilisateur']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- Biographie -->
      <label class="control-label" for="bioUtilisateur">Biographie</label>
      <div class="controls">
        <textarea style="height:250px;" class="form-control autogrow" id="bioUtilisateur" name="bioUtilisateur"><?php if(!empty($info_designer['bioUtilisateur'])){ echo $info_designer['bioUtilisateur']; } ?></textarea>
      </div>
    </div>

    <input type="hidden" name="roleUtilisateur" value="GRAPHISTE" />
  </fieldset>
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Ajouter un compte externe</h2></legend><br />
    </div>
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <button class="btn" style="background-color:#133783;"><i class="fa fa-facebook"> | Facebook</i></button>
          <button class="btn" style="background-color:#4393bb;"><i class="fa fa-linkedin"> | LinkedIn</i></button>
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

