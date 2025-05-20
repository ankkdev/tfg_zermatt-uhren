<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <?php include '../../header.php'; ?>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h3 class="text-xl font-bold mb-6 text-center">Crear Producto</h3>
            <form action="create-product.php" method="POST" class="space-y-4" enctype="multipart/form-data">
                <div>
                    <label for="name" class="block text-gray-700">Nombre:</label>
                    <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label for="description" class="block text-gray-700">Descripción:</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"></textarea>
                </div>
                <div>
                    <label for="price" class="block text-gray-700">Precio:</label>
                    <input type="number" step="0.01" name="price" id="price" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <!-- Imagen 1 -->
                <div>
                    <label for="image1" class="block text-gray-700">Imagen 1 (requerida):</label>
                    <input type="file" name="image1" id="image1" accept="image/*" required class="mt-1 block w-full">
                </div>
                <!-- Imagen 2 -->
                <div>
                    <label for="image2" class="block text-gray-700">Imagen 2 (opcional):</label>
                    <input type="file" name="image2" id="image2" accept="image/*" class="mt-1 block w-full">
                </div>
                <!-- Imagen 3 -->
                <div>
                    <label for="image3" class="block text-gray-700">Imagen 3 (opcional):</label>
                    <input type="file" name="image3" id="image3" accept="image/*" class="mt-1 block w-full">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-500 transition-colors">Crear Producto</button>
            </form>
        </div>
    </div>
    <?php include '../../footer.php'; ?>
</body>

</html>