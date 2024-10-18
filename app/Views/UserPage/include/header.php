<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <title>CIO Official Website</title>
  <!-- Mobile Specific Metas -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/cio.png') ?>">
  <!-- CSS -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css') ?>">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css') ?>">
  <!-- Animation -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/animate-css/animate.css') ?>">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick-theme.css') ?>">
  <!-- Colorbox -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/colorbox/colorbox.css') ?>">
  <!-- Template styles-->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

  <style>
    .nav {
      color: black;
    }
    .profile-image {
      width: 20px; 
      height: 20px; 
      border-radius: 50%; 
    }
    .social-link {
      margin-left: 10px; 
      margin-right: 20px; 
    }
    .nav-search {
      display: flex;
      justify-content: flex-end;
      margin-top: -10px;
    }

    .search-input {
      width: 200px; 
      padding: 10px 15px;
      border: 2px solid #ccc;
      border-radius: 30px;
      font-size: 14px;
      outline: none;
      transition: all 0.3s ease;
      margin-left: -200px; 
      height: 40px; 
    }

    .search-input:focus {
      border-color: #e056fd;
      box-shadow: 0 0 5px rgba(224, 86, 253, 0.5);
    }

    .search-button {
      background-color: #e056fd;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 30px;
      cursor: pointer;
      font-size: 16px;
      width: 30px; 
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: -35px;
    }

    .search-button:hover {
      background-color: #9c1abc;
    }

    /* Media query for mobile responsiveness */
    @media (max-width: 768px) {
      .search-input {
        width: 200px; 
        padding: 8px 12px;
        height: 32px; 
      }

      .search-button {
        width: 60px;
        height: 32px; 
        padding: 8px 12px;
        font-size: 14px;
      }
    }

    .nav-item.active .nav-link {
      background-color: #8E8FFA; 
      color: white !important; 
      padding: 10px 20px; 
      border-radius: 5px; 
      margin: 2px 0; 
      font-size: 18px; 
      transition: all 0.3s ease; 
    }
  </style>
</head>
<body>
<div class="body-inner">

<div id="top-bar" class="top-bar">
    <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="top-info text-center text-md-left">
                <li><i class="fas fa-map-marker-alt"></i> <p class="info-text">Calapan City Oriental Mindoro, 5200 Philippines</p></li>
            </ul>
          </div>
          <div class="nav-profile-img">
              <a title="Facebook" href="https://www.facebook.com/TaumbayanAngMasusunod" class="social-link">
                  <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
              </a>
              <a title="Logout" href="/logout" class="social-link">
                  <span class="social-icon"><i class="fas fa-sign-out-alt"></i></span>
              </a>
          </div>
          <div class="nav-profile-img">
              <img class="profile-image" src="/uploads/<?= session()->get('image') ?>" alt="Profile Image">
              <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
              <p class="mb-1 text-black"><?= session()->get('fullname') ?></p>
          </div>
      </div>
    </div>
</div>

<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="/">
                <img loading="lazy" src="<?= base_url('assets/images/logo.png') ?>" alt="CIO Logo">
                </a>
            </div>
  
            <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">Call Us</p>
                          <p class="info-box-subtitle">+63 9998345241</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <p class="info-box-title">Email Us</p>
                          <p class="info-box-subtitle">calapancio@gmail.com</p>
                      </div>
                    </div>
                  </li>
                  <li class="last">
                    <div class="info-box last">
                      <div class="info-box-content">
                          <p class="info-box-title">Global Certificate</p>
                          <p class="info-box-subtitle">ISO 9001:2017</p>
                      </div>
                    </div>
                  </li>
                  <li class="header-get-a-quote">
                    <a class="btn btn-primary" href="/">Get Started</a>
                  </li>
                </ul>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="site-navigation" style="background-color: #e056fd; background-image: linear-gradient(315deg, #e056fd 0%, #000000 74%);">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item <?= ($activePage == 'home') ? 'active' : '' ?>"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item <?= ($activePage == 'about') ? 'active' : '' ?>"><a class="nav-link" href="/about">About</a></li>
                        <li class="nav-item <?= ($activePage == 'contact') ? 'active' : '' ?>"><a class="nav-link" href="/contact">Contact</a></li>
                        <li class="nav-item <?= ($activePage == 'login') ? 'active' : '' ?>"><a class="nav-link" href="/login">Login</a></li>
                    </ul>
                </div>
              </nav>
          </div>
        </div>

        <div class="nav-search">
            <form action="<?= base_url('search_results') ?>" method="get">
                <input type="text" name="searchQuery" class="search-input" placeholder="Search...">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
  </div>
</header>

<script>
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.parentElement.classList.add('active');
        }
    });
</script>

</body>
</html>
