<?php

    $errores = [];
    $titulo = "";
    $autor = "";
    $ano = "";
    $paginas = "";

    if(isset($_POST["enviar"])) {

        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano = $_POST['ano'];
        $paginas = $_POST['paginas'];

        if($_POST["titulo"] === "") {
            $errores["titulo"] = "El título es obligatorio";
        }

        if($_POST["autor"] === "") {
            $errores["autor"] = "El autor es obligatorio";
        }

        if($_POST["ano"] > date("Y") || $_POST["ano"] === "") {
            $errores["ano"] = "El año es obligatorio o tiene que ser menor o igual al actual";
        }

        if($_POST["paginas"] <= 0 || $_POST['paginas'] === "") {
            $errores["paginas"] = "Las páginas son obligatorias o tienen que ser mayor que 0";
        }

        if(empty($errores)){
            header('Location: exito.php');
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
    <form action="formulario2.php" method="post">
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
        <label for="paginas">Paginas:</label><input type="text" name="paginas" id="paginas" value="<?=$paginas?>"><br>
        <?php
            if($errores["titulo"]){
                echo "<span class='error'>" . $errores["paginas"] . "</span>";

            }
        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
