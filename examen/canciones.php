<?php 
if(!empty($_SERVER['REQUEST_METHOD']=='POST') && !empty($_POST['artista']) ){
   $artista=$_POST['artista'];

   $datos=[
        ["artista"=>"badBunny" ,"titulo"=>"artardecer"],
        ["artista"=>"badBunny" ,"titulo"=>"chambea"],
        ["artista"=>"joji" ,"titulo"=>"777"],
        ["artista"=>"joji" ,"titulo"=>"run"],
        ["artista"=>"duki" ,"titulo"=>"goteo"],
        ["artista"=>"duki" ,"titulo"=>"lola"]
   ];


};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de canciones</title>
</head>
<body>
    <h1>Busca canciones</h1>
    <form action="" method="post">
        <label for="Introduce el nombre del artista "></label>
        <select name="artista" >
            <option value="badBunny">Bad Bunny</option>
            <option value="joji">joji</option>
            <option value="duki">duki</option>
        </select>
        <button type="submit">Buscar canciones</button>
    </form>

    <?php
       echo("<p>Artista buscado = : {$artista}</p>");

       foreach($datos as $x){
        if($artista == $x['artista']){
            echo("<p>{$x['titulo']}</p>");
        };
       };
       
    
    
    ?>
</body>
</html>