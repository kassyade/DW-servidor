<?php   session_start(); ?> <!-- iniciamos sesion para guardar los datos-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda electrónica</title>
</head>
<body>
    <h1>Compra de electrónicos</h1>
    <?php 
    $formulario = true; //hacemos visual el formulario

    //creamos un array con los elementos y sus precios
    $precios = [ 
        "Teclados" => 20,    // CORREGIDO: '=>' en lugar de '='
        "Ratones" => 15,     // CORREGIDO: '=>' en lugar de '='
        "Pantallas" => 120,  // CORREGIDO: '=>' en lugar de '='
        "Altavoces" => 22.5, // CORREGIDO: '=>' en lugar de '='
        "Led" => 10,         // CORREGIDO: '=>' en lugar de '='
        "Ram" => 160         // CORREGIDO: '=>' en lugar de '='
    ];

    define("FICHERO", "stock.data"); //creamos una constante con la ruta del stock 
    
    //si existe el fichero 
    if (file_exists(FICHERO)) {  
        //tomamos los datos de su interior, los deserializamos y los metemos en $stock como un array asociativo
        $stock = unserialize(file_get_contents(FICHERO));
    } else { 
        //en caso de que no exista creamos el stock
        $stock = [
            "Teclados" => 50,
            "Ratones" => 50,
            "Pantallas" => 50,
            "Altavoces" => 50,
            "Led" => 50,
            "Ram" => 50
        ];
        //en el archivo insertamos los contenidos del FICHERO serializados del array $stock 
        file_put_contents(FICHERO, serialize($stock));
    }

    //si el form esta en metodo post 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {  
        //si se usa el boton comprar
        if (isset($_POST['comprar'])) {
            //guardamos los elementos de $precios en $producto y su relacionado en $precio
            foreach ($precios as $producto => $precio) { 
                //verificamos si se especificó una cantidad para el producto
                if (!empty($_POST[$producto])) {
                    //guardamos la cantidad de $producto que viene del formulario y lo guardamos en una variable llamada cantidad
                    $cantidad = $_POST[$producto];

                    //comprobamos si esa cantidad la tenemos disponible en stock
                    if ($cantidad > $stock[$producto]) {
                        //si es mayor a la que se pide
                        echo "<p style='color: red;'>No hay stock de $producto. Solo tengo {$stock[$producto]} unidades</p>";
                    } else {
                        //restamos la cantidad comprada del stock
                        $stock[$producto] = $stock[$producto] - $cantidad;  
                    }
                }
            }
            //actualizamos el archivo con el nuevo stock serializado
            file_put_contents(FICHERO, serialize($stock));
        }

        //cuando el botón "Terminar" es presionado
        if (isset($_POST['Terminar'])) {
            echo "<p>Gracias por comprar !!!</p>";
            $formulario = false; // OCULTAMOS EL FORMULARIO DESPUÉS DE FINALIZAR
        }
    }

    //si el formulario sigue siendo true, lo mostramos
    if ($formulario) {
    ?>
    <!-- FORMULARIO PARA HACER LA COMPRA -->
    <form action="" method="post">
        <?php 
        //mostramos el formulario con cada producto, su precio y stock disponible
        foreach ($precios as $producto => $precio) {
            echo "<label for=\"$producto\">$producto:</label><br>";
            //el valor por defecto del input es 0
            echo "<input type=\"number\" name=\"$producto\" min=\"0\" value=\"0\"/><br>";
            //mostramos el precio y el stock actual de cada producto
            echo " Precio: $precio, Stock: " . $stock[$producto] . "<br/><br/>";
        }
        ?>
        <!-- BOTONES PARA AÑADIR PRODUCTOS O TERMINAR LA COMPRA -->
        <input type="submit" name="comprar" value="Añadir">
        <input type="submit" name="Terminar" value="Terminar">
    </form>
        <?php 
    }
    ?>
</body>
</html>
