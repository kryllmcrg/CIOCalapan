<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #4B0082;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            max-width: 100%; /* Ensure the table fits within the viewport */
            border-collapse: collapse;
            table-layout: fixed; /* Force a consistent column width */
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            word-wrap: break-word;
            color: #4B0082;
        }
        th {
            background-color: #4B0082;
            color: white;
            text-transform: uppercase;
        }
        td {
            font-size: 14px;
            line-height: 1.6;
            text-align: justify;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        .no-data {
            text-align: center;
            font-size: 16px;
            color: #999;
            margin: 20px 0;
        }

        /* Responsive Table */
        @media screen and (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto; /* Allow scrolling on smaller screens */
                white-space: nowrap; /* Prevent the table from wrapping on small screens */
            }
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
                        <td><?= esc(strip_tags($newsItem['content'])) ?></td>
                        <td><?= esc(date('F j, Y', strtotime($newsItem['publication_date']))) ?></td>
                        <td><?= esc($newsItem['author']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="no-data">No news data available for this month.</p>
    <?php endif; ?>
</body>
</html>
