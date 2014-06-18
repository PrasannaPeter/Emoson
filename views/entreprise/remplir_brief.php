
<!-- Content -->
<?php
$idEntreprise = $_SESSION['idUtilisateur'];
?>

<div id="content">
  <div id="title">
    <h1 class="inner title-2">Brief<span>Formulaire</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="index.php?module=projet&action=manage&type=remplir_brief<?php if(!empty($idEntreprise)){ echo '&idUtilisateur='.$idEntreprise; }else{} ?>">
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Faire une demande de projet</h2></legend><br />
    </div>
<br>
<strong><h3>Votre projet</h3></strong>
    <div class="control-group">
      <label class="control-label" for="titreProjet" >Titre de votre projet</label>
      <div class="controls">
        <input required="required" type="text" name="titreProjet" style="width:400px;">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Description de votre projet</label>
      <div class="controls">
        <textarea class="form-control autogrow" required="required" name="descriptionProjet" style="width:408px; height:120px;"></textarea>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Avez-vous une stratégie de branding ?</label>
      <div class="controls">
        <br>
        <div style="position:relative;">
          <input type="file" id="brandingProjet" name="fichier[]" placeholder="" class="input-xlarge">
        </div>
        <br>
        <p class="help-block" style="margin-top:-15px;">Si oui, pouvez-vous nous envoyer votre charte de marque : document résumant qui vous êtes ?</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Votre positionnement en 140 caractères</label>
      <div class="controls">
        <textarea class="form-control autogrow" required="required" name="positionnementProjet" style="width:408px; height:120px;"></textarea>
        <p class="help-block" style="margin-top:-15px;">Prévoir</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Votre identite visuelle</label>
      <div class="controls">
        <br>
        <div style="position:relative;">
          <input type="file" id="identiteProjet" name="fichier[]" placeholder="" class="input-xlarge">
        </div>
        <br>
        <p class="help-block" style="margin-top:-15px;">Pouvez-vous nous envoyer votre charte graphique ?</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Des références musicales ?</label>
      <div class="controls">
        <textarea class="form-control autogrow" required="required" name="referencesProjet" style="width:408px; height:120px;"></textarea>
        <p class="help-block" style="margin-top:-15px;">Envoyez-nous vos liens URLS Youtube</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Ce que vous ne souhaitez surtout pas...</label>
      <div class="controls">
        <textarea class="form-control autogrow" required="required" name="dontlikeProjet" style="width:408px; height:120px;"></textarea>
        <p class="help-block" style="margin-top:-15px;">Envoyez-nous vos liens URLS Youtube</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Commentaires</label>
      <div class="controls">
        <textarea class="form-control autogrow" required="required" name="commentaireProjet" style="width:408px; height:120px;"></textarea>
      </div>
    </div>
