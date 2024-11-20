<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['texto'] && $_POST['mensajes']){
     $mensajes =$_POST['mensajes'];
    $text = htmlspecialchars($_POST['texto']);
    $mensajes .= "<p>{$text}</p>" ;
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>blog</h1>
    <form action="" method="post">
        <label >Texto para introducir</label>
        <input type="text" name="texto" >
        <input type="hidden" name="mensajes" value=" <?php  echo $mensajes ?>">
        <button type="submit">enviar</button>
    </form>
    <?php  echo($mensajes)    ?>
</body>
</html>