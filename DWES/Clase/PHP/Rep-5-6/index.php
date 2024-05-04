<?php

require('config.php');
require('db.php');

$count = $db->query("SELECT COUNT(*) FROM botanica");
//echo "<pre>";
//print_r($count->fetch());
//echo "</pre>";

$total = $count->fetch()[0];
$num_paginas = ceil($total / NUM_POR_PAGINA);
$pagina_actual = isset($_GET['page']) ? intval($_GET['page']) : 1;
$primer_elemento_de_pagina = ($pagina_actual - 1) * NUM_POR_PAGINA;

$select = $db->prepare("SELECT * FROM botanica LIMIT :num_por_pagina OFFSET :desplazamiento");
$select->bindValue(':num_por_pagina', NUM_POR_PAGINA, PDO::PARAM_INT); 
$select->bindValue(':desplazamiento', $primer_elemento_de_pagina, PDO::PARAM_INT);
$select->execute();
$rows = $select->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Lugar</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row):?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['fecha']?></td>
                    <td><?=$row['lugar']?></td>
                    <td><?=$row['nombre']?></td>
                    <td><?=$row['descripcion']?></td>
                    <td><img src="<?=$row['foto']?>" alt=""></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($pagina_actual >= 1): ?>
            <a href="?page=1">&lt;&lt;</a> <!-- Doble flecha a la primera página -->
            <a href="?page=<?=$pagina_actual - 1?>">&lt;</a> <!-- Flecha a la página anterior -->
        <?php endif; ?>
        
        <?php
            // Lógica para mostrar solo 4 números de página
            $inicio = max(1, $pagina_actual - 2);
            $fin = min($inicio + 4, $num_paginas);
            if ($inicio > 1) {
                echo '<span>...</span>';
            }
            for($i = $inicio; $i <= $fin; $i++):
        ?>
            <a href="?page=<?=$i?>" <?php if ($i == $pagina_actual) echo 'class="active"'; ?>><?=$i?></a> <!-- Números de página -->
        <?php endfor; ?>
        
        <?php if ($fin < $num_paginas): ?>
            <span>...</span>
        <?php endif; ?>
        
        <?php if ($pagina_actual < $num_paginas): ?>
            <a href="?page=<?=$pagina_actual + 1?>">&gt;</a> <!-- Flecha a la página siguiente -->
            <a href="?page=<?=$num_paginas?>">&gt;&gt;</a> <!-- Doble flecha a la última página -->
        <?php endif; ?>
    </div>
</body>
</html>