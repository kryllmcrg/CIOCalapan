<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News</title>
    
    <link rel="stylesheet" href="<?= base_url('assets/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/css/style.css')?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/ciologo.png')?>" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  </head>
  <body>
  <div class="container-scroller">
      <?php include('include\logo.php'); ?>
      <?php include('include\header.php'); ?>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <?php include('include\sidebars.php'); ?>
      
      <!-- MAIN CONTENTS -->
      <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-plus"></i>
            </span> Create News
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
                <h4 class="card-title">Create News</h4>
                <form method="post" action="<?= base_url('/createNewsSubmit'); ?>" enctype="multipart/form-data" class="forms-sample" id="newsForm">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter news title">
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="author">Author</label>
                                  <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name">
                              </div>
                          </div>

                          <div class="col-md-6">
                              <label for="category">Category</label>
                              <select class="form-control" id="categories" name="categories">
                                  <option value="">Select News Category</option>
                                  <?php foreach ($categories as $category): ?>
                                  <option value="<?= $category['category_id']; ?>">
                                      <?= $category['category_name']; ?>
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
                                  <textarea class="form-control" id="mySummernote" name="content" placeholder="Enter news content"></textarea>
                              </div>
                          </div>
                      </div>

                      <!-- Hidden staff_id field -->
                      <input type="hidden" name="staff_id" value="<?= session()->get('staff_id'); ?>">

                      <div class="row">
                          <div class="col-md-12">
                              <div class="mt-3">
                                  <button id="btn-submit" type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
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

    <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
    <script src="<?= base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.cookie.js" type="text/javascript')?>"></script>
    <script src="<?= base_url('assets/js/off-canvas.js')?>"></script>
    <script src="<?= base_url('assets/js/hoverable-collapse.js')?>"></script>
    <script src="<?= base_url('assets/js/misc.js')?>"></script>
    <script src="<?= base_url('assets/js/dashboard.js')?>"></script>
    <script src="<?= base_url('assets/js/todolist.js')?>"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".mySummernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
    </script>

<script>
    const form = document.querySelector('#newsForm');
    var formData = new FormData();
    var selectedCategory;

    $(document).ready(function() {
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
                onImageUpload: function(files, editor, welEditable) {
                    for (var i = 0; i < files.length; i++) {
                        formData.append('files[]', files[i]);
                    }

                    var imagesArray = [];
                    for (var i = 0; i < files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
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

    $('#btn-submit').click(function(e) {
        e.preventDefault();
        formData.append('title', $('#title').val());
        formData.append('author', $('#author').val());
        formData.append('category_id', selectedCategory);
        formData.append('content', $('#mySummernote').summernote('code'));
        formData.append('comment', $('#comment').val());
        $.ajax({
            url: '<?= base_url('createNewsSubmit')?>',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                // Handle response from the server
                location.reload();
            }
        });
    });
</script>

  </body>
</html>