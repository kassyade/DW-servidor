<?php
define("USUARIOS_RUTA", "usuarios.data");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreNuevo = $_POST['nombreNuevo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol']; 

    if (file_exists(USUARIOS_RUTA)) {
        $usuarios = unserialize(file_get_contents(USUARIOS_RUTA));
    } else {
        $usuarios = [];
    }

    if (isset($usuarios[$nombreNuevo])) {
        echo "<center><p>El usuario ya existe. Intenta con otro nombre.</p></center>";
    } else {
        $usuarios[$nombreNuevo] = ['password' => password_hash($contraseña, PASSWORD_DEFAULT), 'rol' => $rol];
        file_put_contents(USUARIOS_RUTA, serialize($usuarios));
        echo "<center><p>Usuario creado exitosamente.</p></center>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            <p>Rol: </p>
            <select name="rol">
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
            <p></p>
            <button type="submit">Crear nuevo usuario</button>
        </form>
    </center>
    <center><p>Iniciar sesión <a href="inicio.php">aquí</a></p></center>
</body>
</html>
