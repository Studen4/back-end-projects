<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.3 - Генерація випадкових чисел</title>
</head>
<body>
    <h1>Завдання 3.3</h1>

    <?php
    echo "<h2>1. Речове випадкове число в проміжку [-3;3]</h2>";
    $randomInt = mt_rand(-3, 3);
    echo "Випадкове число: $randomInt<br>";

    echo "<h2>2. Ціле випадкове число в проміжку [-n;n]</h2>";
    $n = 15;
    $randomInt = mt_rand(-$n, $n);
    echo "Для n = $n випадкове ціле число: $randomInt<br>";

    echo "<h2>3. Ціле випадкове число в проміжку [a;b]</h2>";
    $a = 10;
    $b = 25;
    // b > a
    $randomRange = mt_rand($a, $b);
    echo "Для a = $a і b = $b випадкове ціле число: $randomRange<br>";
    ?>
</body>
</html>