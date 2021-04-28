<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>instagram  posts</title>
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />

<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  <!--=================================
wrapper -->

<div class="content-wrapper  profile-page">
    <div class="page-title">
      <div class="container">
          <!-- User Info -->
        <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card">
            <div class="card-body">
                <div class="user-bg" style="background: url(../assets/images/user-bg.jpg);">
                <div class="user-info">
                    <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <!-- <div class="user-dp"><img src="<?php echo $_SESSION['fbProfilePicture'];?>" alt="No image found"></div> -->
                        <div class="user-detail">
                            <h2 class="name"><?php echo $profile['username'];  ?></h2>
                            <p class="designation mb-0">Instagram ID  : <?php echo  $profile['id']; ?></p>
                        </div>
                    </div>
                    </div>              
                </div>              
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Reading Your Instagram Feeds</h3><br/>
            </div>
          </div>
        </div>
    </div>
    <?php
        /**
         * Display User feed posts content
         */
        if (!empty($posts)) {
            foreach ($posts as $k => $v) {
                $postDate = date("d F, Y", strtotime($posts[$k]["created_time"]))
        ?>
            <?php 
            /**
             * If media type is Image
             */
            if ($posts[$k]["media_type"] == 'IMAGE') {
            ?>
                <!-- main body --> 
                <div class="container">   
                <div class="row">   
                    <div class="col-md-12 mb-30">     
                    <div class="card card-statistics h-100"> 
                        <div class="card-body">    
                        <center><a href="<?php echo $posts[$k]['permalink']; ?>"><img src="<?php echo $posts[$k]['media_url']; ?>" height="400" weight="400" alt="Image not available" style="border:1px solid black" /></a></center>  
                        <p><?php if (!empty($posts[$k]["caption"])) {
                                                    echo $posts[$k]["caption"];
                                                } ?></p>
                        <p><strong>Post Date </strong><?php echo $postDate; ?></p> 
                        </div>
                    </div>   
                    </div>
                </div> 
                </div>
            <?php
            } ?>

            <?php 
            /**
             * If media type is Video
             */
            if ($posts[$k]["media_type"] == 'VIDEO') {
            ?>
                <!-- main body --> 
                <div class="container">   
                <div class="row">   
                    <div class="col-md-12 mb-30">     
                    <div class="card card-statistics h-100"> 
                        <div class="card-body">    
                        <center>
                        <div class="carousel-item" controls>
                            <video height="400" weight="400" controls>
                                <source src="<?php echo $posts[$k]['media_url']; ?>" type="video/mp4">
                            </video>
                        </div>
                        </center>  
                        <p><?php if (!empty($posts[$k]["caption"])) {
                                                    echo $posts[$k]["caption"];
                                                } ?></p>
                        <p><strong>Post Date </strong><?php echo $postDate; ?></p> 
                        </div>
                    </div>   
                    </div>
                </div> 
                </div>
            <?php
            } ?>

            <?php 
            /**
             * If media type is carousel
             */
            if ($posts[$k]["media_type"] == 'CAROUSEL_ALBUM') 
            {
            ?>
                <!-- main body --> 
                <div class="container">   
                <div class="row">   
                    <div class="col-md-12 mb-30">     
                    <div class="card card-statistics h-100"> 
                        <div class="card-body">    
                        <center>
                        <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
                            <ol class="carousel-indicators">
                           <?php for ($i = 0; $i < count((array)$posts[$k]['children']->data); $i++) { ?>
                                <li data-target="#carouselExampleControls" data-slide-to="<?php echo $i;?>" <?php echo $i==0?'class="active"':''; ?>></li>
                                <?php } ?>
                            </ol>
                            
                            <div class="carousel-inner">
                                <?php
                                for ($i = 0; $i < count((array)$posts[$k]['children']->data); $i++) {
                                    if ($posts[$k]['children']->data[$i]->media_type == "IMAGE") {
                                ?>
                                        <div class="carousel-item <?PHP echo $i == 0 ? 'active' : ''; ?>">
                                            <img src="<?php echo  $posts[$k]['children']->data[$i]->media_url; ?>" " height=" 400" weight="400" alt="Image not available" />
                                        </div><?php
                                            }

                                            if ($posts[$k]['children']->data[$i]->media_type == "VIDEO") {
                                                ?>
                                        <div class="carousel-item <?PHP echo $i == 0 ? 'active' : ''; ?>" controls>
                                            <video height="400" weight="400" controls>
                                                <source src="<?php echo $posts[$k]['children']->data[$i]->media_url; ?>" type="video/mp4">
                                            </video>
                                        </div>
                                <?php
                                            }
                                        }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        </center>  
                        <p><?php if (!empty($posts[$k]["caption"])) {
                                                    echo $posts[$k]["caption"];
                                                } ?></p>
                        <p><strong>Post Date </strong><?php echo $postDate; ?></p> 
                        </div>
                    </div>   
                    </div>
                </div> 
                </div>
            <?php 
            } ?>
        
        <?php
            }
        }
        ?>
</div>
 <!--=================================
 wrapper -->
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

<!-- JS for bootstarp corousal -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>