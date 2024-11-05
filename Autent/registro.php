<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    <center>
        <h1>Registro de usuario</h1>
        <hr>
        <form action="" method="post">
            <p>Nombre de usuario</p>
            <input type="text" name="nombreNuevo" required>
            <p>Contraseña</p>
            <input type="password" name="contraseña" required>
            <p></p>
            <button type="submit">Crear nuevo usuario</button>
        </form>
    </center>

    <?php 
    define("USUARIOS_RUTA", "usuarios.data");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreNuevo = $_POST['nombreNuevo'];
        $contraseña = $_POST['contraseña'];

        // Leer el archivo existente, si existe
        $usuarios = [];
        if (file_exists(USUARIOS_RUTA)) { // Cambié 'USUARIOS_RUTA' por USUARIOS_RUTA
            $contenido = file_get_contents(USUARIOS_RUTA); // Cambié 'USUARIOS_RUTA' por USUARIOS_RUTA
            $usuarios = unserialize($contenido);
        }

        // Comprobar si el usuario ya existe
        if (array_key_exists($nombreNuevo, $usuarios)) {
            echo "<center><p>El usuario ya existe. Intenta con otro nombre.</p></center>";
        } else {
            // Agregar el nuevo usuario (con contraseña hasheada)
            $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);
            $usuarios[$nombreNuevo] = $contraseñaHash;

            // Guardar el array de usuarios en el archivo
            file_put_contents(USUARIOS_RUTA, serialize($usuarios)); // Cambié 'USUARIOS_RUTA' por USUARIOS_RUTA
            echo "<center><p>Usuario creado exitosamente.</p></center>";
        }
    }
    ?>

    <center><p>Iniciar sesión <a href="inicio.php">aquí</a></p></center>
</body>
</html>
