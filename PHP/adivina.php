<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Comprobamos si 'numero' e 'intentos' ya están establecidos, de lo contrario, inicializamos
    if (!empty($_POST['numero']) && empty($_POST['intentos'])) {
        $numero = rand(1, 5);  // Inicialización del número aleatorio
        $intentos = 0;         // Inicialización de intentos
    } else {
        // Recuperamos los valores enviados del formulario
        $usuario = $_POST['usuario'];
        $numero = $_POST['numero'];
        $intentos = $_POST['intentos'] + 1; // Incrementamos intentos en cada envío

        if ($numero == $usuario) {
            echo "<p>¡Lo lograste en el intento {$intentos}!</p>";
            echo "<p>El número era {$numero}</p>";
            // Reiniciar el juego generando un nuevo número
            $numero = rand(1, 5);
            $intentos = 0;
        } else {
            echo "<p>Intento incorrecto. Sigue intentando.</p>";
            echo "<p>Llevas {$intentos} intentos. El número era {$numero}</p>";
        }
    }
} else {
    // Inicialización cuando se carga por primera vez
    $numero = rand(1, 5);
    $intentos = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el Número</title>
</head>
<body>
    <h1>Adivina el Número</h1>
    <form action="" method="post">
        <label>Introduce un número entre 1 y 5:</label>
        <input type="number" name="usuario" required>
        <input type="hidden" name="numero" value="<?php echo $numero; ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
