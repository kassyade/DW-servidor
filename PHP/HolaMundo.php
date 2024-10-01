
<?php 

// isset pregunta si la variable existe
if(isset($_GET["nombre"])){
    //si hay una variable lo muestra 
    echo "Hola " . $_GET["nombre"];
} else {
    echo "Hola Mundo";
}

// con "??"asignamos un valor por defecto si o existe el nombre 
$nombre = $_GET["nombre"] ?? "mundo"; 

?>
