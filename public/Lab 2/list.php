<?php
$uploadDir = 'uploads/';

if (!is_dir($uploadDir)) {
    die("Папка uploads не існує.");
}

// Отримуємо список файлів (без `.` і `..`)
$files = array_diff(scandir($uploadDir), ['.', '..']);

echo "<h3>Список завантажених файлів:</h3>";

if (empty($files)) {
    echo "Файлів немає.";
} else {
    echo "<ul>";
    foreach ($files as $file) {
        echo "<li><a href='$uploadDir$file' download>$file</a></li>";
    }
    echo "</ul>";
}
