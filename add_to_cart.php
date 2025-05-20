<?php
session_start();
if (!isset($_POST['id']) || !isset($_POST['quantity'])) {
    header('Location: index.php');
    exit;
}
$productId = intval($_POST['id']);
$quantity = intval($_POST['quantity']);

if (!isset($_SESSION['cart'])) {//verificar que lleguen datos estructurados
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['cart'])) {//inicializar si no existe
    $_SESSION['cart'] = [];
}
if (isset($_SESSION['cart'][$productId])) {//si el producto ya esta en el carrito,pues se suma la cantidad,de lo contrario se añade sin más
    $_SESSION['cart'][$productId] += $quantity;
} else {
    $_SESSION['cart'][$productId] = $quantity;
}
header("Location: cart.php");
exit;
