<?php 
session_start();

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['usuario'])  && isset($_SESSION['numero'])){
$_SESSION['intentos'] ++;
$intentos = $_SESSION['intentos'];
$numero = $_SESSION['numero'];
echo("intentado");
}else if(!isset($_SESSION['numero'])){

    $_SESSION['numero']= rand(1,10);
    $_SESSION['intentos']=0;  
    $numero = $_SESSION['numero'];
    
} else if (empty($_POST['usuario']) ){
    echo("<p>pero pon un numero tonto culiao</p>");
};




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adivina el numero</title>
</head>
<body>
    <h1>adivina el numero wn tonto qliao</h1>
    <form action="" method="post">
    <label>introduce el número</label>
    <input type="number" name="usuario">
    <button type="submit">Intentar</button>
    </form>

    <?php 
    echo("<p>{$numero}</p>");
    echo("<p>{$intentos}</p>");

    ?>
</body>
</html>