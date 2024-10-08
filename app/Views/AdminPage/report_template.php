<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Ensures table fits within page width */
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; /* Ensures long words are broken into multiple lines */
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            font-size: 12px; /* Reduce font size to fit more content */
        }
    </style>
</head>
<body>
    <h2>News Report for <?= esc($month) ?></h2>
    <?php if (!empty($newsData)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Publication Date</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsData as $newsItem) : ?>
                    <tr>
                        <td><?= esc($newsItem['title']) ?></td>
                        <td><?= wordwrap(strip_tags($newsItem['content']), 100, "\n", true) ?></td> <!-- Convert HTML to plain text and wrap words -->
                        <td><?= esc($newsItem['publication_date']) ?></td>
                        <td><?= esc($newsItem['author']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No news data available for this month.</p>
    <?php endif; ?>
</body>
</html>
