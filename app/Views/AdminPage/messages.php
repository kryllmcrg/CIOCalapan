<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
</head>
<body>
    <h1>Messages</h1>
    <ul>
    <?php foreach ($messages as $message): ?>
        <li>
            <strong>From:</strong> <?= $message['sender_id'] ?><br>
            <strong>To:</strong> <?= $message['receiver_id'] ?><br>
            <strong>Message:</strong> <?= $message['message'] ?><br>
            <strong>Sent at:</strong> <?= $message['created_at'] ?><br>
        </li>
    <?php endforeach; ?>
    </ul>
    <form action="/sendMessage" method="post">
        <input type="hidden" name="sender_id" value="<?= $loggedInUserId ?>">
        <input type="text" name="receiver_id" placeholder="Receiver ID"><br>
        <textarea name="message" placeholder="Type your message"></textarea><br>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
