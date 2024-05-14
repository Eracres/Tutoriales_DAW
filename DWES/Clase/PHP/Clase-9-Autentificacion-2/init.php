<?php

define('DOC_ROOT', dirname(__FILE__). "/");
define('LONGITUD_TOKEN', 100);
define('TIEMPO_RECUERDAME', 3600*24*7);

spl_autoload_register(
    function($clase){
        include("$clase.php");
    }
);

$db = DWESBaseDatos::obtenerInstancia();
$db->inicializa(
    'autentificacion',   //Base de datos 
    'autentificacion',   //Usuario
    'autentificacion'    //Contraseña
);

session_start();

?>