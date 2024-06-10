<?php
require_once 'init.php';

// Obtener todos los tokens
$db->ejecuta("SELECT token, consumido FROM tokens");
$tokens = $db->obtenDatos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Recuperar Contraseña</h1>
    <ul>
        <?php foreach ($tokens as $token): ?>
            <li>
                <?php if ($token['consumido'] == 0): ?>
                    <a href='recupera.php?token=<?= $token['token'] ?>'><?= $token['token'] ?></a>
                <?php else: ?>
                    <span style="color: grey;"><?= $token['token'] ?> (consumido)</span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

