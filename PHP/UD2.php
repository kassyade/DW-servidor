<?php
 $productos = array('Fresas','Platanos','Limones');
 $MAX_PRODUCTOS = 3;
 $TOPE_PRODUCTO = 10;

    if($_SERVER['REQUEST_METHOD']=='POST' ){
        if(!empty($_POST['producto1']) ||!empty($_POST['producto2']) ||!empty($_POST['producto3'])   ){
            $perejil=$_POST['perejil'];
            
            $Puno = $_POST['producto1'];
            $Cuno=$_POST['producto1Cantidad'];

            $Pdos = $_POST['producto2'];
            $Cdos=$_POST['producto2Cantidad'];

            $Ptres = $_POST['producto3'];
            $Ctres=$_POST['producto3Cantidad'];




        }
    }

?>
<html>
<head>
<title>UD2 - Carrito simple</title>
</head>
<body>

<p>Cesta de la compra de fruta y verdura:</p>
<?php 
/*

  <label >Producto1:     <select name="producto1" >.
        <option value=""></option>
        <option value="fresas">Fresas</option>
        <option value="platanos">Platanos</option>
        <option value="limones">Limones</option>
    </select>
    <input type="number" name="producto1Cantidad" value="0">
    </label>
    <p></p>

    <label >Producto2:     <select name="producto2" >
        <option value=""></option>
        <option value="fresas">Fresas</option>
        <option value="platanos">Platanos</option>
        <option value="limones">Limones</option>
    </select>
    <input type="number" name="producto2Cantidad" value="0">
    </label>
    <p></p>

    <label >Producto3:     <select name="producto3" >
        <option value=""></optio>
        <option value="fresas">Fresas</option>
        <option value="platanos">Platanos</option>
        <option value="limones">Limones</option>
    </select>
    <input type="number" name="producto3Cantidad" value="0">
    </label>
    <p></p>








//aqiio<!-/** 


} */


?>

<form action="" method="post">
  <?php
for($i=1;$i<=$MAX_PRODUCTOS;$i++){
echo($i);

echo("

<label >Producto{$i}:     
<select name='producto{$i}' >
        <option value=''></option>
        <option value='fresas'>Fresas</option>
        <option value='platanos'>Platanos</option>
        <option value='limones'>Limones</option>
    </select>
    <input type='number' name='producto{$i}Cantidad' value='0'>
    </label>
    <p></p>

");
}
?>

<label>Añadir perejil ? <input type="checkbox" name="perejil" value="true">
</label>
<p></p>
<button type="submit">actualizar</button>
</form>

<?php 


    if(!empty($_POST['producto1']) &&!empty($_POST['producto1Cantidad']) ) {
        if($Cuno>$TOPE_PRODUCTO){
            $Cuno=$TOPE_PRODUCTO;
            echo("<b>En (Producto1)intentaste comprar más del tope ,cantidad reestablecida </b><p></p>");
        }
        echo("Producto1:{$Puno} /Cantidad:{$Cuno} <p></p>");
    }else{
        echo("no se seleccionaron datos en el producto1 <p></p>");
    }


    if(!empty($_POST['producto2']) &&!empty($_POST['producto2Cantidad'])){
        if($Cdos>$TOPE_PRODUCTO){
            $Cdos=$TOPE_PRODUCTO;
            echo("<b>En (Producto2)intentaste comprar más del tope ,cantidad reestablecida </b><p></p>");
        }
        echo("Producto1:{$Pdos} /Cantidad:{$Cdos} <p></p>");
    }else{
        echo("no se seleccionaron datos en el producto2 <p></p>");
    }

    if(!empty($_POST['producto3']) &&!empty($_POST['producto3Cantidad'])){
        if($Ctres>$TOPE_PRODUCTO){
            $Ctres=$TOPE_PRODUCTO;
            echo("<b>En (Producto3)intentaste comprar más del tope ,cantidad reestablecida </b><p></p>");
        }
        echo("Producto1:{$Ptres} /Cantidad:{$Ctres} <p></p>");
    }else{
        echo("no se seleccionaron datos en el producto3 <p></p>");
    }


if($perejil == true){
    echo("Añadiste perejil a tu compra");
}


?>


</body>
</html>


