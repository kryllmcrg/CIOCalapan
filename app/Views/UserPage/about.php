<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>CIO Offcial Website</title>
  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <!-- Favicon
================================================== -->
  <link rel="icon" type="assets/image/png" href="<?= base_url('assets/images/cio.png')?>">
  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css')?>">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css')?>">
  <!-- Animation -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/animate-css/animate.css')?>">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick-theme.css')?>">
  <!-- Colorbox -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/colorbox/colorbox.css')?>">
  <!-- Template styles-->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">

</head>
<style>
    .nav {
        color: black;
    }
</style>
<body>
<?php include('include\header.php'); ?>

<div id="banner-area" class="banner-area" style="background-image:url(assets/images/banner/cityhall.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">About</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="home">Home</a></li>
                      <li class="breadcrumb-item"><a href="cio">CIO</a></li>
                      <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
          <h3 class="column-title">Who We Are</h3>
          <p>The Calapan City Information Office serves as the primary communication hub for the local government, disseminating important information to the public. Our mission is to keep citizens informed and engaged in the city's affairs.</p>
          <blockquote><p>Through dedicated service and commitment, we strive to fulfill our responsibilities to the community.</p></blockquote>
          <p>Our team is dedicated to transparency and accessibility, ensuring that residents have access to accurate and timely information. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        </div><!-- Col end -->

        <div class="col-lg-6 mt-5 mt-lg-0">
          
          <div id="page-slider" class="page-slider small-bg">

              <div class="item" style="background-image:url(assets/images/slider-pages/slide-page1.jpg)">
                <div class="container">
                    <div class="box-slider-content">
                      <div class="box-slider-text">
                          <h2 class="box-slide-title">Leadership</h2>
                      </div>    
                    </div>
                </div>
              </div><!-- Item 1 end -->

              <div class="item" style="background-image:url(assets/images/slider-pages/slide-page2.jpg)">
                <div class="container">
                    <div class="box-slider-content">
                      <div class="box-slider-text">
                          <h2 class="box-slide-title">Relationships</h2>
                      </div>    
                    </div>
                </div>
              </div><!-- Item 1 end -->

              <div class="item" style="background-image:url(assets/images/slider-pages/slide-page3.jpg)">
                <div class="container">
                    <div class="box-slider-content">
                      <div class="box-slider-text">
                          <h2 class="box-slide-title">Performance</h2>
                      </div>    
                    </div>
                </div>
              </div><!-- Item 1 end -->
          </div><!-- Page slider end-->          
        

        </div><!-- Col end -->
    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->


<section id="ts-team" class="ts-team">
  <div class="container">
      <div class="row text-center">
          <div class="col-lg-12">
            <h2 class="section-title">Quality Service</h2>
            <h3 class="section-sub-title">Professional Team</h3>
          </div>
      </div><!--/ Title row end -->
  <div class="container">
            <div class="row text-center">
                <!-- Loop through $users array -->
                <?php foreach ($users as $user): ?>
                    <div class="col-lg-4">
                        <div class="ts-team-wrapper">
                            <!-- Team member details -->
                            <div class="team-img-wrapper">
                                <img loading="lazy" class="w-100" src="<?= base_url('/uploads/'.$user['image']) ?>" alt="team-img">
                            </div>
                            <div class="ts-team-content">
                                <h3 class="ts-name"><?= $user['firstname'] ?> <?= $user['lastname'] ?></h3>
                                <div class="team-social-icons">
                                    <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                    <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                                    <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                                </div><!--/ social-icons-->
                            </div>
                        </div><!--/ Team wrapper end -->
                    </div><!-- Col end -->
                <?php endforeach; ?>
            </div><!--/ Row end -->
        </div><!--/ Container end -->
</section>


  <?php include('include\footer.php'); ?>
    <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="<?= base_url('assets/plugins/jQuery/jquery.min.js')?>"></script>
  <!-- Bootstrap jQuery -->
  <script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js')?>"defer></script>
  <!-- Slick Carousel -->
  <script src="<?= base_url('assets/plugins/slick/slick.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/slick/slick-animation.min.js')?>"></script>
  <!-- Color box -->
  <script src="<?= base_url('assets/plugins/colorbox/jquery.colorbox.js')?>"></script>
  <!-- shuffle -->
  <script src="<?= base_url('assets/plugins/shuffle/shuffle.min.js')?>"defer></script>


  <!-- Google Map API Key-->
  <script src="<?= base_url('https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU')?>" defer></script>
  <!-- Google Map Plugin-->
  <script src="<?= base_url('assets/plugins/google-map/map.js')?>"defer></script>

  <!-- Template custom -->
  <script src="<?= base_url('assets/js/script.js')?>"></script>  
  
</body>
</html>

