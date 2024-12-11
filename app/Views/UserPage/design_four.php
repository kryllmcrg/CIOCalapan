<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template 4</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3e8ff;
            color: #4b0082;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: 2px solid #a64ca6;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5em;
            margin: 0;
        }

        header p {
            font-style: italic;
            color: #7a007a;
        }

        section {
            margin-bottom: 20px;
        }

        section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5em;
            margin-bottom: 10px;
            border-bottom: 2px solid #a64ca6;
            padding-bottom: 5px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .box {
            padding: 15px;
            border: 1px solid #a64ca6;
            border-radius: 5px;
            background-color: #f9eaff;
        }

        .box img {
            max-width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Lorem Ipsum</h1>
            <p>All the latest breaking news</p>
            <p><strong>Date:</strong> 5th May 2024</p>
        </header>

        <section>
            <h2>Highlights</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
        </section>

        <section class="grid">
            <div class="box">
                <h2>Learning</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus mollis interdum.</p>
            </div>
            <div class="box">
                <h2>Kineme</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </div>
        </section>

        <section class="grid">
            <div class="box">
                <h2>Pictures</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis consectetur purus sit amet fermentum.</p>
            </div>
            <div class="box">
                <h2>Photo</h2>
                <p>Photo</p>
                <img src="https://calapancio.online/150" alt="Photo">
            </div>
        </section>
    </div>
</body>
</html>
