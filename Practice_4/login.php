<?php
session_start();

// Якщо користувач вже увійшов, перенаправляємо на головну сторінку.
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

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

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'] ?? '';
    $inputPassword = $_POST['password'] ?? '';

    // Перевірка наявності користувача
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $inputUsername]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Перевірка пароля
    if ($user && $user['password'] === $inputPassword) {
        // Збереження даних сесії
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Редирект на index.php
        header('Location: index.php');
        exit;
    } else {
        $error = 'Невірне ім’я користувача або пароль.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
</head>
<body>
    <h1>Вхід</h1>

    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Ім’я користувача" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Увійти</button>
    </form>
</body>
</html>