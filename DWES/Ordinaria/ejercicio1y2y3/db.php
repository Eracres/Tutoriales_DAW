<?php

    try {
        $db = new PDO('mysql:host=localhost;dbname=examen','examen','examen');
    }catch(PDOException $e){
        echo "ERROR:" . $e->getMessage();
        die();
    }

?>