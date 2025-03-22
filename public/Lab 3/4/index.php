<?php
session_start();

$products = [
    1 => "Ноутбук",
    2 => "Смартфон",
    3 => "Навушники",
    4 => "Смарт-годинник"
];

// Додаємо товар у сесію
if (isset($_GET["add"])) {
    $id = $_GET["add"];
    
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }
    
    $_SESSION["cart"][$id] = $products[$id];

    // Збереження у cookie (історія покупок)
    if (!isset($_COOKIE["history"])) {
        setcookie("history", json_encode([$products[$id]]), time() + 3600 * 24 * 7, "/");
    } else {
        $history = json_decode($_COOKIE["history"], true);
        $history[] = $products[$id];
        setcookie("history", json_encode($history), time() + 3600 * 24 * 7, "/");
    }

    header("Location: index.php");
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
    <h2>Список товарів:</h2>
    <ul>
        <?php foreach ($products as $id => $name): ?>
            <li>
                <?= htmlspecialchars($name) ?>
                <a href="?add=<?= $id ?>">Додати в корзину</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="cart.php">Перейти в корзину</a>
</body>
</html>
