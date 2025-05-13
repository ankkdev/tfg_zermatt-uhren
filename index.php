<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>


<body class="bg-gray-100 flex flex-col h-screen">
    <header class="h-[20vh]">
        <?php include 'src/header.php'; ?> <!-- header -->
    </header>

    <main class="flex-1 flex items-center justify-center">
        <p>maira</p> 
        
    </main>

        <?php include 'src/footer.php'; ?><!-- footer -->
=======
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> <!-- Importación CDN Tailwind -->
    <title>Document</title>
</head>

<<<<<<< HEAD
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
=======
<body>
    <a href="src/controllers/auth/form-register.php">Regístrarse</a>
    <a href="src/controllers/auth/form-login.php">Iniciar sesión</a>
    <?php include 'src/header.php'; ?> <!-- plantilla header-->
    <main>
        <!-- contenido principal -->
    </main>
    <?php include 'src/footer.php'; ?> <!-- plantilla footer -->
>>>>>>> d6ad6798e323d3184d253bd43a26f536d714c5e0
>>>>>>> 8a892db208db029dd095bba20cc226614f5093db
</body>

</html>