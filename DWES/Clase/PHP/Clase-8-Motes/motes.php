<?php

    $archivo = 'empleados.csv';
    $errores = [];
    $empleados = [];
    $nombre = $_POST['nombre'];
    $departamento = $_POST['departamento'];
    $mote = $_POST['mote'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){

        if(isset($nombre) && $nombre != "") {
            $nombre;
        }else{
            $errores["nombre"] = "El nombre es obligatorio";
        }

        if(isset($departamento) && $departamento != "") {
            $departamento;
        }else{
            $errores["departamento"] = "El departamento es obligatorio";
        }

        if(isset($mote) && $mote != "") {
            $mote;
        }else{
            $errores["mote"] = "El mote es obligatorio";
        }

    }

    file_put_contents($archivo, json_encode($empleados));

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
    <form action="motes.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" <?= isset($nombre) ? $nombre : '' ?>>
        <?php
            if($errores["nombre"]){
                echo "<span class='error'>" . $errores["nombre"] . "</span>";

            }
        ?>
        <br><br>

        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento" name="nombre" <?= isset($departamento) ? $departamento : '' ?>>
        <?php
            if($errores["departamento"]){
                echo "<span class='error'>" . $errores["departamento"] . "</span>";

            }
        ?>
        <br><br>

        <label for="mote">Mote:</label>
        <input type="text" id="mote" name="mote" name="nombre" <?= isset($mote) ? $mote : '' ?>>
        <?php
            if($errores["mote"]){
                echo "<span class='error'>" . $errores["mote"] . "</span>";

            }
        ?>
        <br><br>

        <input type="submit" name="submit" value="Guardar">
    </form>

    <h2>Lista de Empleados</h2>
    <ul>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            $nombre = $_POST["nombre"];
            $departamento = $_POST["departamento"];
            $mote = $_POST["mote"];
            
            echo "<li>Nombre: $nombre, Departamento: $departamento, Mote: $mote</li>";
        }
        ?>
    </ul>

    <form action="guardar_csv.php" method="post">
        <input type="submit" name="guardar_csv" value="Guardar en CSV">
    </form>

    <form action="guardar_json.php" method="post">
        <input type="submit" name="guardar_json" value="Guardar en JSON">
    </form>
</body>
</html>
