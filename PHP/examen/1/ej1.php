<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej1</title>
</head>
<body>
    <p>Crear un formulario en HTML que permita al usuario ingresar su nombre y edad. El formulario deberá enviar los datos a
    un archivo PHP que verifique si la persona es mayor o menor de edad y muestre un mensaje adecuado.</p>
    <form action="x.php" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre">
        <label >Edad</label>
        <input type="number" name="edad">
        <button type="submit">Enviar </button>
    </form>
</body>
</html>