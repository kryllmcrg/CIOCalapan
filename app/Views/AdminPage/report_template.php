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
            table-layout: auto; /* Allows the content to expand naturally */
        }

        th, td {
            border: 1px solid #ddd; /* Light border for a cleaner look */
            padding: 15px; /* Add more padding for better spacing */
            text-align: left;
            vertical-align: top; /* Align text to the top of the cell */
            word-wrap: break-word; /* Ensure long words break to fit in cell */
            overflow-wrap: break-word; /* Another option for breaking words */
            color: #4B0082; /* Purple text color */
        }

        th {
            background-color: #4B0082; /* Purple background for header */
            color: white; /* White text for header */
            text-transform: uppercase; /* Uppercase for headers */
            font-size: 16px; /* Slightly increase font size for header */
        }

        td {
            font-size: 14px; /* Font size for the content */
            line-height: 1.6; /* Improve line height for readability */
            text-align: justify; /* Justify text for cleaner appearance */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Softer zebra striping for rows */
        }

        tr:hover {
            background-color: #e0e0e0; /* Hover effect for rows */
        }

        td.content-cell {
            white-space: pre-wrap; /* Preserve line breaks */
            font-family: 'Courier New', monospace; /* Monospace for content clarity */
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 12px; /* Smaller font size on smaller screens */
                padding: 10px; /* Reduce padding on small screens */
            }

            td.content-cell {
                white-space: normal; /* Avoid excessive horizontal scrolling on small devices */
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
                        <td class="content-cell"><?= esc(strip_tags($newsItem['content'])) ?></td> <!-- Full content, clearly visible -->
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
