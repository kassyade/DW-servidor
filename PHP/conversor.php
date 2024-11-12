<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['cantidad'] ){

    if(is_numeric($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        $resultado= $cantidad*1.06;
    }else{
        echo("la cantidad no es un numero gil");
    }
 
    

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conversor</title>
</head>
<body>
    <h1>conversor de euros a dolares</h1>
    <form action="" method="post">
        <label >Intoducir cantidad</label>
        <input type="text" name="cantidad">
        <button type="submit">convertir</button>
<?php         echo("<p> la conversion es {$resultado}</p>");
?>
    </form>
</body>
</html>