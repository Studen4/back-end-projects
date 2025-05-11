<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$items = [];
$debug = '';

if (!empty($_GET['search'])) {
    $search = urlencode($_GET['search']);

    $apiKey = 'AIzaSyB9DoJVgja_8UJvujwPQsOe5DzgLPT5PU0';
    $cx = 'd7237930953674fc8';
    $url = "https://www.googleapis.com/customsearch/v1?key=$apiKey&cx=$cx&q=$search";

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
    ]);
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);

    if ($response !== false) {
        $data = json_decode($response, true);
        $items = $data['items'] ?? [];
    }

    // Виводимо debug інформацію лише якщо виникла помилка
    if ($response === false || json_last_error() !== JSON_ERROR_NONE || empty($items)) {
        $debug .= "<h4>Debug Info</h4><div class='debug'>";
        if ($response === false) {
            $debug .= "<p><strong>cURL Error:</strong> " . htmlspecialchars($curl_error) . "</p>";
        }
        if (json_last_error() !== JSON_ERROR_NONE) {
            $debug .= "<p><strong>JSON decode error:</strong> " . json_last_error_msg() . "</p>";
        }
        $debug .= "<pre>" . htmlspecialchars($response) . "</pre>";
        $debug .= "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px auto;
            max-width: 700px;
            background-color: #f4f4f4;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
            margin-bottom: 30px;
        }
        input[type="text"] {
            width: 60%;
            padding: 10px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3367d6;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 15px;
        }
        a {
            text-decoration: none;
            color: #1a0dab;
        }
        a:hover {
            text-decoration: underline;
        }
        .debug {
            background-color: #fff;
            padding: 15px;
            border-left: 5px solid #f44336;
            margin-top: 30px;
            white-space: pre-wrap;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h2>Custom Google Search</h2>
    <form method="GET" action="/Practice_2/index.php">
        <input type="text" name="search" placeholder="Enter search query..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($items)): ?>
        <h3>Results:</h3>
        <ul>
            <?php foreach ($items as $item): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($item['link']); ?>" target="_blank">
                        <?php echo htmlspecialchars($item['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php echo $debug; ?>
</body>
</html>
