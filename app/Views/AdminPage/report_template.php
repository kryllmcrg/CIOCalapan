<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly News Report</title>
    
    <!-- Main styling for the page -->
    <style>
        /* General body styling for a clean, modern look */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            background-color: #f0f0f0; /* Light background for contrast */
            color: #333; /* Dark text for readability */
        }

        /* Header styling */
        h2 {
            text-align: center;
            color: #4B0082; /* Indigo color for a professional look */
            margin-bottom: 30px;
            font-size: 28px;
            letter-spacing: 1px;
        }

        /* Table layout with clean and modern design */
        table {
            width: 100%;
            border-collapse: collapse; /* Remove spacing between table cells */
            margin-bottom: 40px;
            background-color: white; /* White background for a neat look */
            border-radius: 8px;
            overflow: hidden; /* Hide anything that goes outside the table bounds */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }

        /* Table header styling */
        th {
            background-color: #4B0082; /* Indigo color for headers */
            color: white; /* White text for good contrast */
            text-transform: uppercase; /* Capitalize the text */
            letter-spacing: 1px; /* Slight spacing for a clean look */
            padding: 15px;
            font-size: 16px;
        }

        /* Table body styling */
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #555; /* Softer gray for text */
            text-align: left; /* Left-align all content */
            line-height: 1.6;
            word-wrap: break-word; /* Ensures content stays within cell */
        }

        /* Special styling for the content cell (adds scrolling for long content) */
        td.content-cell {
            max-height: 120px; /* Limit the height */
            overflow-y: auto; /* Adds vertical scroll if content is too long */
            text-align: justify; /* Justify text for neatness */
        }

        /* Alternating row colors for easier readability */
        tr:nth-child(even) {
            background-color: #fafafa;
        }

        /* Hover effect to highlight a row */
        tr:hover {
            background-color: #f0f0f0;
        }

        /* Styling when there is no data available */
        .no-data {
            text-align: center;
            font-size: 18px;
            color: #999; /* Light gray text */
            margin: 30px 0;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block; /* Make the table block for better stacking */
                width: 100%; /* Ensure table takes up full width */
            }

            th {
                position: absolute; /* Hide the headers */
                top: -9999px;
                left: -9999px;
            }

            tr {
                border-bottom: 1px solid #ddd;
                margin-bottom: 10px;
                padding: 10px;
            }

            td {
                display: block; /* Stack cells on top of each other */
                text-align: right;
                font-size: 14px;
                border-bottom: none;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                content: attr(data-label); /* Add labels for each cell on mobile */
                position: absolute;
                left: 15px;
                width: 45%;
                padding-right: 10px;
                font-weight: bold;
                text-align: left;
                white-space: nowrap;
            }

            td.content-cell {
                max-height: none; /* Remove height limit for better mobile viewing */
                overflow: visible; /* Show full content on mobile */
            }
        }
    </style>
</head>
<body>

    <!-- Main heading showing the current month -->
    <h2>Monthly News Report: <?= esc($month) ?></h2>
    
    <!-- Check if there's news data to display -->
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
                <!-- Loop through each news item and display its details -->
                <?php foreach ($newsData as $newsItem) : ?>
                    <tr>
                        <td data-label="Title"><?= esc($newsItem['title']) ?></td>
                        <td data-label="Content" class="content-cell"><?= esc(strip_tags($newsItem['content'])) ?></td> <!-- Show content with scroll -->
                        <td data-label="Publication Date"><?= esc(date('F j, Y', strtotime($newsItem['publication_date']))) ?></td>
                        <td data-label="Author"><?= esc($newsItem['author']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <!-- Display message if no news data is available -->
        <p class="no-data">No news data available for this month.</p>
    <?php endif; ?>
    
</body>
</html>
