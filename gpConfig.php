<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '1039548480009-gn0p8jf2dffibslrjptd0e36jl1jumts.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'xdVVDfVIxvbE9cJDz2L_S0sZ'; //Google client secret
$redirectURL = 'https://consumergear.com/index_new.php'; //Callback URL
//$redirectURL='http://localhost/consumergear/';
//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
