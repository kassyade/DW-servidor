<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <p>¿No tienes cuenta?, crea tu cuenta <a href="registro.php">aquí</a></p>
</center>

<?php

define("USUARIOS_RUTA", "usuarios.data");

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    // Leer el archivo de usuarios
    $usuarios = [];
    if (file_exists(USUARIOS_RUTA)) {
        $contenido = file_get_contents(USUARIOS_RUTA);
        $usuarios = unserialize($contenido);
    }

    // Verificar si el usuario existe y si la contraseña es correcta
    if (array_key_exists($nombre, $usuarios) && password_verify($contraseña, $usuarios[$nombre])) {
        echo "<p>Inicio de sesión exitoso. ¡Bienvenido, $nombre!</p>";
        // Aquí puedes redirigir a otra página o mostrar contenido restringido
    } else {
        echo"<center><p>Usuario o contraseña incorrectos. Intenta de nuevo.</p></center>";
    }
}

?>
</body>
</html>
