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
  max-width: 80%;
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
  justify-content: start;
  margin: 5px 0 10px 0;
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
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.testimonial-item .date {
  font-size: 0.85em;
  color: #888;
  float: right;
}

.star-rating {
  display: flex;
  margin: 5px 0;
  color: #9733;
}

.testimonial-item p {
  margin: 5px 0;
  color: #333;
  font-size: 15px;
  font-style: italic;
}
#pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px; /* Add some padding for better spacing */
    background-color: #f8f8f8; /* Light background color */
    border-radius: 5px; /* Rounded corners */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

button {
    padding: 10px 15px; /* Add padding for better button size */
    margin: 0 10px;
    font-size: 16px; /* Increase font size */
    color: #fff; /* Text color */
    background-color: #007bff; /* Bootstrap primary blue */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners for buttons */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s; /* Smooth transition */
}

button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

button:disabled {
    background-color: #ccc; /* Grey background for disabled buttons */
    cursor: not-allowed; /* Not allowed cursor for disabled buttons */
    color: #666; /* Darker text for disabled buttons */
}

#page-info {
    font-size: 16px; /* Consistent font size */
    color: #333; /* Darker text color for contrast */
    margin: 0 10px; /* Add margin for spacing */
}
</style>

</head>
<body>

  <?php include('include/header.php'); ?>
  <section class="testimonial-section">
  <h2>User Testimonials</h2>

  <div class="row">
  <div class="col-md-10">
    <ul class="list-group mt-3 rounded-0 d-flex flex-row">
      <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
        5 Star
        <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?= $ratingCounts['5'] ?? 0 ?></span>
      </li>
      <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
        4 Star
        <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?= $ratingCounts['4'] ?? 0 ?></span>
      </li>
      <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
        3 Star
        <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?= $ratingCounts['3'] ?? 0 ?></span>
      </li>
      <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
        2 Star
        <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?= $ratingCounts['2'] ?? 0 ?></span>
      </li>
      <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
        1 Star
        <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?= $ratingCounts['1'] ?? 0 ?></span>
      </li>
    </ul>
  </div>
</div>

  <div class="comment-form">
    <?php if (session()->has('success')): ?>
      <div class="alert alert-success"><?= session('success') ?></div>
    <?php elseif (session()->has('errors')): ?>
      <div class="alert alert-danger">
        <?php foreach (session('errors') as $error): ?>
          <p><?= esc($error) ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('/testimonial/add') ?>" method="post">
      <?= csrf_field() ?>
      <input type="text" name="full_name" placeholder="Your Name" required>
      
      <textarea name="comment" rows="4" placeholder="Your Testimonial" required></textarea>
      
      <div class="star-rating">
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <label>
            <input type="radio" name="rating" value="<?= $i ?>" required>
            <span class="star">&#9733;</span>
          </label>
        <?php endfor; ?>
      </div>
      
      <input type="hidden" name="user_id" value="<?= esc(session('user_id')) ?>"> <!-- Dynamic user ID -->

      <button type="submit">Submit Testimonial</button>
    </form>
  </div>

  <!-- Displaying Comments -->
  <ul class="testimonial-display" id="testimonialDisplay">
    <?php foreach ($testimonials as $testimonial): ?>
      <li class="testimonial-item">
        <h4>
          <?= esc($testimonial['full_name']) ?>
          <span class="date"><?= date('n/j/Y', strtotime($testimonial['date_created'])) ?></span>
        </h4>
        <div class="star-rating"><?= str_repeat('&#9733;', $testimonial['rating']) . str_repeat('&#9734;', 5 - $testimonial['rating']) ?></div>
        <p><?= esc($testimonial['comment']) ?></p>
      </li>
    <?php endforeach; ?>
  </ul>
  
  <div id="pagination">
    <button id="prev" onclick="changePage(-1)" <?= $currentPage === 1 ? 'disabled' : '' ?>>Previous</button>
    <span id="page-info">Page <?= $currentPage ?> of <?= ceil($totalTestimonials / $itemsPerPage) ?></span>
    <button id="next" onclick="changePage(1)" <?= $currentPage === ceil($totalTestimonials / $itemsPerPage) ? 'disabled' : '' ?>>Next</button>
</div>

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

  <script>
    const itemsPerPage = 5; // Number of items per page
let currentPage = 1; // Current page number
const items = [/* Your array of items goes here */];

function displayItems() {
    const contentDiv = document.getElementById("content");
    contentDiv.innerHTML = ""; // Clear previous items

    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const itemsToDisplay = items.slice(startIndex, endIndex);

    itemsToDisplay.forEach(item => {
        const itemDiv = document.createElement("div");
        itemDiv.textContent = item; // Or however you want to display the item
        contentDiv.appendChild(itemDiv);
    });

    // Update page info
    document.getElementById("page-info").textContent = `Page ${currentPage} of ${Math.ceil(items.length / itemsPerPage)}`;
    
    // Disable buttons if at the ends
    document.getElementById("prev").disabled = currentPage === 1;
    document.getElementById("next").disabled = currentPage === Math.ceil(items.length / itemsPerPage);
}

function changePage(direction) {
    currentPage += direction;
    displayItems();
}

// Initial display
displayItems();

  </script>

</body>
</html>