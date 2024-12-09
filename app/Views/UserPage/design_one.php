<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sports News Template</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f7f4fc;
      color: #333;
    }

    .container {
      width: 800px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    /* Header Section */
    .header {
      width: 100%;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px 8px 0 0;
      padding: 10px 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 12px;
      text-transform: uppercase;
      color: #6a0dad;
    }

    .header-top div {
      flex: 1;
      text-align: center;
    }

    .header-top div:first-child {
      text-align: left;
      color: #333;
      font-weight: bold;
    }

    .header-top div:last-child {
      text-align: right;
      color: #888;
    }

    .header-line {
      margin: 8px 0;
      border-top: 2px solid #c87ffb;
      border-bottom: 2px solid #8a2be2;
    }

    /* Main Headline Section */
    .headline {
      font-size: 36px;
      font-weight: bold;
      text-transform: uppercase;
      color: #8a2be2;
      line-height: 1.2;
    }

    .subheadline {
      font-size: 18px;
      margin-top: 5px;
      color: #555;
      text-transform: uppercase;
    }

    .main-content {
      display: flex;
      margin-top: 20px;
      gap: 20px;
    }

    .main-content img {
      max-width: 350px;
      border-radius: 8px;
      object-fit: cover;
    }

    .main-content .description {
      flex: 1;
      font-size: 14px;
      color: #444;
      line-height: 1.6;
    }

    /* Secondary News Section */
    .secondary-news {
      display: flex;
      margin-top: 30px;
      gap: 20px;
    }

    .news-card {
      flex: 1;
      background-color: #f9f6fb;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .news-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }

    .news-card .news-title {
      font-size: 16px;
      font-weight: bold;
      color: #6a0dad;
      margin-top: 10px;
    }

    .news-card .news-description {
      font-size: 14px;
      color: #555;
      margin-top: 10px;
    }

    /* Footer */
    .footer {
      text-align: center;
      margin-top: 20px;
      padding-top: 10px;
      border-top: 2px solid #ddd;
      font-size: 14px;
      color: #777;
    }

    .footer a {
      color: #6a0dad;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header -->
    <div class="header">
    <div class="header-top">
      <div>Sport News</div> //Category
      <div>Salford & Co.</div> // Calapan City Info Office
      <div>12/12/2024</div> // Date Published
    </div>
    <div class="header-line"></div>
  </div>

    <!-- Main Headline -->
    <div class="headline">Record Breaking Night:</div>
    <div class="subheadline">Player Sets New Scoring Milestone</div>

    <!-- Main Content -->
    <div class="main-content">
      <img src="<?= base_url('assets/images/palaro3.jpg')?>" alt="Player Image">
      <div class="description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna nec felis gravida vehicula. Duis finibus orci, a ullamcorper sem.
        Proin eget nisi ac ligula auctor posuere. Suspendisse potenti. Suspendisse id dui sit amet massa vehicula sodales.
      </div>
    </div>

    <!-- Secondary News -->
    <div class="secondary-news">
      <div class="news-card">
        <img src="<?= base_url('assets/images/palaro4.jpg')?>" alt="Premier League">
        <div class="news-title">Top Players to Watch in This Season's Premier League</div>
        <div class="news-description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna nec felis gravida vehicula.
        </div>
      </div>
      <div class="news-card">
        <img src="<?= base_url('assets/images/palaro5.jpg')?>" alt="Offseason Moves">
        <div class="news-title">Major Player Moves in the Offseason</div>
        <div class="news-description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultricies pulvinar.
        </div>
      </div>
    </div>

    <div class="footer">
      <p>Volume | 02 | <a href="https://www.calapancio.online">www.ciocalapan.online</a></p>
    </div>
  </div>
</body>
</html>
