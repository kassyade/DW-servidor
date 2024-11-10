<?php 
   $mensaje= $_POST['mensaje'];
   $texto = htmlspecialchars($_POST['texto']);
   $mensaje .=$texto;
   $mensaje="<p>{$mensaje}</p>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h1>Blog falso</h1>
    <form action="" method="post">
    <label>Introduce el nuevo texto</label>
    <input type="text" name="texto">
    <input type="hidden" name="mensaje" value="<?php  echo htmlspecialchars($mensaje) ?>">
    <button type="submit">enviar nuevo mensaje</button>
    </form>
</body>

<?php 
echo($mensaje);
?>
</html>