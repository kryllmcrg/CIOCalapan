<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Profile</title>
    
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
                  <i class="fas fa-user"></i>
              </span> Manage Profile
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            
              <div class="mb-4"></div>

            <!-- Modal for Editing User Details -->
              <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form id="editUserForm" action="<?= base_url('update') ?>" method="post" enctype="multipart/form-data">
                              <!-- Hidden input field for user_id -->
                              <input type="hidden" name="user_id" id="editUserId">
                              
                              <!-- First column -->
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="mb-3">
                                          <label for="editStaffId" class="form-label">Staff ID</label>
                                          <input type="text" class="form-control" id="editStaffId" name="staff_id">
                                      </div>
                                      <div class="mb-3">
                                          <label for="editFirstName" class="form-label">First Name</label>
                                          <input type="text" class="form-control" id="editFirstName" name="firstname">
                                      </div>
                                      <div class="mb-3">
                                          <label for="editLastName" class="form-label">Last Name</label>
                                          <input type="text" class="form-control" id="editLastName" name="lastname">
                                      </div>
                                      <div class="mb-3">
                                          <label for="editAddress" class="form-label">Address</label>
                                          <input type="text" class="form-control" id="editAddress" name="address">
                                      </div>
                                      <div class="mb-3">
                                          <label for="editEmail" class="form-label">Email</label>
                                          <input type="email" class="form-control" id="editEmail" name="email">
                                      </div>
                                  </div>
                                  <!-- Second column -->
                                  <div class="col-md-6">
                                      <div class="mb-3">
                                          <label for="editContact" class="form-label">Contact Number</label>
                                          <input type="text" class="form-control" id="editContact" name="contact_number">
                                      </div>
                                      <div class="mb-3">
                                          <label for="editRole" class="form-label">Role</label>
                                          <select class="form-select" id="editRole" name="role">
                                              <option value="Admin">Admin</option>
                                              <option value="Staff">Staff</option>
                                              <!-- Add more options if needed -->
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                          <label for="editGender" class="form-label">Gender</label>
                                          <select class="form-select" id="editGender" name="gender">
                                              <option value="Male">Male</option>
                                              <option value="Female">Female</option>
                                              <!-- Add more options if needed -->
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <!-- Image upload with preview -->
                              <div class="mb-3">
                                  <label for="editImage" class="form-label">Image</label>
                                  <input type="file" class="form-control" id="editImage" name="editImage" accept="image/*">
                                  <img id="imagePreview" src="" alt="Current Image" class="img-thumbnail mt-3" style="display: none; max-width: 100%; height: auto;">
                              </div>
                          </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" form="editUserForm" class="btn btn-primary">Save changes</button>
                          </div>
                      </div>
                  </div>
              </div>
                  <!-- Table -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Staff Information</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Staff Id</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Image</th>
                      <th>Role</th>
                      <th>Gender</th>
                      <th>Log Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($userData as $user) : ?>
                      <tr>
                        <td><?= $user['staff_id'] ?></td>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['contact_number'] ?></td>
                        <td><img src="<?= base_url('uploads/' . $user['image']) ?>" alt="User Image" width="50"></td>
                        <td><?= $user['role'] ?></td>
                        <td><?= $user['gender'] ?></td>
                        <td><?= $user['log_status'] ?></td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm editBtn" data-bs-toggle="modal" data-bs-target="#editUserModal" 
                                  data-userid="<?= $user['user_id'] ?>" data-staffid="<?= $user['staff_id'] ?>" 
                                  data-firstname="<?= $user['firstname'] ?>" data-lastname="<?= $user['lastname'] ?>" 
                                  data-address="<?= $user['address'] ?>" data-email="<?= $user['email'] ?>" 
                                  data-contact="<?= $user['contact_number'] ?>" data-role="<?= $user['role'] ?>" 
                                  data-gender="<?= $user['gender'] ?>" data-image="<?= $user['image'] ?>" data-logstatus="<?= $user['log_status'] ?>">Edit
                          </button>

                          <form action="<?= base_url('deleted') ?>" method="post" style="display: inline;">
                              <?= csrf_field() ?>
                              <input type="hidden" name="id" value="<?= $user['user_id']?>">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this staff?')">Delete</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    <!-- Show message if no data available -->
                    <?php if (empty($userData)) : ?>
                      <tr>
                        <td colspan="12" class="text-center">No information available</td>
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
</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php include('include/footer.php'); ?>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- Add this JavaScript code after your modal HTML -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const imageInput = document.getElementById("editImage");
        const imagePreview = document.getElementById("imagePreview");

        // Event listener for image preview when a new file is chosen
        imageInput.addEventListener("change", function (event) {
            const [file] = event.target.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });

        // Event listener for setting user data in the modal on "Edit" button click
        document.querySelectorAll(".editBtn").forEach(button => {
            button.addEventListener("click", function () {
                // Populate the form fields with user data
                document.getElementById("editUserId").value = this.getAttribute("data-userid");
                document.getElementById("editStaffId").value = this.getAttribute("data-staffid");
                document.getElementById("editFirstName").value = this.getAttribute("data-firstname");
                document.getElementById("editLastName").value = this.getAttribute("data-lastname");
                document.getElementById("editAddress").value = this.getAttribute("data-address");
                document.getElementById("editEmail").value = this.getAttribute("data-email");
                document.getElementById("editContact").value = this.getAttribute("data-contact");
                document.getElementById("editRole").value = this.getAttribute("data-role");
                document.getElementById("editGender").value = this.getAttribute("data-gender");

                // Set the current image preview
                const currentImage = this.getAttribute("data-image");
                if (currentImage) {
                    imagePreview.src = "<?= base_url('uploads') ?>" + "/" + currentImage;
                    imagePreview.style.display = "block";
                } else {
                    imagePreview.style.display = "none";
                }
            });
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
