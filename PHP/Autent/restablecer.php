<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restablecer Stock</title>
</head>
<body>
    <h1>Restablecer Stock (Solo Administrador)</h1>
    <p>El stock ha sido restablecido.</p>

    <a href="tienda.php">Volver a la tienda</a>
</body>
</html>
