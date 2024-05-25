<?php

require_once('init.php');

session_destroy();

if(isset ($_COOKIE['RECUERDAME'])){
    $token = $_COOKIE['RECUERDAME'];
    $consumido = $db->ejecuta("UPDATE tokens SET consumido = 1 WHERE token = :token", $token);
    setcookie("RECUERDAME", '', time()-3600, "/");
}

header("Location: login.php");
exit();
?>