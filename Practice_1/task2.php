<!DOCTYPE html>
<html>
<head>
    <title>Завдання 3.2</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Завдання 3.2</h1>

    <?php
    // 1. Площа і периметр прямокутного трикутника
    $a = 3;
    $b = 4;
    $area = 0.5 * $a * $b; 
    $c = sqrt($a**2 + $b**2); 
    $perimeter = $a + $b + $c;

    echo "<h3>1. Площа та периметр прямокутного трикутника</h3>";
    echo "Катети: a = $a, b = $b<br>";
    echo "Площа: $area<br>";
    echo "Периметр: $perimeter<br><br>";

    // 2. Кількість цифр у числі
    $n = 32759;
    $digits = strlen((string)$n);

    echo "<h3>2. Кількість цифр у числі</h3>";
    echo "Число: $n<br>";
    echo "Кількість цифр: $digits<br><br>";

    // 3. Функція сигнум
    $n = -12.5;
    if ($n > 0) {
        $sign = 1;
    } elseif ($n < 0) {
        $sign = -1;
    } else {
        $sign = 0;
    }

    echo "<h3>3. Значення функції сигнум</h3>";
    echo "Число: $n<br>";
    echo "Сигнум: $sign<br>";
    ?>
</body>
</html>