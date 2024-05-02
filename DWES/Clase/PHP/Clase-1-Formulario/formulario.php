<?php

$errores = [];
$hoy = date("Y");
$hoy_int = intval($hoy);
$page_min = 3;

$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
$autor = isset($_POST["autor"]) ? $_POST["autor"] : "";
$ano = isset($_POST["ano"]) ? $_POST["ano"] : "";
$page = isset($_POST["page"]) ? $_POST["page"] : "";

if (isset($_POST["enviar"])) {
    if ($titulo == "") {
        $errores["titulo"] = "Este campo es obligatorio";
    }

    if ($autor == "") {
        $errores["autor"] = "Este campo es obligatorio";
    }

    if ($ano == "") {
        $errores["ano"] = "Este campo es obligatorio";
    } else if ($ano > $hoy_int) {
        $errores["ano"] = "El año introducido no es correcto";
    }

    if ($page == "") {
        $errores["page"] = "Este campo es obligatorio";
    } else if ($page < $page_min) {
        $errores["page"] = "El numero de paginas es muy bajo";
    }

    if (empty($errores)) {
        header("Location: exito.php");
        die();
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
        <label for="titulo">Titulo:</label><input type="text" name="titulo" id="titulo" value="<?= $titulo ?>"><br>
        <?php
            if(isset($errores["titulo"])){
                echo "<span class='error'>" . $errores["titulo"] . "</span>";
            }
        ?>
        <label for="autor">Autor:</label><input type="text" name="autor" id="autor" value="<?= $autor ?>"><br>
        <?php
            if(isset($errores["autor"])){
                echo "<span class='error'>" . $errores["autor"] . "</span>";
            }
        ?>
        <label for="ano">Año:</label><input type="text" name="ano" id="ano" value="<?= $ano ?>"><br>
        <?php
            if(isset($errores["ano"])){
                echo "<span class='error'>" . $errores["ano"] . "</span>";
            }
        ?>
        <label for="page">Paginas:</label><input type="text" name="page" id="page" value="<?= $page ?>"><br>
        <?php
            if(isset($errores["page"])){
                echo "<span class='error'>" . $errores["page"] . "</span>";
            }
        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
