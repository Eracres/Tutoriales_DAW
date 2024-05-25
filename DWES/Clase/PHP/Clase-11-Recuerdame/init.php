<?php

define('DOC_ROOT', dirname(__FILE__). "/");
define('LONGITUD_TOKEN', 100);
define('TIEMPO_RECUERDAME', 3600*24*7);

spl_autoload_register(
    function($clase){
        require(DOC_ROOT . "$clase.php");
    }
);

$db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        'examen',
        'examen',
        'examen'
    );

session_start();

?>