<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ12</title>
</head>
<body>
    <h1>ej12</h1>
    <p>Desarrolla  un  conversor  de  temperaturas  entre  Celsius  y  Fahrenheit,  permitiendo  al  usuario  seleccionar  el  tipo  de
    conversión que desee realiza</p>
    <center>
    <form action="index.php" method="post">
    <label >Selecciona la medida de temperauta que vas a introducir </label>
    <select name="medida" >
    <option value="celcius">Celcius</option>
    <option value="faren">Fahrenheit</option> <p></p>
    </select>
    <label>Cantidad:</label>
    <input type="number" name="cantidad">
    <button type="submit">Convertir</button>
    </form>
    </center>

    <?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['medida'])&& !empty($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        $medida = $_POST['medida'];
        if($medida=="celcius"){
            echo("<p>La medida es {$medida}</p>");
            $resultado = $cantidad*32;
            echo("<p>La cantidad inicial {$cantidad}</p>");
            echo("<p>La cantidad final serian {$resultado}</p>");
        }else{
            echo("<p>La medida es {$medida}</p>");
            $resultado = $cantidad/32;
            echo("<p>La cantidad inicial {$cantidad}</p>");
            echo("<p>La cantidad final serian {$resultado}</p>");

        }

    };
    ?>
</body>
</html>