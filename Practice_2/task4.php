<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завдання 3.10 - Функції</title>
</head>
<body>
    <h1>Виконання завдання 3.10</h1>

    <?php
    class ArrayHelper {
        // 1. Статичний метод для генерації випадкового цілого числа [a; b]
        public static function getRandomInt(int $a, int $b): int {
            return rand($a, $b);
        }

        // 2. Метод для виводу масиву у рядок
        public static function printArray(array $arr): void {
            foreach ($arr as $val) {
                echo $val . ' ';
            }
            echo "<br>";
        }

        // 3. Метод для сортування масиву за зростанням
        public static function sortArray(array &$arr): void {
            sort($arr);
        }
    }
    ?>

    <h2>1. Масив із 20 випадкових цілих чисел</h2>
    <?php
        $arr1 = [];
        for ($i = 0; $i < 20; $i++) {
            $arr1[] = ArrayHelper::getRandomInt(1, 100);
        }
        ArrayHelper::printArray($arr1);
    ?>

    <h2>2. Виведення 5 масивів по 10 випадкових чисел</h2>
    <?php
        $arrays = [];
        for ($i = 0; $i < 5; $i++) {
            $row = [];
            for ($j = 0; $j < 10; $j++) {
                $row[] = ArrayHelper::getRandomInt(1, 50);
            }
            $arrays[] = $row;
            ArrayHelper::printArray($row);
        }
    ?>

    <h2>3. Виведення 5 відсортованих масивів</h2>
    <?php
        foreach ($arrays as &$row) {
            ArrayHelper::sortArray($row);
            ArrayHelper::printArray($row);
        }
    ?>
</body>
</html>