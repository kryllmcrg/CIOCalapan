<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>CIO Official Website</title>
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <!-- Favicon
  ================================================== -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/cio.png')?>">
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

  <style>
/* Testimonial Section Styles */
.testimonial-section {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  font-family: 'Arial', sans-serif;
}

.testimonial-section h2 {
  text-align: center;
  color: #a86add;
  margin-bottom: 30px;
  font-size: 28px;
  font-weight: 700;
}

.comment-form {
  margin-bottom: 30px;
  border: 1px solid #e5e5e5;
  border-radius: 8px;
  padding: 20px;
  background-color: #f9f9f9;
}

.comment-form input,
.comment-form textarea {
  width: 100%;
  padding: 15px;
  margin: 10px 0;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  transition: border-color 0.3s;
}

.comment-form input:focus,
.comment-form textarea:focus {
  border-color: #a86add;
  outline: none;
}

.comment-form button {
  width: 100%;
  padding: 15px;
  background-color: #a86add;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.3s, transform 0.3s;
}

.comment-form button:hover {
  background-color: #8f57b0;
  transform: translateY(-2px);
}

/* Star Rating Styles */
.star-rating {
  display: flex;
  justify-content: center;
  margin: 10px 0;
}

.star {
  font-size: 24px;
  color: #ddd;
  cursor: pointer;
  transition: color 0.3s;
}

.star:hover,
.star.selected {
  color: #a86add;
}

/* Testimonials Display Styling */
.testimonial-display {
  list-style: none;
  padding: 0;
}

.testimonial-item {
  background: #f9f9f9;
  padding: 15px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  margin-bottom: 15px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.testimonial-item:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.testimonial-item h4 {
  margin: 0;
  font-weight: bold;
  color: #555;
  font-size: 18px;
}

.testimonial-item p {
  margin: 5px 0;
  color: #333;
  font-size: 15px;
}

.testimonial-item .date {
  font-size: 0.85em;
  color: #888;
  text-align: right;
}
</style>

</head>
<body>

  <?php include('include/header.php'); ?>

  <section class="testimonial-section">
  <h2>User Testimonials</h2>

  <!-- Comment Form -->
  <div class="comment-form">
    <input type="text" id="name" placeholder="Your Name" required>
    
    <textarea id="comment" rows="4" placeholder="Your Testimonial" required></textarea>
    
    <div class="star-rating" id="starRating">
      <span class="star" data-value="1">&#9733;</span>
      <span class="star" data-value="2">&#9733;</span>
      <span class="star" data-value="3">&#9733;</span>
      <span class="star" data-value="4">&#9733;</span>
      <span class="star" data-value="5">&#9733;</span>
    </div>
    
    <button onclick="submitComment()">Submit Testimonial</button>
  </div>

  <!-- Displaying Comments -->
  <ul class="testimonial-display" id="testimonialDisplay">
    <!-- New testimonials will appear here -->
  </ul>
</section>

  <?php include('include/footer.php'); ?>

  <!-- Javascript Files
  ================================================== -->
  <!-- initialize jQuery Library -->
  <script src="<?= base_url('assets/plugins/jQuery/jquery.min.js')?>"></script>
  <!-- Bootstrap jQuery -->
  <script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js')?>" defer></script>
  <!-- Slick Carousel -->
  <script src="<?= base_url('assets/plugins/slick/slick.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/slick/slick-animation.min.js')?>"></script>
  <!-- Color box -->
  <script src="<?= base_url('assets/plugins/colorbox/jquery.colorbox.js')?>"></script>
  <!-- shuffle -->
  <script src="<?= base_url('assets/plugins/shuffle/shuffle.min.js')?>" defer></script>

  <!-- Google Map API Key-->
  <script src="<?= base_url('https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU')?>" defer></script>
  <!-- Google Map Plugin-->
  <script src="<?= base_url('assets/plugins/google-map/map.js')?>" defer></script>

  <!-- Template custom -->
  <script src="<?= base_url('assets/js/script.js')?>"></script>  

  <script>
    // JavaScript for Star Rating
const stars = document.querySelectorAll('.star');
let selectedRating = 0;

stars.forEach(star => {
  star.addEventListener('click', () => {
    selectedRating = star.getAttribute('data-value');
    updateStars();
  });
});

function updateStars() {
  stars.forEach(star => {
    if (star.getAttribute('data-value') <= selectedRating) {
      star.classList.add('selected');
    } else {
      star.classList.remove('selected');
    }
  });
}

function submitComment() {
  const name = document.getElementById('name').value;
  const comment = document.getElementById('comment').value;

  if (name && comment) {
    const testimonialDisplay = document.getElementById('testimonialDisplay');
    const newTestimonial = document.createElement('li');
    newTestimonial.className = 'testimonial-item';
    
    newTestimonial.innerHTML = `
      <h4>${name} <span class="date">${new Date().toLocaleDateString()}</span></h4>
      <div class="star-rating">${generateStars(selectedRating)}</div>
      <p>${comment}</p>
    `;
    
    testimonialDisplay.appendChild(newTestimonial);
    
    // Reset form
    document.getElementById('name').value = '';
    document.getElementById('comment').value = '';
    selectedRating = 0;
    updateStars();
  } else {
    alert('Please fill in all fields.');
  }
}

function generateStars(rating) {
  let starsHtml = '';
  for (let i = 1; i <= 5; i++) {
    starsHtml += i <= rating ? '&#9733;' : '&#9734;'; // Filled and empty stars
  }
  return starsHtml;
}
  </script>

</body>
</html>
t