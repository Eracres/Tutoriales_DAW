<?php

require('config.php');
require('db.php');

$count = $db->query("SELECT COUNT(*) FROM botanica");
//echo "<pre>";
//print_r($count->fetch());
//echo "</pre>";

$total = $count->fetch()[0];
$num_paginas = ceil($total / NUM_POR_PAGINA);
$primer_elemento_de_pagina = (isset($_GET['page']) && is_numeric($_GET['page'])) ? ($_GET['page'] - 1) * NUM_POR_PAGINA : 0;


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
    <?php for($i = 1; $i <= $num_paginas; $i++): ?>
        <a href="?page=<?=$i?>"><?=$i?></a>
    <?php endfor; ?>
</body>
</html>