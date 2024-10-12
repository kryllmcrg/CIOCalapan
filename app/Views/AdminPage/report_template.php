<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
            letter-spacing: 1px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #4B0082;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        td {
            color: #555;
            line-height: 1.6;
            text-align: left;
            word-wrap: break-word; /* Ensure text wraps within its cell */
        }
        td.content-cell {
            max-height: 120px; /* Limit the height */
            overflow-y: auto; /* Add scroll for overflow */
            text-align: justify; /* Justify content */
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        tr:hover {
            background-color: #f0f0f0;
        }
        .no-data {
            text-align: center;
            font-size: 16px;
            color: #999;
            margin: 30px 0;
        }

        /* Responsive Design for portrait or smaller screens */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
                width: 100%;
            }
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tr {
                border-bottom: 1px solid #ddd;
                margin-bottom: 10px;
                padding: 10px;
            }
            td {
                display: block;
                text-align: right;
                font-size: 14px;
                border-bottom: none;
                position: relative;
                padding-left: 50%;
            }
            td:before {
                content: attr(data-label); /* Add the corresponding label */
                position: absolute;
                left: 15px;
                width: 45%;
                padding-right: 10px;
                font-weight: bold;
                text-align: left;
                white-space: nowrap;
            }
            td.content-cell {
                max-height: none; /* Remove max-height in mobile view */
                overflow: visible; /* Show full content */
            }
        }
    </style>
</head>
<body>

    <h2>Monthly News Report: <?= esc($month) ?></h2>
    
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
                        <td data-label="Title"><?= esc($newsItem['title']) ?></td>
                        <td data-label="Content" class="content-cell"><?= esc(strip_tags($newsItem['content'])) ?></td> <!-- Full content with scroll and justified text -->
                        <td data-label="Publication Date"><?= esc(date('F j, Y', strtotime($newsItem['publication_date']))) ?></td>
                        <td data-label="Author"><?= esc($newsItem['author']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="no-data">No news data available for this month.</p>
    <?php endif; ?>
    
</body>
</html>
