<?php session_start(); ?> <!-- Iniciamos sesión para guardar los datos -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Electrónica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Compra de Electrónicos</h1>
    <?php 
    $precios = [ 
        "Teclados" => 20,
        "Ratones" => 15,
        "Pantallas" => 120,
        "Altavoces" => 22.5,
        "Led" => 10,
        "Ram" => 160
    ];
    $stock = [
        "Teclados" => 50,
        "Ratones" => 50,
        "Pantallas" => 50,
        "Altavoces" => 50,
        "Led" => 50,
        "Ram" => 50
    ];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {  
        if (isset($_POST['comprar'])) {
            $totalCantidad = 0;
            $totalPrecio = 0;
            $carrito = [];

            foreach ($precios as $producto => $precio) { 
                if (!empty($_POST[$producto])) {
                    $cantidad = $_POST[$producto];
                    if ($cantidad <= $stock[$producto]) {
                        $carrito[$producto] = $cantidad;
                        $totalCantidad += $cantidad;
                        $totalPrecio += $cantidad * $precio;
                    }
                }
            }
            $_SESSION['carrito'] = $carrito;
            $_SESSION['totalCantidad'] = $totalCantidad;
            $_SESSION['totalPrecio'] = $totalPrecio;

            header("Location: resumen.php");
            exit;
        }
    }
    ?>

    <form action="" method="post">
        <?php 
        foreach ($precios as $producto => $precio) {
            echo "<label for=\"$producto\">$producto:</label>";
            echo "<input type=\"number\" name=\"$producto\" min=\"0\" value=\"0\"/>";
            echo "<p>Precio: $precio € | Stock: " . $stock[$producto] . " unidades</p>";
        }
        ?>
        <div class="button-group">
            <input type="submit" name="comprar" value="Añadir">
            <input type="submit" name="terminar" value="Terminar">
        </div>
    </form>
</body>
</html>
