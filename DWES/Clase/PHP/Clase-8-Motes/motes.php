<?php

    $archivo = 'empleados.csv';
    $errores = [];
    $empleados = [];
    $nombre = $_POST['nombre'];
    $departamento = $_POST['departamento'];
    $mote = $_POST['mote'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){

        if(isset($_POST["nombre"]) && $_POST["nombre"] != ""){
            $nombre;
        }else{
            $errores = "Poner un nombre";
        }

        if(isset($_POST["departamento"]) && $_POST["departamento"] != ""){
            $departamento;
        }else{
            $errores = "Poner un departamento";
        }

        if(isset($_POST["mote"]) && $_POST["mote"] != ""){
            $mote;
        }else{
            $errores = "Poner un mote";
        }

    }

    file_put_contents($archivo, json_encode($empleados));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="nombre">Nombre:</label><input type="text" name="titulo" id="titulo" value="<?= $nombre ?>"><br>
    <?php
        if($errores["nombre"]){
            echo "<span class='error'>" . $errores["nombre"] . "</span>";
        }
    ?>
    <label for="departamento">Departamento:</label><input type="text" name="departamento" id="departamento" value="<?= $departamento ?>"><br>
    <?php
        if($errores["departamento"]){
            echo "<span class='error'>" . $errores["departamento"] . "</span>";
        }
    ?>
    <label for="mote">Mote:</label><input type="text" name="mote" id="mote" value="<?= $mote ?>"><br>
    <?php
        if($errores["mote"]){
            echo "<span class='error'>" . $errores["mote"] . "</span>";
        }
    ?>

    

</body>
</html>