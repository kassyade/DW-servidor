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

    <?php 
    define("RUTA", "inventario.data");

    // Inicializar el array de productos cargando el archivo si existe
    $productos = file_exists(RUTA) ? unserialize(file_get_contents(RUTA)) : [];

    // Comprobar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['precio'], $_POST['stock'])) {
        // Crear el nuevo producto
        $producto = [
            "nombre" => $_POST['nombre'],
            "precio" => $_POST['precio'],
            "stock" => $_POST['stock']
        ];

        // Añadir el nuevo producto al array de productos
        $productos[] = $producto;

        // Guardar el array de productos actualizado en el archivo
        file_put_contents(RUTA, serialize($productos));
    }
    ?>

    <h3>Stock actual</h3>
    <?php 
    // Mostrar los productos en el inventario actual
    foreach ($productos as $item) {
        echo "<p>Producto: {$item['nombre']} - Precio: {$item['precio']} - Stock: {$item['stock']}</p>";
    }
    ?>
</body>
</html>
