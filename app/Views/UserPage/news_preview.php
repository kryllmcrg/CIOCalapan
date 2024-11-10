<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Preview</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f7f7f7;
            padding-top: 20px;
        }
        .preview-container {
            background-color: #fff;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #333;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .header h1 {
            font-size: 36px;
            margin: 0;
            color: #333;
        }
        .header p {
            font-size: 18px;
            margin: 0;
            color: #666;
        }
        .preview-title {
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
            text-align: center;
            text-transform: uppercase;
        }
        .preview-author {
            font-style: italic;
            font-size: 16px;
            color: #666;
            margin-bottom: 5px;
            text-align: center;
        }
        .preview-date {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }
        .preview-content {
            font-size: 18px;
            line-height: 1.6;
            text-align: justify;
            margin-bottom: 20px;
        }
        .preview-image {
            display: block;
            margin: 15px auto;
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .preview-images {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .preview-images img {
            width: 32%;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            border-top: 2px solid #333;
            padding-top: 10px;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="preview-container">
                    <div class="header">
                    <img src="<?= base_url('assets/images/ciologo.png') ?>" alt="CIO Logo" class="logo">
                        <p>Calapan City Information Office</p>
                    </div>
                    <h1 class="preview-title"><?= $title ?></h1>
                    <p class="preview-author">By <?= $author ?></p>
                    <p class="preview-date">Publication Date: <?= $publication_date ?></p>
                    <div class="preview-content"><?= $content ?></div>

                    <!-- Display up to 3 images -->
                    <?php if (count($images) > 0): ?>
                        <div class="preview-images">
                            <?php foreach (array_slice($images, 0, 3) as $image): ?>
                                <img class="preview-image" src="<?= $image ?>" alt="News Image">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="footer">
                        <p>© 2024 Daily News. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
