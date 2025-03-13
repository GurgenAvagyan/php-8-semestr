<?php
// Перевіряємо, чи були передані дані з форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    $surname = isset($_POST["surname"]) ? trim($_POST["surname"]) : "";

    // Перевірка на пусті значення
    if (!empty($name) && !empty($surname)) {
        echo "<br><br>Вітаємо, $name $surname!";
    } else {
        echo "<br><br>Будь ласка, заповніть всі поля!";
    }
}