<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
</head>
<body>
    <h1>Latest News</h1>
    <div>
        <?php foreach($newsData as $news): ?>
            <div>
                <h2><?= $news['title']; ?></h2>
                <p><?= $news['content']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
