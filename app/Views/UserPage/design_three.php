<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema Times</title>

  <!-- Link to Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Petit+Formal+Script&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
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

    .content {
      max-width: 900px;
      margin: 20px auto;
      padding: 10px;
      background: white;
      border: 1px solid #ddd;
    }

    .columns {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 15px;
    }

    .column {
      font-size: 14px;
      line-height: 1.5;
      text-align: justify;
    }

    .main-article {
      grid-column: span 3;
      text-align: center;
      margin: 20px 0;
    }

    .main-article img {
      width: 100%;
      max-width: 300px;
      margin: 20px auto;
      display: block;
    }

    .main-article h2 {
      font-family: 'Roboto', sans-serif;
      font-size: 24px;
      margin: 15px 0;
      text-transform: uppercase;
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
  
  <div class="content">
    <div class="columns">
      <div class="column">
        <h3>Here to brighten your holidays with special offers and events!</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac vehicula mauris. Fusce fringilla neque quis ligula convallis, vitae venenatis tortor convallis. Nulla facilisi.</p>
      </div>
      
      <div class="column main-article">
        <img src="https://calapancio.online/300x300" alt="CIO">
        <h2>#1 Rom-Com in the World</h2>
        <p>Aliquam erat volutpat. Morbi a metus suscipit, scelerisque libero in, venenatis nisi. Mauris nec velit id justo interdum accumsan.</p>
      </div>
      
      <div class="column">
        <h3>Every Wednesday we show old movies</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lectus et erat commodo blandit. Nulla facilisi.</p>
      </div>
    </div>
  </div>

  <footer>
    <p>Calapan City Information Office</p>
  </footer>
</body>
</html>
