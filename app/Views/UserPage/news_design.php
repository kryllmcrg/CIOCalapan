<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calapan City News Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .author {
            font-style: italic;
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        .publication-date {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .content img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= esc($newsData['title'] ?? 'No Title Available') ?></h1>
        <p class="author">By <?= esc($newsData['author'] ?? 'Unknown Author') ?></p>
        <p class="publication-date"><?= esc(date('M d, Y', strtotime($newsData['publication_date'] ?? ''))) ?></p>
        <div class="content">
            <?= nl2br(esc($newsData['content'] ?? 'No content available')) ?>
            <?php if (!empty($newsData['images'])): ?>
                <img src="<?= esc($newsData['images']) ?>" alt="Image">
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
