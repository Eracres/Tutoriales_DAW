<?php

    require_once('init.php');

    if(!isset($_SESSION['user'])){
        header('Location: login.php');
        die();
    }
    if(isset($_SESSION['user'])){
        header('Location: pedidos.php');
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
    
</body>
</html>