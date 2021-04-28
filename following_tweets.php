<?php
require_once('config.php');
//Format tweets to display
// Require our TwitterTextFormatter library
// Url: https://github.com/netgloo/php-samples/tree/master/php-twitter-text-formatter
require_once('TwitterTextFormatter.php');
// Use the class TwitterTextFormatter
use Netgloo\TwitterTextFormatter;
/**
 * Reference : https://blog.netgloo.com/2015/08/16/php-getting-latest-tweets-and-displaying-them-in-html/
 */
// Require J7mbo's TwitterAPIExchange library (used to retrive the tweets)
// url : https://github.com/J7mbo/twitter-api-php
require_once('vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

// Set here your twitter application tokens
$settings = array(
    'consumer_key' => CONSUMER_KEY,
    'consumer_secret' => CONSUMER_SECRET,

    // These two can be left empty since we'll only read from the Twitter's 
    // timeline
    'oauth_access_token' => '',
    'oauth_access_token_secret' => '',
);

// Set here the Twitter account from where getting latest tweets
$screen_name = $_GET['name'];

// Get timeline using TwitterAPIExchange
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = "?screen_name={$screen_name}&cursor=-1&count=10";
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$user_timeline_json = $twitter
    ->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

//User tweets array
$user_timeline = json_decode($user_timeline_json);

// Print each tweet using TwitterTextFormatter to get the HTML text
$username=$_GET['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Tweeter posts</title>
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
 
</head>

<body>
<!--=================================
wrapper -->
<div class="content-wrapper profile-page">
    <div class="page-title">
      <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="mb-0">Last 10 tweets of <?php echo $username; ?></h2><br/>
            </div>
          </div>
        </div>
    </div>
<?php
/**
 * Display User feed posts content
 */
// if (! empty($posts)) {
    foreach ($user_timeline as $user_tweet) {
        $postDate = date("d F, Y", strtotime($user_tweet->created_at))
?>
        <!-- main body --> 
        <div class="container">   
        <div class="row">   
            <div class="col-md-12 mb-30">     
            <div class="card card-statistics h-100"> 
                <div class="card-body">    
                    <h6><?php echo TwitterTextFormatter::format_text($user_tweet); ?></h6><br/>
                    <?php
                     // Print also the tweet's image if is set
                        if (isset($user_tweet->entities->media)) 
                        {
                            $media_url = $user_tweet->entities->media[0]->media_url;
                            echo "<center><img src='{$media_url}' height='400' weight='400' alt='Image not available'/></center>";
                        }
                    ?>
                    <p><strong>Post Date </strong><?php echo $postDate; ?></p>
                </div>
            </div>   
            </div>
        </div> 
    </div> 
 <!--=================================
 wrapper -->
<?php
    }
// }
?>
</div>
<!--=================================
 jquery -->

<!-- jquery -->
<script src="assets/js/jquery-3.3.1.min.js"></script>

<!-- plugins-jquery -->
<script src="assets/js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script>var plugin_path = 'assets/js/';</script>

<!-- chart -->
<script src="assets/js/chart-init.js"></script>

<!-- calendar -->
<script src="assets/js/calendar.init.js"></script>

<!-- charts sparkline -->
<script src="assets/js/sparkline.init.js"></script>

<!-- charts morris -->
<script src="assets/js/morris.init.js"></script>

<!-- datepicker -->
<script src="assets/js/datepicker.js"></script>

<!-- sweetalert2 -->
<script src="assets/js/sweetalert2.js"></script>

<!-- toastr -->
<script src="assets/js/toastr.js"></script>

<!-- validation -->
<script src="assets/js/validation.js"></script>

<!-- lobilist -->
<script src="assets/js/lobilist.js"></script>
 
<!-- custom -->
<script src="assets/js/custom.js"></script>
 
</body>
</html>