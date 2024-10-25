<?php 
session_start();

define('STOCK','stock.data');
$stock = unserialize(file_get_contents(STOCK)); //tenemos stock

$preciosProductos=[ //tenemos los precios
    "Teclados" => 20,
    "Ratones" => 15,
    "Pantallas" => 120,
    "Altavoces" => 22,
    "Led" => 10,
    "Ram" => 160
];

$productos=[];//iniciamos el array de los productos
//por cada elemento de preciosProductos se guarde en $producto(nombre) y $precio(su precio)
foreach($preciosProductos as $producto => $precio){
    $productos[$producto]=[
        "precio"=>$precio,
        "cantidad"=>$stock[$producto]??0
        //el "??0" dice que en caso de que no haya datos que ponga de 0 de stock 
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
    $nombre=$_POST['nombre'];
    echo"<h1><center><b>Hora de comprar!!</b></center></h1>";
    echo"<h3>Bienvenido $nombre estos son nuestros productos disponibles.</h3>";
?>
<!-- Parte de la tienda -->    
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad en Stock</th>
    </tr>
    <?php 
    foreach ($productos as $producto => $info) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($producto) . "</td>"; // Nombre del producto
        echo "<td>$" . htmlspecialchars($info['precio']) . "</td>"; // Precio del producto
        echo "<td>" . htmlspecialchars($info['cantidad']) . "</td>"; // Cantidad en stock
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

