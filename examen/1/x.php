<?php 
session_start();

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];

if($edad<18){
    echo("<p>eres menor cabron</p>");
}else{
    echo("<p>eres mayor asiq chido </p>");

}

?>
