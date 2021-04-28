<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION['data']);
unset($_SESSION['fbUserId']);
unset($_SESSION['fbUserName']);
unset($_SESSION['fbAccessToken']);
header('location: index.php');
exit;
?>