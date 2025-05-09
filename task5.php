<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.5</title>
</head>
<body>
    <h1>Завдання 3.5</h1>

    <?php
    // Завдання 1: Перевірка, чи число в інтервалі (25; 100)
    $randomNumber = mt_rand(5, 155);
    echo "<h3>1. Перевірка, чи число потрапило в інтервал (25;100)</h3>";
    echo "Число $randomNumber ";
    if ($randomNumber > 25 && $randomNumber < 100) {
        echo "міститься в інтервалі (25, 100)<br>";
    } else {
        echo "не міститься в інтервалі (25, 100)<br>";
    }

    // Завдання 2: Найбільша цифра в тризначному числі
    echo "<h3>2. Найбільша цифра в тризначному числі</h3>";
    $threeDigit = mt_rand(100, 999);
    $digits = str_split($threeDigit);
    $maxDigit = max($digits);
    echo "У числі $threeDigit найбільша цифра $maxDigit<br>";

    // Завдання 3: Сортування трьох чисел
    echo "<h3>3. Сортування трьох чисел</h3>";
    $a = 7;
    $b = 0;
    $c = -5;
    echo "Числа в змінних a, b і c: $a, $b, $c<br>";
    $numbers = [$a, $b, $c];
    sort($numbers);
    echo "Зростаюча послідовність: $numbers[0], $numbers[1], $numbers[2]<br>";

    // Завдання 4: Переведення секунд у години
    echo "<h3>4. Табло із залишком часу до кінця робочого дня</h3>";
    $n = mt_rand(0, 28800);
    echo "$n<br>";
    $hours = floor($n / 3600);
    if ($hours == 1) {
        echo "Залишилась 1 година";
    } elseif ($hours >= 2 && $hours <= 4) {
        echo "Залишилось $hours години";
    } elseif ($hours > 4) {
        echo "Залишилось $hours годин";
    } else {
        echo "Залишилось менше години";
    }
    ?>

</body>
</html>