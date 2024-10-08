<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
            overflow-wrap: break-word;
            color: #4B0082;
        }

        th {
            background-color: #4B0082;
            color: white;
            text-transform: uppercase;
            font-size: 16px;
        }

        td {
            font-size: 14px;
            line-height: 1.6;
            text-align: justify;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        td.content-cell {
            white-space: pre-wrap;
            font-family: 'Courier New', monospace;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 12px;
                padding: 10px;
            }

            td.content-cell {
                white-space: normal;
            }

            table {
                display: block;
                overflow-x: auto;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h2 style="color: #4B0082; text-align: center;">News Report for <?= esc($month) ?></h2>
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
                        <td class="content-cell"><?= esc(strip_tags($newsItem['content'])) ?></td>
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
