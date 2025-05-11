<?php

function generateCaptcha(): void {
    $a = rand(1, 9);
    $b = rand(1, 9);
    $_SESSION['captcha'] = $a + $b;
    $_SESSION['captcha_question'] = "$a + $b = ?";
}

function validateComment($email, $name, $text, $captchaInput): array {
    $errors = [];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некоректний email.";
    }
    if (empty($name)) {
        $errors[] = "Ім’я обов’язкове.";
    }
    if (empty($text)) {
        $errors[] = "Поле коментаря не може бути порожнім.";
    }

    if (!isset($_SESSION['captcha']) || $captchaInput != $_SESSION['captcha']) {
        $errors[] = "Невірна відповідь на капчу.";
    }

    return $errors;
}

function saveComment($email, $name, $text): void {
    $comment = [
        'email' => $email,
        'name' => $name,
        'text' => $text,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $jsonString = json_encode($comment);
    $file = fopen('data/comments.csv', 'a');
    fwrite($file, $jsonString . "\n");
    fclose($file);
}

function loadComments(): array {
    $comments = [];
    $path = 'data/comments.csv';
    if (file_exists($path)) {
        $file = fopen($path, 'r');
        while (!feof($file)) {
            $line = fgets($file);
            if (trim($line) === '') continue;
            $comment = json_decode($line, true);
            if ($comment) {
                $comments[] = $comment;
            }
        }
        fclose($file);
    }
    return array_reverse($comments);
}

function renderComments(array $comments): void {
    foreach ($comments as $comment) {
        echo '<div class="border p-2 mb-2">';
        echo '<strong>' . htmlspecialchars($comment['name']) . '</strong> (' . htmlspecialchars($comment['email']) . ')<br>';
        echo '<small>' . htmlspecialchars($comment['created_at']) . '</small><br>';
        echo '<p>' . nl2br(htmlspecialchars($comment['text'])) . '</p>';
        echo '</div>';
    }
}