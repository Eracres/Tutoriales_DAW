<?php

require_once('init.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT id, direccion, fecha, unidades FROM pedidos ORDER BY fecha DESC";
$db->ejecuta($sql);
$pedidos = $db->obtenDatos();

// Obtener la página actual
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Definir el número de resultados por página
$limit = NUM_POR_PAGINA;
$offset = ($page - 1) * $limit;

// Obtener el número total de pedidos
$sql = "SELECT COUNT(*) as total FROM pedidos";
$db->ejecuta($sql);
$totalPedidos = $db->obtenDato()['total'];
$totalPages = ceil($totalPedidos / $limit);

// Obtener los pedidos para la página actual
$sql = "SELECT id, direccion, fecha, unidades FROM pedidos ORDER BY fecha DESC LIMIT $limit OFFSET $offset";
$db->ejecuta($sql);
$pedidos = $db->obtenDatos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <a href="logout.php">Logout</a>
    <a href="form.php">Crear pedido nuevo</a>
    <div id="contenedor">
        <h1>Listado de pedidos</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Dirección</th>
                <th>Fecha</th>
                <th>Unidades</th>
            </tr>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?php echo $pedido['id']; ?></td>
                <td><?php echo $pedido['direccion']; ?></td>
                <td><?php echo $pedido['fecha']; ?></td>
                <td><?php echo $pedido['unidades']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">&laquo; Anterior</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>"<?php if ($i == $page) echo ' class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>">Siguiente &raquo;</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>