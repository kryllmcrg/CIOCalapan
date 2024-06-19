<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Category</title>
    
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    
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

      <!-- Edit Category Modal -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editCategoryForm">
                            <div class="form-group">
                                <label for="editCategoryName">Category Name</label>
                                <input type="text" class="form-control" id="editCategoryName" name="editCategory" required>
                                <input type="hidden" id="editCategoryId" name="category_id"> <!-- Add hidden input for category ID -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateCategory()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="fas fa-list"></i>
                        </span> Manage Category
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Category</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categoryData as $categoryItem): ?>
                                        <tr>
                                            <td><?php echo $categoryItem['category_name']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary edit-category-btn" data-category-id="<?php echo $categoryItem['category_id']; ?>" onclick="editCategory(<?php echo $categoryItem['category_id']; ?>, '<?php echo $categoryItem['category_name']; ?>')">Edit</button>
                                                <button type="button" class="btn btn-sm btn-danger delete-category-btn" data-category-id="<?= $categoryItem['category_id'] ?>" onclick="deleteCategory(<?= $categoryItem['category_id'] ?>)">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
<!-- container-scroller -->

  <!-- plugins:js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets2/vendors/js/vendor.bundle.base.js')?>"></script>
  <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js')?>"></script>
  <script src="<?= base_url('assets2/js/jquery.cookie.js" type="text/javascript')?>"></script>
  <script src="<?= base_url('assets2/js/off-canvas.js')?>"></script>
  <script src="<?= base_url('assets2/js/hoverable-collapse.js')?>"></script>
  <script src="<?= base_url('assets2/js/misc.js')?>"></script>
  <script src="<?= base_url('assets2/js/dashboard.js')?>"></script>
  <script src="<?= base_url('assets2/js/todolist.js')?>"></script>

  <script>
function deleteCategory(categoryId) {
    $.ajax({
        url: '<?= base_url('deleteCategoryStaff') ?>',
        method: 'POST',
        dataType: 'json',
        data: { category_id: categoryId },
        success: function(response) {
            console.log(response); // Log the response for debugging
            if(response.success) {
                alert(response.message);
                location.reload(); // Reload the page
            } else {
                alert('Failed to delete category: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred: ' + xhr.responseText); // Display error
        }
    });
}
</script>


<script>
function editCategory(categoryId, categoryName) {
    $('#editCategoryId').val(categoryId); // Set category ID in hidden input
    $('#editCategoryName').val(categoryName); // Set category name in input field
    $('#editCategoryModal').modal('show'); // Open the modal
}

function updateCategory() {
    var categoryId = $('#editCategoryId').val(); // Get category ID
    var newCategoryName = $('#editCategoryName').val(); // Get updated category name
    
    $.ajax({
        url: '/changecategoryStaff',
        method: 'POST',
        dataType: 'json',
        data: { category_id: categoryId, editCategory: newCategoryName }, // Send category ID and updated name
        success: function(response) {
            if(response.success) {
                // If update is successful, show success message, close modal, and reload the page
                alert(response.message);
                $('#editCategoryModal').modal('hide'); // Close the modal
                location.reload(); // Reload the page to reflect changes
            } else {
                alert('Failed to update category');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
</script>

</body>
</html>