<hr>
<strong><h3>Informations sur votre Entreprise</h3></strong>
<br>
    <div class="control-group">
      <!-- Taille de l'entreprise -->
      <label class="control-label" for="tailleProjet">Quelle est la taille de l'entreprise ?</label>
      <div class="controls">
          <div class="radio-field">
            <input name ="tailleEntreprise" checked="checked" id="tailleProjet_1" type="radio" value="1"/>
            <label for="tailleProjet_1">1 à 10 personnes - TPE</label>
          </div>
          <div class="radio-field">
            <input name ="tailleEntreprise" id="tailleProjet_2" type="radio" value="2"/>
            <label for="tailleProjet_2">10 à 250 personnes -  Petite et Moyenne entreprises</label>
          </div>
          <div class="radio-field">
            <input name ="tailleEntreprise" id="tailleProjet_3" type="radio" value="3"/>
            <label for="tailleProjet_3">251 et 5000 - Entreprise à taille intermédiaire</label>
          </div>
          <div class="radio-field">
            <input name ="tailleEntreprise" id="tailleProjet_4" type="radio" value="4"/>
            <label for="tailleProjet_4">+ de 5000 salariés - Grandes entreprises</label>
          </div>
      </div>
    </div>

    <div class="control-group">
      <!-- Dernier Chiffre d'Affaire -->
      <label class="control-label" for="caEntreprise">Quel est votre dernier chiffre d'affaire ?</label>
      <div class="controls">
          <div class="radio-field">
            <input name="caEntreprise" checked="checked" id="DernierCAProjet_1" type="radio" value="1"/>
            <label for="DernierCAProjet_1">0 à 500 000€</label>
          </div>
          <div class="radio-field">
            <input name="caEntreprise" id="DernierCAProjet_2" type="radio" value="2"/>
            <label for="DernierCAProjet_2">entre 500 000 € et 1 millions d’Euros</label>
          </div>
          <div class="radio-field">
            <input name="caEntreprise" id="DernierCAProjet_3" type="radio" value="3"/>
            <label for="DernierCAProjet_3">plus d’1 millions d’euros</label>
          </div>
      </div>
    </div>

    <div class="control-group">
      <!-- Vos points de contact avec votre communauté -->
      <label class="control-label" for="ptsContactEntreprise">Vos points de contact avec votre communauté ?</label>
      <div class="controls">
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_1" type="checkbox" value="1"/>
            <label for="PTContactEntreprise_1">Téléphonie</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_2" type="checkbox" value="2"/>
            <label for="PTContactEntreprise_2">Point de vente</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_3" type="checkbox" value="3"/>
            <label for="PTContactEntreprise_3">Etablissements recevant du public</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_4" type="checkbox" value="4"/>
            <label for="PTContactEntreprise_4">Vidéo</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_5" type="checkbox" value="5"/>
            <label for="PTContactEntreprise_5">Site Internet</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_6" type="checkbox" value="6"/>
            <label for="PTContactEntreprise_6">Application</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_7" type="checkbox" value="7"/>
            <label for="PTContactEntreprise_7">Spot Radio</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_8" type="checkbox" value="8"/>
            <label for="PTContactEntreprise_8">Spot TV</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_9" type="checkbox" value="9"/>
            <label for="PTContactEntreprise_9">Médias Sociaux (Facebook, Twitter, Instagram, Youtube, etc...)</label>
          </div>
          <div class="checkbox-field">
            <input name="ptsContactEntreprise[]" id="PTContactEntreprise_10" type="checkbox" value="10"/>
            <label for="PTContactEntreprise_10">Webradio</label>
          </div>
      </div>
    </div>
<hr>
<strong><h3>Proposititon de pack</h3></strong>
<br>
<div class="clear"></div>
<!--Prix Table Block-->
<div class="block-content ">
  <section class="row-fluid">
<?php
  require_once('admin/controllers/pack/pack.php');
  Pack::vignette_pack($type="actif");
?>
  </section>
</div>
        <!--Prix Table Block-->

        <hr>
<strong><h3>Proposition d'options</h3></strong>


    <div class="control-group">
      <!-- Voix off -->
      <label class="control-label" for="voixOffProjet">Voix off</label>
      <div class="controls">
          <div class="radio-field">
            <input name="optionProjet" id="voixOffProjet_1" type="radio" value="1" selected = "selected"/>
            <label for="voixOffProjet_1">Entre 1 à 5 messages par mois</label>
          </div>
          <div class="radio-field">
            <input name="optionProjet" id="voixOffProjet_2" type="radio" value="2"/>
            <label for="voixOffProjet_2">Entre 5 à 10 messages par mois</label>
          </div>
          <div class="radio-field">
            <input name="optionProjet" id="voixOffProjet_3" type="radio" value="3"/>
            <label for="voixOffProjet_3">plus de 10</label>
          </div>
          <p class="help-block" style="margin-top:-15px;">Besoin d’une égérie vocale pour votre identité sonore ? Votre voix off  : porte parole vocale de votre marque<br>
Si oui, définissez le nombre de messages par mois </p>
      </div>
    </div>
<br>
    <div class="control-group">
      <!-- Aller / Retour supplémentaire -->
      <label class="control-label" for="ARProjet">Aller / Retour supplémentaire</label>
      <div class="controls">
        <input type="number" required="required" min="0" value="0" id="ARProjet" name="nbARProjet" placeholder="" class="input-xlarge">
        <p class="help-block">Mettez le nombre d'aller - retour supplémentaire souhaité</p>
      </div>
    </div>
<br>
    <div class="control-group">
      <!-- Proposition logo d'un designer supplémentaire -->
      <label class="control-label" for="logoProjet">Proposition logo d'un designer supplémentaire</label>
      <div class="controls">
        <input type="number" required="required" min="0" value="0" id="logoProjet" name="nbDesignerSouhaite" placeholder="" class="input-xlarge">
        <p class="help-block">Mettez le nombre de designer supplémentaire souhaité</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit" class="btn btn-success">Confirmer</button>
      </div>
    </div>
  </fieldset>
</form>

    </div>
    <!-- /Content Inner -->

  </div>
</div>

<!-- /Content -->

