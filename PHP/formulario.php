
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario simple</h1>
    <h3> busqueda de canciones</h3>
    <form action="" method="post">
    <label>Selecciona el nombre del artista para ver las canciones </label>
    <select name="artista"  >
        <option value="badbunny">Bad bunny</option>
        <option value="trueno">Trueno</option>
        <option value="duki">Duki</option>
        <option value="joji">Joji</option>
        <option value="rompe99">Rompe 99</option>
        <option value="lana">Lana del rey</option>
    </select>
    <button type="submit">buscar</button>
    </form>
    <?php 
    if($_SERVER['REQUEST_METHOD']== 'POST' && !empty($_POST['artista'])){
        $artista =$_POST['artista'];
        $datos=[
            ["artista"=>"badbunny" ,"titulo"=>"soyPior"],
            ["artista"=>"badbunny" ,"titulo"=>"Tu no mete cabra"],
            ["artista"=>"badbunny" ,"titulo"=>"Chambea"],
            ["artista"=>"badbunny" ,"titulo"=>"Un coco"],
            ["artista"=>"badbunny" ,"titulo"=>"tit me pregunto"],
            ["artista"=>"trueno" ,"titulo"=>"rain"],
            ["artista"=>"trueno" ,"titulo"=>"mamnichula"],
            ["artista"=>"trueno" ,"titulo"=>"dace trip"],
            ["artista"=>"trueno" ,"titulo"=>"BZRP"],
            ["artista"=>"trueno" ,"titulo"=>"RainII"],
            ["artista"=>"duki" ,"titulo"=>"goteo"],
            ["artista"=>"duki" ,"titulo"=>"te traje flores"],
            ["artista"=>"duki" ,"titulo"=>"tumbando el club"],
            ["artista"=>"duki" ,"titulo"=>"givechi"],
            ["artista"=>"duki" ,"titulo"=>"ameri"],
            ["artista"=>"joji" ,"titulo"=>"run"],
            ["artista"=>"joji" ,"titulo"=>"modus"],
            ["artista"=>"joji" ,"titulo"=>"like u do"],
            ["artista"=>"joji" ,"titulo"=>"glimpse of us"],
            ["artista"=>"joji" ,"titulo"=>"dancing in the dark"],
            ["artista"=>"joji" ,"titulo"=>"777"],
            ["artista"=>"joji" ,"titulo"=>"tick tock"],
            ["artista"=>"rompe99" ,"titulo"=>"morocha culona"],
            ["artista"=>"rompe99" ,"titulo"=>"SOY"],
            ["artista"=>"rompe99" ,"titulo"=>"Xanax de 2"],
            ["artista"=>"lana" ,"titulo"=>"born to die"],
            ["artista"=>"lana" ,"titulo"=>"video game"],
            ["artista"=>"lana" ,"titulo"=>"yung and lindo"],
            ["artista"=>"lana" ,"titulo"=>"ride"],
            ["artista"=>"lana" ,"titulo"=>"salvatore"],
        ];

        foreach($datos as $x){
            if($artista == $x['artista']){
                   echo("<p>{$x['titulo']}</p>"); 
            };
        };



    };
    ?>

</body>
</html>