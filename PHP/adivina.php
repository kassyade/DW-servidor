<?php
session_start();

if (!isset($_SESSION['numero'])) {
    $_SESSION['numero'] = rand(1, 100); 
    $_SESSION['intentos'] = 0; 
}

$mensaje = '';

if (isset($_GET['intento'])) {
    $_SESSION['intentos']++; 
    $intentoUsuario = (int)$_GET['intento'];

    if ($intentoUsuario < $_SESSION['numero']) {
        $mensaje = 'El número es mayor.';
    } elseif ($intentoUsuario > $_SESSION['numero']) {
        $mensaje = 'El número es menor.';
    } else {
        $mensaje = '¡Felicidades! Has adivinado el número ' . $_SESSION['numero'] . ' en ' . $_SESSION['intentos'] . ' intentos.';
        session_destroy();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivina el Número</title>
</head>
<body>
    <h1>Adivina el Número</h1>
    <hr>
    <p>Intenta adivinar el número entre 1 y 100:</p>

    <form method="get">
        <input type="number" name="intento" min="1" max="100" required>
        <button type="submit">Enviar</button>
    </form>

    <p><?php echo $mensaje; ?></p>
</body>
</html>
