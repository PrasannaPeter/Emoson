<?php
/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/soundcloud.php
	@document		:	http://ngiriraj.com/work/soundcloud-connect-by-using-oauth-in-php/
	@license		: 	Free to use,
	@History		:	V1.0 - Released oauth 2.0 service providers login access
	@oauth2		:	Support following oauth2 login
					Bitly
					Wordpress
					Paypal
					Facebook
					Google
					Microsoft(MSN,Live,Hotmail)
					Foursquare
					Box
					Reddit
					Yammer
					Yandex
					SoundCloud

*/

include "socialmedia_oauth_connect.php";

$oauth = new socialmedia_oauth_connect();
$oauth->provider="SoundCloud";
$oauth->client_id = "80baf2537bedfc558f35242c76cfc8b2";
$oauth->client_secret = "eaea16083a2793cf43083c92918d9860";
$oauth->redirect_uri  ="http://127.0.0.1/emoson/core/php-oauth2/soundcloud.php";

$oauth->scope="non-expiring";

$oauth->Initialize();

$code = ($_REQUEST["code"]) ?  ($_REQUEST["code"]) : "";

if(empty($code)) {
	$oauth->Authorize();
}else{
	$oauth->code = $code;
#	$oauth->getAccessToken();
	$getData = json_decode($oauth->getUserProfile());
	$oauth->debugJson($getData);
}
?>