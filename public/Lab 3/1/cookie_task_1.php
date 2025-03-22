<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Зберігання cookie на 7 днів
    if (isset($_POST["username"])) {
        $username = htmlspecialchars($_POST["username"]);
        setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/");
        header("Location: cookie_task_1.php");
        exit();
    }

    // Видалення cookie
    if (isset($_POST["delete_cookie"])) {
        setcookie("username", "", time() - 3600, "/"); 
        header("Location: cookie_task_1.html");
        exit();
    }
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
    <?php if (isset($_COOKIE["username"])): ?>
        <h2>Привіт, <?= htmlspecialchars($_COOKIE["username"]) ?>!</h2>
    <?php endif; ?>

    <a href="cookie_task_1.html">Повернутися назад</a>
</body>
</html>
