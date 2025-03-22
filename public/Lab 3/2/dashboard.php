<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: index.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Вітаємо, <?= htmlspecialchars($_SESSION["username"]) ?>!</h2>
    <p>Ви увійшли в систему!</p>
    <a href="logout.php">Вийти</a>
</body>
</html>
