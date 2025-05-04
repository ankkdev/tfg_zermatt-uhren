<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>

<body>
    <h3>Inicio de sesión</h3>
    <form action="login.php" method="POST">
        <label for="email">Correo: </label><input type="email" name="email" required><br>
        <label for="pswd">Contraseña</label><input type="password" name="pswd" id="pswd" required><br>
        <button type="submit">Iniciar sesión</button>
    </form>
    <p>¿No tienes cuenta? Regístrate <a href="form-register.php">Regístrarse</a></p>
</body>

</html>