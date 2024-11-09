<?php
define("RUTA", "inventario.data"); // Define la ruta del archivo

// Comprobamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['stock'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $producto = [
        "nombre" => $nombre,
        "precio" => $precio,
        "stock" => $stock
    ];

    // Cargar productos existentes
    $productos = [];
    if (file_exists(RUTA)) {
        $productos = unserialize(file_get_contents(RUTA));
    }

    // Agregar el nuevo producto y guardar en el archivo
    $productos[] = $producto;
    file_put_contents(RUTA, serialize($productos));
} else {
    // Cargar productos existentes solo para mostrar, sin agregar nuevos
    $productos = [];
    if (file_exists(RUTA)) {
        $productos = unserialize(file_get_contents(RUTA));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ10</title>
</head>
<body>
    <h1>EJ10</h1>
    <p>Desarrolla una aplicación PHP que permita gestionar un inventario simple con nombre, precio y cantidad de productos,
    almacenado en un archivo de datos.</p>
    
    <h3>Creación de artículos</h3>
    <form action="index.php" method="post">
        <label>Nombre del producto</label>
        <input type="text" name="nombre" required><p></p>
        <label>Precio U</label>
        <input type="number" name="precio" required><p></p>
        <label>Cantidad en stock</label>
        <input type="number" name="stock" required><p></p>
        <button type="submit">Crear nuevo producto</button>
    </form>

    <h2>Productos:</h2>
    <?php 
    // Mostrar productos guardados
    if (!empty($productos)) {
        foreach ($productos as $producto) {
            echo "<p>Nombre: {$producto['nombre']}, Precio: {$producto['precio']}, Stock: {$producto['stock']}</p>";
        }
    }
    ?>
</body>
</html>
