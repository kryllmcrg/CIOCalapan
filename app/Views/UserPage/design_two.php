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
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
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
            flex-wrap: nowrap;
            align-items: flex-start;
            gap: 20px;
        }

        .images-left, .images-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .main-article {
            flex: 2;
            text-align: justify;
        }

        .images-left img, .images-right img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: gray;
        }

        .footer a {
            color: #333;
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
            <!-- Images Left -->
            <div class="images-left">
                <?php
                $images = json_decode($newsData['images'], true);
                $maxImages = 2;
                if (is_array($images) && count($images) > 0):
                    foreach (array_slice($images, 0, $maxImages) as $image): ?>
                        <img src="<?= htmlspecialchars($image) ?>" alt="Article Image">
                    <?php endforeach;
                endif;
                ?>
            </div>

            <!-- Main Article -->
            <div class="main-article">
                <p>
                    <?php
                    $cleanContent = strip_tags($newsData['content']);
                    $shortContent = nl2br(substr($cleanContent, 0, 2300));
                    echo htmlspecialchars($shortContent) . '...';
                    ?>
                </p>
            </div>

            <!-- Images Right -->
            <div class="images-right">
                <?php
                if (is_array($images) && count($images) > 2):
                    foreach (array_slice($images, 2, 2) as $image): ?>
                        <img src="<?= htmlspecialchars($image) ?>" alt="Article Image">
                    <?php endforeach;
                endif;
                ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <?= date('Y') ?> Daily News | <a href="<?= base_url('/') ?>">Back to Homepage</a>
        </div>
    </div>
</body>
</html>
