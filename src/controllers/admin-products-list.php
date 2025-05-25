<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: /zermatt-uhren/index.php');
    exit;
}

require_once __DIR__ . '/../../public/lib/fpdf/fpdf.php';
$pdo = require __DIR__ . '/config/database.php';

$ordenes = [
    'name-asc'    => 'name ASC',
    'name-desc'   => 'name DESC',
    'price-asc'   => 'price ASC',
    'price-desc'  => 'price DESC'
];

$orderby = 'id ASC';
if (isset($_GET['sort']) && array_key_exists($_GET['sort'], $ordenes)) { //array asociativo donde cada clave representa un posuible filtro y cada valor es la parte de la consulta
    $sort = $_GET['sort'];
    setcookie("sort", $sort, time() + (86400 * 30), "/");
} elseif (isset($_COOKIE['sort']) && array_key_exists($_COOKIE['sort'], $ordenes)) { //se revisa si se paso un parametro sort en GET,de ser asi lo lamacena en una cookie,sino comrpueba si existe la cookie
    $sort = $_COOKIE['sort']; //si se define, se asigna al order by
} else {
    $sort = "";
}

if ($sort !== "") {
    $orderby = $ordenes[$sort];
}
$stmt = $pdo->query("SELECT * FROM products ORDER BY $orderby");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf = new FPDF(); //se crea una instancia de FPDF
$pdf->AddPage(); //se añade la primera pagina
$pdf->SetAutoPageBreak(true, 20); //20 productos por página

function printTableHeader($pdf) //funcion para imprimir el header
{
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(20, 10, "ID", 1);
    $pdf->Cell(80, 10, "Nombre", 1);
    $pdf->Cell(30, 10, "Precio", 1, 0, 'R');
    $pdf->Cell(30, 10, "Stock", 1, 0, 'C');
    $pdf->Ln();
}

printTableHeader($pdf);

$pdf->SetFont('Arial', '', 12);
$counter = 0;
foreach ($products as $prod) {
    if ($counter > 0 && $counter % 20 == 0) { //comprueba si se han imprimido ya 20 prodctos o multiplo de 20,de ser asi añade una pagina
        $pdf->AddPage(); //
        $pdf->SetAutoPageBreak(true, 20); //salto de pagina,dejando margen de 20 unidades
        printTableHeader($pdf); //imprime header de la tabla
    }
    $pdf->Cell(20, 10, $prod['id'], 1); //crea tabla de 20 unidades de ancho y 10 de alto
    $pdf->Cell(80, 10, $prod['name'], 1); //crea una celda de 80 unidaes de ancho y 10 de alt para mostrar el nombre del producto con borde

    $priceStr = number_format($prod['price'], 2) . ' €'; //formatea el precio del producto a dos decimales y le añade un €
    $priceConverted = iconv('UTF-8', 'Windows-1252', $priceStr); //convierte la cadena formateada de UTF-8 a Windows-1252 para que se muestre correctamente
    $pdf->Cell(30, 10, $priceConverted, 1, 0, 'R'); //crea celda de 30 unidades de ancho y 10 de alto,el parametro 1 añade borde y 0 indica que no se cambia de linea, R alinea el texto a la derecha

    $pdf->Cell(30, 10, $prod['stock'], 1, 0, 'C'); //crea itra celda de 30 unidades de ancho y 10 de alto para mostrar el stock del producto,ademas se alinea al centro y se añade el borde
    $pdf->Ln();
    $counter++; //contador de unidades
}

$pdf->Output('I', 'listado_productos.pdf');//imprime la lista
