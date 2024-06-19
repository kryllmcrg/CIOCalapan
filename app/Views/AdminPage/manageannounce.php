<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Announcements</title>
    
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
            <!-- partial:partials/_sidebar.html -->
            <div class="container-fluid page-body-wrapper">
            <?php include('include\sidebar.php'); ?>
            
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="fas fa-bullhorn"></i>
                        </span> Manage Announcements
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Announcements</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Images</th>
                                                    <th>Created</th>
                                                    <th>Updated</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($announceData as $announceItem): ?>
                                                    <tr>
                                                        <td><?php echo $announceItem['title']; ?></td>
                                                        <td><?php echo $announceItem['description']; ?></td>
                                                        <td>
                                                            <?php 
                                                            $images = explode(',', $announceItem['images']);
                                                            foreach ($images as $image): ?>
                                                                <img src="<?php echo base_url('public/uploads/' . $image); ?>" alt="Image">
                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td><?php echo $announceItem['created_at']; ?></td>
                                                        <td><?php echo $announceItem['updated_at']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#announcementModal<?php echo $announceItem['id_announce']; ?>">
                                                                <i class="fas fa-eye"></i> View
                                                            </button>  
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                
                <!-- partial -->
            </div>
            <?php include('include\footer.php'); ?>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

   <!-- Modal for Edit -->
    <div class="modal fade" id="editAnnounceModal" tabindex="-1" aria-labelledby="editAnnounceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAnnounceModalLabel">Edit Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAnnounceForm">
                        <div class="mb-3">
                            <label for="editTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="editTitle" name="editTitle" placeholder="Enter title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" name="editDescription" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editNewsImages">Images</label>
                            <input type="file" class="form-control-file" id="editImages" name="editImages[]" multiple>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-announce-btn').forEach(item => {
            item.addEventListener('click', event => {
                const announceId = event.currentTarget.dataset.announceId;
                console.log('Edit button clicked for announcement ID:', announceId);
                
                // Show the modal
                $('#editAnnounceModal').modal('show');
            });
        });

        // Event handler for Close button
        document.querySelector('#editAnnounceModal .btn-secondary').addEventListener('click', function() {
            $('#editAnnounceModal').modal('hide');
        });

        // Event handler for Save changes button
        document.querySelector('#editAnnounceModal .btn-primary').addEventListener('click', function() {
            // Perform actions when Save changes button is clicked
            console.log('Save changes button clicked');

            // Close the modal
            $('#editAnnounceModal').modal('hide');
        });

        document.querySelectorAll('.delete-announce-btn').forEach(item => {
            item.addEventListener('click', event => {
                // Fetch announce item data based on announce ID
                const announceId = event.currentTarget.dataset.announceId;
                console.log('Delete button clicked for announcement ID:', announceId);
                
                // Show alert
                if (confirm('Are you sure you want to delete this announcement item?')) {
                    // Here you can proceed with actual deletion logic if needed
                }
            });
        });
    </script>

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
