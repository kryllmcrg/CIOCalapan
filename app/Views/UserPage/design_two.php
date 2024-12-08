<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news 2</title>
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
            box-shadow: 0 4px 20px rgba(103, 58, 183, 0.7); /* Stronger purple with more opacity */
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            color: #2C3E50;
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
            text-align: justify; /* Added this line to justify the text */
        }
        .content img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(103, 58, 183, 0.5); /* Stronger purple box-shadow for images */
        }
        .logo {
            max-width: 150px;
            margin: 0 auto 30px auto; /* Center logo horizontally */
            display: block; /* Make the image a block element to allow centering */
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
                $images = array_slice($images, 0, $maxImages); // Show only first 5 images
                foreach ($images as $image): ?>
                    <img src="<?= htmlspecialchars($image) ?>" alt="Image">
                <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</body>
</html>
