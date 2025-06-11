<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../src/controllers/config/database.php';
$pdo = require '../src/controllers/config/database.php';
/* 
si uso require_once 'vendor/autoload.php';
no funciona porque buscara la carpeta vendor dentro del actual /zermatt-uhren/vendor, 
pero como Composer lo crea en la raíz del proyecto,
asi que debo usar la ruta absoluta del directorio actual
*/
require_once __DIR__ . '/../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51QtpMaLKNdac4G5wdh56TsPEcU6ZusQ6R09Am6m8wtM7gcEE8rvMj9xDDIRPY9V7kXYrnABKrCksDqJS7dTw9U5000I9FpLmIF');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $paymentMethod = $_POST['payment_method'] ?? '';
    if ($amount <= 0 || empty($paymentMethod)) {
        die("Error: Cantidad inválida o método de pago no recibido.");
    }
    try {
        //Convertir a céntimos (Stripe usa la unidad más pequeña)
        $amountInCents = intval($amount * 100);
        //Crear un Intento de Pago
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amountInCents,
            'currency' => 'eur',
            'payment_method' => $paymentMethod,
            'automatic_payment_methods' => [
                'enabled' => true,
                'allow_redirects' => 'never'
            ],
        ]);
        $_SESSION['order'] = $_SESSION['cart']; //guardar los productos en la sesion
        //actualizar stock si el carrito existe
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $stmt = $pdo->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
                $stmt->execute([$quantity, $productId]);
            }
            //vaciar el carrito
            unset($_SESSION['cart']);
        }
        $fechaPago = new DateTime(); //registrar la fecha de pago,eso sera necesario para mostrarlo en la factura,asi que luego se reutilizará en public/lib/fpdf/invoice.php
        $_SESSION['fechapago'] = $fechaPago->format('Y-m-d H:i:s');
        //redirigir a la factura
        header("Location: /zermatt-uhren/public/lib/fpdf/invoice.php?payment_id=" . urlencode($paymentIntent->id));
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
