<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CIO Official Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/cio.png')?>">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <style>
    .nav { color: black; }
  </style>
</head>
<body>
  <?php include('include/header.php'); ?>

  <div id="banner-area" class="banner-area" style="background-image:url(assets/images/banner/cityhall2.png)">
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
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <section id="ts-team" class="ts-team">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">
          <h2 class="section-title">Quality Service</h2>
          <h3 class="section-sub-title">Professional Team</h3>
        </div>
      </div>

      <div class="row text-center">
        <!-- Team Members -->
        <?php 
        $teamMembers = [
          ["name" => "Evaro R. Venturina"],
          ["name" => "Kate R. Redublo"],
          ["name" => "Roy E. Dilidili"],
          ["name" => "Edward R. Paringit"],
          ["name" => "Louie C. Abis"],
          ["name" => "Cedric Errol A. De Guzman"],
          ["name" => "Jefferson Cusi"],
          ["name" => "Ronniel Jan C. Garcia"],
          ["name" => "Rey Emmanuel M. Bernat"]
        ];

        foreach ($teamMembers as $member): ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="ts-team-wrapper">
            <div class="team-img-wrapper">
              <img loading="lazy" class="w-100" src="assets/images/profile.png" alt="team-img">
            </div>
            <div class="ts-team-content">
              <h3 class="ts-name"><?= $member['name'] ?></h3>
              <div class="team-social-icons">
                <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                <a target="_blank" href="#"><i class="fab fa-google-plus-g"></i></a>
                <a target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include('include/footer.php'); ?>

  <!-- JS -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/fontawesome/js/all.min.js')?>"></script>
</body>
</html>
