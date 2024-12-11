<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <title>CIO Official Website</title>
  
  <!-- Mobile Specific Metas -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/cio.png') ?>">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/animate-css/animate.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick-theme.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/colorbox/colorbox.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

  <style>
    /* Custom styles for the testimonial section */
    .testimonial-section {
      max-width: 80%;
      margin: 40px auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
    }

    #pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background-color: #f8f8f8;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    button {
      padding: 10px 15px;
      margin: 0 10px;
      font-size: 16px;
      color: #fff;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #0056b3;
    }

    button:disabled {
      background-color: #ccc;
      cursor: not-allowed;
      color: #666;
    }

    #page-info {
      font-size: 16px;
      color: #333;
      margin: 0 10px;
    }
  </style>

</head>
<body>

  <?php include('include/header.php'); ?>
  
  <section class="testimonial-section">
    <h2>User Recommendations</h2>

    <div class="row">
      <div class="col-md-10">
        <ul class="list-group mt-3 rounded-0 d-flex flex-row">
          <?php foreach (['positive', 'neutral', 'negative'] as $sentiment): ?>
            <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
              <?= ucfirst($sentiment) ?>
              <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?= $sentimentCounts[$sentiment] ?? 0 ?></span>
            </li>
          <?php endforeach; ?>
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
        <textarea name="comment" rows="4" placeholder="Your Recommendation" required></textarea>
        
        <input type="hidden" name="user_id" value="<?= esc(session('user_id')) ?>">

        <button type="submit">Submit Recommendation</button>
      </form>
    </div>

    <ul class="testimonial-display" id="testimonialDisplay">
      <?php foreach ($testimonials as $testimonial): ?>
        <li class="testimonial-item">
          <h4>
            <?= esc($testimonial['full_name']) ?>
            <span class="date"><?= date('n/j/Y', strtotime($testimonial['date_created'])) ?></span>
          </h4>
          <p><?= esc($testimonial['comment']) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
    
    <div id="pagination">
      <button id="prev" onclick="changePage(-1)">Previous</button>
      <button id="next" onclick="changePage(1)">Next</button>
    </div>

  </section>

  <?php include('include/footer.php'); ?>

  <script src="<?= base_url('assets/plugins/jQuery/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js')?>" defer></script>
  <script src="<?= base_url('assets/plugins/slick/slick.min.js')?>"></script>
  <script src="<?= base_url('assets/plugins/colorbox/jquery.colorbox.js')?>"></script>
  <script src="<?= base_url('assets/js/script.js')?>"></script>  

  <!--  -->

</body>
</html>
