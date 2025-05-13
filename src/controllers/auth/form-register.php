<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <?php include '../../header.php'; ?>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h3 class="text-2xl font-bold mb-6 text-center">Crear cuenta</h3>
            <form action="register.php" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-gray-700">Nombre de usuario:</label>
                    <input type="text" id="name" name="name" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <div>
                    <label for="email" class="block text-gray-700">Correo:</label>
                    <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <div>
                    <label for="pswd" class="block text-gray-700">Contraseña:</label>
                    <input type="password" name="pswd" id="pswd" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <button type="submit" class="w-full bg-gray-700 hover:bg-gray-500 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">Registrarse</button>
            </form>
            <p class="mt-4 text-center text-gray-600">
                ¿Ya tienes una cuenta?
                <a href="form-login.php" class="text-blue-600 hover:underline">Iniciar sesión</a>
            </p>
        </div>
    </div>
    <?php include '../../footer.php'; ?>
=======
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
>>>>>>> 8a892db208db029dd095bba20cc226614f5093db
</body>

</html>