
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Brief<span>Projet</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

<form class="form-horizontal" method="POST" action="index.php?module=projet&action=manage&type=ajouter<?php if(!empty($_GET['idEntreprise'])){ echo '&idEntreprise='.$_GET['idEntreprise']; }else{} ?>">
  <fieldset>
    <div id="legend">
      <legend class=""><h2>Brief</h2></legend><br />
    </div>
    <div class="control-group">
      <!-- Taille de l'entreprise -->
      <label class="control-label" for="tailleProjet">Taille de l'entreprise</label>
      <div class="controls">
          <div class="checkbox-field">
            <input id="tailleProjet_1" type="checkbox" value="1"/>
            <label for="tailleProjet_1">1 à 10 personnes -TPE</label>
          </div>
          <div class="checkbox-field">
            <input id="tailleProjet_2" type="checkbox" value="2"/>
            <label for="tailleProjet_2">10 à 250 personnes -  Petite et Moyenne entreprises</label>
          </div>
          <div class="checkbox-field">
            <input id="tailleProjet_3" type="checkbox" value="3"/>
            <label for="tailleProjet_3">251 et 5000 : Entreprise à taille intermédiaire</label>
          </div>
          <div class="checkbox-field">
            <input id="tailleProjet_4" type="checkbox" value="4"/>
            <label for="tailleProjet_4">+ de 5000 salariés : Grandes entreprises</label>
          </div>
      </div>
    </div>

    <div class="control-group">
      <!-- Dernier Chiffre d'Affaire -->
      <label class="control-label" for="DernierCAProjet">Dernier Chiffre d'Affaire</label>
      <div class="controls">
          <div class="checkbox-field">
            <input id="DernierCAProjet_1" type="checkbox" value="1"/>
            <label for="DernierCAProjet_1">0 à 500 000€</label>
          </div>
          <div class="checkbox-field">
            <input id="DernierCAProjet_2" type="checkbox" value="2"/>
            <label for="DernierCAProjet_2">entre 500 000 € et 1 millions d’Euros</label>
          </div>
          <div class="checkbox-field">
            <input id="DernierCAProjet_3" type="checkbox" value="3"/>
            <label for="DernierCAProjet_3">plus d’1 millions d’euros </label>
          </div>
      </div>
    </div>

    <div class="control-group">
      <!-- Vos points de contact avec votre communauté -->
      <label class="control-label" for="PTContactProjet">Vos points de contact avec votre communauté</label>
      <div class="controls">
          <div class="checkbox-field">
            <input id="PTContactProjet_1" type="checkbox" value="1"/>
            <label for="PTContactProjet_1">Téléphonie</label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_2" type="checkbox" value="2"/>
            <label for="PTContactProjet_2">Point de vente</label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_3" type="checkbox" value="3"/>
            <label for="PTContactProjet_3">Lieu accueillant du public </label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_4" type="checkbox" value="4"/>
            <label for="PTContactProjet_4">Vidéo </label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_5" type="checkbox" value="5"/>
            <label for="PTContactProjet_5">Siteweb</label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_6" type="checkbox" value="6"/>
            <label for="PTContactProjet_6">Application</label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_7" type="checkbox" value="7"/>
            <label for="PTContactProjet_7">Spot Radio</label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_8" type="checkbox" value="8"/>
            <label for="PTContactProjet_8">Spot TV</label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_9" type="checkbox" value="9"/>
            <label for="PTContactProjet_9">Social media : Facebook, Twitter, instagram, youtube..Etc…</label>
          </div>
          <div class="checkbox-field">
            <input id="PTContactProjet_10" type="checkbox" value="10"/>
            <label for="PTContactProjet_10">webradio</label>
          </div>
      </div>
    </div>

<br>
Proposititon de pack
<br>
<br>
Proposition d'options
<br>
<br>

    <div class="control-group">
      <!-- Voix off -->
      <label class="control-label" for="voixOffProjet">Voix off</label>
      <div class="controls">
          <div class="checkbox-field">
            <input id="voixOffProjet_1" type="checkbox" value="1"/>
            <label for="voixOffProjet_1">Entre 1 à 5 messages par mois</label>
          </div>
          <div class="checkbox-field">
            <input id="voixOffProjet_2" type="checkbox" value="2"/>
            <label for="voixOffProjet_2">Entre 5 à 10 messages par mois </label>
          </div>
          <div class="checkbox-field">
            <input id="voixOffProjet_3" type="checkbox" value="3"/>
            <label for="voixOffProjet_3">plus de 10 </label>
          </div>
          <p class="help-block">Besoin d’une égérie vocale pour votre identité sonore ? Votre voix Off  : porte parole vocale de votre marque
Si oui, définissez le nombre de messages par mois </p>
      </div>
    </div>

    <div class="control-group">
      <!-- Aller / Retour supplémentaire -->
      <label class="control-label" for="ARProjet">Aller / Retour supplémentaire</label>
      <div class="controls">
        <input type="text" id="ARProjet" name="ARProjet" placeholder="" class="input-xlarge">
        <p class="help-block">Mettez le nombre d'aller - retour supplémentaire souhaité</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Proposition logo d'un designer supplémentaire -->
      <label class="control-label" for="logoProjet">Proposition logo d'un designer supplémentaire</label>
      <div class="controls">
        <input type="text" id="logoProjet" name="logoProjet" placeholder="" class="input-xlarge">
        <p class="help-block">Mettez le nombre de designer supplémentaire souhaité</p>
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

