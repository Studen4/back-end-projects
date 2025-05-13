<?php
// Підключення автозавантажувача Composer
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;

$data = [
    'name' => 'Misha',
    'email' => 'm.a.harbovskyi@student.khai.edu',
    'roles' => ['admin', 'editor'],
    'logged_in' => true,
];

echo "<h3>Результат var_dump:</h3>";
echo "<pre>";
var_dump($data);
echo "</pre>";

echo "<h3>Результат dump() з var-dumper:</h3>";
dump($data);