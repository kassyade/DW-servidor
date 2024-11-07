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
    <?php 
    $inventario =[//inventario inicial
        ["nombre"=>"pan","precio"=>"1","stock"=>"20"],
        ["nombre"=>"leche","precio"=>"5","stock"=>"20"],
        ["nombre"=>"arroz","precio"=>"7","stock"=>"20"]
    ];
    //para comprobar si hay datos en la ruta 
    define("RUTA","inventario.data");
    if(!file_exists(RUTA)){
        file_put_contents(RUTA,serialize($inventario));
    };
    //si 
    $inventario=unserialize(file_get_contents(RUTA));

    foreach($inventario as $producto)

    ?>
    <table border="1">
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Cantidad</td>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            <td><?php $inventario['nombre']==="pan"?></td>
            <td>20</td>
        </tr>
        <tr>
            <td>leche</td>
            <td>5€</td>
            <td>20</td>
        </tr>
        <tr>
            <td>arroz</td>
            <td>7€</td>
            <td>20</td>
        </tr>

    </table>

</body>
</html>