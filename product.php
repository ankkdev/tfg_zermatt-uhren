<?php
session_start();
require_once 'src/controllers/config/database.php';
require_once 'src/controllers/models/Product.php';
$pdo = require 'src/controllers/config/database.php';

if (!isset($_GET['id'])) {
    echo "Producto no especificado.";
    exit;
}

$id = $_GET['id'];

// Consulta el producto por id
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Producto no encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title><?php echo htmlspecialchars($product['name']); ?></title>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <?php include 'src/header.php'; ?>

    <main class="flex-grow p-4">
        <div class="container mx-auto py-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-4xl font-bold mb-6 text-center"><?php echo htmlspecialchars($product['name']); ?></h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <?php if (!empty($product['image1'])): ?>
                            <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image1']); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>"
                                class="w-full h-auto rounded mb-4">
                        <?php endif; ?>
                        <?php if (!empty($product['image2']) || !empty($product['image3'])): ?>
                            <div class="flex gap-4"> <!-- mostrar 2 y 3 imagen en horizontal con flex -->
                                <?php if (!empty($product['image2'])): ?>
                                    <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image2']); ?>"
                                        alt="<?php echo htmlspecialchars($product['name']); ?>"
                                        class="w-1/2 h-auto rounded">
                                <?php endif; ?>
                                <?php if (!empty($product['image3'])): ?>
                                    <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image3']); ?>"
                                        alt="<?php echo htmlspecialchars($product['name']); ?>"
                                        class="w-1/2 h-auto rounded">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div> <!-- Mostrar descripcion y precio -->
                        <p class="text-xl text-gray-700 mb-4 leading-relaxed">
                            <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                        </p>
                        <p class="text-3xl font-bold text-green-600 mb-4">
                            <?php echo htmlspecialchars($product['price']) . "€"; ?>
                        </p>
                        <?php if ($product['stock'] > 0): /* Si no quedan unidades pues no se puede 
                            añadir al carrito "No disponible,si esta disponible,se mostrara un input
                             number para seleccionar la cantidad deseada*/ ?>
                            <p class="text-lg text-gray-800 mb-2">Stock disponible: <?php echo htmlspecialchars($product['stock']); ?></p>
                            <?php if (isset($_SESSION['user'])): ?>//para que salga el boton del carrito,tiene que logearse como usuario,sino se avisa que tiene que iniciar sesion
                            <form action="add_to_cart.php" method="POST" class="mt-4">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                <label for="quantity" class="block text-gray-700 mb-2">Cantidad:</label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?php echo htmlspecialchars($product['stock']); ?>" class="border rounded p-2 w-24 mb-4">
                                <button type="submit" class="w-full bg-gray-700 hover:bg-gray-500 text-white py-3 rounded">
                                    Añadir al carrito
                                </button>
                            </form>
                        <?php else: ?>
                            <p class="text-red-600 font-bold">Inicia sesión para poder añadir al carrito</p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p class="text-red-600 font-bold">No disponible</p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'src/footer.php'; ?>
</body>

</html>