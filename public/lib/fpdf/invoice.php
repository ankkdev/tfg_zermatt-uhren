<?php
session_start();
require_once 'fpdf.php';
require_once '../../../src/controllers/config/database.php';

$paymentId    = $_GET['payment_id'] ?? 'Desconocido';
$customerName = $_SESSION['user']['name'] ?? 'Cliente Desconocido';

if (!isset($_SESSION['order']) || empty($_SESSION['order'])) {
    die("No hay productos en el pedido.");
}
$order = $_SESSION['order'];

$items = [];
$total = 0;

$stmt = $pdo->prepare("SELECT name, price FROM products WHERE id = :id");
foreach ($order as $productId => $qty) {
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        $item = [
            'name'  => $product['name'],
            'qty'   => $qty,
            'price' => $product['price']
        ];
        $items[] = $item;
        $total += $qty * $product['price'];
    }
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);

//imagotipo de zermatt uhren
$imagePath = __DIR__ . '/../../img/branding/imagotipo/imagotipo_nbk.png';
if (file_exists($imagePath)) {
    $pdf->Image($imagePath, 10, 8, 33);
}
$pdf->Ln(20);

//imprimir título y datos del cliente
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, "Factura de Pago", 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, "ID de Pago: ");
$pdf->Cell(0, 10, $paymentId, 0, 1);
$pdf->Cell(50, 10, "Cliente: ");
$pdf->Cell(0, 10, $customerName, 0, 1);
$pdf->Ln(5);

//función para imprimir el header de la tabla
function printTableHeader($pdf)
{
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(80, 10, "Producto", 1);
    $pdf->Cell(30, 10, "Cantidad", 1);
    $pdf->Cell(40, 10, "Precio Unitario", 1);
    $pdf->Cell(40, 10, "Subtotal", 1);
    $pdf->Ln();
}
//recupero la fecha del pago de la sesión 'fechapago' de pago.php
$pagadoElDia = $_SESSION['fechapago'] ?? date('Y-m-d H:i:s');;
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, "Fecha de Pago: ");
$pdf->Cell(0, 10, $pagadoElDia, 0, 1);
$pdf->Ln(5);

//imprimir el header de la pagina
printTableHeader($pdf);

//paginación (max 20 productos por página)
$pdf->SetFont('Arial', '', 12);
$counter = 0;
foreach ($items as $item) {
    if ($counter > 0 && $counter % 20 == 0) {
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(true, 20);
        printTableHeader($pdf);
    }

    $itemSubtotal = $item['qty'] * $item['price'];
    $pdf->Cell(80, 10, $item['name'], 1);
    $pdf->Cell(30, 10, $item['qty'], 1, 0, 'C');

    $priceStr = number_format($item['price'], 2) . ' €';
    $priceConverted = iconv('UTF-8', 'Windows-1252', $priceStr);
    $pdf->Cell(40, 10, $priceConverted, 1, 0, 'R');

    $subtotalStr = number_format($itemSubtotal, 2) . ' €';
    $subtotalConverted = iconv('UTF-8', 'Windows-1252', $subtotalStr);
    $pdf->Cell(40, 10, $subtotalConverted, 1, 1, 'R');

    $counter++;
}

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(150, 10, "Total", 1);
$totalStr = number_format($total, 2) . ' €';
$totalConverted = iconv('UTF-8', 'Windows-1252', $totalStr);
$pdf->Cell(40, 10, $totalConverted, 1, 1, 'R');

//mostrar el pdf
$pdf->Output('I', 'factura_' . $paymentId . '.pdf');
