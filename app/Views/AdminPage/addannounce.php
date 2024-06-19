<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Announcements</title>
    
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/css/style.css')?>">
    <link rel="shortcut icon" href="<?= base_url('assets2/images/ciologo.png')?>" />
    <link href="<?= base_url('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet')?>">
    <link href="<?= base_url('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet')?>">
  </head>
  </head>
  <body>
    <div class="container-scroller">
      <?php include('include\logo.php'); ?>
      <?php include('include\header.php'); ?>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <?php include('include\sidebar.php'); ?>
      
      <!-- MAIN CONTENTS -->
      <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-plus"></i>
            </span> Add Announcements
          </h3>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
              </li>
            </ul>
          </nav>
        </div>

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Announcements</h4>
                <form method="post" action="<?php echo base_url('/addAnnounceSubmit'); ?>" enctype="multipart/form-data" class="forms-sample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                            </div>
                        </div>

                    <!-- Image Upload -->
                    <div class="col-md-12 mb-2">
                        <label for="image" class="image-label">Profile Image <span
                                class="required-sign"></span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                aria-describedby="inputFileAddon" aria-label="Upload">
                        </div>
                    </div>

                    <!-- WYSIWYG Editor -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea class="form-control mySummernote" id="description" name="description" placeholder="Enter description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php include('include\footer.php'); ?>
        </div>
      </div>
    </div>
    <!-- plugins:js -->
    <script src="<?= base_url('assets2/vendors/js/vendor.bundle.base.js')?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js')?>"></script>
    <script src="<?= base_url('assets2/js/jquery.cookie.js" type="text/javascript')?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets2/js/off-canvas.js')?>"></script>
    <script src="<?= base_url('assets2/js/hoverable-collapse.js')?>"></script>
    <script src="<?= base_url('assets2/js/misc.js')?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url('assets2/js/dashboard.js')?>"></script>
    <script src="<?= base_url('assets2/js/todolist.js')?>"></script>
    <!-- End custom js for this page -->

    <script src="<?= base_url('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js')?>"></script>
    <script>
    $(document).ready(function() {
        $(".mySummernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
    </script>

  </body>
</html>