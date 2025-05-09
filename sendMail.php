<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Завдання 2.1 - Надсилання листа</title>
</head>
<body>
    <h1>Завдання 2.1 - Надсилання листа</h1>

    <?php
    require 'vendor/autoload.php';

    // Крок 1: створення змінних строкового типу
    $firstName = "Іван";
    $lastName = "Петренко";
    $email = "ivan.petrenko@example.com";
    $city = "Київ";
    $interest = "Програмування";

    echo "<h3>Змінні:</h3>";
    echo "Ім’я: $firstName<br>";
    echo "Прізвище: $lastName<br>";
    echo "Email: $email<br>";
    echo "Місто: $city<br>";
    echo "Інтерес: $interest<br>";

    // Крок 2: створення повідомлення шляхом конкатенації змінних
    $message = "Ім’я: " . $firstName . "\n" .
               "Прізвище: " . $lastName . "\n" .
               "Email: " . $email . "\n" .
               "Місто: " . $city . "\n" .
               "Інтерес: " . $interest . "\n";

    echo "<h3>Форматоване повідомлення:</h3>";
    echo nl2br($message); 

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    try {
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '27a67886765d2d';
        $mail->Password = '8a69477274e7f1';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Від кого та кому
        $mail->setFrom('m.a.harbovskyi@student.khai.edu', 'Іван Петренко');
        $mail->addAddress('m.a.harbovskyi@student.khai.edu');

        // Контент листа
        $mail->isHTML(true);
        $mail->Subject = 'Тестовий лист з PHPMailer';
        $mail->Body    = nl2br($message);

        // Відправка листа
        if ($mail->send()) {
            echo "Лист успішно надіслано на адресу: m.a.harbovskyi@student.khai.edu<br>";
        } else {
            echo "Помилка: не вдалося надіслати лист<br>";
        }
    } catch (Exception $e) {
        echo "Помилка при відправці листа: {$mail->ErrorInfo}<br>";
    }

    ?>
</body>
</html>