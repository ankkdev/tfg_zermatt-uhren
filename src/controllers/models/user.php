<?php
class User
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo; //Almacenar conexión de bbdd a $pdo de la clase
    }
    public function create($name, $email, $password) //funcion para crear usuarios con sus 3 parametros
    {
        $hashedPass = password_hash($password, PASSWORD_BCRYPT); //encriptar contraseña y almacenarlo en la bbdd de forma segura
        $stm = $this->pdo->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
        $stm->execute([ //prepara una consulta para insertar un nuevo registro en la tabla users,utilizo marcadores de posicion ':name' ':email' ':password' para evitar inyecciones sql
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPass,
        ]);
    }
    public function findByEmail($email) //esa funcion recibe $email como parametro para luego buscarlo en la bbdd
    {
        $smt = $this->pdo->prepare("SELECT * from users where email = :email"); //selecciona todos los campos de la tabla Users donde el correo coincida con el correo introducido
        $smt->execute([':email' => $email]); //reemplaza el mercador de posición ':email' con el valor real que es '$email'
        return $smt->fetch(PDO::FETCH_ASSOC);
    }
}
