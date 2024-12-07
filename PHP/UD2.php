<?php
 $productos = array('Fresas','Platanos','Limones');
 $MAX_PRODUCTOS = 3;
 $TOPE_PRODUCTO = 10;
?>
<html>
<head>
<title>UD2 - Carrito simple</title>
</head>
<body>
<p>Cesta de la compra de fruta y verdura:</p>


<form action="" method="post">
<?php 

for($i=1; $i<=$MAX_PRODUCTOS;$i++){
    $productoSeleccionado=isset($_POST["producto$i"])? $_POST["producto$i"]: "";
    $cantidadSeleccionada=isset($_POST["cantidad$i"])? $_POST["cantidad$i"]:"";
    
    echo("Producto $i :");
    echo("<select name='producto$i'>");
    echo("<option value=''></option>");
    foreach($productos as $producto){
        $selected = ($producto == $productoSeleccionado)?"selected":"";
        echo("<option value='$producto'$selected >$producto</option>");
    }

    echo("</select>");
    echo("<input type='number' name='cantidad$i' value='$cantidadSeleccionada'> <p></p>");
}

?>

<button type="submit">enviar</button>
</form>

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    for($i=1; $i<=$MAX_PRODUCTOS;$i++){
    
        if(!empty($_POST["producto$i"]) && !empty($_POST["cantidad$i"]) ){

            $a= $_POST["producto$i"];
            $b=$_POST["cantidad$i"];
            echo("El producto es $a y la cantidad de este es $b <p></p>");

        }   
    }
}

?>






</body>
</html>





