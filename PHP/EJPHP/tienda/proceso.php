<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && 
!empty($_POST['pan'])&&
!empty($_POST['leche'])&&
!empty($_POST['harina'])&&
!empty($_POST['arroz'])&&
!empty($_POST['agua'])
){

    
    define('RUTA','stock.data');
    $datos=[];
    $datos= unserialize(file_get_contents(RUTA));
    $pan=$_POST['pan'];
    $leche=$_POST['leche'];
    $harina=$_POST['harina'];
    $arroz =$_POST['arroz'];
    $agua = $_POST['agua'];

    foreach($datos as &$x){
      if($x['producto']== "pan"){
        $x['stock']=$pan;


      }  
    };
    file_put_contents(RUTA, serialize($datos));

    foreach($datos as $x){
        echo("<p> Producto:{$x['producto']} ,Precio:{$x['precio']} ,Stock:{$x['stock']}</p>");
    };
    echo("<a href='tienda.php'>volver</a>");

}


