<?php
    session_start();

    // Отримуємо корзину з сесії
    $cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];

    // Отримуємо історію покупок з cookie
    $history = isset($_COOKIE["history"]) ? json_decode($_COOKIE["history"], true) : [];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Корзина:</h1>
    <?php if (!empty($cart)): ?>
        <ul>
            <?php foreach ($cart as $name): ?>
                <li><?= htmlspecialchars($name) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="clear.php">Очистити корзину</a>
    <?php else: ?>
        <p>Корзина порожня.</p>
    <?php endif; ?>

    <h2>Попередні покупки:</h2>
    <?php if (!empty($history)): ?>
        <ul>
            <?php foreach ($history as $name): ?>
                <li><?= htmlspecialchars($name) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ще не було покупок.</p>
    <?php endif; ?>

    <a href="index.php">Назад до магазину</a>
</body>
</html>
