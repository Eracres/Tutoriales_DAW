<?php

require_once('init.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->ejecuta("DELETE FROM articulos WHERE id = :id", [':id' => $id]);
}

header("Location: articulos.php");
exit();

?>
