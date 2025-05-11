<?php
session_start();
date_default_timezone_set('Europe/Kyiv');
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.11 - Форми</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2>1. ПІБ</h2>
<form method="post">
    <input type="text" name="surname" placeholder="Прізвище">
    <input type="text" name="name" placeholder="Ім’я">
    <input type="text" name="patronymic" placeholder="По батькові">
    <button type="submit" name="submit1">Надіслати</button>
</form>
<?php
if (isset($_POST['submit1'])) {
    echo "<p>Привіт, {$_POST['surname']} {$_POST['name']} {$_POST['patronymic']}!</p>";
}
?>

<hr>
<h2>2. Сума трьох чисел</h2>
<form method="post">
    <input type="number" name="n1">
    <input type="number" name="n2">
    <input type="number" name="n3">
    <button type="submit" name="submit2">Обчислити</button>
</form>
<?php
if (isset($_POST['submit2'])) {
    $sum = $_POST['n1'] + $_POST['n2'] + $_POST['n3'];
    echo "<p>Сума: $sum</p>";
}
?>

<hr>
<h2>3. Привітання</h2>
<?php if (!isset($_POST['submit3'])): ?>
<form method="post">
    <input type="text" name="username">
    <button type="submit" name="submit3">OK</button>
</form>
<?php else: ?>
    <p>Привіт, <?= htmlspecialchars($_POST['username']) ?>!</p>
<?php endif; ?>

<hr>
<h2>4. Місто і країна</h2>
<form method="post">
    <input type="text" name="city" placeholder="Місто" value="<?= $_POST['city'] ?? '' ?>">
    <input type="text" name="country" placeholder="Країна" value="<?= $_POST['country'] ?? '' ?>">
    <button type="submit" name="submit4">Показати</button>
</form>
<?php
if (isset($_POST['submit4'])) {
    echo "<p>Місто: {$_POST['city']}, Країна: {$_POST['country']}</p>";
}
?>

<hr>
<h2>5. Визначення високосного року</h2>
<form method="post">
    <input type="number" name="year" value="<?= $_POST['year'] ?? date('Y') ?>">
    <button type="submit" name="submit5">Перевірити</button>
</form>
<?php
if (isset($_POST['submit5'])) {
    $y = (int)$_POST['year'];
    $leap = ($y % 4 == 0 && $y % 100 != 0) || ($y % 400 == 0);
    echo "<p>Рік $y " . ($leap ? "є високосним" : "не є високосним") . "</p>";
}
?>

<hr>
<h2>6. Прапорець - вітання чи прощання</h2>
<form method="post">
    <input type="text" name="username2" placeholder="Ім’я">
    <label><input type="checkbox" name="greet"> Привітати</label>
    <button type="submit" name="submit6">OK</button>
</form>
<?php
if (isset($_POST['submit6'])) {
    $msg = isset($_POST['greet']) ? "Привіт, {$_POST['username2']}!" : "До побачення!";
    echo "<p>$msg</p>";
}
?>

<hr>
<h2>7. Чи є 18 років</h2>
<form method="post">
    <label><input type="checkbox" name="adult"> Мені вже є 18</label>
    <button type="submit" name="submit7">Перевірити</button>
</form>
<?php
if (isset($_POST['submit7'])) {
    echo isset($_POST['adult']) ? "<p>Доступ дозволено</p>" : "<p>Доступ заборонено</p>";
}
?>

<hr>
<h2>8. Вибір статі</h2>
<form method="post">
    <label><input type="radio" name="gender" value="Чоловік"> Чоловік</label>
    <label><input type="radio" name="gender" value="Жінка"> Жінка</label>
    <button type="submit" name="submit8">OK</button>
</form>
<?php
if (isset($_POST['submit8'])) {
    echo "<p>Ваша стать: {$_POST['gender']}</p>";
}
?>

<hr>
<h2>9. Вибір мови</h2>
<form method="post">
    <label><input type="radio" name="lang" value="UA" <?= ($_POST['lang'] ?? '') === 'UA' ? 'checked' : '' ?>> UA</label>
    <label><input type="radio" name="lang" value="EN" <?= ($_POST['lang'] ?? '') === 'EN' ? 'checked' : '' ?>> EN</label>
    <button type="submit" name="submit9">Обрати</button>
</form>
<?php
if (isset($_POST['submit9'])) {
    echo "<p>Обрана мова: {$_POST['lang']}</p>";
}
?>

<hr>
<h2>10. Вибір країни (випадаючий список)</h2>
<form method="post">
    <select name="country2">
        <option value="Україна" <?= ($_POST['country2'] ?? '') === 'Україна' ? 'selected' : '' ?>>Україна</option>
        <option value="Польща" <?= ($_POST['country2'] ?? '') === 'Польща' ? 'selected' : '' ?>>Польща</option>
        <option value="Німеччина" <?= ($_POST['country2'] ?? '') === 'Німеччина' ? 'selected' : '' ?>>Німеччина</option>
    </select>
    <button type="submit" name="submit10">OK</button>
</form>
<?php
if (isset($_POST['submit10'])) {
    echo "<p>Вибрана країна: {$_POST['country2']}</p>";
}
?>

<hr>
<h2>11. Підрахунок слів і символів</h2>
<form method="post">
    <textarea name="text11"></textarea><br>
    <button type="submit" name="submit11">Порахувати</button>
</form>
<?php
if (isset($_POST['submit11'])) {
    $txt = trim($_POST['text11']);
    $words = str_word_count($txt, 0, 'АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯабвгґдеєжзиіїйклмнопрстуфхцчшщьюя');
    $chars = mb_strlen($txt);
    echo "<p>Слів: $words, Символів: $chars</p>";
}
?>

<hr>
<h2>12. Передача форми на result.php</h2>
<form method="post" action="result.php">
    <input type="text" name="msg" placeholder="Ваше повідомлення">
    <button type="submit">POST</button>
</form>

<form method="get" action="result.php">
    <input type="text" name="msg" placeholder="Ваше повідомлення">
    <button type="submit">GET</button>
</form>

</body>
</html>