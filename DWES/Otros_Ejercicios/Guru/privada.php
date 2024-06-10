<?php

    require_once('init.php');

    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        die();
    }else{
        $correo = $_SESSION['user'];

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <h2>Hola <?=$correo?></h2>
</body>
</html>