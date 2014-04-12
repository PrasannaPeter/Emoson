<?php

/**
 * Configuration de l'application
 */


/** Configuration des informations générales. */

define('SITE_COPYRIGHT', '&copy; Emoson ');
define('SITE_TITLE', 'EmoSon - Le site qui met en relation designers et entreprise');
define('SITE_DESCRIPTION','Entreprise : trouvez un designer pour vos projets.');
define('SITE_KEYWORDS','emoson, design, designer, projet, portfolio');
define('SITE_AUTHOR','Valentin Giraud, Vikas Kumar, Prasana Peter, Yacine, Valentin');


/** Liens de l'application. */
define('CORE',''.ROOT_APP.'/core/');
define('CONTROLLERS',''.ROOT_APP.'/admin/controllers/');
define('MODELS',''.ROOT_APP.'/admin/models/');
define('VIEWS',''.ROOT_APP.'/views/');

define('FILES',''.ROOT_APP.'/files/');
define('JS',''.ROOT_APP.'/js/');


// ** Réglages MySQL ** //

/** Nom de la base de données de BugTracker. */
define('DB_NAME', 'emoson');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');



/**
 * Mode DEBUG
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 */
define('DEBUG', true);



/**
 * Adresse e-mail de l'administrateur
 */
define('ADMIN_EMAIL','test_app_emoson@yopmail.com');


