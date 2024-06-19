<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit News</title>
    
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/css/style.css')?>">
    <link rel="shortcut icon" href="<?= base_url('assets2/images/ciologo.png')?>" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
            </span> Edit News
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
                <h4 class="card-title">Edit News</h4>
                <form method="post" action="<?= base_url('/updateNews'); ?>" enctype="multipart/form-data" class="forms-sample" id="newsForm"><input type="hidden" name="news_id" value="<?= $news['news_id'] ?>">
                <div id="alertMessage"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <!-- Populate the input field with the news title -->
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter news title" value="<?= $news['title'] ?? '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="author">Author</label>
                                <!-- Populate the input field with the news author -->
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" value="<?= $news['author'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="category">Category</label>
                            <select class="form-control" id="categories" name="category_id">
                                <option value="">Select News Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['category_id'] ?>" <?= $category['category_id'] == $news['category_id'] ? 'selected' : '' ?>>
                                        <?= $category['category_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- WYSIWYG Editor -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <!-- Populate the textarea with the news content -->
                                <textarea class="form-control" id="mySummernote" name="content" placeholder="Enter news content"><?= $news['content'] ?? '' ?></textarea>
                            </div>
                        </div>
                    </div>

                     <!-- Remarks -->
                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="remarks">Remarks</label>
                                                <textarea class="form-control" id="remarks" name="remarks" placeholder="Enter remarks"></textarea>
                                            </div>
                                        </div>
                                    </div>

                          <div class="row">
                              <div class="col-md-12">
                            <div class="mt-3">
                                <button id="btn-update" type="submit" class="btn btn-gradient-primary mr-2">Update</button>
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

    <script src="<?= base_url('assets2/vendors/js/vendor.bundle.base.js')?>"></script>
    <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js')?>"></script>
    <script src="<?= base_url('assets2/js/jquery.cookie.js" type="text/javascript')?>"></script>
    <script src="<?= base_url('assets2/js/off-canvas.js')?>"></script>
    <script src="<?= base_url('assets2/js/hoverable-collapse.js')?>"></script>
    <script src="<?= base_url('assets2/js/misc.js')?>"></script>
    <script src="<?= base_url('assets2/js/dashboard.js')?>"></script>
    <script src="<?= base_url('assets2/js/todolist.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
    $(document).ready(function() {
        // $(".mySummernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
    </script>

<script>
      const form = document.querySelector('#newsForm');
      var formData = new FormData();
      var selectedCategory;

      $(document).ready(function () {
        $('#categories').change(function () {
          // Get the selected value
          selectedCategory = $(this).val();
          // Log the selected category to the console
          console.log("Selected Category: " + selectedCategory);
        });

        $('#mySummernote').summernote({
        placeholder: 'Enter your content',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
          callbacks: {
            onImageUpload: function (files, editor, welEditable) {
              for (var i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
              }

              var imagesArray = [];
              for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                  var imgData = e.target.result;
                  imagesArray.push(imgData);
                  var imgNode = document.createElement('img');
                  imgNode.src = imgData;
                  $('#mySummernote').summernote('insertNode', imgNode);
                }
                reader.readAsDataURL(files[i]);
              }
              // You can now use the imagesArray to send the images to the database
            }
          }
        });
      });   
      $(document).ready(function () {
        // Your existing code

        // Register click event for the submit button
        $('#btn-submit').on('click', function (e) {
          e.preventDefault();
          formData.append('title', $('#title').val());
          formData.append('author', $('#author').val());
          formData.append('category_id', selectedCategory);
          formData.append('content', $('#mySummernote').summernote('code'));
          formData.append('comment', $('#comment').val());
          formData.append('video', $('#video')[0].files[0]);
          formData.append('remarks', $('#remarks').val());
          $.ajax({
            url: '<?= base_url('updateNews') ?>',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (response) {
              console.log(response);
               // Handle response from the server
               if (response.success) {
                    // Show success message
                    $('#alertMessage').html('<div class="alert alert-success" role="alert">News successfully updated!</div>');
                } else {
                    // Show error message
                    $('#alertMessage').html('<div class="alert alert-danger" role="alert">Failed to update news. Please try again.</div>');
                }
                // Optionally reload the page after a delay
                setTimeout(function() {
                    location.reload();
                }, 2000); // Reload after 2 seconds
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.error('File upload failed:', textStatus, errorThrown);
              console.log('Error details:', jqXHR.responseText);
            }
          });
        });
      });
    </script>
  </body>
</html>