<?php
include_once('config.php');

$accessToken = "{$_SESSION['fbAccessToken']}";

/**
 * Get user posts using post feed API
 * Reference : https://developers.facebook.com/docs/graph-api/reference/user/feed/
 */
$postData = "";
try {
    $userPosts = $fb->get("/".$_SESSION['fbUserId']."/feed", $accessToken);
    $postBody = $userPosts->getDecodedBody();
    $postData = $postBody["data"];
} catch (FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit();
} catch (FacebookSDKException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit();
}
/**
 * Get post attachment details from post id
 * Reference : https://developers.facebook.com/docs/graph-api/reference/post/attachments/
 */
$posts=array();
foreach($postData as $key=>$row)
{
    $postID = $row['id']; 

    // Fetch the post info 
    $response = $fb->get('/'.$postID, $accessToken); 
    $data = $response->getDecodedBody(); 

    $response = $fb->get('/'.$postID.'/attachments', $accessToken); 
    $attchData = $response->getDecodedBody(); 

    $posts[$key]['created_time']    = $data['created_time']; 
    $posts[$key]['post_id']         = $data['id']; 
    $posts[$key]['message']         = !empty($data['message'])?$data['message']:''; 
    $posts[$key]['attach_type']     = !empty($attchData['data'][0]['type'])?$attchData['data'][0]['type']:''; 
    $posts[$key]['attach_title']    = !empty($attchData['data'][0]['title'])?$attchData['data'][0]['title']:''; 
    $posts[$key]['attach_image']    = !empty($attchData['data'][0]['media']['image']['src'])?$attchData['data'][0]['media']['image']['src']:''; 
    $posts[$key]['attach_link']     = !empty($attchData['data'][0]['url'])?$attchData['data'][0]['url']:''; 
}

require_once "fb-wall-view.php";
