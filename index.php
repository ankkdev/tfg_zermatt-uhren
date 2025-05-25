<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind en CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Tailwind en LOCAL (NO FUNCIONA) <link href="/zermatt-uhren/public/lib/tailwind/output.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="/zermatt-uhren/public/css/style.css"> -->
    <link rel="stylesheet" href="/zermatt-uhren/public/lib/fancybox/fancybox.css" /> <!-- css de fancybox,su .js está abajo -->
    <script src="/zermatt-uhren/public/lib/jquery/jquery-3.7.1.js"></script> <!-- JQuery para deslizar imagen para cambiar -->
    <script src="/zermatt-uhren/public/lib/jquery-ui/jquery-ui.js"></script> <!-- JQuery UI para arrastrar contenedor del grid-->
    <title>Zermatt uhren</title>
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    <header">
        <?php include 'src/header.php'; ?> <!-- header -->
        </header>

        <main class="flex-1 flex flex-col items-center justify-center">
            <div id="slider">
                <img src="/zermatt-uhren/public/img/branding/carrusel/carrusel1.webp" class="active" alt="Slide 1">
                <img src="/zermatt-uhren/public/img/branding/carrusel/carrusel2.webp" alt="Slide 2">
                <img src="/zermatt-uhren/public/img/branding/carrusel/carrusel3.webp" alt="Slide 3">
                <img src="/zermatt-uhren/public/img/branding/carrusel/carrusel4.webp" alt="Slide 4">
                <img src="/zermatt-uhren/public/img/branding/carrusel/carrusel5.webp" alt="Slide 5">
            </div>
            <!-- Mostrar 3 relojes enr orden ascendente por ID -->
            <?php
            $pdo = require 'src/controllers/config/database.php';

            $stmt = $pdo->query("SELECT * FROM products ORDER BY id ASC LIMIT 3");
            $topProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <section class="mb-12 p-32 px-0">
                <h2 class="text-4xl text-center text-gray-800 mb-8">Recomendados</h2>
                <div class="flex flex-wrap justify-center gap-8">
                    <?php foreach ($topProducts as $product): ?>
                        <div class="reloj flex flex-col bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300 max-w-xs">
                            <!-- imagen del producto -->
                            <?php if (!empty($product['image1'])): ?>
                                <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image1']); ?>"
                                    alt="<?php echo htmlspecialchars($product['name']); ?>"
                                    class="w-56 h-56 object-cover mb-4 rounded-lg">
                            <?php endif; ?>
                            <p class="text-2xl text-gray-800 font-semibold mb-2 text-center"><?php echo htmlspecialchars($product['name']); ?></p>
                            <!-- 5 estrellas -->
                            <div class="flex justify-center mb-2">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.287 3.955c.3.921-.755 1.688-1.54 1.118l-3.37-2.448a1 1 0 00-1.175 0l-3.37 2.448c-.785.57-1.84-.197-1.54-1.118l1.287-3.955a1 1 0 00-.364-1.118L2.98 9.382c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.955z"></path>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                            <!-- Comentario -->
                            <blockquote class="text-gray-600 italic text-center mb-2">
                                "Este reloj es simplemente increíble, la calidad y el diseño son excepcionales."
                            </blockquote>
                            <p class="text-sm text-gray-500 text-center">- Cliente Satisfecho</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <!-- Galeria de fotos estatico sin uso de la bbdd -->
            <!-- Al hacer hover sobre un contenedor, hace un pequeño zoom en la imagen-->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 w-full m-6 p-1">
                <div class="gridContainer group relative h-60 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 transform group-hover:scale-105" style="background-image: url('/zermatt-uhren/public/img/grid-gallery/brand_5sports_1.webp');"></div>
                </div>
                <div class="gridContainer group relative h-60 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 transform group-hover:scale-105" style="background-image: url('/zermatt-uhren/public/img/grid-gallery/seiko-astro_2.webp');"></div>
                </div>
                <div class="gridContainer group relative h-60 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 transform group-hover:scale-105" style="background-image: url('/zermatt-uhren/public/img/grid-gallery/kingseiko_3.webp');"></div>
                </div>
                <div class="gridContainer group relative h-60 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 transform group-hover:scale-105" style="background-image: url('/zermatt-uhren/public/img/grid-gallery/seiko_prospex_4.webp');"></div>
                </div>
                <div class="gridContainer group relative h-60 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 transform group-hover:scale-105" style="background-image: url('/zermatt-uhren/public/img/grid-gallery/seiko-pressage_5.webp');"></div>
                </div>
                <div class="gridContainer group relative h-60 overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-300 transform group-hover:scale-105" style="background-image: url('/zermatt-uhren/public/img/grid-gallery/premier-seiko_6.webp');"></div>
                </div>
            </div>
        </main>
        <?php include 'src/footer.php'; ?><!-- footer -->
        <script src="/zermatt-uhren/public/js/galeria.js"></script>
        <script src="/zermatt-uhren/public/js/grid-containers.js"></script>
        <script>
            /* 
        1. Ahora,al cargar la página realiza una llamada AJAX al endpoint bienvenido.php
        2. Si recibe un mensaje de bienvenida,se crea y se muestra un pop up en la parte superior derecha de la pantalla durante 3 segundos (solo para usuario normal)
        */
            document.addEventListener('DOMContentLoaded', function() {
                fetch('/zermatt-uhren/src/controllers/auth/bienvenido.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            const popup = document.createElement('div');
                            popup.textContent = data.message;
                            Object.assign(popup.style, { //estilos proporcionados al div
                                position: 'fixed',
                                top: '20px',
                                right: '20px',
                                background: 'rgba(0,0,0,0.8)',
                                color: '#fff',
                                padding: '10px 20px',
                                borderRadius: '5px',
                                zIndex: 9999,
                                opacity: 0,
                                transition: 'opacity 0.3s'
                            });
                            document.body.appendChild(popup); //div flotante / pop up
                            requestAnimationFrame(() => popup.style.opacity = 1); //efecto fade in
                            setTimeout(() => { //desaparecer después de 3 segundos
                                popup.style.opacity = 0;
                                popup.addEventListener('transitionend', () => popup.remove());
                            }, 3000);
                        }
                    })
                    .catch(error => console.error('Error:', error)); //informar de error
            });
            $(document).ready(function() { //al pulsar el boton de menu hamburguesa,aparece/ocultara con efecto slide de 180 milisegundos
                $("#boton-menu").on("click", function() {
                    $("#navbar-sticky").slideToggle(180);
                });
            });
        </script>
</body>

</html>