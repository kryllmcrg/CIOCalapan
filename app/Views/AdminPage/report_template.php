<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern and readable font */
            margin: 40px; /* Ample spacing around the body */
            background-color: #f5f5f5; /* Soft background for contrast */
            color: #333; /* Darker text color for readability */
        }
        h2 {
            text-align: center; /* Center the title */
            color: #333; /* Neutral dark color for the title */
            margin-bottom: 30px; /* Spacing under the title */
            font-size: 24px; /* Slightly larger title font */
            letter-spacing: 1px; /* Add letter spacing for elegance */
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Remove gaps between table cells */
            margin-bottom: 40px; /* Spacing under the table */
            background-color: white; /* White background for the table */
            border-radius: 8px; /* Rounded corners for a modern look */
            overflow: hidden; /* Prevent overflow of rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }
        th, td {
            padding: 15px; /* Generous padding for better spacing */
            text-align: left; /* Left-align text for readability */
            border-bottom: 1px solid #ddd; /* Subtle bottom border */
            font-size: 14px; /* Standardize font size for readability */
        }
        th {
            background-color: #4B0082; /* Strong header color */
            color: white; /* White text on header */
            text-transform: uppercase; /* All caps for headers */
            letter-spacing: 1px; /* Slight letter spacing for headers */
        }
        td {
            color: #555; /* Softer text for table data */
            line-height: 1.6; /* Increase line height for readability */
        }
        tr:nth-child(even) {
            background-color: #fafafa; /* Light gray alternate row color */
        }
        tr:hover {
            background-color: #f0f0f0; /* Subtle hover effect for rows */
        }
        .no-data {
            text-align: center;
            font-size: 16px;
            color: #999;
            margin: 30px 0;
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
                        <td><?= esc($newsItem['title']) ?></td>
                        <td><?= esc(substr(strip_tags($newsItem['content']), 0, 100)) ?>...</td> <!-- Show first 100 chars -->
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
