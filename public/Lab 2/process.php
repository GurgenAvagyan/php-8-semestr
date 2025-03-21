<?php
$uploadDir = 'uploads/';

// Перевіряємо, чи файл був завантажений
if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
    $fileName = basename($_FILES['file']['name']);
    $fileSize = $_FILES['file']['size'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileType = mime_content_type($fileTmp);

    // Перевірка, чи існує папка uploads
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Перевірка типу файлу
    $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
    if (!in_array($fileType, $allowedTypes)) {
        die("Помилка: можна завантажувати тільки файли PNG, JPG, JPEG.");
    }

    // Перевірка розміру файлу
    if ($fileSize > 2 * 1024 * 1024) {
        die("Помилка: максимальний розмір файлу - 2 МБ.");
    }

    // Перевіряємо, чи файл з таким ім'ям вже існує
    $targetFile = $uploadDir . $fileName;
    if (file_exists($targetFile)) {
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);
        $fileName = $fileBaseName . '_' . time() . '.' . $fileExt;
        $targetFile = $uploadDir . $fileName;
    }

    // Переміщуємо файл у папку uploads
    if (move_uploaded_file($fileTmp, $targetFile)) {
        echo "Файл успішно завантажено!<br>";
        echo "Ім'я файлу: $fileName<br>";
        echo "Тип файлу: $fileType<br>";
        echo "Розмір файлу: " . round($fileSize / 1024, 1) . " КБ<br>";
        echo "<a href='$targetFile' download>Скачати файл</a>";
    } else {
        echo "Помилка при збереженні файлу.";
    }
} else {
    echo "Файл не був завантажений.";
}
