
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Inscription<span>Entreprise</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
        <li> <a href="candidates.html">Entreprises partenaires</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" method="POST" action="index.php?module=entreprise&action=manage&type=inscription_entreprise<?php if(!empty($_GET['idUtilisateur'])){ echo '&idEntreprise='.$_GET['idEntreprise']; }else{} ?>">
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
  </fieldset>
  <br />
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Informations de l'entreprise</h2></legend><br />
    </div>
    <div class="control-group">
      <!-- Raison sociale -->
      <label class="control-label"  for="raisonSocialeEntreprise">Raison sociale</label>
      <div class="controls">
        <input type="text" id="raisonSocialeEntreprise" name="raisonSocialeEntreprise" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Statut juridique -->
      <label class="control-label"  for="typeEntreprise">Statut juridique</label>
      <div class="controls">
        <input type="text" id="typeEntreprise" name="typeEntreprise" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Secteur d'activité -->
      <label class="control-label"  for="secteurEntreprise">Secteur d'activité</label>
      <div class="controls">
        <input type="text" id="secteurEntreprise" name="secteurEntreprise" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Site web -->
      <label class="control-label" for="siteWebEntreprise">Site web</label>
      <div class="controls">
        <input type="text" id="siteWebEntreprise" name="siteWebEntreprise" placeholder="" class="input-xlarge">

      </div>
    </div>

    <div class="control-group">
      <!-- N° Siret -->
      <label class="control-label" for="numSiretEntreprise">N° Siret</label>
      <div class="controls">
        <input type="text" id="numSiretEntreprise" name="numSiretEntreprise" placeholder="" class="input-xlarge">

      </div>
    </div>

        <div class="control-group">
      <!-- Adresse -->
      <label class="control-label" for="adresseEntreprise">Adresse</label>
      <div class="controls">
        <input type="text" id="adresseEntreprise" name="adresseEntreprise" placeholder="" class="input-xlarge">

      </div>
    </div>

    <div class="control-group">
      <!-- Ville -->
      <label class="control-label" for="villeEntreprise">Ville</label>
      <div class="controls">
        <input type="text" id="villeEntreprise" name="villeEntreprise" placeholder="" class="input-xlarge">

      </div>
    </div>

    <div class="control-group">
      <!-- Code postal -->
      <label class="control-label" for="CPEntreprise">Code postal</label>
      <div class="controls">
        <input type="text" id="CPEntreprise" name="CPEntreprise" placeholder="" class="input-xlarge">

      </div>
    </div>

    <!-- <div class="control-group">
      <label class="control-label" for="age">Age</label>
      <div class="controls">
        <input type="text" id="age" name="age" placeholder="" class="input-xlarge">

      </div>
    </div> -->

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

