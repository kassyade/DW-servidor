<?php 
session_start();
//primera vez
if ( !empty($_SERVER['REQUEST_METHOD']=='POST')&& !isset($_SESSION['numero'])&& !empty($_POST['usuario']) ){
    $_SESSION['numero']=rand(1,5);
    $numero = $_SESSION['numero'];
    $usuario = $_POST['usuario'];
    $_SESSION['intentos']=1;
    echo($numero);


}else if ($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['usuario']) && isset($_SESSION['numero']) )  {
    $numero = $_SESSION['numero'];
    $usuario = $_POST['usuario'];

    if($numero== $usuario){
        echo("numero correcto");
        session_destroy();
    }else{
        echo("intenta otra vez");
        $intentos=$_SESSION['intentos']++;
        echo($numero);
        echo($intentos);
    };
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
</body>
</html>