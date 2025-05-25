<?php
session_start();
require_once 'src/controllers/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user'])) {
        header('HTTP/1.1 403 Forbidden');
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No autorizado']);
        exit;
    }

    $productId = $_POST['product_id'];
    $comment = trim($_POST['comment']);
    $userId = $_SESSION['user']['id'];

    if (empty($comment)) { //recibe y valida el comentario no vacio
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'El comentario no puede estar vacío']);
            exit;
        }
        header("Location: product.php?id=" . $productId . "&error=empty");
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO comments (product_id, user_id, comment) VALUES (:product_id, :user_id, :comment)"); //inserta comentario en la bbdd
    $stmt->execute([
        'product_id' => $productId,
        'user_id' => $userId,
        'comment'   => $comment
    ]);

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //si es una solicitud AJAX, devuelve JSON con los datos del comentario,sino redirige a la pagina del producto
        $response = [
            'username'   => $_SESSION['user']['name'] ?? 'Invitado',
            'comment'    => htmlspecialchars($comment),
            'created_at' => date('Y-m-d H:i:s')
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        header("Location: product.php?id=" . $productId);
        exit;
    }
}
