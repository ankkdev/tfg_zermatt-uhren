<?php
session_start();
require_once '../config/database.php';
require_once '../models/Product.php';

$pdo = require '../config/database.php';
$product = new Product($pdo);

$product->id = $_POST['id'] ?? '';
$product->name = $_POST['name'] ?? '';
$product->description = $_POST['description'] ?? '';
$product->price = $_POST['price'] ?? '';

if ($product->update()) {
    echo "Producto actualizado con éxito.";
    echo '<br><a href="form-update-product.php?id=' . $product->id . '">Volver</a>';
} else {
    echo "Error al actualizar el producto.";
}
