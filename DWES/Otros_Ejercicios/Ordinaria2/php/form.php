<?php
require_once 'init.php';

$errores = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $flor_id = $_POST['flor'];
    $cantidad = $_POST['cantidad'];

    // Validar nombre
    if (empty($nombre)) {
        $errores[] = "Debe tener nombre.";
    }

    // Validar fecha
    if (empty($fecha)) {
        $errores[] = "Debe tener fecha.";
    } elseif (strtotime($fecha) <= time()) {
        $errores[] = "La fecha debe ser posterior a hoy.";
    }

    // Validar cantidad
    if (empty($cantidad)) {
        $errores[] = "Debe tener cantidad.";
    } else {
        $db->ejecuta("SELECT stock FROM flores WHERE id = ?", $flor_id);
        $flor = $db->obtenDato();
        if ($flor['stock'] < $cantidad) {
            $errores[] = "No hay suficiente stock disponible.";
        }
    }

    // Si no hay errores, registrar el pedido
    if (empty($errores)) {
        $db->ejecuta("INSERT INTO pedidos (flor_id, direccion, fecha, cantidad) VALUES (?, ?, ?, ?)", $flor_id, $fecha, $cantidad);

        // Actualizar stock
        $nuevo_stock = $flor['stock'] - $cantidad;
        $db->ejecuta("UPDATE flores SET stock = ? WHERE id = ?", $nuevo_stock, $flor_id);

        $success = "Pedido realizado con éxito.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Realizar Pedido</h1>
    <?php if (!empty($errores)): ?>
        <?php foreach ($errores as $error): ?>
            <p class="error"><?= $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if ($success): ?>
        <p style="color: green;"><?= $success ?></p>
    <?php endif; ?>
    <form action="form.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required value="<?= isset($nombre) ? $nombre : '' ?>">
        <br>

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" required value="<?= isset($fecha) ? $fecha : '' ?>">
        <br>

        <label for="flor">Flor</label>
        <select name="flor" id="flor" required>
            <?php
            $db->ejecuta("SELECT id, nombre, stock FROM flores WHERE stock > 0");
            $flores = $db->obtenDatos();
            foreach ($flores as $flor) {
                echo "<option value='{$flor['id']}'" . (isset($flor_id) && $flor_id == $flor['id'] ? ' selected' : '') . ">" . $flor['nombre'] . " (" . $flor['stock'] . ")</option>";
            }
            ?>
        </select>
        <br>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" required value="<?= isset($cantidad) ? $cantidad : '' ?>">
        <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
