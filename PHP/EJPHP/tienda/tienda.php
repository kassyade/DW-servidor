<?php 
define("RUTA","stock.data");
if(file_exists(RUTA)){
$datos = unserialize(file_get_contents(RUTA));

}else{


$datos=[
    ["producto"=>"pan","precio"=>"2","stock"=>20],
    ["producto"=>"leche","precio"=>"5","stock"=>20],
    ["producto"=>"harina","precio"=>"3","stock"=>20],
    ["producto"=>"arroz","precio"=>"2","stock"=>20],
    ["producto"=>"agua","precio"=>"1","stock"=>20]
];
file_put_contents(RUTA,serialize($datos));

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tienda</title>
    <h1>tienda</h1>
    <form action="proceso.php" method="post">
        <?php 
            foreach($datos as $x){
                echo("<p> Producto:{$x['producto']} ,Precio:{$x['precio']} ,Stock:{$x['stock']}</p>");
            };

            echo("<h2>Regular stock</h2>");

            foreach($datos as $x){
                echo("<label> {$x['producto']} <input type='number' name='{$x['producto']}' value='{$x['stock']}' > </label><p></p>");
            };
        ?>

            <button type="submit">enviar stock</button>

    </form>
</head>
<body>


</body>
</html>