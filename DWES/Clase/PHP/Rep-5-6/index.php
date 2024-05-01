<?php

require('db.php');
require('config.php');

$select = $db->prepare("SELECT * FROM botanica");
$select->execute();
$rows = $select->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($rows);
echo "</pre>";

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
</body>
</html>