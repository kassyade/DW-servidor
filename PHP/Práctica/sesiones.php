
<?php
    session_start(); // Inicia la sesión

    // Verifica si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Almacena los valores en la sesión
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['numero'] = $_POST['numero'];

        // Imprime los valores almacenados en la sesión
        echo "<h2>Hola, " . $_SESSION['nombre'] . "! Has introducido el número: " . $_SESSION['numero'] . "</h2>";
    }
    ?>