<?php
require 'config.php';

// Get the OAuth callback code
$code = $_GET['code'];

if(!isset($_SESSION['token']))
{
    
    // Get the short lived access token (valid for 1 hour)
    $token = $instagram->getOAuthToken($code, true);

    // Exchange this token for a long lived token (valid for 60 days)
    $token = $instagram->getLongLivedToken($token, true);
    $_SESSION['token']=$token;
    echo 'Your token is: ' . $_SESSION['token'];
}

// Set user access token
$instagram->setAccessToken( $_SESSION['token']);

// Get the users profile
$profile = $instagram->getUserProfile();
$profile=(array)$profile;

//get user posts
$media = $instagram->getUserMedia();
$media=(array)$media;

$posts=array();

foreach($media['data'] as $key=>$row)
{
    $posts[$key]['caption']         = !empty($row->caption)?$row->caption:''; 
    $posts[$key]['created_time']    = $row->timestamp; 
    $posts[$key]['post_id']         = $row->id;
    $posts[$key]['permalink']       = $row->permalink;
    $posts[$key]['media_url']       = $row->media_url;    
    $posts[$key]['media_type']      = $row->media_type;
    $posts[$key]['children']        = !empty($row->children)?$row->children:'';
}

require_once "instagram_wall.php";