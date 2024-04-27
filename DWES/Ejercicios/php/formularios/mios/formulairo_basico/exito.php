<?php

    $nombre = isset($_GET['nombre']) ? urldecode($_GET['nombre']) : header('Location: form.php');
    $comidas = isset($_GET['comidas']) ? urldecode($_GET['comidas']) : header('Location: form.php');
    $alergias_serializadas = isset($_GET['alergias']) ? urldecode($_GET['alergias']) : header('Location: form.php');
    $alergias = unserialize($alergias_serializadas);
    $turnoSeleccionadas = isset($_GET['turnos']) ? urldecode($_GET['turnos']) : header('Location: form.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>¡¡¡ENHORABUENA, <?= $nombre ?> !!!</h1>
    <h3>Alimento preferido: <?= $comidas ?></h3>
    <h3>Alergenos</h3>
    <p>
        <?php foreach ($alergias as $alergia): ?>
            <label for="alergias"><?= $alergia ?></label><br><br>
        <?php endforeach; ?>
    </p>
    <h3>Turno prioritario: <?= $turnoSeleccionadas ?></h3>
</body>
</html>