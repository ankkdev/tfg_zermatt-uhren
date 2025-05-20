<?php
session_start();
require_once 'src/controllers/config/database.php';
require_once 'src/controllers/models/Product.php';

$pdo = require 'src/controllers/config/database.php';

$cart = $_SESSION['cart'] ?? [];
$cartItems = [];

if ($cart) {
    $placeholders = implode(',', array_fill(0, count($cart), '?'));
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute(array_keys($cart));
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mi Carrito</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 p-4">
    <h1 class="text-3xl font-bold mb-4">Tu Carrito</h1>
    <?php if ($cartItems): ?>
        <ul>
            <?php foreach ($cartItems as $item): ?>
                <li class="mb-2">
                    <?php echo htmlspecialchars($item['name']); ?> -
                    Cantidad: <?php echo $cart[$item['id']]; ?> -
                    Precio: <?php echo htmlspecialchars($item['price']) . "€"; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="create_checkout_session.php" class="bg-gray-700 hover:bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Proceder al Pago</a>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
</body>

</html>