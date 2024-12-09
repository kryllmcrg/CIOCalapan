<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sports News</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f2f7;
      color: #333;
    }

    .container {
      max-width: 900px;
      margin: 20px auto;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .header {
      text-align: center;
      padding-bottom: 10px;
      border-bottom: 2px solid #ddd;
    }

    .header .title {
      font-size: 24px;
      font-weight: bold;
      color: #6a0dad;
      text-transform: uppercase;
    }

    .header .subtitle {
      font-size: 14px;
      margin-top: 5px;
      color: #888;
    }

    .main-highlight {
      margin-top: 20px;
    }

    .main-highlight .headline {
      font-size: 28px;
      font-weight: bold;
      color: #8a2be2;
      line-height: 1.3;
      text-transform: uppercase;
    }

    .main-highlight .description {
      margin-top: 10px;
      font-size: 14px;
      color: #555;
      line-height: 1.6;
    }

    .image-highlight img {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      margin-top: 10px;
    }

    .secondary-news {
      display: flex;
      margin-top: 20px;
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
      height: auto;
      border-radius: 8px;
    }

    .news-card .news-title {
      font-size: 18px;
      font-weight: bold;
      color: #6a0dad;
      margin-top: 10px;
    }

    .news-card .news-description {
      font-size: 14px;
      color: #555;
      margin-top: 10px;
    }

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
    <div class="header">
      <div class="title">Record Breaking Night</div>
      <div class="subtitle">Salford & Co. | 12/12/2024</div>
    </div>

    <div class="main-highlight">
      <div class="headline">
        Drew Feig: Player Sets New Scoring Milestone
      </div>
      <div class="description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna nec felis gravida vehicula. Duis finibus orci, a ullamcorper sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      </div>
      <div class="image-highlight">
        <img src="basketball-player.jpg" alt="Basketball Player">
      </div>
    </div>

    <div class="secondary-news">
      <div class="news-card">
        <img src="premier-league.jpg" alt="Premier League">
        <div class="news-title">Top Players to Watch in This Season's Premier League</div>
        <div class="news-description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna nec felis gravida vehicula.
        </div>
      </div>
      <div class="news-card">
        <img src="offseason.jpg" alt="Offseason Moves">
        <div class="news-title">Major Player Moves in the Offseason</div>
        <div class="news-description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultricies pulvinar.
        </div>
      </div>
    </div>

    <div class="footer">
      <p>Volume | 02 | <a href="https://www.reallygreatsite.com">www.reallygreatsite.com</a></p>
    </div>
  </div>
</body>
</html>
Instructions:
Save the code into an .html file.
Replace the placeholder images (e.g., basketball-player.jpg, premier-league.jpg, offseason.jpg) with your image paths.
Open the file in a browser to view the template.
The design incorporates a purple theme, which is reflected in the headers, titles, and links. Let me know if you want to adjust anything!






You said:
that isn't even close on the design i want please copy the design i gave
ChatGPT said:
ChatGPT
Here is an updated version of the code, closely following the layout and style in your provided design, while incorporating your request for a purple-themed color scheme.

html
Copy code
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
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .header .title {
      font-size: 18px;
      font-weight: bold;
      color: #6a0dad;
    }

    .header .date {
      font-size: 14px;
      color: #888;
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
      <div class="title">Salford & Co.</div>
      <div class="date">12/12/2024</div>
    </div>

    <!-- Main Headline -->
    <div class="headline">Record Breaking Night:</div>
    <div class="subheadline">Player Sets New Scoring Milestone</div>

    <!-- Main Content -->
    <div class="main-content">
      <img src="player.jpg" alt="Player Image">
      <div class="description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna nec felis gravida vehicula. Duis finibus orci, a ullamcorper sem.
        Proin eget nisi ac ligula auctor posuere. Suspendisse potenti. Suspendisse id dui sit amet massa vehicula sodales.
      </div>
    </div>

    <!-- Secondary News -->
    <div class="secondary-news">
      <div class="news-card">
        <img src="league.jpg" alt="Premier League">
        <div class="news-title">Top Players to Watch in This Season's Premier League</div>
        <div class="news-description">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna nec felis gravida vehicula.
        </div>
      </div>
      <div class="news-card">
        <img src="offseason.jpg" alt="Offseason Moves">
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
