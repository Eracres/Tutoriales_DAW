<?php
require_once 'init.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$db->ejecuta("SELECT pedidos.id, direccion, fecha, unidades, flores.nombre AS flor 
              FROM pedidos 
              JOIN flores ON pedidos.flor_id = flores.id 
              ORDER BY fecha DESC");
$pedidos = $db->obtenDatos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Listado de Pedidos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Flor</th>
            <th>Dirección</th>
            <th>Fecha</th>
            <th>Unidades</th>
        </tr>
        <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= $pedido['id'] ?></td>
            <td><?= $pedido['flor'] ?></td>
            <td><?= $pedido['direccion'] ?></td>
            <td><?= $pedido['fecha'] ?></td>
            <td><?= $pedido['unidades'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
