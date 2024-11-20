<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
    <center>
         <h1>Inicio de sesion</h1>
         <form action="inicio.php" method="post">
            <label >Usuario: <input type="text" name="nombre" ></label>
            <label >Contraseña: <input type="password" name="contraseña" ></label>
            <button type="submit">Iniciar sesion</button>
         </form>
        <?php 
        session_start();
        if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['nombre'])  && !empty($_POST['contraseña']) ){
            $nombre = $_POST['nombre'];
            $contraseña=$_POST['contraseña'];
            define("RUTA","usuarios.data");
            $datos=[];
            if(file_exists(RUTA)){
                $datos=unserialize(file_get_contents(RUTA));
                if($nombre == "admin" && $contraseña=="admin"){
                    $_SESSION['admin']=true;
                    header("Location: admin.php");
                    exit();


                }
                foreach($datos as $x){
                    if($nombre == $x['nombre'] && password_verify($contraseña,$x['contraseña']) ){
                        header("Location: tienda.php");
                        exit();
                    }else{
                        echo("datos incorrectos ");
                    }
                }

            }else{
                echo("usuario no existente");
            }
        }
        
        ?>

         <hr>
         <h1>Crear usuario nuevo</h1>
         <form action="" method="post">
            <label >Usuario: <input type="text" name="nuevoN" ></label>
            <label >Contraseña: <input type="password" name="nuevaC" ></label>
            <button type="submit">Crear usuario</button>
         </form>
         <hr>

         <?php 
            if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['nuevoN']) && !empty($_POST['nuevaC'])){
                $nuevoN = $_POST['nuevoN'];
                $nuevaC=password_hash($_POST['nuevaC'] ,PASSWORD_DEFAULT);

                define('RUTA', 'usuarios.data');
                $datos=[];
                if(file_exists(RUTA)){
                    $datos=unserialize(file_get_contents(RUTA));
                }else{
                    $datos=[];
                }
                
                $usuario =[
                    "nombre"=>$nuevoN,
                    "contraseña"=>$nuevaC
                ];
                $datos[]=$usuario;
                file_put_contents(RUTA,serialize($datos));


            }
         ?>
    </center>
</body>
</html>