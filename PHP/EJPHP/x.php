<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <center><h1>Formulario para alumnos</h1></center>
    
    <?php 
    $error = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['nombre']) || 
            empty($_POST['apellido']) || 
            empty($_POST['grupo']) || 
            empty($_POST['optativa']) || 
            empty($_POST['aficiones'])) {
            
            $error = "Por favor, completa todos los campos obligatorios.";
        } else {
            // Si todos los campos están completos, procesar y mostrar los datos
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $grupo = $_POST['grupo'];
            $optativa = $_POST['optativa'];
            $aficiones = $_POST['aficiones'];

            echo "<p><strong>Datos ingresados:</strong></p>";
            echo "<p>Nombre: {$nombre}</p>";
            echo "<p>Apellido: {$apellido}</p>";
            echo "<p>Grupo: {$grupo}</p>";
            echo "<p>Optativa: {$optativa}</p>";
            echo "<p>Aficiones:</p>";
            foreach ($aficiones as $x) {
                echo "<p>- {$x}</p>";
            }
        }
    }

    if ($error) {
        echo "<p style='color:red;'>{$error}</p>";
    }
    ?>

    <form action="" method="post">
        <label>Nombre*</label>
        <input type="text" name="nombre">
        <p></p>
        
        <label>Apellidos*</label>
        <input type="text" name="apellido">
        <p></p>
        
        <label>Grupo</label>
        <label><input type="radio" name="grupo" value="1bach"> 1ºBach</label>
        <label><input type="radio" name="grupo" value="2bach"> 2ºBach</label>
        <label><input type="radio" name="grupo" value="1ESO"> 1ºESO</label>
        <label><input type="radio" name="grupo" value="2ESO"> 2ºESO</label>
        <p></p>
        
        <select name="optativa">
            <option value="informatica">Informática</option>
            <option value="cultura clasica">Cultura Clásica</option>
            <option value="idiomas">Idiomas</option>
        </select>
        <p></p>
        
        <input type="checkbox" name="aficiones[]" value="Deportes"><label>Deportes</label><p></p>
        <input type="checkbox" name="aficiones[]" value="fotografia"><label>Fotografía</label><p></p>
        <input type="checkbox" name="aficiones[]" value="musica"><label>Música</label><p></p>
        <input type="checkbox" name="aficiones[]" value="teatro"><label>Teatro</label><p></p>
        
        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
</body>
</html>
