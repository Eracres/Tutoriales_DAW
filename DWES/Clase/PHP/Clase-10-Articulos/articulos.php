<?php

require_once('init.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['user'];
$errores = [];
$titulo = "";
$contenido = "";

if (isset($_POST['crear'])) {
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $contenido = isset($_POST['contenido']) ? $_POST['contenido'] : null;

    if (empty($titulo) || empty($contenido)) {
        $errores[] = "Todos los campos son obligatorios";
    }

    if (empty($errores)) {
        $fecha_publicacion = date('Y-m-d');
        $db->ejecuta(
            "INSERT INTO articulos (titulo, contenido, fecha) VALUES (:titulo, :contenido, :fecha_publicacion)",
            [':titulo' => $titulo, ':contenido' => $contenido, ':fecha_publicacion' => $fecha_publicacion]
        );

        header("Location: articulos.php");
        exit();
    }
}

$db->ejecuta("SELECT * FROM articulos ORDER BY fecha DESC");
$articulos = $db->obtenDatos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Artículos</title>
</head>
<body>
    <h1>Lista de Artículos</h1>
    <p>Bienvenido, <?= $usuario ?> | <a href="logout.php">Logout</a></p>
    <form action="" method="POST">
        <input type="text" name="titulo" placeholder="Título" value="<?=$titulo?>"><br><br>
        <textarea name="contenido" placeholder="Contenido"><?=$contenido?></textarea><br><br>
        <?php if (!empty($errores)) { ?>
            <span class="error"><?php echo implode('<br>', $errores); ?></span><br><br>
        <?php } ?>
        <input type="submit" name="crear" value="Crear Artículo">
    </form>
    <hr>
    <h2>Artículos</h2>
    <ul>
        <?php foreach ($articulos as $articulo) { ?>
            <li>
                <h3><?=$articulo['titulo']?></h3>
                <p><?=$articulo['contenido']?></p>
                <small>Fecha de publicación: <?= $articulo['fecha'] ?></small><br>
                <a href="editar.php?id=<?= $articulo['id'] ?>">Editar</a> |
                <a href="borrar.php?id=<?= $articulo['id'] ?>" onclick="return confirm('¿Estás seguro de que quieres borrar este artículo?')">Borrar</a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
