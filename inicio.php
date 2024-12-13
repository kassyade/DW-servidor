<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio </title>
</head>
<body>

<form action="" method="post">
<center>

<h2>Inicio de sesion</h2>
<label >Introduce el nombre de usuario</label>
<input type="text" name="nombre" ><p></p>
<label >Introduce la contraseña</label><input type="password" name="contraseña" ><p></p>
<button type="submit">Iniciar sesion</button>
<hr>
<h2>Crear un nuevo usuario</h2>
<label >Introduce el nombre de usuario</label>
<input type="text" name="nuevoNombre" ><p></p>
<label >Introduce la contraseña</label><input type="password" name="nuevaContraseña" ><p></p>
<button type="submit">Crear un nuevo usuario</button>
<hr>

</center>
</form>


</body>
</html>
<?php 
session_start();

    define("RUTA","usuarios.data");

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['nuevoNombre'])  && !empty($_POST['nuevaContraseña']) ){
    $usuarios=[];
    if(file_exists(RUTA)){
        $usuarios=unserialize(file_get_contents(RUTA));
    }else{
        file_put_contents(RUTA,serialize($usuarios));
    }

    $nuevoNombre=$_POST['nuevoNombre'];
    $nuevaContraseña=password_hash($_POST['nuevaContraseña'],PASSWORD_DEFAULT);
    
    $nuevoUsuario=[
        "nombre"=>$nuevoNombre,
        "contraseña"=>$nuevaContraseña
    ];

    $usuarios[]=$nuevoUsuario;
    file_put_contents(RUTA,serialize($usuarios));

}

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['nombre'])  && !empty($_POST['contraseña']) ){
    $nombre=$_POST['nombre'];
    $contraseña=$_POST['contraseña'];

    $inicioSesion=false;

    $usuarios=[];
    if(file_exists(RUTA)){
        $usuarios=unserialize(file_get_contents(RUTA));
    }

    foreach($usuarios as $usuario){
        if($nombre==$usuario['nombre'] && password_verify($contraseña,$usuario['contraseña'])  ){
            $_SESSION['usuario']=$nombre;
            $inicioSesion=true;
            header("Location:tienda.php");
            exit();
            

        }
    }

    if($inicioSesion ==false){
        echo("inicio de sesion fallido");
    }


}




?>