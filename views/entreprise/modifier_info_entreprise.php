
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Modifier<span> mon profil</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.php">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">
<?php
  $info_entreprise = Entreprise::get_entreprise($idEntreprise=NULL, $type=array('byUserId' => $_SESSION['idUtilisateur']));

  $info_entreprise = $info_entreprise->fetch();
?>
    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" method="POST" action="index.php?module=entreprise&action=manage&type=modifier<?php if(!empty($info_entreprise['idEntreprise'])){ echo '&idEntreprise='.$info_entreprise['idEntreprise']; }else{} ?>">
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Informations de l'entreprise</h2></legend><br />
    </div>
    <div class="control-group">
      <!-- Raison sociale -->
      <label class="control-label"  for="raisonSocialeEntreprise">Raison sociale</label>
      <div class="controls">
        <input type="text" id="raisonSocialeEntreprise" name="raisonSocialeEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['raisonSocialeEntreprise'])){ echo $info_entreprise['raisonSocialeEntreprise']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- Statut juridique -->
      <label class="control-label"  for="typeEntreprise">Statut juridique</label>
      <div class="controls">
        <input type="text" id="typeEntreprise" name="typeEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['typeEntreprise'])){ echo $info_entreprise['typeEntreprise']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- Secteur d'activité -->
      <label class="control-label"  for="secteurEntreprise">Secteur d'activité</label>
      <div class="controls">
        <input type="text" id="secteurEntreprise" name="secteurEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['secteurEntreprise'])){ echo $info_entreprise['secteurEntreprise']; } ?>">
      </div>
    </div>

    <div class="control-group">
      <!-- Site web -->
      <label class="control-label" for="siteWebEntreprise">Site web</label>
      <div class="controls">
        <input type="text" id="siteWebEntreprise" name="siteWebEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['siteWebEntreprise'])){ echo $info_entreprise['siteWebEntreprise']; } ?>">

      </div>
    </div>

    <div class="control-group">
      <!-- N° Siret -->
      <label class="control-label" for="numSiretEntreprise">N° Siret</label>
      <div class="controls">
        <input type="text" id="numSiretEntreprise" name="numSiretEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['numSiretEntreprise'])){ echo $info_entreprise['numSiretEntreprise']; } ?>">

      </div>
    </div>

        <div class="control-group">
      <!-- Adresse -->
      <label class="control-label" for="adresseEntreprise">Adresse</label>
      <div class="controls">
        <input type="text" id="adresseEntreprise" name="adresseEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['adresseEntreprise'])){ echo $info_entreprise['adresseEntreprise']; } ?>">

      </div>
    </div>

    <div class="control-group">
      <!-- Ville -->
      <label class="control-label" for="villeEntreprise">Ville</label>
      <div class="controls">
        <input type="text" id="villeEntreprise" name="villeEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['villeEntreprise'])){ echo $info_entreprise['villeEntreprise']; } ?>">

      </div>
    </div>

    <div class="control-group">
      <!-- Code postal -->
      <label class="control-label" for="CPEntreprise">Code postal</label>
      <div class="controls">
        <input type="text" id="CPEntreprise" name="CPEntreprise" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['CPEntreprise'])){ echo $info_entreprise['CPEntreprise']; } ?>">

      </div>
    </div>

    <!-- <div class="control-group">
      <label class="control-label" for="age">Age</label>
      <div class="controls">
        <input type="text" id="age" name="age" placeholder="" class="input-xlarge" value="<?php if(!empty($info_entreprise['age'])){ echo $info_entreprise['age']; } ?>">

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

