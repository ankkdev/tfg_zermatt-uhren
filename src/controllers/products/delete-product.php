<?php
session_start();
require_once '../config/database.php';
require_once '../models/Product.php';

$pdo = require '../config/database.php';
$product = new Product($pdo);

if (!isset($_GET['id'])) {
    echo "No se ha especificado un producto.";
    exit;
}

$product->id = $_GET['id'];
if ($product->delete()) {
    echo "Producto eliminado con éxito.";
    echo '<br><a href="../admin-panel.php">Volver al panel</a>';
} else {
    echo "Error al eliminar el producto.";
}
