<?php 
define('RUTA', 'animales.data');
$animales=[];
$animales=unserialize(file_get_contents(RUTA));



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tienda de animales</h1>
    <h3>Introduce la cantidad de animales que te llevas</h3>
    <hr>
    <form action="confirmar.php" method="post">
    <?php 
     foreach($animales as $x){
        echo(" Especie : {$x['especie']} /Precio:{$x['precio']} <p></p><label ><input type='number' name='{$x['especie']} ></label> <p></p>");
    }
    
    ?>
    <button type="submit">Comprar</button>
    </form>
   
    <p></p>
    <a href="inicio.php">Inicio</a>
</body>
</html>
