<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* Set a white background for better contrast */
            margin: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Ensures table fits within page width */
        }
        th, td {
            border: 1px solid #ddd; /* Light border for a cleaner look */
            padding: 10px; /* Add padding for better spacing */
            text-align: left;
            vertical-align: top; /* Align text to the top of the cell */
            word-wrap: break-word; /* Ensure long words break to fit in cell */
            overflow-wrap: break-word; /* Another option for breaking words */
            max-height: 100px; /* Limit the height of the cell */
            overflow: hidden; /* Hide overflow content */
            color: #4B0082; /* Purple text color */
        }
        th {
            background-color: #4B0082; /* Purple background for header */
            color: white; /* White text for header */
        }
        td {
            font-size: 14px; /* Slightly increase font size */
            line-height: 1.6; /* Improve line height for readability */
            text-align: justify; /* Justify text */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for rows */
        }
        tr:hover {
            background-color: #e0e0e0; /* Hover effect for rows */
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 12px; /* Smaller font size on smaller screens */
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
                        <td><?= esc(strip_tags($newsItem['content'])) ?></td> <!-- Full content without truncation -->
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
