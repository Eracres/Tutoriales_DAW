<?php

require('db.php');
require('config.php');

$count = $db->query("SELECT COUNT(*) FROM matche");

$total = $count->fetch()[0];
$num_page = ceil($total / NUM_POR_PAGINA);
$pagina_actual = isset($_GET['page']) ? intval($_GET['page']) : 1;
$first_element = ($pagina_actual - 1) * NUM_POR_PAGINA;

$select = $db->prepare("SELECT * FROM matche LIMIT :num_por_pagina OFFSET :desplazamiento");
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
    <div class="pagination">
        <?php if ($pagina_actual > 1): ?>
            <a href="?page=1">&lt;&lt;</a> <!-- Doble flecha a la primera página -->
            <a href="?page=<?=$pagina_actual - 1?>">&lt;</a> <!-- Flecha a la página anterior -->
        <?php endif; ?>
        
        <?php
            // Lógica para mostrar solo 4 números de página
            $inicio = max(1, $pagina_actual - 2);
            $fin = min($inicio + 4, $num_page);
            if ($inicio > 1) {
                echo '<span>...</span>';
            }
            for($i = $inicio; $i <= $fin; $i++):
        ?>
            <a href="?page=<?=$i?>" <?php if ($i == $pagina_actual) echo 'class="active"'; ?>><?=$i?></a> <!-- Números de página -->
        <?php endfor; ?>
        
        <?php if ($fin < $num_page): ?>
            <span>...</span>
        <?php endif; ?>
        
        <?php if ($pagina_actual < $num_page): ?>
            <a href="?page=<?=$pagina_actual + 1?>">&gt;</a> <!-- Flecha a la página siguiente -->
            <a href="?page=<?=$num_page?>">&gt;&gt;</a> <!-- Doble flecha a la última página -->
        <?php endif; ?>
    </div>
</body>
</html>