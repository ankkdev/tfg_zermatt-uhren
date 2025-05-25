<?php
session_start();
require_once '../config/database.php';
require_once '../models/Product.php';

$pdo = require '../config/database.php';
$product = new Product($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product->name = $_POST['name'] ?? '';
    $product->description = $_POST['description'] ?? '';
    $product->price = $_POST['price'] ?? '';

    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/zermatt-uhren/public/uploads/'; //carpeta donde se almacenarán las imágenes
    if (!file_exists($uploadDir)) { //si no existe esa carpeta pues la crea
        mkdir($uploadDir, 0755, true);
    }
    $images = [];
    for ($i = 1; $i <= 3; $i++) { //bucle que recorrerá hasta 3 veces (tienen que ser maximo 3 imagenes por producto)
        $key = 'image' . $i; //genera la clave del archivo,este caso el numero, por ello  se concatenara image . $i = image1,image2 y image3
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) { //comprueba que se haya enviado el archivo y no haya error
            $filename = time() . '_' . basename($_FILES[$key]["name"]); //genera nombre unico para cada archivo para que no haya conflictos
            $targetPath = $uploadDir . $filename; //construye ruta completa donde se subiran los archivos
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $targetPath)) { //intentara mover el archivo desde su ubicacion temporal a la carpeta de destino
                $images[$key] = $filename; //si el archivo es movido correctamente,almacena el nombre en el array con la clave
            } else {
                $images[$key] = ''; //y si falla,se asigna una cadena vacia
            }
        } else {
            $images[$key] = '';
        }
    }

    if (empty($images['image1'])) { //comprueba que al menos se haya subido 1 imagen
        echo "Debes subir al menos una imagen para el producto.";
        exit;
    }
    $product->image1 = $images['image1']; //asigna los nombres de archivo de las imagenes a las propeidades correspondientes antes de crear el producto
    $product->image2 = $images['image2'];
    $product->image3 = $images['image3'];

    if (!empty($product->name) && !empty($product->price)) {
        if ($product->create()) { //insertara los datos en la bbdd en la tabla products
            echo "Producto creado con éxito";
        } else {
            echo "Error al crear el producto";
        }
    } else {
        echo "Por favor, completa los campos obligatorios";
    }
}
