<?php
    session_start();
    $timeout_duration = 300;

    // Перевіряємо, чи є час останньої активності в сесії
    if (isset($_SESSION['last_activity'])) {
        // Обчислюємо, скільки часу пройшло з останньої активності
        $inactive_time = time() - $_SESSION['last_activity'];
        if ($inactive_time > $timeout_duration) {
            session_unset();
            session_destroy();
            setcookie(session_name(), '', time() - 3600, '/');
            header("Location: message.php");
            exit();
        }
    }

    // Оновлюємо час останньої активності на поточний
    $_SESSION['last_activity'] = time();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Сесія активна!</h1>
    <p>Ти активний на сайті, і сесія працює нормально.</p>
    <p>Якщо ти не будеш активним більше 5 хвилин, сесія завершиться автоматично.</p>
</body>
</html>
