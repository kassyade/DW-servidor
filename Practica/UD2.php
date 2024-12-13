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
            
            for($i=1;$i<=$MAX_PRODUCTOS;$i++){

                if(isset($_POST["producto$i"])  && isset($_POST["cantidad$i"])  ){
                    $prodSelect=$_POST["producto$i"];
                    $cantSelect=$_POST["cantidad$i"];
                }



                echo("Producto $i :");
                echo("<select name='producto$i' >");//producto$i numero 
                echo("<option value=''></option>");
                foreach($productos as $x){
                    //$selected=($prodSelect==$x)?"selected":"";
                    if($prodSelect==$x){
                        $selected="selected";
                    }else{
                        $selected="";
                    }

                    echo("<option value='$x' $selected>$x</option>");
                }
                echo("<input type='number' name='cantidad$i' value='$cantSelect' >");//cantidad$i numero
                echo("</select>");
                echo("<p></p>");
            }
            
            
            
            ?>
                <label >Quieres añadir perejil?<input type="checkbox" name="perejil" ></label>
                <p></p>
                <button type="submit">enviar</button>


        </form>
            
        <?php 
        
            if($_SERVER['REQUEST_METHOD']=='POST'){

                for($i=1 ;$i<=$MAX_PRODUCTOS ;$i++){
                    if(!empty($_POST["producto$i"])  && !empty($_POST["cantidad$i"])  ){

                        $nom=$_POST["producto$i"];
                        $cant=$_POST["cantidad$i"];

                        if($cant<0){
                            echo("cantidad en producto $i no valida <p></p>");
                        }else if ($cant>$TOPE_PRODUCTO){
                            echo("cantidad en producto $i superior al limite ($TOPE_PRODUCTO) cantidad reestablecida <p></p>");
                            $cant=$TOPE_PRODUCTO;
                            echo(" el producto $i es $nom y su cantidad es $cant <p></p>");
                        }else{
                            echo(" el producto $i es $nom y su cantidad es $cant <p></p>");
                        }
                        
                        if(isset($_POST['perejil'])){
                            echo("escogiste perejil");
                        }


                    }


                }

            }


        
        ?>


    </body>
</html>




