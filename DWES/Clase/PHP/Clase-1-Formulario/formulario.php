<?php

$errores = [];
$hoy = date("Y");
$page_min = 3;

if (isset($_POST["enviar"])) {
    if (isset($_POST["titulo"]) && $_POST["titulo"] != "") {
        $titulo = $_POST["titulo"];
    } else {
        $errores["titulo"] = "Este campo es obligatorio";
    }

    if (isset($_POST["autor"]) && $_POST["autor"] != "") {
        $titulo = $_POST["autor"];
    } else {
        $errores["autor"] = "Este campo es obligatorio";
    }

    if (isset($_POST["ano"]) && $_POST["titulo"] != "") {
        $titulo = $_POST["ano"];
    } else if (isset($_POST["ano"]) && $_POST["ano"] < $hoy){
        $errores["ano"] = "El año introducido no es correcto";
    } else {
        $errores["ano"] = "Este campo es obligatorio";
    }

    if (isset($_POST["page"]) && $_POST["page"] != "") {
        $titulo = $_POST["page"];
    } else if (isset($_POST["page"]) && $_POST["page"] < $hoy){
        $errores["page"] = "El numero de paginas es muy bajo";
    } else {
        $errores["page"] = "Este campo es obligatorio";
    }

    if (empty($errores)) {
        header("Location: exito.php");
        die(); // o exit
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
        }

        .error{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Alta de libros</h1>
    <form action="formulario.php" method="post">
        <label for="titulo">Titulo:</label><input type="text" name="titulo" id="titulo" value="<?= $titulo?>"><br>
        <?php
            if($errores["titulo"]){
                echo "<span class='error'>" . $errores["titulo"] . "</span>";

            }
        ?>
        <label for="autor">Autor:</label><input type="text" name="autor" id="autor" value="<?=$autor?>"><br>
        <?php
            if($errores["titulo"]){
                echo "<span class='error'>" . $errores["autor"] . "</span>";

            }
        ?>
        <label for="ano">Año:</label><input type="text" name="ano" id="ano" value="<?=$ano?>"><br>
        <?php
            if($errores["titulo"]){
                echo "<span class='error'>" . $errores["ano"] . "</span>";

            }
        ?>
        <label for="page">Paginas:</label><input type="text" name="page" id="page" value="<?=$page?>"><br>
        <?php
            if($errores["titulo"]){
                echo "<span class='error'>" . $errores["page"] . "</span>";

            }
        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>