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
            margin: 0;
        }

        .preview-container {
            background-color: #fff;
            max-width: 800px;
            width: 100%;
            margin: 50px auto; /* Increased margin for more space around the container */
            padding: 40px; /* Increased padding for a more spacious feel */
            border: 1px solid #333;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }

        .header .logo {
            max-width: 100px; /* Reduced logo size for better appearance */
            height: auto;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 18px;
            margin: 0;
            color: #666;
        }

        .preview-title {
            font-size: 32px; /* Increased title size */
            margin-bottom: 20px; /* Increased space between title and content */
            color: #333;
            text-align: center;
            text-transform: uppercase;
        }

        .preview-author {
            font-style: italic;
            font-size: 18px;
            color: #666;
            margin-bottom: 10px; /* Increased space between author and date */
            text-align: center;
        }

        .preview-date {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px; /* Increased space between date and content */
            text-align: center;
        }

        .preview-content {
            font-size: 20px; /* Larger text for content */
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 30px; /* Increased space for better readability */
        }

        .preview-image {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .preview-images {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px; /* Increased space between images */
        }

        .preview-images img {
            width: 32%;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            border-top: 2px solid #333;
            padding-top: 20px; /* Increased padding to separate footer from content */
            margin-top: 40px;
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
