<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adivina el numero</title>
</head>
<body>
    <h1>adivina el numero wn tonto qliao</h1>
    <label>introduce el número</label>
    <input type="number" name="usuario">
    <input type="hidden" name="numeroAleatorio" value="<?php   echo $numeroAleatorio;      ?>">
    <input type="hidden" name="intentos" value="<?php echo $intentos;   ?>">
    <button type="submit">Intentar</button>
</body>
</html>