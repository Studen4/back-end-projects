<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = '127.0.0.1';
$port = '3306';
$dbname = 'Guestbook';
$username = 'Admin';
$password = '0000';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['message']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $message = trim($_POST['message']);

    if (!empty($message)) {
        $sql = "INSERT INTO comments (user_id, message, created_at, is_approved)
                VALUES (:user_id, :message, NOW(), 1)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'message' => $message
        ]);
        echo "<p style='color: green;'>Коментар додано!</p>";
    } else {
        echo "<p style='color: red;'>Повідомлення не може бути порожнім!</p>";
    }
}

// Отримання всіх коментарів
$sql = "SELECT c.message, c.created_at, u.username
        FROM comments c
        JOIN users u ON c.user_id = u.id
        WHERE is_approved = 1
        ORDER BY c.created_at DESC";
$stmt = $pdo->query($sql);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Гостьова книга</title>
</head>
<body>
    <h1>Гостьова книга</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <p>Ви ввійшли як <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> | <a href="logout.php">Вийти</a></p>

        <form method="POST">
            <textarea name="message" rows="4" cols="50" placeholder="Залиште свій коментар..."></textarea><br>
            <button type="submit">Надіслати</button>
        </form>
    <?php else: ?>
        <p>Щоб залишити коментар, <a href="login.php">увійдіть</a>.</p>
    <?php endif; ?>

    <h2>Коментарі:</h2>
    <?php foreach ($comments as $c): ?>
        <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
            <strong><?= htmlspecialchars($c['username']) ?></strong>
            <em>(<?= $c['created_at'] ?>)</em><br>
            <?= nl2br(htmlspecialchars($c['message'])) ?>
        </div>
    <?php endforeach; ?>
</body>
</html>
