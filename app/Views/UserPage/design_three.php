<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Series: Tokyo</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            font-family: 'Playfair Display', serif;
        }

        .header h1 {
            font-size: 48px;
            margin: 0;
        }

        .header p {
            font-size: 18px;
            font-style: italic;
            margin: 5px 0 20px;
        }

        .image {
            text-align: center;
            margin: 20px 0;
        }

        .image img {
            max-width: 100%;
            border: 1px solid #ddd;
        }

        .columns {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .column {
            flex: 1;
            min-width: 300px;
            background: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .column h3 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            margin: 0 0 10px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>TOKYO</h1>
            <p>The City Where Tradition Meets Innovation</p>
        </div>
        <div class="image">
            <img src="https://via.placeholder.com/800x400" alt="Tokyo Skyline">
        </div>
        <div class="columns">
            <div class="column">
                <h3>Established</h3>
                <p>In 1603 as Edo, renamed Tokyo in 1868 when it became the capital of Japan.</p>
            </div>
            <div class="column">
                <h3>Tokyo Highlights</h3>
                <ul>
                    <li>Shibuya Crossing</li>
                    <li>Sensoji Temple</li>
                    <li>Tokyo Skytree</li>
                    <li>Akihabara and more!</li>
                </ul>
            </div>
            <div class="column">
                <h3>Quick Facts</h3>
                <ul>
                    <li>Population: 37.4 million (metro)</li>
                    <li>Language: Japanese</li>
                    <li>Land Area: 2,194 km²</li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 City Series</p>
        </div>
    </div>
</body>
</html>
