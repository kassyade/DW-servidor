<?php 
//datos
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$contraseña=password_hash($_POST['contraseña'],PASSWORD_DEFAULT);

define("RUTA_ARCHIVO","x.data");


$data=[
"nombre"=>$nombre,
"email"=>$email,
"contraseña"=>$contraseña
];

file_put_contents(RUTA_ARCHIVO,serialize($data),FILE_APPEND);

echo("<p>{$nombre}</p>
<p>{$email}</p>
<p>{$contraseña}</p>");


?>
