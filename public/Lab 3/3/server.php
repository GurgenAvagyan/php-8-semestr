<?php
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: index.html");
        exit();
    }
    
    $ip_address = $_SERVER["REMOTE_ADDR"]; // IP-адреса клієнта
    $user_agent = $_SERVER["HTTP_USER_AGENT"]; // Назва та версія браузера
    $script_name = $_SERVER["PHP_SELF"]; // Назва скрипта, що виконується
    $request_method = $_SERVER["REQUEST_METHOD"]; // Метод запиту (GET або POST)
    $file_path = $_SERVER["SCRIPT_FILENAME"]; // Шлях до файлу на сервері
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Дані про сервер та запит:</h1>
    <ul>
        <li><strong>IP-адреса клієнта:</strong> <?= htmlspecialchars($ip_address) ?></li>
        <li><strong>Браузер:</strong> <?= htmlspecialchars($user_agent) ?></li>
        <li><strong>Назва виконуваного скрипта:</strong> <?= htmlspecialchars($script_name) ?></li>
        <li><strong>Метод запиту:</strong> <?= htmlspecialchars($request_method) ?></li>
        <li><strong>Шлях до файлу:</strong> <?= htmlspecialchars($file_path) ?></li>
    </ul>
    <a href="index.html">Назад</a>
</body>
</html>
