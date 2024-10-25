<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
</head>
<body>
    <h1>Resumen de su Compra</h1>

    <?php
    if (isset($_SESSION['carrito'], $_SESSION['totalCantidad'], $_SESSION['totalPrecio'])) {
        echo "<p>Total de artículos: " . $_SESSION['totalCantidad'] . "</p>";
        echo "<p>Precio total: " . $_SESSION['totalPrecio'] . " €</p>";
    } else {
        echo "<p>No se han seleccionado artículos.</p>";
    }
    ?>

    <form action="confirmar.php" method="post">
        <button type="submit" name="confirmar">Confirmar Compra</button>
        <button type="button" onclick="window.location.href='index.php';">Cancelar</button>
    </form>
</body>
</html>
