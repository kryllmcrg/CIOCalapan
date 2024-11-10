<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calapan City News Report</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            border: 2px solid #6f42c1; /* Adding a border with the shade of the color */
        }
        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            color: #6f42c1; /* Title text in the shade of the color */
        }
        .author {
            font-style: italic;
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        .publication-date {
            font-size: 14px;
            color: #95a5a6;
            margin-bottom: 30px;
        }
        .content p {
            font-size: 16px;
            color: #34495e;
            margin-bottom: 20px;
            line-height: 1.8;
            text-align: justify;
        }
        .content img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .logo {
            max-width: 150px;
            margin: 0 auto 30px auto;
            display: block;
        }
        .read-more {
            background-color: #6f42c1; /* Background color of button */
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        .read-more:hover {
            background-color: #5a2f9d; /* Darker shade for hover effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="<?= base_url('assets/images/default_picture.jpg') ?>" alt="CIO Logo" class="logo">
        <h1><?= htmlspecialchars($newsData['title'] ?? '') ?></h1>
        <p class="author">By <?= htmlspecialchars($newsData['author'] ?? '') ?></p>
        <p class="publication-date"><?= htmlspecialchars(date('M d, Y', strtotime($newsData['publication_date'] ?? ''))) ?></p>
        <div class="content">
            <!-- Show only the first 300 characters of the content -->
            <p>
                <?php 
                    // Clean up the content by removing unwanted tags and classes
                    $cleanContent = strip_tags($newsData['content']);
                    $shortContent = nl2br(substr($cleanContent, 0, 1000));
                    echo htmlspecialchars($shortContent) . '...';
                ?>
            </p>
            
            <?php 
            // Decode images if they are stored as a JSON string
            $images = json_decode($newsData['images'], true);

            // Limit the number of images displayed to avoid excessive load
            $maxImages = 2;
            if (is_array($images) && !empty($images)):
                $images = array_slice($images, 0, $maxImages); // Show only first 5 images
                foreach ($images as $image): ?>
                    <img src="<?= htmlspecialchars($image) ?>" alt="Image">
                <?php endforeach;
            endif;
            ?>
        </div>
        <a href="#" class="read-more">Read More</a>
    </div>
</body>
</html>
