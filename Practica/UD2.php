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
    for($i=1 ; $i<=$MAX_PRODUCTOS ;$i++){
        echo("Producto $i : 
                <select  name='producto$i'>");
                echo("<option value=''></option>");

                foreach($productos as $producto){
                    echo("<option value='$producto'>$producto</option>");
                }      

        echo("  </select>            
            <p></p>");
              
        
    }
    ?>
    <label >Añadir perejil ? <input type="checkbox" name="perejil" value="true" > </label> <p></p>
    <button type="submit">enviar</button>
</form>


<?php 

if($_SERVER['REQUEST_METHOD']=='POST' ){
    $a=$_POST['producto1'];
    echo($a);

    if(isset($_POST['perejil'])){
        echo("elegiste perejil");
    }else{
        echo("no lo hiciste");
    }
}

?>
</body>
</html>

