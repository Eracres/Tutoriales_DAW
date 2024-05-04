<?php

require('db.php');
require('config.php');

$count = $db->query("SELECT COUNT(*) FROM matches");

$total = $count->fetch()[0];
$num_page = ceil($total / NUM_POR_PAGINA);
$first_element = (isset($_GET['page']) && is_numeric($_GET['page'])) ? ($_GET['page'] - 1) * NUM_POR_PAGINA : 0;

$select = $db->prepare("SELECT * FROM matches LIMIT :num_por_pagina OFFSET :desplazamiento");
$select->bindValue(':num_por_pagina', NUM_POR_PAGINA, PDO::PARAM_INT);
$select->bindValue(':desplazamiento', $first_element, PDO::PARAM_INT);
$select->execute();
$rows = $select->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spain Results Rugby Matches</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Resultados Partidos de España</h1>
    <a href="formulario.php" style="display: block; margin-bottom: 10px;"><button >Ir al formulario</button></a>
    <table>
        <thead>
            <tr>
                <th>Partido</th>
                <th>Rival</th>
                <th>Resultado</th>
                <th>Marcador</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo $row ['id']; ?></td>
                    <td><?php echo $row ['country']; ?></td>
                    <td><?php echo $row ['result']; ?></td>
                    <td><?php echo $row ['score']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php for($i = 1; $i <= $num_page; $i++): ?>
        <a href="?page=<?=$i?>"><?=$i?></a>
    <?php endfor; ?>
</body>
</html>