<!-- filepath: /Applications/XAMPP/xamppfiles/htdocs/zermatt-uhren/src/controllers/auth/form-login.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <?php include '../../header.php'; ?>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-xs">
            <h3 class="text-xl font-bold mb-6 text-center">Inicio de sesión</h3>
            <form action="login.php" method="POST" class="space-y-4">
                <div>
                    <label for="email" class="block text-gray-700">Correo:</label>
                    <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <div>
                    <label for="pswd" class="block text-gray-700">Contraseña:</label>
                    <input type="password" name="pswd" id="pswd" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                <button type="submit" class="w-full bg-gray-700 text-white py-2 rounded hover:bg-gray-500 transition-colors">Iniciar sesión</button>
            </form>
        </div>
        <p class="mt-4 text-gray-600">
            ¿No tienes cuenta? <a href="form-register.php" class="text-blue-600 hover:underline">Regístrarse</a>
        </p>    
    </div>
    <?php include '../../footer.php'; ?>
</body>

</html>