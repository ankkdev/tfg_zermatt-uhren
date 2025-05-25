<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/zermatt-uhren/public/css/style.css">
    <script src="/zermatt-uhren/public/lib/jquery/jquery-3.7.1.js"></script>
    <title>Servicios - Nuestros Servicios Especializados</title>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="h-auto pt-32">
        <?php include 'src/header.php'; ?> <!-- header -->
    </header>

    <main class="container mx-auto p-6">
        <h2 class="text-4xl font-bold text-center mb-10">Servicios</h2>

        <!-- mantenimiento y reparacion -->
        <section class="mb-10">
            <h3 class="text-3xl font-semibold mb-4">Mantenimiento y Reparación</h3>
            <p class="mb-4">
                Ofrecemos servicios de mantenimiento preventivo y correctivo para asegurar que tu reloj se encuentre siempre en óptimas condiciones.
                Nuestro equipo de expertos utiliza técnicas tradicionales y tecnología de última generación para garantizar que cada pieza reciba el cuidado que merece.
            </p>
        </section>

        <!--personalizacion -->
        <section class="mb-10">
            <h3 class="text-3xl font-semibold mb-4">Personalización</h3>
            <p class="mb-4">
                ¿Quieres un reloj único? Nuestros servicios de personalización te permiten elegir materiales, detalles y acabados para crear un reloj a tu medida.
                Desde grabados especiales hasta la elección de correas y cajas, colaboramos contigo para diseñar la pieza perfecta.
            </p>
        </section>

        <!-- consultoria y asesoramiento -->
        <section class="mb-10">
            <h3 class="text-3xl font-semibold mb-4">Consultoría y Asesoramiento</h3>
            <p class="mb-4">
                Nuestro equipo de expertos está disponible para ofrecerte asesoramiento en el cuidado y la selección de tu reloj.
                Ya sea para ampliar tu colección o para aprender más sobre el mantenimiento adecuado, estamos aquí para ayudarte.
            </p>
        </section>

        <!-- Otros Servicios -->
        <section class="mb-10">
            <h3 class="text-3xl font-semibold mb-4">Otros Servicios</h3>
            <p class="mb-4">
                Además de los servicios mencionados, también ofrecemos limpieza especializada, ajustes de precisión y protección ante golpes.
                Nos comprometemos a ofrecer un servicio integral para la máxima durabilidad y rendimiento de nuestros productos.
            </p>
        </section>
    </main>

    <?php include 'src/footer.php'; ?> <!-- footer -->
    <script src="/zermatt-uhren/public/js/galeria.js"></script>
</body>

</html>