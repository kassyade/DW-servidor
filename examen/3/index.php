<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3</title>
</head>
<body>
    <h1>ej3</h1>
    <p>Escribe un script que convierta euros a la moneda elegida por el usuario (dólares, libras, yenes, francos). Usa un array
    asociativo para almacenar los valores de conversión</p>
    <form action="a.php" method="post">
    <label>Introduce la cantidad para hacer el cambio (tene en cuenta que empezamos en euros )</label>
    <input type="number" name="cantidad">

    <select name="moneda">
    <option value="libras">Libras</option>
    <option value="dolares" >Dolares</option>
    </select>
    <button type="submit">Enviar cantidad</button>
    </form>

</body>
</html>