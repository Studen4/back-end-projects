<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.8 - Масиви</title>
</head>
<body>
    <h1>Виконання завдання 3.8</h1>

    <h2>1. Парні числа від 2 до 20</h2>
    <?php
        $even = [];
        for ($i = 2; $i <= 20; $i += 2) {
            $even[] = $i;
        }
        echo implode(' ', $even) . '<br>';
        foreach ($even as $num) {
            echo $num . '<br>';
        }
    ?>

    <h2>2. Непарні числа від 1 до 99, прямий і зворотній порядок</h2>
    <?php
        $odd = [];
        for ($i = 1; $i < 100; $i += 2) {
            $odd[] = $i;
        }
        echo implode(' ', $odd) . '<br>';
        echo implode(' ', array_reverse($odd));
    ?>

    <h2>3. Масив із 15 випадкових чисел [0;9] і підрахунок парних</h2>
    <?php
        $rand = [];
        $evenCount = 0;
        for ($i = 0; $i < 15; $i++) {
            $num = rand(0, 9);
            $rand[] = $num;
            if ($num % 2 === 0) $evenCount++;
        }
        echo implode(' ', $rand) . '<br>';
        echo "Кількість парних елементів: $evenCount";
    ?>

    <h2>4. Масив із 8 чисел [1;10] з заміною непарних індексів на 0</h2>
    <?php
        $arr = [];
        for ($i = 0; $i < 8; $i++) {
            $arr[] = rand(1, 10);
        }
        echo implode(' ', $arr) . '<br>';
        for ($i = 1; $i < 8; $i += 2) {
            $arr[$i] = 0;
        }
        echo implode(' ', $arr);
    ?>

    <h2>5. Порівняння середніх арифметичних двох масивів [0;5]</h2>
    <?php
        $a1 = $a2 = [];
        for ($i = 0; $i < 5; $i++) {
            $a1[] = rand(0, 5);
            $a2[] = rand(0, 5);
        }
        $avg1 = array_sum($a1) / count($a1);
        $avg2 = array_sum($a2) / count($a2);
        echo implode(' ', $a1) . '<br>';
        echo implode(' ', $a2) . '<br>';
        if ($avg1 > $avg2) echo "Середнє 1-го більше";
        elseif ($avg1 < $avg2) echo "Середнє 2-го більше";
        else echo "Середні рівні";
    ?>

    <h2>6. Чи є масив із 4 чисел [10;99] строго зростаючим</h2>
    <?php
        $arr = [];
        for ($i = 0; $i < 4; $i++) {
            $arr[] = rand(10, 99);
        }
        echo implode(' ', $arr) . '<br>';
        $isIncreasing = true;
        for ($i = 1; $i < 4; $i++) {
            if ($arr[$i] <= $arr[$i-1]) {
                $isIncreasing = false;
                break;
            }
        }
        echo $isIncreasing ? "Масив строго зростає" : "Масив не строго зростає";
    ?>

    <h2>7. Перші 20 чисел Фібоначчі</h2>
    <?php
        $fib = [1, 1];
        for ($i = 2; $i < 20; $i++) {
            $fib[] = $fib[$i-1] + $fib[$i-2];
        }
        echo implode(' ', $fib);
    ?>

    <h2>8. Максимальний елемент і останній індекс у масиві [-15;15]</h2>
    <?php
        $arr = [];
        for ($i = 0; $i < 12; $i++) {
            $arr[] = rand(-15, 15);
        }
        echo implode(' ', $arr) . '<br>';
        $max = max($arr);
        $lastIndex = array_keys($arr, $max);
        echo "Максимум: $max, останній індекс: " . end($lastIndex);
    ?>

    <h2>9. Відношення елементів двох масивів [1;9]</h2>
    <?php
        $a = $b = $c = [];
        $intCount = 0;
        for ($i = 0; $i < 10; $i++) {
            $a[] = rand(1, 9);
            $b[] = rand(1, 9);
            $c[$i] = $a[$i] / $b[$i];
            if (fmod($c[$i], 1) === 0.0) $intCount++;
        }
        echo implode(' ', $a) . '<br>';
        echo implode(' ', $b) . '<br>';
        echo implode(' ', $c) . '<br>';
        echo "Цілих елементів: $intCount";
    ?>

    <h2>10. Найчастіше значення в масиві [-1;1]</h2>
    <?php
        $arr = [];
        for ($i = 0; $i < 11; $i++) {
            $arr[] = rand(-1, 1);
        }
        echo implode(' ', $arr) . '<br>';
        $counts = array_count_values($arr);
        arsort($counts);
        $values = array_keys($counts);
        if (count($counts) === 1 || $counts[$values[0]] > $counts[$values[1]]) {
            echo "Найчастіше зустрічається: " . $values[0];
        }
    ?>

    <h2>11. Парне число, сума модулів лівої і правої половини</h2>
    <?php
        do {
            $n = 10; // замість введення з клавіатури
        } while ($n <= 0 || $n % 2 != 0);
        $arr = [];
        for ($i = 0; $i < $n; $i++) {
            $arr[] = rand(-5, 5);
        }
        echo implode(' ', $arr) . '<br>';
        $half = $n / 2;
        $left = array_slice($arr, 0, $half);
        $right = array_slice($arr, $half);
        $sumLeft = array_sum(array_map('abs', $left));
        $sumRight = array_sum(array_map('abs', $right));
        if ($sumLeft > $sumRight) echo "Сума лівої половини більша";
        elseif ($sumLeft < $sumRight) echo "Сума правої більша";
        else echo "Суми рівні";
    ?>

    <h2>12. Масив з 12 чисел без нулів, рівна кількість + та -</h2>
    <?php
        $arr = [];
        $pos = range(1, 10);
        $neg = range(-10, -1);
        shuffle($pos);
        shuffle($neg);
        $arr = array_merge(array_slice($pos, 0, 6), array_slice($neg, 0, 6));
        shuffle($arr);
        echo implode(' ', $arr);
    ?>

    <h2>13. Масив з n чисел [0;n], парні — у новий масив</h2>
    <?php
        do {
            $n = 10; // замість введення
        } while ($n <= 3);
        $arr = [];
        for ($i = 0; $i < $n; $i++) {
            $arr[] = rand(0, $n);
        }
        echo implode(' ', $arr) . '<br>';
        $even = array_filter($arr, fn($x) => $x % 2 === 0);
        echo implode(' ', $even);
    ?>

</body>
</html>