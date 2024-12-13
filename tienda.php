<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formuario multiple</title>
</head>
<body>
<?php 
session_start();

if(isset($_SESSION['usuario'])){
    $nombre=$_SESSION['usuario'];
    echo("<h2>bienvenido $nombre </h2> ");

?> 

  <form action="" method="post">
  <label > Elige tus pasatiempos;
      <p></p>  
        <label >Jugar al lol  <input type="checkbox" name="lol" ></label><p></p>  
        <label >Ver jojos  <input type="checkbox" name="jojos" ></label><p></p>
        <label >TWD  <input type="checkbox" name="twd" ></label><p></p>
    </label>
    <label >
        <p>QUE TAN JOJOFAN ERES???</p>
        <p >  Poco<input type="radio" name="a"  value="poco" ></p>
        <p >  Normal<input type="radio" name="a"  value="normal"></p>
        <p >  Mucho<input type="radio" name="a"  value="mucho"></p>
        <p >  Amo<input type="radio" name="a"  value="amo"></p>
    </label>

    <textarea name="conclusion" ></textarea>
    <button type="submit">enviar</button>
    input:
</form>



<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
    $a=$_POST['a'];
    echo($a);
}

?>














<?php

}else{

    echo(" <b><center><h3>NO PUEDES ENTRAR AQUI SIN INICIAR SESION RATILLA</h3></center></b>");

}


?>    


</body>
</html>