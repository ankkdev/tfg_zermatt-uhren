<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
    <style>
        body {
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
</body>

</html>