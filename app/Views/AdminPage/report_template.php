<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Change font for better readability */
            margin: 20px; /* Add margin around the body */
            background-color: #f9f9f9; /* Light background for contrast */
            color: #333; /* Dark text for readability */
        }
        h2 {
            text-align: center; /* Center the report title */
            color: #4B0082; /* Purple color for the title */
            margin-bottom: 20px; /* Space below the title */
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Collapse borders for cleaner look */
            table-layout: auto; /* Adjusts table layout based on content */
            margin: 20px 0; /* Add margin for spacing */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }
        th, td {
            border: 1px solid #ddd; /* Light border for a cleaner look */
            padding: 12px; /* Increased padding for better spacing */
            text-align: left;
            word-wrap: break-word; /* Ensures long words are broken into multiple lines */
            color: #4B0082; /* Purple text color */
        }
        th {
            background-color: #4B0082; /* Header background color */
            color: white; /* Header text color */
            text-transform: uppercase; /* Uppercase for header text */
        }
        td {
            font-size: 14px; /* Font size for table data */
            line-height: 1.6; /* Improve line height for readability */
            text-align: justify; /* Justify text */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for rows */
        }
        tr:hover {
            background-color: #e0e0e0; /* Hover effect for rows */
        }
        .no-data {
            text-align: center; /* Center align no data message */
            font-size: 16px; /* Increase font size for emphasis */
            color: #999; /* Grey color for no data message */
            margin: 20px 0; /* Space above and below the message */
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
                        <td><?= esc(date('F j, Y', strtotime($newsItem['publication_date']))) ?></td> <!-- Format date -->
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