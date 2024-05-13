<?php
$archivoCSV = 'empleados.csv';
$archivoJSON = 'empleados.json';
$errores = [];
$empleados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'] ?? '';
    $departamento = $_POST['departamento'] ?? '';
    $mote = $_POST['mote'] ?? '';

    if (empty($nombre)) {
        $errores["nombre"] = "El nombre es obligatorio";
    }

    if (empty($departamento)) {
        $errores["departamento"] = "El departamento es obligatorio";
    }

    if (empty($mote)) {
        $errores["mote"] = "El mote es obligatorio";
    }

    if (empty($errores)) {
        $empleados[] = ['nombre' => $nombre, 'departamento' => $departamento, 'mote' => $mote];
        file_put_contents($archivoJSON, json_encode($empleados, JSON_PRETTY_PRINT));
    }
}

// Guardar en CSV
if (isset($_POST['guardar_csv'])) {
    if (!empty($empleados)) {
        $csv = fopen($archivoCSV, 'w');
        foreach ($empleados as $empleado) {
            fputcsv($csv, $empleado);
        }
        fclose($csv);
    }
}

// Guardar en JSON
if (isset($_POST['guardar_json'])) {
    if (!empty($empleados)) {
        file_put_contents($archivoJSON, json_encode($empleados, JSON_PRETTY_PRINT));
    }
}

// Vaciar lista
if (isset($_POST['borrar_lista'])) {
    $empleados = [];
    file_put_contents($archivoJSON, json_encode($empleados, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario y Lista de Empleados</title>
</head>
<body>
<h2>Formulario de Empleados</h2>
<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" <?= isset($nombre) ? $nombre : '' ?>>
    <?php
    if ($errores["nombre"]) {
        echo "<span class='error'>" . $errores["nombre"] . "</span>";

    }
    ?>
    <br><br>

    <label for="departamento">Departamento:</label>
    <input type="text" id="departamento" name="departamento" name="nombre" <?= isset($departamento) ? $departamento : '' ?>>
    <?php
    if ($errores["departamento"]) {
        echo "<span class='error'>" . $errores["departamento"] . "</span>";

    }
    ?>
    <br><br>

    <label for="mote">Mote:</label>
    <input type="text" id="mote" name="mote" name="nombre" <?= isset($mote) ? $mote : '' ?>>
    <?php
    if ($errores["mote"]) {
        echo "<span class='error'>" . $errores["mote"] . "</span>";

    }
    ?>
    <br><br>

    <input type="submit" name="enviar" value="Guardar">
</form>

<h2>Lista de Empleados</h2>
<ul>
    <?php foreach ($empleados as $empleado): ?>
        <li>Nombre: <?= $empleado['nombre'] ?>, Departamento: <?= $empleado['departamento'] ?>, Mote: <?= $empleado['mote'] ?></li>
    <?php endforeach; ?>
</ul>

<form method="post">
    <input type="submit" name="borrar_lista" value="Borrar todos los datos de la lista">
</form>

<form method="post">
    <input type="submit" name="guardar_csv" value="Guardar en CSV">
</form>

<form method="post">
    <input type="submit" name="guardar_json" value="Guardar en JSON">
</form>
</body>
</html>

