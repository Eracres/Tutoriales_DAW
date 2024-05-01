<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=botanica','botanica','botanica');
}catch(PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}

?>