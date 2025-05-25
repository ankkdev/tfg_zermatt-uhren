<?php
session_start();
require_once '../controllers/config/database.php';
require_once '../controllers/models/Product.php';

$pdo = require '../controllers/config/database.php';

$message = null;

if (isset($_GET['delete_id'])) {
  $product = new Product($pdo);
  $product->id = $_GET['delete_id'];
  if ($product->delete()) {
    $message = "Producto eliminado correctamente.";
  } else {
    $message = "Error al eliminar el producto.";
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product = new Product($pdo);
  $product->id = $_POST['id'] ?? null;
  $product->name = $_POST['name'] ?? '';
  $product->description = $_POST['description'] ?? '';
  $product->price = $_POST['price'] ?? '';
  $product->stock = $_POST['stock'] ?? 0;
  $product->image1 = $_POST['image1'] ?? '';
  $product->image2 = $_POST['image2'] ?? '';
  $product->image3 = $_POST['image3'] ?? '';
  if ($product->update()) {
    $message = "Producto actualizado correctamente.";
  } else {
    $message = "Error al actualizar el producto.";
  }
}

$productToEdit = null;
if (isset($_GET['edit_id'])) {
  $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
  $stmt->execute(['id' => $_GET['edit_id']]);
  $productToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

$stmt = $pdo->query('SELECT * FROM products');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="flex flex-col bg-gray-100 min-h-screen">
  <?php include '../header.php'; ?>
  <main class="flex-grow p-4">
    <div class="container mx-auto py-8">
      <?php if ($message): ?>
        <p class="mb-4 text-green-600"><?php echo $message; ?></p>
      <?php endif; ?>

      <h1 class="text-3xl font-bold mb-6">Panel de Administración</h1>

      <div class="mb-6">
        <a href="/zermatt-uhren/src/controllers/products/form-create-product.php" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
          Añadir Producto
        </a>
      </div>

      <?php if ($productToEdit): ?>
        <div class="mb-8 bg-white p-4 rounded shadow-md">
          <h2 class="text-2xl font-bold mb-4">Editar Producto #<?php echo $productToEdit['id']; ?></h2>
          <form method="POST" action="admin-panel.php?edit_id=<?php echo $productToEdit['id']; ?>">
            <input type="hidden" name="id" value="<?php echo $productToEdit['id']; ?>">
            <input type="hidden" name="image1" value="<?php echo htmlspecialchars($productToEdit['image1']); ?>">
            <input type="hidden" name="image2" value="<?php echo htmlspecialchars($productToEdit['image2']); ?>">
            <input type="hidden" name="image3" value="<?php echo htmlspecialchars($productToEdit['image3']); ?>">
            <div class="mb-4">
              <label class="block font-semibold">Nombre:</label>
              <input type="text" name="name" value="<?php echo htmlspecialchars($productToEdit['name']); ?>" class="w-full border p-2">
            </div>
            <div class="mb-4">
              <label class="block font-semibold">Descripción:</label>
              <input type="text" name="description" value="<?php echo htmlspecialchars($productToEdit['description']); ?>" class="w-full border p-2">
            </div>
            <div class="mb-4">
              <label class="block font-semibold">Precio:</label>
              <input type="text" name="price" value="<?php echo htmlspecialchars($productToEdit['price']); ?>" class="w-full border p-2">
            </div>
            <div class="mb-4">
              <label class="block font-semibold">Stock:</label>
              <input type="number" name="stock" value="<?php echo htmlspecialchars($productToEdit['stock']); ?>" class="w-full border p-2" min="0">
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="admin-panel.php" class="ml-4 inline-block text-blue-500">Cancelar</a>
          </form>
        </div>
      <?php endif; ?>

      <h2 class="text-2xl font-bold mb-4">Listado de Productos</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">ID</th>
              <th class="py-2 px-4 border-b">Nombre</th>
              <th class="py-2 px-4 border-b">Descripción</th>
              <th class="py-2 px-4 border-b">Precio</th>
              <th class="py-2 px-4 border-b">Stock</th>

              <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $prod): ?>
              <tr>
                <td class="py-2 px-4 border-b"><?php echo $prod['id']; ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($prod['name']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($prod['description']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($prod['price']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($prod['stock']); ?></td>
                <td class="py-2 px-4 border-b">
                  <a href="admin-panel.php?edit_id=<?php echo $prod['id']; ?>" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded">Editar</a>
                  <a href="admin-panel.php?delete_id=<?php echo $prod['id']; ?>" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded" onclick="return confirm('¿Está seguro de eliminar este producto?');">Eliminar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <?php include '../footer.php'; ?>
</body>

</html>