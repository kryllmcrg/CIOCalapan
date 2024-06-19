<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Report for <?= $month ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .content {
            white-space: pre-wrap; /* Preserve whitespace and line breaks */
        }
    </style>
</head>
<body>
    <h1>News Report for <?= $month ?></h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <!-- <th>Content</th> -->
                <th>Publication Date</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsData as $news): ?>
                <tr>
                    <td><?= esc($news['title']) ?></td>
                    
                    <td><?= date('Y-m-d', strtotime($news['publication_date'])) ?></td>
                    <td><?= esc($news['author']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
