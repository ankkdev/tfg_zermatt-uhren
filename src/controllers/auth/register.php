<?php
require_once '../config/database.php';
require_once '../models/user.php';

$pdo = require '../config/database.php';
$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Comprueba si el metodo del envio de datos es POST,de ser asi,almacena los datos en las variables
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pswd'] ?? '';

    if (!empty($name) && !empty($email) && !empty($pass)) { //Si las variables no están vacias y 
        if ($userModel->findByEmail($email)) { //si existe el usuario con el correo proporcionado,si o no muestra el mensaje
            echo "El correo ya está registrado<br>";
            echo '<a href="form-login.php">Iniciar sesión</a>';
        } else {
            $userModel->create($name, $email, $pass); //si el usuario introducido no existe,se crea
            echo "Usuario " . $name . " creado correctamente<br>";
            echo '<a href="form-login.php">Iniciar sesión</a>';
        }
    } else {
        echo "Por favor, completa todos los campos";
    }
}
