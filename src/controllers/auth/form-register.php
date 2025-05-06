<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>

<body>
    <h3>Registro</h3>
    <form action="register.php" method="POST">
        <label for="username">Nombre de usuario:</label><input type="text" id="name" name="name" required><br>
        <label for="email">Correo: </label><input type="email" name="email" required><br>
        <label for="pswd">Contraseña</label><input type="password" name="pswd" id="pswd" required><br>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? Inicia sesión <a href="form-login.php">Iniciar sesión</a></p>
</body>

</html>