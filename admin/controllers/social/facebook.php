<?php

/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/facebook.php
	@document		:	http://ngiriraj.com/work/facebook-connect-by-using-oauth-in-php/
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

*/

include "socialmedia_oauth_connect.php";
$oauth = new socialmedia_oauth_connect();

$oauth->provider="Facebook";
$oauth->client_id = "175944296647";
$oauth->client_secret = "c65b1a2fd6c3289039d5dc8bb999236e";
$oauth->scope="email,publish_stream,status_update,friends_online_presence,user_birthday,user_location,user_work_history";
$oauth->redirect_uri  ="http://127.0.0.1/emoson/core/php-oauth2/facebook.php";

$oauth->Initialize();

$code = ($_REQUEST["code"]) ?  ($_REQUEST["code"]) : "";

if(empty($code)) {
	$oauth->Authorize();
}else{
	$oauth->code = $code;
print $oauth->getAccessToken();
	$getData = json_decode($oauth->getUserProfile());
	$oauth->debugJson($getData);

}


?>