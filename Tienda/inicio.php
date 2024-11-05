<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<?php 
//Gestion de usuarios y contraseñas
$nombreUsuario = $_POST['nombreUsuario'];
$contraseñaUsuario = $_POST['contraseñaUsuario'];


?>
<body>
    <h1><center><b>Inicio de sesión</b></center></h1>
    <hr>
    <center>
    <form action="tienda.php" method="post">
    <p>Usuario</p>
    <input type="text" name="nombre">
    <p>Contraseña</p>
    <input type="password" name="contraseña">
    <p></p>
    <button type="submit">Enviar</button>

    </form> 
    <p>¿No tienes cuenta?,Registrate <a href="registro.php">aquí</a></p> 
    
    </center>
</body>
</html>
