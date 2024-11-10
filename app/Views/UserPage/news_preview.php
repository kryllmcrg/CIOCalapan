<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Preview</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Georgia', serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 120px;
            margin-bottom: 15px;
        }
        .header h1 {
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
            color: #333;
        }
        .author, .publication-date {
            font-size: 16px;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }
        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
        }
        .content {
            flex: 1 1 60%;
            padding-right: 30px;
            border-right: 2px solid #ddd;
            margin-bottom: 20px;
        }
        .content h2 {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #2C3E50;
        }
        .content p {
            font-size: 18px;
            color: #34495e;
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 15px;
        }
        .content img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(103, 58, 183, 0.1);
        }
        .sidebar {
            flex: 1 1 30%;
            padding-left: 30px;
            margin-bottom: 20px;
        }
        .sidebar h3 {
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #2C3E50;
        }
        .footer {
            text-align: center;
            background-color: #2C3E50;
            color: white;
            padding: 20px;
            margin-top: 30px;
            border-radius: 8px;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="<?= base_url('assets/images/ciologo.png') ?>" alt="CIO Logo">
            <h1>Calapan City Information Office</h1>
        </div>
        <div class="author">By <?= $author ?></div>
        <div class="publication-date">Publication Date: <?= $publication_date ?></div>
        
        <div class="content-wrapper">
            <!-- Main Content -->
            <div class="content">
                <h2 class="preview-title"><?= $title ?></h2>
                <!-- Show a maximum of 3 paragraphs of content -->
                <?php
                $content_parts = explode("\n", $content); // Assuming content is separated by new lines
                $content_to_show = array_slice($content_parts, 0, 3); // Show up to 3 paragraphs
                foreach ($content_to_show as $paragraph) {
                    echo "<p>$paragraph</p>";
                }
                ?>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <h3>Related News</h3>
                <ul>
                    <li><a href="#">Related news item 1</a></li>
                    <li><a href="#">Related news item 2</a></li>
                    <li><a href="#">Related news item 3</a></li>
                    <li><a href="#">Related news item 4</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024 Daily News. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
