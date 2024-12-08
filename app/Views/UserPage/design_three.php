<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Article</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        .header {
            position: sticky;
            top: 0;
            background: transparent;
            padding: 20px 40px;
            transition: background-color 0.3s;
            z-index: 10;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header.scrolled {
            background-color: #2C3E50;
        }

        .header img {
            max-width: 100px;
            display: block;
            margin: 0 auto;
        }

        .header h1 {
            font-size: 30px;
            text-align: center;
            color: #fff;
            margin-top: 10px;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            display: flex;
            gap: 30px;
            justify-content: space-between;
        }

        .main-article {
            flex: 2;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            line-height: 1.8;
        }

        .main-article h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #2C3E50;
        }

        .meta {
            font-size: 14px;
            color: #95a5a6;
            margin-bottom: 30px;
        }

        .main-article img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .content {
            font-size: 16px;
            color: #34495e;
            margin-bottom: 30px;
        }

        .side-bar {
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .related-articles h3 {
            font-size: 24px;
            color: #2C3E50;
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

        .footer {
            background-color: #2C3E50;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Mobile responsiveness */
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
    <div class="header" id="header">
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
        &copy; <?= date('Y') ?> Daily News | <a href="<?= base_url('/') ?>">Back to Homepage</a>
    </div>

    <script>
        // Sticky header on scroll
        window.onscroll = function() { stickyHeader() };
        
        var header = document.getElementById("header");
        var sticky = header.offsetTop;
        
        function stickyHeader() {
            if (window.pageYOffset > sticky) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        }
    </script>

</body>
</html>
