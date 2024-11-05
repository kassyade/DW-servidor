<?php
session_start();
define("USUARIOS_RUTA", "usuarios.data");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    if (file_exists(USUARIOS_RUTA)) {
        $usuarios = unserialize(file_get_contents(USUARIOS_RUTA));

        if (isset($usuarios[$nombre]) && password_verify($contraseña, $usuarios[$nombre]['password'])) {
            $_SESSION['usuario'] = $nombre;
            $_SESSION['rol'] = $usuarios[$nombre]['rol']; 
            header("Location: tienda.php"); 
            exit();
        } else {
            echo "<center><p>Usuario o contraseña incorrectos.</p></center>";
        }
    } else {
        echo "<center><p>No se encontraron usuarios registrados.</p></center>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>
<center>
<h1>Inicio de sesión</h1>
    <hr>
    <form action="" method="post">
        <p>Usuario</p>
        <input type="text" name="nombre" required>
        <p>Contraseña</p>
        <input type="password" name="contraseña" required>
        <p></p>
        <button type="submit">Iniciar sesión</button>
    </form>
    <p>¿No tienes cuenta? Crea tu cuenta <a href="registro.php">aquí</a></p>
</center>
</body>
</html>
