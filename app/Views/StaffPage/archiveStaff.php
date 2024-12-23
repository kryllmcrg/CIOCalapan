<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Archive</title>
    
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="<?= base_url('assets2/css/style.css')?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets2/images/ciologo.png')?>" />
    <style>
      <style>
          .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }
    .page-item {
        margin: 0 5px;
    }
    .page-link {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b66dff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-weight: bold;
    }
    .page-link:hover {
        z-index: 2;
        color: #8c4fd9;
        background-color: #f1f1f1;
        border-color: #dee2e6;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    }
    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #b66dff;
        border-color: #b66dff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
    </style>
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <!-- Larger Logo -->
          <a class="navbar-brand brand-logo" href="dashboard">
          <img src="<?= base_url('assets2/images/ciologo.png')?>" alt="logo" style="width: 70px; height: auto;">
          </a>

          <!-- Smaller Logo for Mini View -->
          <a class="navbar-brand brand-logo-mini" href="dashboard">
          <img src="<?= base_url('assets2/images/ciologo.png')?>" alt="logo" style="width: 70px; height: auto;">
          </a>
      </div>
      <?php include('include/header.php'); ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <div class="container-fluid page-body-wrapper">
        <?php include('include/sidebars.php'); ?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="fas fa-archive"></i>
              </span> Archive Staff
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Archive Table</h4>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Publication Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($newsData as $newsItem): ?>
                                        <tr>
                                            <td><?php echo $newsItem['title']; ?></td>
                                            <td><?php echo $newsItem['author']; ?></td>
                                            <td><?php echo $newsItem['created_at']; ?></td>
                                            <td><?php echo $newsItem['updated_at']; ?></td>
                                            <td><?php echo $newsItem['publication_date']; ?></td>
                                            <td> <!-- Actions column -->
                                                <a href="<?php echo base_url('/restoreNews/'.$newsItem['news_id']); ?>" class="btn btn-sm btn-success restore-news-btn">Restore</a>
                                                <a href="<?php echo base_url('/newsDelete/'.$newsItem['news_id']); ?>" class="btn btn-sm btn-danger delete-news-btn">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <!-- Previous Page Link -->
                                            <?php if ($pager->getPreviousPageURI() !== null) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?= $pager->getPreviousPageURI() ?>" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <!-- Page Numbers -->
                                            <?php foreach ($pager->getPageCount() > 1 ? range(1, $pager->getPageCount()) : [] as $page) : ?>
                                                <li class="page-item <?= $page == $pager->getCurrentPage() ? 'active' : '' ?>">
                                                    <a class="page-link" href="<?= $pager->getPageURI($page) ?>">
                                                        <?= $page ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>

                                            <!-- Next Page Link -->
                                            <?php if ($pager->getNextPageURI() !== null) : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?= $pager->getNextPageURI() ?>" aria-label="Next">
                                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                  </div>
                </div>
                </div>
            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include('include/footer.php'); ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="<?= base_url('assets2/vendors/js/vendor.bundle.base.js')?>"></script>
    <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js')?>"></script>
    <script src="<?= base_url('assets2/js/jquery.cookie.js" type="text/javascript')?>"></script>
    <script src="<?= base_url('assets2/js/off-canvas.js')?>"></script>
    <script src="<?= base_url('assets2/js/hoverable-collapse.js')?>"></script>
    <script src="<?= base_url('assets2/js/misc.js')?>"></script>
    <script src="<?= base_url('assets2/js/dashboard.js')?>"></script>
    <script src="<?= base_url('assets2/js/todolist.js')?>"></script>
  </body>
</html>