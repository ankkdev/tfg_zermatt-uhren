<?php
session_start();
require_once 'src/controllers/config/database.php';
require_once 'src/controllers/models/Product.php';

$pdo = require 'src/controllers/config/database.php';

$ordenes = [ //para order by
  'name-asc'    => 'name ASC',
  'name-desc'   => 'name DESC',
  'price-asc'   => 'price ASC',
  'price-desc'  => 'price DESC'
];

$orderby = 'id ASC';

if (isset($_GET['sort']) && array_key_exists($_GET['sort'], $ordenes)) {
  $sort = $_GET['sort'];           //almacenar el orden en la variable $sort
  setcookie("sort", $sort, time() + (86400 * 30), "/"); //cookie se guarda por 30 dias
} elseif (isset($_COOKIE['sort']) && array_key_exists($_COOKIE['sort'], $ordenes)) {
  $sort = $_COOKIE['sort'];         //recibir el orden de la cookie
} else {
  $sort = "";                       //valor por defecto
}
if ($sort !== "") { //si la variable $sort esta vacia,entonces $orderby conserva el orden por defecto 'id ASC'
  $orderby = $ordenes[$sort];
}

$stmt = $pdo->query("SELECT * FROM products ORDER BY $orderby");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Colecciones de relojes automáticos</title>
  <script src="/zermatt-uhren/public/js/nav-menu.js"></script>
  <link rel="stylesheet" href="/zermatt-uhren/public/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
  <header class="h-auto pt-36">
    <?php include 'src/header.php'; ?> <!-- header -->
  </header>
  <main class="flex-grow p-4">
    <div class="h-64 bg-cover bg-center flex items-center justify-center mb-8 rounded-3xl" style="background-image: url('/zermatt-uhren/public/img/banner.webp');">

      <h2 class="text-3xl text-white font-bold">Descubre nuestras colecciones exclusivas</h2>
    </div>
    <div class="container mx-auto py-8">
      <h2 class="text-3xl font-bold mb-6 text-center">Colecciones</h2>
      <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
        <a href="/zermatt-uhren/src/controllers/admin-products-list.php?sort=<?php echo isset($_GET['sort']) ? $_GET['sort'] : 'name-asc'; ?>" target="_blank" class="bg-gray-700 hover:bg-gray-500 text-white px-1 py-1 rounded">
          Imprimir listado de productos
        </a>
      <?php endif; ?>

      <div class="text-center mb-4"><!-- Formulario para filtrar productos -->
        <h3 style="font-size:2rem;" class="font-semibold">Filtrar Colecciones</h3>
        <p class="text-gray-600">Selecciona el orden de los productos para mayor comodidad.</p>
      </div>
      <form action="colecciones.php" method="GET" class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4 w-full max-w-lg mx-auto">
        <select name="sort" class="border rounded p-2 w-full">
          <option value="">Ordenar por</option>
          <option value="name-asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name-asc') echo 'selected'; ?>>Nombre A-Z</option>
          <option value="name-desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name-desc') echo 'selected'; ?>>Nombre Z-A</option>
          <option value="price-asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price-asc') echo 'selected'; ?>>Precio menor a mayor</option>
          <option value="price-desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price-desc') echo 'selected'; ?>>Precio mayor a menor</option>
        </select>
        <button type="submit" class="bg-gray-700 hover:bg-gray-500 text-white rounded p-2 w-full md:w-auto">Aplicar</button>
      </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      <?php foreach ($products as $product): ?><!-- for para comprobar si hay imagen1,de ser asi lo muestra -->
        <div class="bg-white p-4 rounded shadow text-center">
          <a href="product.php?id=<?php echo htmlspecialchars($product['id']); ?>">
            <?php if (!empty($product['image1'])): ?>
              <img src="/zermatt-uhren/public/uploads/<?php echo htmlspecialchars($product['image1']); ?>"
                alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-full h-auto mb-2">
            <?php endif; ?>
            <h3 class="text-lg font-semibold mb-2"><?php echo htmlspecialchars($product['name']); ?></h2>
              <p class="text-green-600 font-bold"><?php echo htmlspecialchars($product['price']) . "€"; ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    </div>
  </main>
  <?php include 'src/footer.php'; ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var banner = document.querySelector('.h-64.bg-cover'); //pulsar este banner
      if (banner) {
        banner.addEventListener('click', function() {
          var titulo = banner.querySelector('h2'); //cambiara de texto
          if (titulo) {
            titulo.textContent = "¡Explora nuevas colecciones!";
          }
        });
      }
    });
  </script>
</body>

</html>