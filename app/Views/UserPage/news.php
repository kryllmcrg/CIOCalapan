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

  <section id="main-container" class="main-container">
      <div class="container">
        <div class="row">

        <div class="col-lg-8 mb-5 mb-lg-0">
        <?php foreach ($articles as $article): ?>
        <div class="post">
            <div class="post-media post-image">
                <img loading="lazy" src="<?= $article['image'] ?>" class="img-fluid" alt="post-image">
            </div>

            <div class="post-body">
                <div class="entry-header">
                    <div class="post-meta">
                        <span class="post-author">
                            <i class="far fa-user"></i><a href="#"> Admin</a>
                        </span>
                        <span class="post-cat">
                            <i class="far fa-folder-open"></i><a href="#"><?= $category_name ?></a>
                        </span>
                        <span class="post-meta-date"><i class="far fa-calendar"></i> <?= date('F j, Y', strtotime($article['created_at'])) ?></span>
                        <span class="post-comment"><i class="far fa-comment"></i> 03 <a href="#" class="comments-link">Comments</a></span>
                    </div>
                    <h2 class="entry-title">
                        <a href="<?= base_url('news/' . $article['news_id']) ?>"><?= $article['title'] ?></a>
                    </h2>
                </div><!-- header end -->

                <div class="entry-content">
                    <p><?= $article['content'] ?></p>
                </div>

                <div class="post-footer">
                    <<a href="<?= site_url('user/news/' . $article['news_id']) ?>">Continue to Read</a>
                </div>
            </div><!-- post-body end -->
        </div><!-- post end -->
        <?php endforeach; ?>

        <nav class="paging" aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
            </ul>
        </nav>
    </div><!-- Content Col end -->

          <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <ul class="arrow nav nav-tabs">
              <li><a href="#">Construction</a></li>
              <li><a href="#">Commercial</a></li>
              <li><a href="#">Building</a></li>
              <li><a href="#">Safety</a></li>
              <li><a href="#">Structure</a></li>
            </ul>
          </div><!-- Categories end -->

          <div class="widget widget-tags">
            <h3 class="widget-title">Tags </h3>

            <ul class="list-unstyled">
              <li><a href="#">Construction</a></li>
              <li><a href="#">Design</a></li>
              <li><a href="#">Project</a></li>
              <li><a href="#">Building</a></li>
              <li><a href="#">Finance</a></li>
              <li><a href="#">Safety</a></li>
              <li><a href="#">Contracting</a></li>
              <li><a href="#">Planning</a></li>
            </ul>
          </div><!-- Tags end -->


        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
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
</body>
</html>