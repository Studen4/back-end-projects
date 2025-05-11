<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.9 - Двовимірні масиви</title>
</head>
<body>
<h1>Виконання завдання 3.9</h1>

<h2>1. Масив 8×5 з випадкових чисел [10; 99]</h2>
<?php
$array = [];
for ($i = 0; $i < 8; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $array[$i][$j] = rand(10, 99);
        echo $array[$i][$j] . ' ';
    }
    echo "<br>";
}
?>

<h2>2. Масив 5×8 з [-99; 99] + максимум</h2>
<?php
$array = [];
$max = -100;
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 8; $j++) {
        $array[$i][$j] = rand(-99, 99);
        echo $array[$i][$j] . ' ';
        if ($array[$i][$j] > $max) $max = $array[$i][$j];
    }
    echo "<br>";
}
echo "Максимум: $max";
?>

<h2>3. Масив 7×4 з [-5; 5] + рядок із найбільшим модулем добутку</h2>
<?php
$array = [];
$maxProduct = 0;
$maxIndex = 0;
for ($i = 0; $i < 7; $i++) {
    $product = 1;
    for ($j = 0; $j < 4; $j++) {
        $val = rand(-5, 5);
        $array[$i][$j] = $val;
        echo $val . ' ';
        $product *= $val;
    }
    if (abs($product) > abs($maxProduct) || $i == 0) {
        $maxProduct = $product;
        $maxIndex = $i;
    }
    echo "<br>";
}
echo "Рядок з найбільшим за модулем добутком: $maxIndex";
?>

<h2>4. Масив 6×7 [0;9], перестановка найбільшого в перше місце</h2>
<?php
$array = [];
for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $array[$i][$j] = rand(0, 9);
    }
}
foreach ($array as &$row) {
    $maxIndex = array_search(max($row), $row);
    if ($maxIndex !== 0) {
        $tmp = $row[0];
        $row[0] = $row[$maxIndex];
        $row[$maxIndex] = $tmp;
    }
    echo implode(' ', $row) . "<br>";
}
?>

<h2>5. 15 унікальних прикладів множення 2–9 (без повторів)</h2>
<?php
$examples = [];
for ($i = 2; $i <= 9; $i++) {
    for ($j = $i; $j <= 9; $j++) {
        $examples[] = [$i, $j];
    }
}
shuffle($examples);
for ($k = 0; $k < 15; $k++) {
    echo $examples[$k][0] . " × " . $examples[$k][1] . " = ?<br>";
}
?>
</body>
</html>