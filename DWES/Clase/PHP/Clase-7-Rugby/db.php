<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=matche','matche','matche');
}catch(PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}

?>