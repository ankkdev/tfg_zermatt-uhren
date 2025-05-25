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
    <link rel="stylesheet" href="/zermatt-uhren/public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/zermatt-uhren/public/lib/fancybox/fancybox.css" /> <!-- css de fancybox,su .js está abajo -->

    <title><?php echo htmlspecialchars($product['name']); ?></title>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <header class="h-[20vh] pt-24">
        <?php include 'src/header.php'; ?> <!-- header -->
    </header>
    <main class="flex-grow pb-5 pl-4 pr-4 pt-8">
        <div class="container mx-auto py-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-4xl font-bold mb-6 text-center"><?php echo htmlspecialchars($product['name']); ?></h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <?php if (!empty($product['image1'])): ?><!-- Aquí debajo meto el fancybox para las imagenes -->
                            <a data-fancybox="gallery" href="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image1']); ?>">
                                <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image1']); ?>"
                                    alt="<?php echo htmlspecialchars($product['name']); ?>"
                                    class="w-full h-auto rounded mb-4"></a>
                        <?php endif; ?>
                        <?php if (!empty($product['image2']) || !empty($product['image3'])): ?>
                            <div class="flex gap-4"> <!-- mostrar 2 y 3 imagen en horizontal con flex -->
                                <?php if (!empty($product['image2'])): ?>
                                    <a data-fancybox="gallery" href="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image2']); ?>">
                                        <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image2']); ?>"
                                            alt="<?php echo htmlspecialchars($product['name']); ?>"
                                            class="w-1/2 h-auto rounded"></a>
                                <?php endif; ?>
                                <?php if (!empty($product['image3'])): ?>
                                    <a data-fancybox="gallery" href="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image3']); ?>">
                                        <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image3']); ?>"
                                            alt="<?php echo htmlspecialchars($product['name']); ?>"
                                            class="w-1/2 h-auto rounded">
                                    </a>
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
                            <?php if (isset($_SESSION['user'])): ?><!-- para que salga el boton del carrito,tiene que logearse como usuario,sino se avisa que tiene que iniciar sesion -->
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
    <!-- FORO DE COMENTARIOS -->
    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
        <?php
        $smtComentarios = $pdo->prepare("SELECT c.*, u.name FROM comments c LEFT JOIN users u ON c.user_id = u.id WHERE product_id = :product_id ORDER BY created_at DESC");
        $smtComentarios->execute(['product_id' => $product['id']]);
        $comentarios = $smtComentarios->fetchAll(pdo::FETCH_ASSOC);
        ?>
        <div id="commentsContainer" class="mb-4">
            <?php if (count($comentarios)): ?>
                <?php foreach ($comentarios as $comentario): ?>
                    <div class="p-4 mb-4 border rounded">
                        <p class="font-bold"><?php echo htmlspecialchars($comentario['username'] ?? 'Invitado'); ?> dice:</p>
                        <p><?php echo nl2br(htmlspecialchars($comentario['comment'])); ?></p>
                        <small class="text-gray-500"><?php echo $comentario['created_at']; ?></small>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Todavia no hay comentarios,sé el primero</p>
            <?php endif; ?>
        </div>
        <!-- formulario con su textarea donde poder publicar un comentario -->
        <?php if (isset($_SESSION['user'])): ?>
            <form action="/zermatt-uhren/add-comment.php" method="POST" class="bg-white p-4 rounded shadow">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 mb-2">Deja tu comentario:</label>
                    <textarea name="comment" id="comment" rows="4" class="w-full border rounded p-2" required></textarea>
                </div>
                <button type="submit" class="bg-gray-700 hover:bg-gray-500 text-white py-2 px-4 rounded">
                    Publicar comentario
                </button>
            </form>
        <?php else: ?>
            <p class="text-red-600">Para comentar, inicia sesión como usuario normal.</p>
        <?php endif; ?>
    </div>
    </div>
    </div>
    <?php include 'src/footer.php'; ?>
    <script src="/zermatt-uhren/public/js/comment.js"></script>
    <script src="/zermatt-uhren/public/lib/fancybox/fancybox.umd.js"></script><!-- js de fancybox -->
    <script>
        /* para asegurar de que todos los elemtnos del DOM (imagenes enlaces etc) esten compleatmente cargados
        antes de que fancybox intente buscar y enlazarlos, sin ese detector,no funciona fancybox
        */
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind('[data-fancybox="gallery"]', {});
            const msgDiv = document.createElement("div");
            msgDiv.innerHTML = `
            <p style="font-weight: bold; margin-bottom: 10px;">Aviso:</p>
            <p>Debido a la naturaleza y el valor del producto, este reloj <strong>no está disponible para envío a domicilio.</strong></p>
            <p>Para garantizar la seguridad de la entrega y una experiencia personalizada, la recogida se realizará únicamente en la siguiente dirección:</p>
            <p style="margin: 10px 0;">Hinterdorfstrasse 38, Zermatt, Suiza</p>
            <p>Agradecemos tu comprensión y estamos a tu disposición para cualquier consulta adicional.</p>
        `;
            Object.assign(msgDiv.style, { //estilos del msgDiv,contenedor del aviso de recogida del producto en la tienda oficial
                backgroundColor: "#dbeafe",
                color: "#1e40af",
                padding: "10px",
                margin: "10px auto",
                textAlign: "justify",
                border: "1px solid #93c5fd",
                borderRadius: "5px",
                maxWidth: "90%",
                fontSize: "16px"
            });
            // Busca un contenedor alternativo
            const containerElem = document.querySelector(".container.mx-auto.my-8"); //buscar el el elemento con clase 'container'
            console.log("containerElem:", containerElem); //imprimir en consola el valor del containerElem vara verificiar si se encontro o no
            if (containerElem) { //si exiset containerElemn, usa insertBefore() para que aparezca el mensaje
                containerElem.insertBefore(msgDiv, containerElem.firstChild);
                console.log("Mensaje insertado en container");
            } else { //si no se encuentra,se inserta un msgDiv como primer hijo del document.body
                document.body.insertBefore(msgDiv, document.body.firstChild);
                console.log("Mensaje insertado en body");
            }
        });
    </script>
</body>

</html>