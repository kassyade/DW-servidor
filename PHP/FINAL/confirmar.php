<?php 
define('RUTA', 'animales.data');
$animales =[];
$animales=unserialize(file_get_contents(RUTA));

if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($animales as &$x){
        $cantidad = $_POST[$x['especie']];
        if(!empty($_POST[$x['especie']])){
            if($cantidad>=$x['stock']){
                echo("<p>no hay tal cantidad de stock</p>");
            }else{
                $x['stock'] -= $cantidad;
            }
            

        }
    }
    file_put_contents(RUTA,serialize($animales));

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion de compra</title>
</head>
<body>
    <h1>Confirmación de compra</h1>
    <form action="" method="post">
        <?php foreach ($animales as $x): ?>
            <label>
                <?php echo $x['especie']; ?> (Stock: <?php echo $x['stock']; ?>): 
                <input type="number" name="<?php echo $x['especie']; ?>" placeholder="Cantidad">
            </label>
            <br>
        <?php endforeach; ?>
        <button type="submit">Confirmar compra</button>
    </form>
</body>
</html>