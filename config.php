<?php
session_start();
require 'vendor/autoload.php';
/**
 * =======================================================================================
 * Facebook Configuration
 * =======================================================================================
 */

/**
 * Login with facebook using SDK
 * Regference : https://learncodeweb.com/web-development/login-with-facebook-using-php-sdk/, https://github.com/facebookarchive/php-graph-sdk
 * 
 * note : Replace following line 108 if get error in library file 'GrapgRawResponse.php' 
 * preg_match('/HTTP\/\d(?:\.\d)?\s+(\d+)\s+/',$rawResponseHeader, $match);
 */
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$appId = "545817282468363";
$appSecret = "39ad7ecc7694270748319458521e02a3";

$fb = new Facebook(array(
    'app_id' => $appId, // Replace with your app id
    'app_secret' => $appSecret ,  // Replace with your app secret
    'default_graph_version' => 'v3.2',
));
 
$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

/**
 * =======================================================================================
 * Instagram Configuration
 * =======================================================================================
 */

/**
 * Instagram Configuration
 * Library Reference : https://github.com/espresso-dev/instagram-basic-display-php
 */

use EspressoDev\InstagramBasicDisplay\InstagramBasicDisplay;

/**
 * Reference : https://github.com/espresso-dev/instagram-basic-display-php
 * 
 * Login to facobook developer acccount
 * create an website application
 * Add instagram basic display product and create application and get appid & app secret
 * Set OAuth url same as redirect url (must be https) : expose localhost to a domain for teting
 */
$instagram = new InstagramBasicDisplay([
    'appId' => '955152668565474',
    'appSecret' => '2d60f9cd176c249b28329c8e7f2dab22',
    'redirectUri' => 'https://pvtqhf.expose.sh/social-media/success.php'
]);
?>
