<?php

require_once('init.php');

if(!isset($_SESSION['user'])){
    if(isset($_COOKIE['RECUERDAME'])){

        $token = $_COOKIE['RECUERDAME'];
        $iduser = $db->ejecuta("SELECT usuario_id FROM tokens WHERE token = :token", $token);
        $iduser = $db->obtenColumna();
        $user = $db->ejecuta("SELECT * FROM usuarios WHERE id = :id", $iduser);
        $user = $db->obtenDato();

        $_SESSION['user'] = $user;

    }else{
        header("Location: login.php");
        die();
    }
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
    <h1>BIENVENIDO <?=$_SESSION['user']['nombre']?></h1>
    <span><?=$_SESSION['user']['email']?></span>
    <a href="logout.php">Logout</a>
</body>
</html>