<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calapan City Information Office</title>
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
        <?php if (!empty($article)): ?>
            <h1><?= esc($article['title']) ?></h1>
            <p class="author">By <?= esc($article['author']) ?></p>
            <p class="publication-date"><?= esc(date('M d, Y', strtotime($article['publication_date']))) ?></p>
            <div class="content">
                <?= htmlspecialchars($article['content']) ?>
                <?php foreach (json_decode($article['images']) as $image): ?>
                    <img src="<?= htmlspecialchars($image) ?>" alt="Image">
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No news article found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
