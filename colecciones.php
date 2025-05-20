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
  $orderby = $ordenes[$_GET['sort']];
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
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
  <?php include 'src/header.php'; ?>
  <main class="flex-grow p-4">
    <div class="container mx-auto py-8">
      <h1 class="text-3xl font-bold mb-6 text-center">Colecciones</h1>

      <div class="flex justify-center mb-6"><!-- Formulario para filtrar productos -->
        <form action="colecciones.php" method="GET" class="flex space-x-2">
          <select name="sort" class="border rounded p-2">
            <option value="">Ordenar por</option>
            <option value="name-asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name-asc') echo 'selected'; ?>>Nombre A-Z</option>
            <option value="name-desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name-desc') echo 'selected'; ?>>Nombre Z-A</option>
            <option value="price-asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price-asc') echo 'selected'; ?>>Precio menor a mayor</option>
            <option value="price-desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price-desc') echo 'selected'; ?>>Precio mayor a menor</option>
          </select>
          <button type="submit" class="bg-gray-700 hover:bg-gray-500 text-white rounded p-2">Aplicar</button>
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
              <h2 class="text-lg font-semibold mb-2"><?php echo htmlspecialchars($product['name']); ?></h2>
              <p class="text-green-600 font-bold"><?php echo htmlspecialchars($product['price']) . "€"; ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
  <?php include 'src/footer.php'; ?>
</body>

</html>