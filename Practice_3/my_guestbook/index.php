<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'functions.php';

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    generateCaptcha();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $text = trim($_POST['text'] ?? '');
    $captchaInput = trim($_POST['captcha'] ?? '');

    $errors = validateComment($email, $name, $text, $captchaInput);
    if (empty($errors)) {
        saveComment($email, $name, $text);
        $success = true;
        generateCaptcha();
    }
}

$comments = loadComments();
?>

<!DOCTYPE html>
<html lang="uk">
<?php require_once 'sectionHead.php'; ?>
<body>
<div class="container">
    <?php require_once 'sectionNavbar.php'; ?>
    <br>

    <div class="card">
        <div class="card-header bg-primary text-white">Гостьова книга</div>
        <div class="card-body">
            <?php if ($success): ?>
                <div class="alert alert-success">Коментар успішно додано!</div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $err): ?>
                            <li><?= htmlspecialchars($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Ім’я:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Коментар:</label>
                    <textarea name="text" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Капча: <strong><?= $_SESSION['captcha_question'] ?? '' ?></strong></label>
                    <input type="text" name="captcha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Залишити відгук</button>
            </form>

        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header bg-secondary text-white">Коментарі</div>
        <div class="card-body">
            <?php renderComments($comments); ?>
        </div>
    </div>
</div>
</body>
</html>