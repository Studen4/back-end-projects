<!DOCTYPE html>
<html>
<head>
    <title>Завдання 3.4</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Завдання 3.4</h1>

    <h2>1. Парне чи непарне число</h2>
    <?php
        $n = 7;
        if ($n % 2 == 0) {
            echo "$n — парне число.";
        } else {
            echo "$n — непарне число.";
        }
    ?>

    <h2>2. Найближче до 10</h2>
    <?php
        $m = 8.5;
        $n = 11.45;
        $diffM = abs(10 - $m);
        $diffN = abs(10 - $n);

        if ($diffM < $diffN) {
            echo "Число $m ближче до 10.";
        } else {
            echo "Число $n ближче до 10.";
        }
    ?>

    <h2>3. Корені квадратного рівняння</h2>
    <?php
        $a = 1;
        $b = -3;
        $c = 2;

        $D = $b * $b - 4 * $a * $c;

        if ($D > 0) {
            $x1 = (-$b + sqrt($D)) / (2 * $a);
            $x2 = (-$b - sqrt($D)) / (2 * $a);
            echo "Два дійсних кореня: x₁ = $x1, x₂ = $x2";
        } elseif ($D == 0) {
            $x = -$b / (2 * $a);
            echo "Один дійсний корінь: x = $x";
        } else {
            echo "Коренів немає (дискримінант < 0).";
        }
    ?>
</body>
</html>