<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Article</title>
    <style>
        /* Default Design */
        .layout-1 .content {
            display: grid;
            grid-template-columns: 1fr 3fr 1fr;
            gap: 20px;
            align-items: flex-start;
        }

        .layout-1 .images {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .layout-1 .main-article {
            text-align: justify;
        }

        /* Layout 2 - Block Design */
        .layout-2 .content {
            display: block;
        }

        .layout-2 .images {
            display: block;
            text-align: center;
        }

        .layout-2 .main-article {
            margin-top: 20px;
        }

        /* New Layout 3 - Two Column */
        .layout-3 .content {
            display: grid;
            grid-template-columns: 2fr 3fr;
            gap: 20px;
        }

        .layout-3 .images {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .layout-3 .main-article {
            text-align: justify;
        }
    </style>
</head>
<body style="font-family: 'Times New Roman', Times, serif; background-color: #f1f1f1; color: #333; margin: 0; padding: 0;">

    <!-- Design Selector -->
    <div style="text-align: center; margin: 20px;">
        <label for="designSelector">Choose a Layout: </label>
        <select id="designSelector" onchange="changeDesign()">
            <option value="layout-1">Layout 1 (3 Columns)</option>
            <option value="layout-2">Layout 2 (Block)</option>
            <option value="layout-3">Layout 3 (2 Columns)</option>
        </select>
    </div>

    <div id="newsArticle" class="layout-1" style="max-width: 900px; margin: 30px auto; padding: 20px; background: #fff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
        <!-- Header -->
        <div style="text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">
            <img src="<?= base_url('assets/images/ciologo.png') ?>" alt="CIO Logo" style="max-width: 100px; margin-bottom: 10px;">
            <h1 style="font-size: 36px; margin: 0; text-transform: uppercase;">Daily News</h1>
            <div style="font-size: 14px; font-style: italic; color: #555; margin-top: 10px;">
                By <?= htmlspecialchars($newsData['author'] ?? 'Unknown Author') ?> | 
                <?= htmlspecialchars(date('M d, Y', strtotime($newsData['publication_date'] ?? ''))) ?>
            </div>
        </div>

        <!-- Headline -->
        <div style="font-size: 24px; font-weight: bold; text-transform: uppercase; margin: 20px 0;">
            <?= htmlspecialchars($newsData['title'] ?? 'World News Today') ?>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Images Column -->
            <div class="images">
                <?php
                $images = json_decode($newsData['images'], true);
                $maxImages = 2;
                if (is_array($images) && count($images) > 0):
                    foreach (array_slice($images, 0, $maxImages) as $image): ?>
                        <img src="<?= htmlspecialchars($image) ?>" alt="Article Image" style="width: 100%; height: auto; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <?php endforeach;
                endif;
                ?>
            </div>

            <!-- Main Article Column -->
            <div class="main-article">
                <p>
                    <?php
                    $cleanContent = strip_tags($newsData['content']);
                    $shortContent = nl2br(substr($cleanContent, 0, 2300));
                    echo htmlspecialchars($shortContent) . '...';
                    ?>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div style="text-align: center; margin-top: 20px; font-size: 12px; color: gray;">
            &copy; <?= date('Y') ?> Daily News | <a href="<?= base_url('/') ?>" style="color: #333; text-decoration: none;">Back to Homepage</a>
        </div>
    </div>

    <script>
        function changeDesign() {
            const selectedLayout = document.getElementById('designSelector').value;
            const article = document.getElementById('newsArticle');
            
            // Remove all layout classes
            article.classList.remove('layout-1', 'layout-2', 'layout-3');
            
            // Add the selected layout
            article.classList.add(selectedLayout);
        }
    </script>

</body>
</html>
