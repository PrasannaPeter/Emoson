
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

<form class="form-horizontal" method="POST" action="index.php?module=utilisateur&action=manage&type=modifier_profil<?php if(!empty($_GET['idUtilisateur'])){ echo '&idUtilisateur='.$_GET['idUtilisateur']; }else{} ?>">
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Modifier mon profil</h2></legend><br />
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
      <!-- Biographie -->
      <label class="control-label" for="bioUtilisateur">Biographie</label>
      <div class="controls">
        <textarea class="form-control autogrow" id="bioUtilisateur" name="bioUtilisateur"></textarea>
      </div>
    </div>
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

