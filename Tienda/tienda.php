<?php 
session_start();

// Cargar stock desde stock.data
$stock = unserialize(file_get_contents('stock.data')) ?: [
    "Teclados" => 50,
    "Ratones" => 50,
    "Pantallas" => 50,
    "Altavoces" => 50,
    "Led" => 50,
    "Ram" => 50
];

// Precios de los productos
$preciosProductos = [ 
    "Teclados" => 20,
    "Ratones" => 15,
    "Pantallas" => 120,
    "Altavoces" => 22,
    "Led" => 10,
    "Ram" => 160
];

$productos = []; // Iniciamos el array de productos
// Guardamos el precio y cantidad en stock de cada producto
foreach ($preciosProductos as $producto => $precio) {
    $productos[$producto] = [
        "precio" => $precio,
        "cantidad" => $stock[$producto] ?? 0
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <style>
        .btn-rojo {
            background-color: red; /* Fondo rojo */
            color: white; /* Texto en blanco */
            border: none; /* Sin borde */
            padding: 10px 20px; /* Espaciado interno */
            cursor: pointer; /* Cambiar cursor al pasar por encima */
            font-size: 16px; /* Tamaño de fuente */
            border-radius: 5px; /* Bordes redondeados */
        }
        .btn-rojo:hover {
            background-color: darkred; /* Color al pasar el cursor */
        }
    </style>
</head>
<body>
    
<?php 
    $nombre = htmlspecialchars($_POST['nombre']);
    echo "<h1><center><b>Hora de comprar!!</b></center></h1>";
    echo "<h3>Bienvenido $nombre, estos son nuestros productos disponibles.</h3>";
?>

<!-- Parte de la tienda -->   
<hr> 
<form action="fin.php" method="post">
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Stock(tienda)</th>
        <th>Comprar</th>
    </tr>
    <?php 
    foreach ($productos as $producto => $info) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($producto) . "</td>"; // Nombre del producto
        echo "<td>$" . htmlspecialchars($info['precio']) . "</td>"; // Precio del producto
        echo "<td>" . htmlspecialchars($info['cantidad']) . "</td>"; // Cantidad en stock
        // Cantidad que compra el usuario 
        echo "<td><input type='number' name='cantidad[$producto]' min='0' max='" . $info['cantidad'] . "' value='0'></td>"; 
        echo "</tr>";
    }
    ?>
</table>
<p></p>
<button type="submit">Confirmar compra</button> 
</form>
<p></p>
<form action="restablecer.php" method="post">
    <button type="submit" class="btn-rojo">Restablecer Stock</button>
</form>

</body>
</html>
