<?php

function si_existe($clave, $valor_por_defecto) {
    return isset($_REQUEST[$clave]) ? $_REQUEST[$clave] : $valor_por_defecto;
}


function validarTexto($texto) {
    if (empty($texto)) {
        return "Este campo no puede estar vacío.";
    } elseif (strlen($texto) < 3 || strlen($texto) > 50) {
        return "El texto debe tener entre 3 y 50 caracteres.";
    }
    return ""; 
}

function validarRadio($opcion) {
    if (empty($opcion)) {
        return "Debes seleccionar una opción.";
    }
    return ""; 
}

function validarCheckbox($checkboxes) {
    if (empty($checkboxes)) {
        return "Debes seleccionar al menos una opción.";
    }
    return ""; 
}

function validarSelect($opciones) {
    if (count($opciones) < 1) {
        return "Debes seleccionar al menos una opción.";
    }
    return "";
}

function validarArchivo($archivo) {
    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        return "Error al subir el archivo.";
    }
    return "";
}


$errores = [];
$datos = [
    'nombre' => '',
    'genero' => '',
    'intereses' => [],
    'opciones' => [],
    'archivo' => null
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $datos['nombre'] = si_existe('nombre', '');
    $datos['genero'] = si_existe('genero', '');
    $datos['intereses'] = si_existe('intereses', []);
    $datos['opciones'] = si_existe('opciones', []);
    $datos['archivo'] = $_FILES['archivo'];


    $errores['nombre'] = validarTexto($datos['nombre']);
    $errores['genero'] = validarRadio($datos['genero']);
    $errores['intereses'] = validarCheckbox($datos['intereses']);
    $errores['opciones'] = validarSelect($datos['opciones']);
    $errores['archivo'] = validarArchivo($datos['archivo']);


    $errores = array_filter($errores);


    if (empty($errores)) {
 
        $ruta_destino = 'uploads/' . basename($datos['archivo']['name']);
        move_uploaded_file($datos['archivo']['tmp_name'], $ruta_destino);

        echo "<h2>Datos procesados:</h2>";
        echo "<p>Nombre: {$datos['nombre']}</p>";
        echo "<p>Género: {$datos['genero']}</p>";
        echo "<p>Intereses: " . implode(', ', $datos['intereses']) . "</p>";
        echo "<p>Opciones seleccionadas: " . implode(', ', $datos['opciones']) . "</p>";
        echo "<p>Archivo subido: {$datos['archivo']['name']} ({$datos['archivo']['size']} bytes)</p>";
        echo "<a href='" . urlencode($ruta_destino) . "' download>Descargar archivo</a>";
        exit;
    }
}

function mostrarFormulario($datos, $errores) {
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f7f7f7;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .server-data {
            margin-top: 20px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    
    <form method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($datos['nombre']); ?>">
        <?php if (!empty($errores['nombre'])): ?>
            <span class="error"><?php echo $errores['nombre']; ?></span>
        <?php endif; ?>

        <label>Género:</label>
        <input type="radio" name="genero" value="masculino" <?php echo $datos['genero'] === 'masculino' ? 'checked' : ''; ?>> Masculino
        <input type="radio" name="genero" value="femenino" <?php echo $datos['genero'] === 'femenino' ? 'checked' : ''; ?>> Femenino
        <?php if (!empty($errores['genero'])): ?>
            <span class="error"><?php echo $errores['genero']; ?></span>
        <?php endif; ?>

        <label>Intereses:</label>
        <input type="checkbox" name="intereses[]" value="deportes" <?php echo in_array('deportes', $datos['intereses']) ? 'checked' : ''; ?>> Deportes<br>
        <input type="checkbox" name="intereses[]" value="musica" <?php echo in_array('musica', $datos['intereses']) ? 'checked' : ''; ?>> Música<br>
        <input type="checkbox" name="intereses[]" value="arte" <?php echo in_array('arte', $datos['intereses']) ? 'checked' : ''; ?>> Arte<br>
        <?php if (!empty($errores['intereses'])): ?>
            <span class="error"><?php echo $errores['intereses']; ?></span>
        <?php endif; ?>

        <label>Opciones:</label>
        <select name="opciones[]" multiple>
            <option value="opcion1" <?php echo in_array('opcion1', $datos['opciones']) ? 'selected' : ''; ?>>Opción 1</option>
            <option value="opcion2" <?php echo in_array('opcion2', $datos['opciones']) ? 'selected' : ''; ?>>Opción 2</option>
            <option value="opcion3" <?php echo in_array('opcion3', $datos['opciones']) ? 'selected' : ''; ?>>Opción 3</option>
        </select>
        <?php if (!empty($errores['opciones'])): ?>
            <span class="error"><?php echo $errores['opciones']; ?></span>
        <?php endif; ?>

        <label for="archivo">Sube un archivo:</label>
        <input type="file" name="archivo">
        <?php if (!empty($errores['archivo'])): ?>
            <span class="error"><?php echo $errores['archivo']; ?></span>
        <?php endif; ?>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>

    <div class="server-data">
        <h3>Datos del servidor:</h3>
        <pre><?php echo print_r($_SERVER, true); ?></pre>
    </div>
    <?php
}

mostrarFormulario($datos, $errores);
?>
