<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ11</title>
</head>
<body>
    <center>
    <h1>LOGIN</h1>
    <form action="index.php" method="post">
        <label>Uusario</label>
        <input type="text" name="usuario"><p></p>
        <label>Contraseña</label>
        <input type="password" name="contraseña">
        <button type="submit">Entrar</button>
    </form>
    <?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['usuario'])&& !empty($_POST['contraseña'])){
        define("RUTA","datos.data");
        $login=false;
        $usuarios= unserialize(file_get_contents(RUTA));
        $nombre = $_POST['usuario'];
        $contraseña = $_POST['contraseña']; 
        foreach($usuarios as $x){
            if($x['nombre']==$nombre && password_verify($contraseña,$x['contraseña'])){
                $login = true;
            };
        };
        if($login){
            header("Location: a.php");
        }else{
            echo("<p>Contraseña incorrecta</p>");
        };

    };
    
    ?>

    <h2>REGISTRO DE NUEVO USUARIO</h2>
    <form action="index.php" method="post">
    <label>Usario</label>
        <input type="text" name="nuevoUsuario"><p></p>
        <label>Contraseña</label>
        <input type="password" name="nuevaContraseña">
        <button type="submit">Entrar</button>
    </form>
    </center>

    <?php 
    define("RUTA","datos.data");
    if($_SERVER['REQUEST_METHOD']=='POST'&& !empty($_POST['nuevoUsuario']) && !empty($_POST['nuevaContraseña'])){
        $nuevaContraseña=password_hash($_POST['nuevaContraseña'],PASSWORD_DEFAULT);
        $usuario=[

            "nombre"=>$_POST['nuevoUsuario'],
            "contraseña"=>$nuevaContraseña
        ];

     
            $usuarios=[];
            $usuarios=unserialize(file_get_contents(RUTA));
      

        $usuarios[]=$usuario;
        file_put_contents(RUTA,serialize($usuarios));


    };

    
    ?>
</body>
</html>