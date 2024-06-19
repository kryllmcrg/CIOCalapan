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

    .profile-image {
        width: 20px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
        border-radius: 50%; /* To make the image circular if desired */
    }
    .social-link {
    margin-right: 20px; /* Adjust the spacing as needed */
}
.social-link {
    margin-left: 10px; /* Adjust the spacing as needed */
}
</style>
<body>
<div class="body-inner">

<div id="top-bar" class="top-bar">
    <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="top-info text-center text-md-left">
                <li><i class="fas fa-map-marker-alt"></i> <p class="info-text">Calapan City Information Office, Philippines</p>
                </li>
            </ul>
          </div>
          <!--/ Top info end -->

          <div class="nav-profile-img">
              <a title="Facebook" href="https://www.facebook.com/MayorMalouFloresMorillo" class="social-link">
                  <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
              </a>
              <a title="Twitter" href="" class="social-link">
                  <span class="social-icon"><i class="fab fa-twitter"></i></span>
              </a>
              <a title="Instagram" href="" class="social-link">
                  <span class="social-icon"><i class="fab fa-instagram"></i></span>
              </a>
              <a title="Logout" href="/logout" class="social-link">
                  <span class="social-icon"><i class="fas fa-sign-out-alt"></i></span>
              </a>
          </div>
          <div class="nav-profile-img">
              <img class="profile-image" src="/uploads/<?= session()->get('image') ?>" alt="image">
              <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
              <p class="mb-1 text-black"><?= session()->get('fullname') ?></p>
          </div>

          <!--/ Top social end -->
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</div>
<!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="index.html">
                <img loading="lazy" src="<?= base_url('assets/images/logo.png') ?>" alt="Constra">
                </a>
            </div><!-- logo end -->
  
            <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">Call Us</p>
                          <p class="info-box-subtitle">+63 9998345241</p> <!--di ko pa knows-->
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">Email Us</p>
                          <p class="info-box-subtitle">calapancio@gmail.com</p><!--di ko pa knows-->
                      </div>
                    </div>
                  </li>
                  <li class="last">
                    <div class="info-box last">
                      <div class="info-box-content">
                          <p class="info-box-title">Global Certificate</p>
                          <p class="info-box-subtitle">ISO 9001:2017</p><!--di ko pa knows-->
                      </div>
                    </div>
                  </li>
                  <li class="header-get-a-quote">
                    <a class="btn btn-primary" href="subscribe">Subscribe</a>
                  </li>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div>
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation"  style="background-color: #e056fd; background-image: linear-gradient(315deg, #e056fd 0%, #000000 74%);">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="/news">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    </ul>
                </div>

              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="nav-search">
            <form action="<?= base_url('search_results') ?>" method="post">
                <input type="text" name="searchQuery" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->
</body>
</html>
