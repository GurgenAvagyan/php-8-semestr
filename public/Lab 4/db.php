<?php
$host = "postgres";
$dbname = "users_db";
$username = "laravel-getting-started-user";
$password = "laravel-getting-started-password";
$port = "5432";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
