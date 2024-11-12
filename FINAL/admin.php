<?php

session_start();
if($_SESSION['admin'] !==true){
    header("Location: inicio.php");
}
    if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['especie']) && !empty($_POST['precio']) && !empty($_POST['stock'])  ){
        define("RUTA","animales.data");
        $especie =$_POST['especie'];
        $precio=$_POST['precio'];
        $stock =$_POST['stock'];
        $animales=[];
        if(file_exists(RUTA)){
            $animales=unserialize(file_get_contents(RUTA));
        }
        $animal=[
            "especie"=>$especie,
            "precio"=>$precio,
            "stock"=>$stock
        ];
        $animales[]=$animal;
        file_put_contents(RUTA,serialize($animales));

    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin.php</title>
</head>
<body>
    <h1>Creador de stock</h1>
    <form action="" method="post">
        <label >Especie: <input type="text" name="especie"></label>
        <label >Precio: <input type="text" name="precio"></label>
        <label>Stock: <input type="text" name="stock" ></label>
        <button type="submit">Crear</button>
        <button type="reset">Borrar datos</button>
    </form>
    <hr>
    <h2>Stock actual</h2>
    <?php
        define("RUTA","animales.data");
        $animales=unserialize(file_get_contents(RUTA));

      
    
    ?>
    <form action="admin.php" method="post">
        <button name="borrar" type="submit" value="true">Borrar stock</button>
        <?php 
        if($_SERVER['REQUEST_METHOD']== 'POST' && $_POST['borrar']== true){
            define("RUTA","animales.data");
            $animales= unserialize(file_get_contents(RUTA));
            $animales=[];

            file_put_contents(RUTA,serialize($animales));
        }
        
        foreach($animales as $x){
            echo("<p>Especie: {$x['especie']}  , Precio:{$x['precio']} ,Stock: {$x['stock']}  </p>");
        }
        ?>
    </form>
    <p></p>
    <a href="inicio.php">Volver al inicio</a>

</body>
</html>