<?php
$logFile = 'log.txt';

// Перевіряємо, чи був надісланий текст
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['text'])) {
    $text = trim($_POST['text']) . PHP_EOL;
    file_put_contents($logFile, $text, FILE_APPEND);
    echo "Текст успішно записано у log.txt!<br>";
}

// Виведення вмісту log.txt
if (file_exists($logFile)) {
    echo "<h3>Вміст файлу log.txt:</h3>";
    echo "<pre>" . htmlspecialchars(file_get_contents($logFile)) . "</pre>";
} else {
    echo "Файл log.txt ще не створено.";
}
