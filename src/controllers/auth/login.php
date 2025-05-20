<?php
session_start();
require_once '../config/database.php';
require_once '../models/user.php';

$pdo = require '../config/database.php';
$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //si el metodo del envío es post,se almacenan los datos recibidos,si están vacios se qeudan vacíos
    $email = $_POST['email'] ?? '';
    $password = $_POST['pswd'] ?? '';
    if (!empty($email) && !empty($password)) { //si los datos no están vacios,se busca el correo con la función findByEmail()
        $user = $userModel->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) { //se comprueba si es correcto,sea o no, $user['nombre del campo de la contraseña en la bbdd']
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            if ($user['role'] === 'admin') {
                header("Location: ../admin-panel.php");//si inicia sesion como administrador pues redirecciona al panel de administrador
            } else {
                header("Location: ../../../index.php");//si inicia sesion como usuario pues redirecciona a la pagina principal
            }
        } else {

            echo "El correo o contraseña falla <br>";
            echo '<a href="form-login.php">Volver a intentar iniciar sesión</a>';
        }
    } else {
        echo "Por favor, completa todos los campos";
    }
}
