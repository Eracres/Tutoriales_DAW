<?php
    
    $empleados = isset($_POST['empleados']) ? json_decode($_POST['empleados'], true) : [];

    function agregaEmpleado(&$empleados, $nombre, $departamento, $mote){
        if (empty($empleados)) {
            $empleados[] = [$nombre, $departamento, $mote];
        } else {
            $last_index = count($empleados) - 1;
            if (empty($empleados[$last_index])) {
                $empleados[$last_index] = [$nombre, $departamento, $mote];
            } else {
                $empleados[] = [$nombre, $departamento, $mote];
            }
        }
    }
    
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $departamento = $_POST['departamento'];
        $mote = $_POST['mote'];
        
        agregaEmpleado($empleados, $nombre, $departamento, $mote);
        
    }
    
    if (isset($_POST['guardar_csv'])) {
        // Guardar en CSV
        $empleados = json_decode($_POST['empleados'], true) ?? [];

        $archivo = fopen("empleados.csv", "w");
        foreach ($empleados as $empleado) {
            fputcsv($archivo, $empleado);
        }
        fclose($archivo);

        echo "Datos guardados en CSV correctamente.";
    } elseif (isset($_POST['guardar_json'])) {
        // Guardar en JSON
        $empleados = json_decode($_POST['empleados'], true) ?? [];

        file_put_contents("empleados.json", json_encode($empleados));

        echo "Datos guardados en JSON correctamente.";
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Empleados</title>
</head>
<body>
    <h2>Formulario de Empleados</h2>
    <form action="" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="departamento">Departamento:</label><br>
        <input type="text" id="departamento" name="departamento" required><br><br>

        <label for="mote">Mote:</label><br>
        <input type="text" id="mote" name="mote" required><br><br>

        <button type="submit" name="submit">Agregar a la lista</button>
    </form>

    <h2>Lista de Empleados</h2>
    <ul>
        <?php    
        // Imprimir el contenido del array de empleados
        echo "<pre>";
        print_r($empleados);
        echo "</pre>";

        foreach ($empleados as $empleado) {
            echo "<li>$empleado[0] - $empleado[1] - $empleado[2]</li>";
        }

        ?>
    </ul>

    <form action="guardar_datos.php" method="POST">
        <button type="submit" name="guardar_csv">Guardar en CSV</button>
        <button type="submit" name="guardar_json">Guardar en JSON</button>
        <input type="hidden" name="empleados" value="<?php echo htmlspecialchars(json_encode($empleados)); ?>">
    </form>
</body>
</html>




