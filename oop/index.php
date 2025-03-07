<?php

require __DIR__ . '/vendor/autoload.php';

use App\Product;
use App\ProductService;

$service = new ProductService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['price'])) {
        $name = trim($_POST['name']);
        $price = (float) $_POST['price'];

        if ($name && $price > 0) $service->addProduct(new Product($name, $price));
    }
    elseif (isset($_POST['search_name'])) $searchResult = $service->searchByName(trim($_POST['search_name']));
}

$products = $service->getAllProducts();

?>

<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Продуктовий каталог</title>
    </head>
    <body>

        <h1>Список продуктів</h1>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><?= htmlspecialchars($product) ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Додати продукт</h2>
        <form method="post">
            <label>
                Назва:
                <input type="text" name="name" required>
            </label>
            <label>
                Ціна:
                <input type="number" name="price" step="0.01" required>
            </label>
            <button type="submit">Add</button>
        </form>

        <h2>Пошук продукту</h2>
        <form method="post">
            <label>
                Назва:
                <input type="text" name="search_name" required>
            </label>
            <button type="submit">Search</button>
        </form>

        <?php if (isset($searchResult)): ?>
            <h3>Результат пошуку:</h3>
            <p><?= $searchResult ? htmlspecialchars($searchResult) : 'Продукт не знайдено' ?></p>
        <?php endif; ?>

    </body>
</html>
