

<form action="" method="post">
<p>
<label >Usuario:</label>
<input type="text" name="nombre" />
</p>
<p>
<label>Contraseña:</label>
<input type="password" name="contraseña" />
</p>
<p><input type="submit" value="Iniciar sesión" /></p>
</form>

<?php
session_start();
if(isset($_SESSION['usuario'])){
    $x=$_SESSION['usuario'];
    echo("bienvenido DE NUEVO $x");
    echo("<a href='cierre.php'>cerrar sesion</a>");
}else{


    $usuarios=[
        ["usuario"=>"user1" ,"contraseña"=>'$2y$10$3SgeyVJD/mw0rvRtjkwWk.8XM1.GpDr8NWc95bN.tpSK2sEriXtX2'],
        ["usuario"=>"user2" ,"contraseña"=>'$2y$10$OymrA3YaPJ4Pfnh.H3GOneuD2y5OklZVW28OxrniOdkDyLWPN/80u'],
        ["usuario"=>"user3" ,"contraseña"=>'$2y$10$qmNdtRRxXXfVRQy8Sjb7bey1RZqj.I2sz3NvUO2kuz2hjZHud2rrC'],
        ["usuario"=>"user4" ,"contraseña"=>'$2y$10$s4PyteQlBtBLtdL0pO9jQ.3TEB0z2kAMGfQCmpNig91Q8o8hwEZY6'],
        ["usuario"=>"user5" ,"contraseña"=>'$2y$10$kNiEqiag6PPROoFQM9E6BuEEVYPm6Lev9OS7y9N20FdRnTeCqBC0y'],
        ["usuario"=>"user6" ,"contraseña"=>'$2y$10$CrbCkq6F.RCI4nyydjXwKu5hSRf4ZSrNi6J5P3jJJ8Fl4JlTz57Y2'],
        ["usuario"=>"user7" ,"contraseña"=>'$2y$10$rXNAShF5ADOowmIV.82KnuMHntgpbvG5oQtFs1/KQrKCkipDTK2BS'],
        ["usuario"=>"user8" ,"contraseña"=>'$2y$10$FFkEH4zNMAC5R8UPFahqMeYdVqQtSfMMW0oLD6e4zOTWyTtZWmSJG'],
        ["usuario"=>"user9" ,"contraseña"=>'$2y$10$ClccGXvtRiKGkwgh4fhNKOLqnYDs/ta2bqbeiA4o7RVrZ0Koiz1kG'],
        ["usuario"=>"user10" ,"contraseña"=>'$2y$10$dX8LQLCIcJc5IwHqdP1aVOiINd0SF1IfPu8xzf4tnCyxuIonXRbf.'],
    ];
    
        //usuario nuevo 
        $paloma=[
            "usuario"=>"paloma",
            "contraseña"=>password_hash("paloma",PASSWORD_BCRYPT)
        ];
        $usuarios[]=$paloma;
    
        if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['nombre'])  && !empty($_POST['contraseña'])   ){
            $nombre =$_POST['nombre'];
            $contraseña = $_POST['contraseña'];
            $usuarioEncontrado=false;
    
            foreach($usuarios as $usuario){
                if($nombre==$usuario['usuario']  &&  password_verify($contraseña,$usuario['contraseña'])  ){
                    echo("inicio de sesion existoso,Bienvenido $nombre");
                    $usuarioEncontrado=true;
                    $_SESSION['usuario']=$nombre;
                    echo("<a href='cierre.php'>cerrar sesion</a>");
                }
            }
    
            if($usuarioEncontrado==false){
                echo("contraseña o ususario incorrecto");
            }
        }
    

}


?>




