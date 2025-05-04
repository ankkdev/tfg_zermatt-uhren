<?php
require_once '../config/database.php';
require_once '../models/user.php';

$pdo = require '../config/database.php';
$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//si el metodo del envío es post,se almacenan los datos recibidos,si están vacios se qeudan vacíos
    $email = $_POST['email'] ?? '';
    $password = $_POST['pswd'] ?? '';
    if (!empty($email) && !empty($password)) {//si los datos no están vacios,se busca el correo con la función findByEmail()
        $user = $userModel->findByEmail($email);
        if ($user && password_verify($password, $user['pswd'])) {//se comprueba si es correcto,sea o no,se avisa
            echo "Inicio de sesión exitosa";
        } else {
            echo "El correo o contraseña falla";
        }
    } else {
        echo "Por favor, completa todos los campos";
    }
}
