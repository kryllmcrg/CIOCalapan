<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Article</title>
    <link href="https://fonts.googleapis.com/css2?family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            color: #333;
            line-height: 1.6;
        }

        /* Header Styles */
        .header {
            background: #2c3e50;
            color: #fff;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header img {
            max-width: 150px;
            display: block;
            margin: 0 auto;
        }

        .header h1 {
            font-size: 36px;
            font-weight: bold;
            margin-top: 20px;
        }

        /* Main Content Section */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            display: flex;
            gap: 30px;
        }

        .main-article {
            flex: 2;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .main-article h2 {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .meta {
            font-size: 14px;
            color: #95a5a6;
            margin-bottom: 20px;
        }

        .main-article img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
            filter: grayscale(100%);
        }

        .content {
            font-size: 18px;
            color: #34495e;
            text-align: justify;
            margin-bottom: 20px;
        }

        .side-bar {
            flex: 1;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .side-bar h3 {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .related-articles ul {
            list-style-type: none;
            padding: 0;
        }

        .related-articles li {
            margin-bottom: 15px;
        }

        .related-articles a {
            text-decoration: none;
            color: #3498db;
            font-size: 16px;
        }

        .related-articles a:hover {
            text-decoration: underline;
        }

        /* Footer Styles */
        .footer {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }

        .footer p {
            font-size: 14px;
        }

        /* Mobile Responsiveness */
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                gap: 20px;
            }

            .main-article {
                margin-bottom: 20px;
            }

            .side-bar {
                margin-top: 20px;
            }
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <img src="<?= base_url('assets/images/ciologo.png') ?>" alt="CIO Logo">
        <h1>Daily News</h1>
    </div>

    <!-- Main Content Section -->
    <div class="container">
        <!-- Main Article -->
        <div class="main-article">
            <h2><?= htmlspecialchars($newsData['title'] ?? 'Article Title') ?></h2>
            <div class="meta">
                By <?= htmlspecialchars($newsData['author'] ?? 'Unknown Author') ?> | 
                <?= htmlspecialchars(date('M d, Y', strtotime($newsData['publication_date'] ?? ''))) ?>
            </div>
            <div class="content">
                <?php
                    $cleanContent = strip_tags($newsData['content']);
                    $shortContent = nl2br(substr($cleanContent, 0, 2300));
                    echo htmlspecialchars($shortContent) . '...';
                ?>
            </div>
            <?php 
                // Show images if available
                $images = json_decode($newsData['images'], true);
                if (is_array($images) && !empty($images)): 
                    foreach ($images as $image): ?>
                        <img src="<?= htmlspecialchars($image) ?>" alt="Image">
                    <?php endforeach;
                endif;
            ?>
        </div>

        <!-- Sidebar -->
        <div class="side-bar">
            <div class="related-articles">
                <h3>Related Articles</h3>
                <ul>
                    <li><a href="#">Article 1</a></li>
                    <li><a href="#">Article 2</a></li>
                    <li><a href="#">Article 3</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; <?= date('Y') ?> Daily News | <a href="<?= base_url('/') ?>">Back to Homepage</a></p>
    </div>

</body>
</html>
