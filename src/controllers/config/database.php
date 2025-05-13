<?php
$host = "localhost";
$dbname = "zzu_bd";
$username = "root";
$password = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);//creacion de la conexion a la bbdd con el nombre del host,de la bbd,del usuario y contra
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Configurar la conexion para que lance excepciones si hay errores
} catch (PDOException $e) {
    die("Error de conexión " . $e->getMessage());
}
return $pdo;//devuelve la instancia de la conexion $pdo para que pueda ser utilizada en otros archivos
