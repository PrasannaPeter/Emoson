<!DOCTYPE html>
<html class="no-js">
<head>
    <title><?php echo SITE_TITLE;?></title>

    <meta charset="UTF-8">
    <meta name="description" contents="<?php echo SITE_DESCRIPTION;?>">
    <meta name="keywords" content="<?php echo SITE_KEYWORDS;?>">

    <meta name="author" content="<?php echo SITE_AUTHOR;?>">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,700&amp;subset=latin,latin-ext"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="style/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="style/css/font-awesome-ie7.css" rel="stylesheet" type="text/css" />
    <link href="style/css/bootstrap.css" rel="stylesheet">
    <link href="style/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/jquery.combosex.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/jquery.flexslider.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/jquery.scrollbar.css"/>
    <!--[if (lte IE 9)]>
      <link rel="stylesheet" type="text/css" href="style/css/iefix.css"/>
          <![endif]-->
    <!-- /CSS -->

    <!-- JS -->
    <script type="text/javascript" src="style/js/jquery.1.7.2.min.js"></script>
    <script type="text/javascript" src="style/js/jquery-ui.1.7.2.min.js"></script>
    <script type="text/javascript" src="style/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="style/js/jquery.combosex.min.js"></script>
    <script type="text/javascript" src="style/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="style/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="style/js/jquery.easytabs.min.js"></script>
    <script type="text/javascript" src="style/js/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="style/js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="style/js/jQuery.menutron.js"></script>
    <script type="text/javascript" src="style/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="style/js/custom.js"></script>
    <!-- /JS -->

    </head>
    <body>

    <!-- Bar -->
    <div id="bar">
      <div class="inner">

    <!-- Language Menu -->
    <ul id="lang-menu">
      <li>Bonjour </li>
      <?php if(!empty($_SESSION['loginUtilisateur'])){ ?>
        <li><?php echo $_SESSION['loginUtilisateur']; ?></li>
      <?php }else{ ?>
        <li>visiteur</li>
      <?php } ?>
    </ul>
    <!-- /Language Menu -->

    <!-- User Menu -->
    <ul id="user-menu">
        <?php if(!is_connected()){ ?>
          <a class="btn btn-warning" href="#loginModal" role="button" data-toggle="modal">Connexion</a>
          <a class="btn btn-info" href="index.php?module=designer&action=inscription_designer">Inscription designer sonore</a>
          <a class="btn btn-success" href="index.php?module=entreprise&action=inscription_entreprise">Inscription entreprise</a>
        <?php }else{ ?>
          <?php if($_SESSION['roleUtilisateur'] == "ADMIN"){ ?>
            <a class="btn btn-success" href="admin/index.php">Administration</a>
          <?php }else{ ?>
            <a class="btn btn-success" href="index.php?module=dashboard&action=afficher"><i class="fa fa-cloud"></i> <span>Mon espace</span></a>
          <?php } ?>
          <a class="btn btn-info" href="index.php?module=utilisateur&action=deconnexion"><i class="fa fa-lock"></i> <span>Déconnexion</span></a>
        <?php } ?>
    </ul>
    <!-- /User Menu -->
  </div>
</div>
<!-- /Bar -->

<!-- Header -->
<div id="header">
  <div class="inner">

    <!-- Logo -->
    <div id="logo"> <a href="index.php"><img src="style/images/Logo.png" width="220" height="72"  alt="logo"/></a><a class="menu-hider"></a></div>
    <!-- /Logo -->

    <!-- Menu -->
    <ul id="navigation">
      <li class="current"> <a href="index.php">Accueil</a></li>
<!--       <li class="first expanded"><a href="index.php?module=projet&action=projet">Projet</a>
        <ul class="submenu">
          <li><a href="index.php?module=projet&action=liste">Liste des Projets</a></li>
          <li><a href="index.php?module=projet&action=detail">Projet details</a></li>
        </ul>
      </li> -->
      <li class="first expanded"><a href="index.php?module=designer&action=designer">Designers</a>
        <ul class="submenu">
          <li><a href="index.php?module=designer&action=liste">Designers Listing</a></li>
          <li><a href="index.php?module=designer&action=profil">Designers profil</a></li>
        </ul>
      </li>
      <li><a href="index.php?module=partenaire&action=liste">Partenaires</a></li>
      <li><a href="index.php?module=apropos">Qui sommes nous</a></li>
      <li><a href="index.php?module=contact">Contact</a></li>
    </ul>
    <!-- /Menu -->

  </div>
</div>
<!-- /Header -->

<!-- Recherche -->
<!-- <div id="search">
  <div class="inner">
    <form id="search-form" class="search-bar-home" method="POST" action="index.php?module=recherche">
      <div class="seach-head"><img src="style/images/list-ico.png"  alt=""/><span> Je recherche </span></div>
      <select id="search-select" class="select">
        <option selected="selected" value="Designers">Designers</option>
        <option value="Projet">Projet</option>
      </select>
      <label class="in">en</label>
      <input type="text" placeholder="Localité" class="textfield-with-callback"/>
      <input type="text" placeholder="Secteur d'activité" class="textfield-with-callback"/>
      <input type="submit" value="Rechercher" id="search-submit" class="pull-right"/>
    </form>
    <div id="more-options"></div>
    <div class="clear"></div>

    <div id="options"></div>
  </div>
</div> -->
<!-- /Recherche -->


<!-- Modal -->
<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="loginModalLabel">Vous devez vous connecter pour accéder à cette partie du site</h3>
  </div>
  <div class="modal-body">
      <form method="post" action='connexion.php' name="login_form">

          <div class="control-group">
            <label for="login" class="control-label">
              Login
            </label>
            <div class="controls">
              <input name="login" required="required" type="text" value="" id="login">
            </div>
          </div>

          <div class="control-group">
            <label for="password" class="control-label">
              Mot de passe
            </label>
            <div class="controls">
              <input name="password" required="required" type="password" value="" id="password">
            </div>
          </div>

        <p>
          <button type="submit" class="btn btn-success">Connexion</button>
          <!-- <a href="index.php?module=utilisateur&action=recup_mdp" class="btn btn-warning">Mot de passe oublié ?</a> -->
        </p>
      </form>
  </div>
  <div class="modal-footer">
            <p>
    Nouveau sur Emoson ?

          <a class="btn btn-info" href="index.php?module=designer&action=inscription_designer">Inscription designer sonore</a>
          <a class="btn btn-warning" href="index.php?module=entreprise&action=inscription_entreprise">Inscription entreprise</a>
        </p>
  </div>
</div>
