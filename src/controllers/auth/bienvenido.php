<?php
/* 
1. Comñrueba si existe la sesion de user y si esta definido como array en campo name
2. Define un JSON con el mensaje de bienvenida,lo muestra y si no,pues un JSON con mensaje vacio
*/
session_start();
header('Content-Type: application/json');

if (
    isset($_SESSION['user']) &&
    is_array($_SESSION['user']) &&
    !empty($_SESSION['user']['name'])
) {
    echo json_encode(["message" => "Bienvenido " . $_SESSION['user']['name']]);
} else {
    echo json_encode(["message" => ""]);
}
