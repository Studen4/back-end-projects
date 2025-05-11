<?php

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Результат форми</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2>Результат надсилання форми</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = $_POST['msg'] ?? '';
    echo "<p><strong>Метод:</strong> POST</p>";
    echo "<p><strong>Повідомлення:</strong> " . htmlspecialchars($msg) . "</p>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $msg = $_GET['msg'] ?? '';
    echo "<p><strong>Метод:</strong> GET</p>";
    echo "<p><strong>Повідомлення:</strong> " . htmlspecialchars($msg) . "</p>";
} else {
    echo "<p>Невідомий метод.</p>";
}
?>

<a href="task1.php" class="btn btn-primary mt-3">Назад</a>

</body>
</html>