<?php
    $m = isset($_GET['m']) ? $_GET['m'] : '';

    if (isset($_GET['new_message'])) {
        $Nmensaje = htmlspecialchars($_GET['new_message']); 
        $m .= '<p>' . $Nmensaje . '</p>'; 
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog Fake</title>
        <style>
            #M {
                border: 1px solid #ccc;
                padding: 10px;
                margin-top: 10px;
                max-height: 200px; 
                overflow-y: auto; 
            }
        </style>
    </head>
    <body>
        <h1>Bienvenido a tu Blog </h1>

        <form method="get">
            <label for="new_message">Nuevo mensaje:</label>
            <input type="text" name="new_message" id="new_message" required>
            <input type="hidden" name="m" value="<?php echo htmlspecialchars($m); ?>">
            <button type="submit">Enviar</button>
        </form>

        <div id="M">
            <?php echo $m; ?>
        </div>
    </body>
</html>
