<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> <!-- Importación CDN Tailwind -->
    <title>Document</title>
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    <header class="h-[20vh]">
        <?php include 'src/header.php'; ?> <!-- plantilla header -->
    </header>

    <main class="flex-1 flex items-center justify-center">
        <p>maira</p> <!-- Contenido principal centrado -->
    </main>

    <footer class="h-[10vh]">
        <?php include 'src/footer.php'; ?> <!-- - plantilla footer -->
    </footer>
</body>

</html>