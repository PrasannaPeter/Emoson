<?php

require_once('admin/libs/php-soundcloud-master/Services/Soundcloud.php');

// create client object with app credentials
$client = new Services_Soundcloud(
  '80baf2537bedfc558f35242c76cfc8b2', 'eaea16083a2793cf43083c92918d9860', 'http://127.0.0.1/emoson/index.php?module=social&action=soundcloud');

/*$code = $_GET['code'];
$access_token = $client->accessToken($code);

*/
// redirect user to authorize URL
header("Location: " . $client->getAuthorizeUrl());