<?php

require_once('init.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$errores = [];
$titulo = "";
$contenido = "";
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $db->ejecuta("SELECT * FROM articulos WHERE id = :id", [':id' => $id]);
    $articulo = $db->obtenDato();

    if (!$articulo) {
        header("Location: articulos.php");
        exit();
    }

    $titulo = $articulo['titulo'];
    $contenido = $articulo['contenido'];
}

if (isset($_POST['actualizar'])) {
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $contenido = isset($_POST['contenido']) ? $_POST['contenido'] : null;

    if (empty($titulo) || empty($contenido)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($errores)) {
        $db->ejecuta(
            "UPDATE articulos SET titulo = :titulo, contenido = :contenido WHERE id = :id",
            [':titulo' => $titulo, ':contenido' => $contenido, ':id' => $id]
        );

        header("Location: articulos.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
</head>
<body>
    <h1>Editar Artículo</h1>
    <form action="" method="POST">
        <input type="text" name="titulo" placeholder="Título" value="<?=$titulo?>"><br><br>
        <textarea name="contenido" placeholder="Contenido"><?=$contenido?></textarea><br><br>
        <?php if (!empty($errores)) { ?>
            <span class="error"><?php echo implode('<br>', $errores); ?></span><br><br>
        <?php } ?>
        <input type="submit" name="actualizar" value="Actualizar Artículo">
    </form>
    <a href="articulos.php">Volver a la lista</a>
</body>
</html>
