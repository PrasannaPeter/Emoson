<?php

require_once('../php-soundcloud-master/Services/Soundcloud.php');
// create client object with app credentials
$soundcloud = new Services_Soundcloud(
  '80baf2537bedfc558f35242c76cfc8b2', 'eaea16083a2793cf43083c92918d9860', 'http://127.0.0.1/emoson/libs/social/soundcloud.php');

if(!empty($_GET['code'])){
    // code for access token
    $code = $_GET['code'];
    // Get access token
    try {
        if(!isset($_SESSION['token'])){
            $postData = NULL;
            $accessToken = $soundcloud->accessToken($code, $postData, array(
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ));

            $_SESSION['token'] = $accessToken['access_token'];
        }else{
            $soundcloud->setAccessToken($_SESSION['token']);
        }
    } catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
        exit($e->getMessage());
    }

    $me = json_decode($soundcloud->get('me'), true);

}

// redirect user to authorize URL
header("Location: " . $soundcloud->getAuthorizeUrl(array('scope'=>'non-expiring')));

