<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Перевірка наявності імені користувача
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        die("Користувач з таким ім'ям вже існує.");
    }

    // Перевірка наявності email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        die("Користувач з таким email вже існує.");
    }

    // Вставка в базу даних
    $request = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($request->execute([$username, $email, $hashed_password])) {
        echo "Реєстрація успішна! <a href='login.html'>Увійти</a>";
    } else {
        echo "Помилка реєстрації.";
    }


    $conn = null;
}
