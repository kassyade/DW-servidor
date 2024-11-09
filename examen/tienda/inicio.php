<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio de sesion</title>
</head>
<body>
    <center>
        <h1>Inicio de sesion</h1>
        <form action="" method="post">
        <label >Usuario:</label>
        <input type="text" name="usuario"><p></p>
        <label >Contraseña:</label>
        <input type="password" name="contraseña"> <p></p>
        <button type="submit">Entrar</button> 
        </form>
        <?php 
        if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['usuario']) && !empty($_POST['contraseña'])){
            $nombre=$_POST['usuario'];
            $contraseña=$_POST['contraseña'];

            define("RUTA","usuarios.data");
            $usuarios=unserialize(file_get_contents(RUTA));

            foreach($usuarios as $x){
                if($nombre == "admin" &&  $contraseña=="admin"){
                    header("Location:admin.php");
                }else{
                    
                if($nombre == $x['nombre'] && password_verify($contraseña,$x['contraseña'])){
                    header("Location: tienda.php");
                }else{
                    echo("Datos incorrectos");

                }
                };

            };

        };
        
        ?>
        <hr>
        <h1>Crear usuario</h1>
        <form action="inicio.php" method="post">
        <label >Usuario:</label>
        <input type="text" name="nuevoNombre"><p></p>
        <label> Telefono</label>
        <input type="number" name="telefono"><p></p>
        <label >Correo</label>
        <input type="email" name="correo"><p></p>
        <label >Contraseña:</label>
        <input type="password" name="nuevaContraseña"> <p></p>
        <button type="submit">Crear usuario</button> 
        <hr>
        </form>
        <?php 
        if($_SERVER['REQUEST_METHOD']=='POST'&& !empty($_POST['nuevoNombre']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['nuevaContraseña'])){
            $nuevoNombre=$_POST['nuevoNombre'];
            $telefono =$_POST['telefono'];
            $correo=$_POST['telefono'];
            $nuevaContraseña=password_hash($_POST['nuevaContraseña'],PASSWORD_DEFAULT);
            $usuario=[
                "nombre"=>$nuevoNombre,
                "telefono"=>$telefono,
                "correo"=>$correo,
                "contraseña"=>$nuevaContraseña
            ];
            define("RUTA","usuarios.data");
            $usuarios=[];
            $usuarios=unserialize(file_get_contents(RUTA));
            $usuarios[]=$usuario;
            file_put_contents(RUTA,serialize($usuarios));
            echo("<p>Usuario creado</p>");
        }else{
            echo("<p>Datos introducidos incorrectamente</p>");
        };
        ?>

        <h4>Datos de admin:</h4>
        <p>Usuario: admin</p>
        <p>contraseña: admin</p>
    </center>
    
</body>
</html> 