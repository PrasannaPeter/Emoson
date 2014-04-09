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
    
    
  <div class="modal-header">
    <center>  <h3 id="loginModalLabel">Connexion</h3>
  </div>
  <div class="modal-body">
      <form method="post" id="contact" action='index.php?module=utilisateur&action=login&uc=ajouter' name="login_form">
	
          <div class="control-group">
            <label for="login" class="control-label">
                <center>   Login
            </label>
            <div class="controls">
              <input name="login" type="text" value="" id="login_user" required>
            </div>
            <div id="rouge">
            <span id="msg_login"></span>
            </div>
          </div>

          <div class="control-group">
            <label for="password" class="control-label">
                <center>     Mot de passe
            </label>
            <div class="controls">
              <input name="mdp" type="password" value="" id="mdp_user" required>
            </div>
            <div id="rouge">
            <span id="msg_mdp"></span>
            </div>
          </div>

        <p>
        <center><button type="submit" class="btn btn-primary" id="envoyer">Connexion</button>
          <a href="index.php?module=utilisateur&action=recup_mdp" class="btn btn-warning">Mot de passe oublié ?</a>
        </p>
      </form>
      <span id="msg_all"></span>
  </div>