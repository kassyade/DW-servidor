<?php 
session_start();
$stock = unserialize(file_get_contents('stock.data')); // Cargamos el stock existente

$preciosProductos = [
    "Teclados" => 20,
    "Ratones" => 15,
    "Pantallas" => 120,
    "Altavoces" => 22,
    "Led" => 10,
    "Ram" => 160
];

// Procesamos las cantidades pedidas
$cantidades = $_POST['cantidad'] ?? [];
$totalFinal = 0;
$productosComprados = [];

// Calculamos el precio total de cada producto comprado
foreach ($cantidades as $producto => $cantidad) {
    if ($cantidad > 0) {
        $precioUnidad = $preciosProductos[$producto] ?? 0;
        $precioTotal = $precioUnidad * $cantidad;
        $totalFinal += $precioTotal;
        $productosComprados[$producto] = [
            "precioUnidad" => $precioUnidad,
            "cantidad" => $cantidad,
            "precioTotal" => $precioTotal
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de compra</title>
</head>
<body>

<h1>Resumen de su compra</h1>
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Precio Unidad</th>
        <th>Cantidad</th>
        <th>Precio Total</th>
    </tr>
    <?php 
    foreach ($productosComprados as $producto => $info) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($producto) . "</td>";
        echo "<td>$" . htmlspecialchars($info['precioUnidad']) . "</td>";
        echo "<td>" . htmlspecialchars($info['cantidad']) . "</td>";
        echo "<td>$" . htmlspecialchars($info['precioTotal']) . "</td>";
        echo "</tr>";
        
        // Actualizamos el stock
        $stock[$producto] -= $info['cantidad'];
    }
    ?>
</table>

<h3>Total a pagar: $<?php echo $totalFinal; ?></h3>

<form action="tienda.php" method="post">
    <button type="submit">Terminar compra</button>
</form>

<form action="adios.html" method="post">
    <button type="submit">No comprar más</button>
</form>

<?php 
// Guardamos el nuevo stock en el archivo
file_put_contents('stock.data', serialize($stock));
?>
</body>
</html>
