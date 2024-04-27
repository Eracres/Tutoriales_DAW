<?php
    // Procesar el envío del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si todas las respuestas fueron proporcionadas
        $respuestas = $_POST['respuestas'] ?? [];
        foreach ($respuestas as $respuesta) {
            if ($respuesta === '') {
                die("Por favor, complete todas las respuestas.");
            }
        }

        // Guardar las respuestas en un archivo CSV
        $nombre = $_POST['nombre'];
        $respuestasStr = $nombre . ';' . implode(';', $respuestas) . PHP_EOL;
        file_put_contents('respuestas.csv', $respuestasStr, FILE_APPEND);

        echo "<h2>¡Gracias por completar la encuesta!</h2>";
        echo "<a href='encuesta.php'>Volver a la encuesta</a>";
        exit();
    }

    // Leer el archivo de preguntas
    $preguntas = file('preguntas.csv', FILE_IGNORE_NEW_LINES);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Satisfacción</title>
</head>
<body>
    <h1>Encuesta de Satisfacción</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <?php foreach ($preguntas as $indice => $pregunta): ?>
            <p><?php echo $pregunta; ?></p>
            <input type="radio" id="nada_<?php echo $indice; ?>" name="respuestas[<?php echo $indice; ?>]" value="0" required>
            <label for="nada_<?php echo $indice; ?>">Nada</label>
            <input type="radio" id="normal_<?php echo $indice; ?>" name="respuestas[<?php echo $indice; ?>]" value="1">
            <label for="normal_<?php echo $indice; ?>">Normal</label>
            <input type="radio" id="mucho_<?php echo $indice; ?>" name="respuestas[<?php echo $indice; ?>]" value="2">
            <label for="mucho_<?php echo $indice; ?>">Mucho</label><br><br>
        <?php endforeach; ?>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
