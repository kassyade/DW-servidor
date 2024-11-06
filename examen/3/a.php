<?php 
$cantidad = $_POST['cantidad'];
$moneda = $_POST['moneda'];
echo("<p>La cantidad es {$cantidad}</p>");
echo("<p>La moneda es {$moneda}</p>");



if ($moneda==="dolares"){
    $dolares = $cantidad*1.07;
    echo("<p> Los {$cantida} en dolares serían {$dolares}</p>");
}


?>
