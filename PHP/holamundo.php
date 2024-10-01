<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombre = htmlspecialchars($_POST['nombre']); 
        echo "Hola, " . $nombre . "!"; 
    } else {
        echo "Por favor, introduce un nombre.";
    }
} else {
    echo "No se ha enviado ningún formulario.";
}
?>
