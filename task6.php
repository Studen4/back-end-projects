<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.6</title>
</head>
<body>
    <h1>Завдання 3.6</h1>

    <?php
    $argv = [null, 7, 12, 5, -3.2, 2.5, -7.1, 'POTOP'];

    // Завдання 1: Перевірка, чи число парне або непарне
    echo "<h3>1. Перевірка, чи число парне або непарне</h3>";
    $number = $argv[1];
    echo "Введене число: $number<br>";
    if (filter_var($number, FILTER_VALIDATE_INT) !== false) {
        if ($number % 2 == 0) {
            echo "Число є парним<br>";
        } else {
            echo "Число є непарним<br>";
        }
    } else {
        echo "Помилка: введено не ціле число<br>";
    }

    // Завдання 2: Сума двох цілих чисел
    echo "<h3>2. Сума двох цілих чисел</h3>";
    $a = $argv[2];
    $b = $argv[3];
    echo "Числа: $a і $b<br>";
    if (filter_var($a, FILTER_VALIDATE_INT) !== false && filter_var($b, FILTER_VALIDATE_INT) !== false) {
        $sum = $a + $b;
        echo "Сума: $sum<br>";
    } else {
        echo "Помилка: одне або обидва значення не є цілими числами<br>";
    }

    // Завдання 3: Менше за модулем із трьох речових чисел
    echo "<h3>3. Менше за модулем із трьох речових чисел</h3>";
    $x = (float)$argv[4];
    $y = (float)$argv[5];
    $z = (float)$argv[6];
    echo "Числа: $x, $y, $z<br>";
    $min = $x;
    if (abs($y) < abs($min)) $min = $y;
    if (abs($z) < abs($min)) $min = $z;
    echo "Менше за модулем: $min<br>";

    // Завдання 4: Перевірка на паліндром
    echo "<h3>4. Перевірка на паліндром</h3>";
    $word = strtolower(trim($argv[7]));
    echo "Введене слово: $word<br>";
    if (strlen($word) !== 5) { 
        echo "Помилка: слово повинно містити рівно 5 літер<br>";
    } else {
        $reversed = strrev($word); 
        if ($word === $reversed) { 
            echo "Слово є паліндромом<br>";
        } else {
            echo "Слово не є паліндромом<br>";
        }
    }
    ?>

</body>
</html>