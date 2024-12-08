<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Article</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            overflow: hidden;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 36px;
            margin: 0;
            text-transform: uppercase;
        }

        .meta {
            font-size: 14px;
            font-style: italic;
            color: #555;
            margin-top: 10px;
        }

        .headline {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 20px 0;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .content .main-article {
            flex: 3;
            text-align: justify;
        }

        .content .main-article img {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .content .sidebar {
            flex: 1;
            background: #f4f4f4;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .sidebar h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .sidebar p {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="<?= base_url('assets/images/ciologo.png') ?>" alt="CIO Logo">
            <h1>Daily News</h1>
            <div class="meta">
                By <?= htmlspecialchars($newsData['author'] ?? 'Unknown Author') ?> | 
                <?= htmlspecialchars(date('M d, Y', strtotime($newsData['publication_date'] ?? ''))) ?>
            </div>
        </div>

        <!-- Headline -->
        <div class="headline">
            <?= htmlspecialchars($newsData['title'] ?? 'World News Today') ?>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Main Article -->
            <div class="main-article">
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

            <!-- Sidebar -->
            <div class="sidebar">
                <h3>Related News</h3>
                <p>
                    Check out more stories on economics, politics, and global news.
                </p>
                <p>
                    Visit our homepage for the latest updates.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <?= date('Y') ?> Daily News | <a href="<?= base_url('/') ?>">Back to Homepage</a>
        </div>
    </div>
</body>
</html>
