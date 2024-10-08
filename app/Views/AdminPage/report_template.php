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
            border-collapse: collapse;
            table-layout: auto; /* Change to auto to better fit content */
            margin: 20px 0; /* Add margin for spacing */
        }
        th, td {
            border: 1px solid #ddd; /* Light border for a cleaner look */
            padding: 10px; /* Add padding for better spacing */
            text-align: left;
            word-wrap: break-word; /* Ensures long words are broken into multiple lines */
            color: #4B0082; /* Purple text color */
        }
        th {
            background-color: #4B0082; /* Header background color */
            color: white; /* Header text color */
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
        .no-data {
            text-align: center; /* Center align no data message */
            font-size: 16px; /* Increase font size for emphasis */
            color: #999; /* Grey color for no data message */
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
