<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema Times</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .header {
      text-align: center;
      font-size: 36px;
      font-weight: bold;
      margin: 20px 0;
    }

    .sub-header {
      text-align: center;
      margin: 0;
      font-size: 14px;
    }

    .content {
      max-width: 900px;
      margin: 20px auto;
      padding: 10px;
      background: white;
      border: 1px solid #ddd;
    }

    .article-container {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 15px;
    }

    .article {
      text-align: justify;
      font-size: 14px;
      line-height: 1.5;
    }

    .main-article {
      grid-column: 1 / 4;
      text-align: center;
    }

    .main-article img {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
    }

    .main-article h2 {
      font-size: 24px;
      margin: 15px 0;
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
    <h1 class="header">Title</h1>
    <p class="sub-header">February 2024 | Calapan City</p>
  </header>
  
  <div class="content">
    <div class="article-container">
      <div class="article">
        <h3>Here to brighten your holidays with special offers and events!</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac vehicula mauris. Fusce fringilla.</p>
      </div>
      
      <div class="main-article">
        <img src="https://calapancio.online" alt="CIO">
        <h2>#1 ROM-COM IN THE WORLD</h2>
        <p>Aliquam erat volutpat. Morbi a metus suscipit, scelerisque libero in, venenatis nisi. Mauris nec velit id justo interdum accumsan.</p>
      </div>
      
      <div class="article">
        <h3>Every Wednesday we show old movies</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lectus et erat commodo blandit.</p>
      </div>
    </div>
  </div>

  <footer>
    <p>Calapan City Information Office</p>
  </footer>
</body>
</html>
