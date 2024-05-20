<?php

define('DOC_ROOT', dirname(__FILE__). "/");
define('LONGITUD_TOKEN', 100);
define('TIEMPO_RECUERDAME', 604800);

spl_autoload_register(
    function($clase){
        require(DOC_ROOT . "$clase.php");
    }
);

$db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        'gestionarticulos',
        'gestionarticulos',
        'gestionarticulos'
    );

session_start();

?>