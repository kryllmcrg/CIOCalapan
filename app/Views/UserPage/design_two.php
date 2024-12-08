<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Article</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
        }

        .header img {
            max-width: 120px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 36px;
            margin: 0;
            font-weight: bold;
        }

        .meta {
            margin-top: 10px;
            font-size: 14px;
            font-style: italic;
        }

        .meta span {
            display: inline-block;
            margin: 0 10px;
            color: #dcdcdc;
        }

        .content {
            padding: 20px;
            line-height: 1.8;
        }

        .content p {
            margin-bottom: 20px;
            text-align: justify;
            color: #555;
        }

        .content img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background: #f1f1f1;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #6a11cb;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="<?= base_url('assets/images/ciologo.png') ?>" alt="CIO Logo">
            <h1><?= htmlspecialchars($newsData['title'] ?? '') ?></h1>
            <div class="meta">
                <span>By <?= htmlspecialchars($newsData['author'] ?? 'Unknown Author') ?></span> |
                <span><?= htmlspecialchars(date('M d, Y', strtotime($newsData['publication_date'] ?? ''))) ?></span>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <p>
                <?php
                $cleanContent = strip_tags($newsData['content']);
                $shortContent = nl2br(substr($cleanContent, 0, 2300));
                echo htmlspecialchars($shortContent) . '...';
                ?>
            </p>

            <!-- Images -->
            <?php
            $images = json_decode($newsData['images'], true);
            $maxImages = 2;
            if (is_array($images) && !empty($images)):
                $images = array_slice($images, 0, $maxImages);
                foreach ($images as $image): ?>
                    <img src="<?= htmlspecialchars($image) ?>" alt="Article Image">
                <?php endforeach;
            endif;
            ?>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <?= date('Y') ?> | <a href="<?= base_url('/') ?>">Back to Homepage</a>
        </div>
    </div>
</body>
</html>
