<?php
// Definir la ruta completa del archivo donde se guardará el stock
define('RUTA_ARCHIVO', __DIR__ . '/stock.txt');

// Verificar si el archivo de stock ya existe
if (!file_exists(RUTA_ARCHIVO)) {
    // Array de productos con nombre, precio y stock inicial
    $productos = [
        ["nombre" => "Producto 1", "precio" => 10, "stock" => 20],
        ["nombre" => "Producto 2", "precio" => 15, "stock" => 15],
        ["nombre" => "Producto 3", "precio" => 20, "stock" => 30],
    ];

    // Guardar el array de productos en el archivo stock.txt
    file_put_contents(RUTA_ARCHIVO, serialize($productos));

    echo "El stock ha sido creado y guardado en " . RUTA_ARCHIVO;
} else {
    // Cargar el stock existente desde el archivo
    $productos = unserialize(file_get_contents(RUTA_ARCHIVO));
    echo "El stock ha sido cargado.<br><br>";
}

// Mostrar los productos
foreach ($productos as $producto) {
    echo $producto["nombre"] . " - Precio: " . $producto["precio"] . "€ - Stock: " . $producto["stock"] . "<br>";
}
?>
