<?php

    require_once('init.php');

    $sql = "SELECT * FROM auth_tokens";
    $db->ejecuta($sql);
    $tokens=$db->obtenDatos();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Listado de enlaces de autentificación
    </h1>
    <ul>
        <?php foreach($tokens as $indice=>$token): ?>
            <li><a href="auth.php?token=<?=$token['token']?>">Login: <?=$indice+1?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>