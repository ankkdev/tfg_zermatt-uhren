<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/zermatt-uhren/public/css/style.css">
    <script src="/zermatt-uhren/public/lib/jquery/jquery-3.7.1.js"></script>
    <title>Aviso - Cambios y Devoluciones</title>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="bg-white shadow-md">
        <?php include 'src/header.php'; ?> <!-- header -->
    </header>
    <main class="flex-grow container mx-auto px-4 py-8 mt-32">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center mb-6">Aviso</h1>
            <p class="text-gray-700 mb-4">
                Debido a la naturaleza y el valor del producto, este reloj no está disponible para envío a domicilio.
            </p>
            <p class="text-gray-700 mb-4">
                Para garantizar la seguridad de la entrega y una experiencia personalizada, la recogida se realizará únicamente en la siguiente dirección:
            </p>
            <p class="text-gray-900 text-xl font-medium mb-4">
                📍 Hinterdorfstrasse 38, Zermatt, Suiza
            </p>
            <p class="text-gray-700">
                Agradecemos tu comprensión y estamos a tu disposición para cualquier consulta adicional.
            </p>
        </div>
    </main>
    <footer class="bg-white shadow-md">
        <?php include 'src/footer.php'; ?><!-- footer -->
    </footer>
</body>

</html>