<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Facebook  posts</title>
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
 
</head>

<body>

<div class="content-wrapper profile-page">
    <!-- User Info -->
    <div class="row">
    <div class="col-lg-12 mb-30">
        <div class="card">
        <div class="card-body">
            <div class="user-bg" style="background: url(../assets/images/user-bg.jpg);">
            <div class="user-info">
                <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="user-dp"><img src="<?php echo $_SESSION['fbProfilePicture'];?>" alt="No image found"></div>
                    <div class="user-detail">
                        <h2 class="name"><?php echo $_SESSION['fbUserName'];  ?></h2>
                        <p class="designation mb-0">Facebook ID  : <?php echo $_SESSION['fbUserId']; ?></p>
                    </div>
                </div>
                </div>              
            </div>              
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!--=================================
wrapper -->
<div class="content-wrapper">
    <div class="page-title">
      <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Reading Your Facebook Feeds</h3><br/>
            </div>
          </div>
        </div>
    </div>
<?php
/**
 * Display User feed posts content
 */
// echo "<pre>";
// print_r($posts);
// echo "</pre>";die;
if (! empty($posts)) {
    foreach ($posts as $k => $v) {
        $postDate = date("d F, Y", strtotime($posts[$k]["created_time"]))
?>
<?php if ($posts[$k]["attach_type"] == ''){
    ?>
    <!-- main body --> 
    <div class="container">   
      <div class="row">   
        <div class="col-md-12 mb-30">     
          <div class="card card-statistics h-100"> 
            <div class="card-body">    
              <h5 class="card-title">Posted Message</h5>
                <h4><?php if(!empty($posts[$k]["message"])) { echo $posts[$k]["message"]; } ?></h4>
                <p><strong>Post Date </strong><?php echo $postDate; ?></p>
            </div>
          </div>   
        </div>
    </div> 
  </div> 
<?php
}
?>
<?php if ($posts[$k]["attach_type"] == 'profile_media'){
    ?>
    <!-- main body --> 
    <div class="container">   
      <div class="row">   
        <div class="col-md-12 mb-30">     
          <div class="card card-statistics h-100"> 
            <div class="card-body">    
              <h5 class="card-title">Updated Profile Picture</h5>
              <center><a href="<?php echo $posts[$k]['attach_link']; ?>"><img src="<?php echo $posts[$k]['attach_image'];?>" height="450" weight="450" alt="Image not available" style="border:1px solid black"/></a></center>  
              <p><?php if(!empty($posts[$k]["message"])) { echo $posts[$k]["message"]; } ?></p>
                <p><strong>Post Date </strong><?php echo $postDate; ?></p>
            </div>
          </div>   
        </div>
    </div> 
  </div> 
<?php
}
?>
<?php if ($posts[$k]["attach_type"] == 'photo'){
    ?>
    <!-- main body --> 
    <div class="container">   
      <div class="row">   
        <div class="col-md-12 mb-30">     
          <div class="card card-statistics h-100"> 
            <div class="card-body">    
              <h5 class="card-title">Uploaded Picture</h5>
              <center><a href="<?php echo $posts[$k]['attach_link']; ?>"><img src="<?php echo $posts[$k]['attach_image'];?>" height="450" weight="450" alt="Image not available" style="border:1px solid black"/></a></center>  
                <p><?php if(!empty($posts[$k]["message"])) { echo $posts[$k]["message"]; } ?></p>
                <p><strong>Post Date </strong><?php echo $postDate; ?></p>
            </div>
          </div>   
        </div>
    </div> 
  </div> 
<?php
}
?>


 <!--=================================
 wrapper -->
<?php
    }
}
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

