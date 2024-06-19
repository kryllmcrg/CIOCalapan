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
    <link rel="icon" type="assets/image/png" href="<?= base_url('assets/images/cio.png') ?>">
    <!-- CSS
================================================== -->
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

</head>
<body>
<?php include ('include\header.php'); ?>

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-xl-3 col-lg-4">
        <div class="sidebar sidebar-left">
          <div class="widget">
            <h3 class="widget-title">Solutions</h3>
            <ul class="nav service-menu">
              <li><a href="service-single.html">Home Construction</a></li>
              <li class="active"><a href="service-single.html">Building Remodels</a></li>
              <li><a href="#">Interior Design</a></li>
              <li><a href="#">Exterior Design</a></li>
              <li><a href="#">Renovation</a></li>
              <li><a href="#">Safety Management</a></li>
            </ul>
          </div><!-- Widget end -->

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

      <div class="col-xl-8 col-lg-8">
        <div class="content-inner-page">

          <h2 class="column-title mrt-0">Building Remodels</h2>

          <div class="row">
            <div class="col-md-12">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus
                sollicitudin pellentesque et non erat. Maecenas nibh dolor, malesuada et bibendum a, sagittis accumsan
                ipsum. Pellentesque ultrices ultrices sapien.</p>
              <p>Nam scelerisque tristique dolor vitae tincidunt. Aenean quis massa uada mi elementum elementum. , nec
                tincidunt nunc posuere ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla commodo
                iaculis ligula, ac dapibus quam ornare ut. Praesent ac hendrerit sem, et tempus sem</p>
            </div><!-- col end -->
          </div><!-- 1st row end-->

          <div class="gap-40"></div>

          <div id="page-slider" class="page-slider">
            <div class="item">
              <img loading="lazy" class="img-fluid" src="images/projects/project1.jpg" alt="project-slider-image" />
            </div>

            <div class="item">
              <img loading="lazy" class="img-fluid" src="images/projects/project2.jpg" alt="project-slider-image" />
            </div>
          </div><!-- Page slider end -->

          <div class="gap-40"></div>

        </div><!-- Content inner end -->
      </div><!-- Content Col end -->


    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->
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

  <script>
    // Function to dynamically populate the dropdown menu with categories
      document.addEventListener("DOMContentLoaded", function() {
          var dropdownDiv = document.getElementById("news-dropdown");

          // Make an AJAX request to fetch categories
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
              if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                  var categories = JSON.parse(this.responseText);
                  categories.forEach(function(category) {
                      var listItem = document.createElement("li");
                      var link = document.createElement("a");
                      link.setAttribute("href", "#" + category.name.toLowerCase());
                      link.textContent = category.name;
                      listItem.appendChild(link);
                      dropdownDiv.appendChild(listItem);
                  });
              }
          };
          xhr.open("GET", "/getCategories", true); // Use the correct route without controller name
          // Replace '/controller/getCategories' with your actual route
          xhr.send();
      });

</script>
</body>
</html>