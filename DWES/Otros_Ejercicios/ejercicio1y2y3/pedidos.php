<?php

    require_once('init.php');

    session_start();

 

    $sql = "SELECT id, direccion, fecha, unidades FROM pedidos ORDER BY fecha DESC";

    $total = $sql->fetch()[0];
    $num_page = ceil($total / NUM_POR_PAGINA);
    $pagina_actual = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $first_element = ($pagina_actual - 1) * NUM_POR_PAGINA;

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
    <!-- listado con paginación de siguiente de los pedidos: id, dirección, fecha, unidades -->
    <div id="contenedor">
    <h1>Listado de pedidos</h1>    
    div id="contenedor">
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
    </div>
    <!-- paginación -->
    <a href="listado.html">Siguiente</a>

    </div>
</body>
</html>