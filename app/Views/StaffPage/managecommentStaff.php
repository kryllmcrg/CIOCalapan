<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Comments Staff</title>
    
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="<?= base_url('assets2/css/style.css')?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets2/images/ciologo.png')?>" />
</head>
<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
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
            <?php include('include\header.php'); ?>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php include('include\sidebars.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-comment"></i>
                            </span> Manage Comments Staff
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- TABLE CONTENT -->
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Manage Comments Staff</h4>
                              <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th>News Id</th> -->
                                        <th>Comment</th>
                                        <th>Comment Author</th>
                                        <th>Comment Date</th>
                                        <th>Comment Status</th>`
                                        <!-- <th>User Id</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($commentData as $comment) : ?>
                                        <tr>
                                            <!-- <td><?= $comment['news_id'] ?></td> -->
                                            <td><?= $comment['comment'] ?></td>
                                            <td><?= $comment['comment_author'] ?></td>
                                            <td><?= $comment['comment_date'] ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span id="commentStatus<?= $comment['comment_id']; ?>"><?= $comment['comment_status'] ?></span>
                                                    <div class="dropdown ml-auto">
                                                        <i class="fas fa-ellipsis-h" id="dropdownMenuButton<?= $comment['comment_id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $comment['comment_id']; ?>">
                                                            <a class="dropdown-item" href="#" onclick="updateCommentStatus('<?= $comment['comment_id']; ?>', 'Approved')">Approved</a>
                                                            <a class="dropdown-item" href="#" onclick="updateCommentStatus('<?= $comment['comment_id']; ?>', 'Reject')">Reject</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- <td><?= $comment['user_id'] ?></td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- Show message if no data available -->
                                    <?php if (empty($commentData)) : ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No information available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Table -->
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php include('include\footer.php'); ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- comment status -->

       <!-- container-scroller -->
    <!-- plugins:js -->

    <script>
    function updateCommentStatus(commentId, status) {
        $.ajax({
            url: '<?php echo base_url("commentStatuStaff"); ?>',
            type: 'POST',
            data: {
                comment_id: commentId,
                comment_status: status
            },
            success: function(response) {
                if (response.success) {
                    // Update the status text on success
                    $('#commentStatus' + commentId).text(status);
                    alert("Comment status updated successfully.");
                } else {
                    alert("Failed to update comment status: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", error);
                alert("Failed to update comment status. Please try again.");
            }
        });
    }
</script>


    <script src="<?= base_url('assets2/vendors/js/vendor.bundle.base.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
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
    </body>
</html>
