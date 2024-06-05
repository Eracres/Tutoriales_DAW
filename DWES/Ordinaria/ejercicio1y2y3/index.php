<?php
    
    if (isset($_SESSION['user'])) {
        header('Location: pedidos.php');
        exit();
    }

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>PEDIDOS</h1>
</body>
</html>