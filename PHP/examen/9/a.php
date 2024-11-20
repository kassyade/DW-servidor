<?php  //creacion de usuarios 
$usuario = $_POST['usuario'];
$telefono =$_POST['telefono'];
define("RUTA","datos.data");

$usuarios=[
    "usuario"=>$usuario,
    "telefono"=>$telefono
];

$datos=serialize($usuarios);
file_put_contents(RUTA,$datos.PHP_EOL,FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <table border="1">
        <h3>Datos buscados :</h3>
        <?php 
        echo("<p> Usuario :{$usuario}</p>
            <p>Telefono :{$telefono}</p>")
        ?>
        <tr>
            <td>usuario</td>
            <td>telefono</td>
        </tr>
        <?php 
        foreach(file(RUTA) as $linea){//defines el archivo  con la ruta y lo lees por cada linea 
            $d=unserialize($linea);//cada linea toma el valor "d"
            if($d['telefono']==$telefono){//buscas el  telefono de "d" para ver si es igual 
                echo("<p>Telefono encontrado</p>");
                echo("<p>{$d['usuario']}</p>");
            }

        };



        echo("
        <tr>
             <td>{$usuario}</td>
             <td>{$telefono}</td>
            
        </tr>
        ")


        ?>
    </table>
</body>
</html>
