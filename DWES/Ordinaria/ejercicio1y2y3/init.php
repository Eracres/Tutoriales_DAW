<?php

define('NUM_POR_PAGINA', 4);

spl_autoload_register(
    function($clase){
        include("$clase.php");
    }
);

$db = DWESBaseDatos::obtenerInstancia();
$db->inicializa(
    'examen',   //Base de datos 
    'examen',   //Usuario
    'examen'    //Contraseña
);

session_start();

?>