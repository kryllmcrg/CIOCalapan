<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News History</title>

    <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets2/css/style.css')?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url('assets2/images/ciologo.png')?>" />

    <style>
        /* Pagination Styling */
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
            display: block;
            color: #007bff;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #dee2e6;
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }
        .page-link:hover {
            z-index: 2;
            color: #0056b3;
            text-decoration: none;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: auto;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0"></div>
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
        <?php include('include/sidebar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="fas fa-archive"></i>
                        </span> News History
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
                                <h4 class="card-title">News Audit Table</h4>

                                <!-- Display audit trail data -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Action</th>
                                            <th>Action Description</th>
                                            <th>Timestamp</th>
                                            <th>Remarks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($auditTrailData as $auditItem): ?>
                                            <tr>
                                                <td><?php echo $auditItem['user_id']; ?></td>
                                                <td><?php echo $auditItem['action']; ?></td>
                                                <td><?php echo $auditItem['action_description']; ?></td>
                                                <td><?php echo $auditItem['timestamp']; ?></td>
                                                <td><?php echo $auditItem['remarks']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Add pagination links -->
                                <div class="d-flex justify-content-center mt-4">
                                    <?= $pager->links() ?>
                                </div>
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
