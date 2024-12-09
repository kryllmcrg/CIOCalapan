<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CIO News Outlet</title>

  <link href="https://fonts.googleapis.com/css2?family=Petit+Formal+Script&family=Cursive:wght@300;400;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      font-family: Arial, sans-serif; /* Fallback font for regular text */
    }

    .header {
      text-align: center;
      font-family: 'Petit Formal Script', cursive;
      font-size: 48px;
      margin: 20px 0;
    }

    .sub-header {
      text-align: center;
      margin: 0;
      font-size: 14px;
    }

    .main-content {
      display: flex; /* Arrange content sections side-by-side */
      flex-wrap: wrap; /* Allow sections to wrap to next line if needed */
      margin: 20px;
    }

    .news-section {
      width: calc(50% - 10px); /* Set width for each section (adjust for spacing) */
      margin: 5px;
      border: 1px solid #ddd;
      padding: 10px;
    }

    .news-section img {
      width: 100%; /* Images within sections can be full-width */
      margin-bottom: 5px;
    }

    .news-title {
      font-weight: bold;
      margin-bottom: 5px;
    }

    footer {
      text-align: center;
      font-size: 12px;
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <header>
    <h1 class="header">CIO News Outlet</h1>
    <p class="sub-header">February 2024 | Calapan City</p>
  </header>

  <main class="main-content">
    <section class="news-section">
      <h2>Top News Story</h2>
      <img src="path/to/your/image.jpg" alt="Image for news story">
      <p class="news-title">Headline for your news story here</p>
      <p>This is a short summary of the top news story. You can add more text here to provide a brief overview of the news.</p>
    </section>

    <section class="news-section">
      <h2>Another News Story</h2>
      <p class="news-title">Another Headline Here</p>
      <p>This is a summary of another news story in your publication.</p>
    </section>

    </main>

  <footer>
    <p>Calapan City Information Office</p>
  </footer>
</body>
</html>