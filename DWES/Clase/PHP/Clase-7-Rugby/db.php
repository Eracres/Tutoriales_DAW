<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=matches','matches','matches');
}catch(PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}

?>