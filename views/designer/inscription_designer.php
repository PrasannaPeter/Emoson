
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Inscription<span>Designer Sonore</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
        <li> <a href="candidates.html">Designers sonores</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
 <form class="form-horizontal validate" method="POST" action="index.php?module=utilisateur&action=manage&type=ajouter">
    <div class="content-inner candidate-list">
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Connecter un compte</h2></legend><br />
    </div>
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <a href="libs/social/soundcloud.php" title="Soundcloud"><img src="style/images/soundcloud.png"></a>
        </div>
      </div>
  </fieldset>
</div>

<form class="form-horizontal validate" method="POST" action="index.php?module=utilisateur&action=manage&type=ajouter">
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Informations de connexion</h2></legend><br />
    </div>
    <div class="control-group">
      <!-- Identifiant -->
      <label class="control-label"  for="loginUtilisateur">Identifiant</label>
      <div class="controls">
        <input type="text" id="loginUtilisateur" name="loginUtilisateur" required="required" placeholder="" class="input-xlarge">
        <p class="help-block">Votre identifiant sera utilisé pour la connexion</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Mot de passe-->
      <label class="control-label" for="passUtilisateur">Mot de passe</label>
      <div class="controls">
        <input type="password" id="passUtilisateur" name="passUtilisateur" required="required" placeholder="" class="input-xlarge">
        <p class="help-block">Vous devez garder ce mot de passe confidentiel.<br>Il vous servira à vous connecter à l'application.</p>
      </div>
    </div>

  </fieldset>
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Informations Personnelles</h2></legend><br />
    </div>

    <div class="control-group">
      <!-- Nom -->
      <label class="control-label"  for="nomUtilisateur">Nom</label>
      <div class="controls">
        <input type="text" id="nomUtilisateur" name="nomUtilisateur" required="required" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Prénom -->
      <label class="control-label"  for="prenomUtilisateur">Prénom</label>
      <div class="controls">
        <input type="text" id="prenomUtilisateur" name="prenomUtilisateur" required="required" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="emailUtilisateur">E-mail</label>
      <div class="controls">
        <input type="email" id="emailUtilisateur" name="emailUtilisateur" data-validate="email" required="required" class="input-xlarge">
        <p class="help-block">Veuillez renseigner une adresse mail valide</p>
      </div>
    </div>

    <div class="control-group">
      <!-- N° Telephone -->
      <label class="control-label" for="telUtilisateur">N° Telephone</label>
      <div class="controls">
        <input type="text" required="required" id="telUtilisateur" name="telUtilisateur" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Biographie -->
      <label class="control-label" for="bioUtilisateur">Biographie</label>
      <div class="controls">
        <textarea style="height:250px;" class="form-control autogrow" id="bioUtilisateur" name="bioUtilisateur"></textarea>
      </div>
    </div>

    <input type="hidden" name="roleUtilisateur" value="GRAPHISTE" />

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

