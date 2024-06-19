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

          <div class="row text-center">
            <div class="col-12">
              <h2 class="section-title">Reaching our Office</h2>
              <h3 class="section-sub-title">Find Our Location</h3>
            </div>
          </div>
          <!--/ Title row end -->

          <div class="row">
            <div class="col-md-4">
              <div class="ts-service-box-bg text-center h-100">
                <span class="ts-service-icon icon-round">
                  <i class="fas fa-map-marker-alt mr-0"></i>
                </span>
                <div class="ts-service-box-content">
                  <h4>Visit Our Office</h4>
                  <p>Guinobatan, Calapan City</p>
                </div>
              </div>
            </div><!-- Col 1 end -->

            <div class="col-md-4">
              <div class="ts-service-box-bg text-center h-100">
                <span class="ts-service-icon icon-round">
                  <i class="fa fa-envelope mr-0"></i>
                </span>
                <div class="ts-service-box-content">
                  <h4>Email Us</h4>
                  <p>calapancio@gmail.com</p>
                </div>
              </div>
            </div><!-- Col 2 end -->

            <div class="col-md-4">
              <div class="ts-service-box-bg text-center h-100">
                <span class="ts-service-icon icon-round">
                  <i class="fa fa-phone-square mr-0"></i>
                </span>
                <div class="ts-service-box-content">
                  <h4>Call Us</h4>
                  <p>(+9) 847-291-4353</p>
                </div>
              </div>
            </div><!-- Col 3 end -->

          </div><!-- 1st row end -->
      <br>
      <br>
      <br>
      <!-- Modal for automatic reply message -->
        <div class="modal fade" id="autoReplyModal" tabindex="-1" role="dialog" aria-labelledby="autoReplyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="autoReplyModalLabel">Automatic Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?= $autoReplyMessage ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
      <div class="col-md-12">
        <h3 class="column-title">We love to hear your suggestions and Comments</h3>
          <form id="contact-form" action="<?= base_url('contact/submitContactForm') ?>" method="post" role="form">
              <div class="error-container"></div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="name">Name</label>
                          <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email" required>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="subject">Subject</label>
                          <input class="form-control form-control-subject" name="subject" id="subject" placeholder="" required>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10" required></textarea>
              </div>
              <div class="text-right"><br>
                  <button class="btn btn-primary solid blank" type="submit">Send Message</button>
              </div>
          </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
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

  <script>
$(document).ready(function() {
    // Check if the URL contains a success parameter
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    // If success parameter is present and true, show the modal
    if (success) {
        $('#autoReplyModal').modal('show');
    }
});

// Example AJAX submission with jQuery
$('#contact-form').submit(function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Serialize the form data
    var formData = $(this).serialize();

    // Send an AJAX request
    $.ajax({
        url: '/contact/submitContactForm',
        type: 'POST',
        data: formData,
        success: function(response) {
            // Redirect to the contact page with success parameter if the submission is successful
            window.location.href = '/contact?success=true';
        },
        error: function() {
            // Handle error
        }
    });
});
</script>

</body>
</html>