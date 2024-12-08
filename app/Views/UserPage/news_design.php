<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calapan City News Report</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1F2A44;
            margin-bottom: 15px;
        }

        .author, .publication-date {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .author {
            font-style: italic;
        }

        .publication-date {
            font-weight: 300;
        }

        .content p {
            font-size: 18px;
            line-height: 1.8;
            color: #34495e;
            margin-bottom: 20px;
            text-align: justify;
        }

        .content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 15px 0;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .logo {
            max-width: 180px;
            margin: 0 auto 30px;
            display: block;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .content .read-more {
            margin-top: 30px;
            font-weight: 600;
            color: #2980b9;
            text-decoration: none;
        }

        .content .read-more:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="<?= base_url('assets/images/ciologo.png') ?>" alt="CIO Logo" class="logo">
        <h1><?= htmlspecialchars($newsData['title'] ?? '') ?></h1>
        <p class="author">By <?= htmlspecialchars($newsData['author'] ?? '') ?></p>
        <p class="publication-date"><?= htmlspecialchars(date('M d, Y', strtotime($newsData['publication_date'] ?? ''))) ?></p>
        <div class="content">
            <!-- Show only the first 300 characters of the content -->
            <p>
                <?php 
                    // Clean up the content by removing unwanted tags and classes
                    $cleanContent = strip_tags($newsData['content']);
                    $shortContent = nl2br(substr($cleanContent, 0, 2300));
                    echo htmlspecialchars($shortContent) . '...';
                ?>
            </p>

            <?php 
            // Decode images if they are stored as a JSON string
            $images = json_decode($newsData['images'], true);

            // Limit the number of images displayed to avoid excessive load
            $maxImages = 2;
            if (is_array($images) && !empty($images)):
                $images = array_slice($images, 0, $maxImages); // Show only first 2 images
                foreach ($images as $image): ?>
                    <img src="<?= htmlspecialchars($image) ?>" alt="Image">
                <?php endforeach;
            endif;
            ?>

            <a href="#" class="read-more">Read More</a>
        </div>
    </div>
</body>
</html>
