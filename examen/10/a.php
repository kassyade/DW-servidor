<?php
session_start();
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad= $_POST['cantidad'];

define("RUTA","inventario.data");
$productos=[];

//primero comprobamos si el archivo existe 
if(file_exists(RUTA)){
    $productos=unserialize(file_get_contents(RUTA));
};



$productos[]=[//para añadir uno nuevo recuerda poner los corchetes 
"nombre"=>$nombre,
"precio"=>$precio,
"cantidad"=>$cantidad
];

file_put_contents(RUTA,serialize($productos))

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
</head>
<body>
    <h1>Productos</h1>

    <?php
        foreach($productos as $producto){
            echo("<p> PRODUCTO: $producto[nombre] ,PRECIO:$producto[precio],CANTIDAD:$producto[cantidad]</p>");

        };
    ?>
    <form action="a.php" method="post">
        <p>Para modificar el stock </p>
        <label >producto</label>
        <input type="text" name="item">
        <input type="number" name="x" value=" <?php  ?>    ">

    </form>

    <a href="index.php">Crear nuevo producto</a>
</body>
</html>
