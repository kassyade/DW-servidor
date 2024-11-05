<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
<h1><center><b>Registro de nuevo usuario</b></center></h1>
    <hr>
    <center>
    <form action="inicio.php" method="post">
    <p>Nombre de usuario</p>
    <input type="text" name="nombreUsuario">
    <p>Contraseña</p>
    <input type="password" name="contraseñaUsuario">
    <p></p>
    <button type="submit">Crear nuevo usuario</button>
    </form> 
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST['nombreUsuario'];
    $contraseñaUsuario = $_POST['contraseñaUsuario'];
    //hacemos el hash de la contraseña 
    $hashContraseña = password_hash($contraseñaUsuario, PASSWORD_DEFAULT);


    //creamos el array donde estarán los datos de los usuarios 
    $usuarios = [];
    //verificamos que existe y cogemos los datos que tenga el archivo 
    if (file_exists('usuarios.data')) {
        $usuarios = unserialize(file_get_contents('usuarios.data'));
    }

    //relacionamos el nombre y contraseña dentro de usuarios 
    $usuarios[$nombreUsuario] = $hashContraseña;

    //guardamos los datos en el archivo 
    file_put_contents('usuarios.data', serialize($usuarios));
}
?>
</body>
</html>
