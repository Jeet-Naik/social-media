<?php
include_once('../config.php');
session_destroy();
unset($_SESSION['fbUserId']);
unset($_SESSION['fbUserName']);
unset($_SESSION['fbAccessToken']);
header('location: https://localhost/facebook_wall/index.php');
exit;
?>