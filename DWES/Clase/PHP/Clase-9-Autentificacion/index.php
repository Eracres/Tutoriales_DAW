<?php

require_once('init.php');

if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
    header("Location: login.php");
    die();
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
    <p>
        Lo que vas a ver te cambiara la vida ... <a href="privada.php">adelante</a>
    </p>
</body>
</html>