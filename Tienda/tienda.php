
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
</head>

<body>
    <h1>Carrito de la compra de una librería:</h1>
    <?php
    $mostrarFormulario = true;
  
    $precios = [
        "Bolígrafo" => 1.5,
        "Libreta" => 3.5,
        "Goma" => 0.5
    ];
    define("RUTA_FICHERO", "stock.data");

    //  si stock existe y carga
    if (file_exists(RUTA_FICHERO)) {
        $stock = unserialize(file_get_contents(RUTA_FICHERO));
    } else {
        // sino, inicializar el stock y crear
        //si se queda sin stock, borrar data y que empiece de nuevo
        $stock = [
            "Bolígrafo" => 100,
            "Libreta" => 100,
            "Goma" => 100
        ];
        file_put_contents(RUTA_FICHERO, serialize($stock));
    }

    // proceso para la compra
    if ($_SERVER["REQUEST_METHOD"] === "POST") {//si se envia en modo post
        if (isset($_POST['comprar'])) { // si existe botón de "Comprar" 
            foreach ($precios as $producto => $precio) {
                if (!empty($_POST[$producto])) {
                    $cantidad = $_POST[$producto];
                    // si es menor que 0 mostrar error
                    if ($cantidad > $stock[$producto]) {
                        echo "<p style='color: red;'>No hay stock de $producto. Solo tengo {$stock[$producto]} unidades</p>";
                        
                    } else {
                        // sino restar del stock y mostrar
                        $stock[$producto] = $stock[$producto] - $cantidad;
                }

            }
        }
            // Actualizar cuando todo este oki
            file_put_contents(RUTA_FICHERO, serialize($stock));
        }

        if (isset($_POST['finalizar'])) { // Si se presiona el botón de "Finalizar"
            $mostrarFormulario = false; // Se oculta el formulario
           
            // pa volver al form
            echo "<a href='?volver=1'>Volver</a><br>";
            echo "<a href='?volver=1'>Confirmar</a>";

            }
        }
        if (isset($_POST['volver'])) {//si existe volver se muestra todo otra vez xd
          
            $mostrarFormulario = true;
        }
        if (isset($_POST['confirmar'])) {
            echo "<script>alert('Gracias por tu  :) ');</script>";
     
        }

    // Mostrar el form cuando sea true
    if ($mostrarFormulario) {
        ?>
        <form action="" method="post">
            <?php
            foreach ($precios as $producto => $precio) {
                echo "<label for=\"$producto\">$producto:</label><br>";
                echo "<input type=\"number\" name=\"$producto\" min=\"0\" value=\"" . $producto . "\"/><br>";
                echo " Precio: $precio, Stock: " . $stock[$producto] . "<br/><br/>";
            }
            ?>
            <input type="submit" name="comprar" value="Añadir">
            <input type="submit" name="finalizar" value="Resumen">
        </form>
        <?php
    }
    ?>
</body>

</html>