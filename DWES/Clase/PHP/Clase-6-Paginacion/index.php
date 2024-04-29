<?php
require('db.php');

$select = $db->prepare("SELECT * FROM acciones");
$select->execute();
$rows = $select->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Acciones</title>
    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .image-cell img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h1>Información de Acciones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Lugar</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['lugar']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td class="image-cell"><img src="<?php echo $row['foto']; ?>" alt="Imagen"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

