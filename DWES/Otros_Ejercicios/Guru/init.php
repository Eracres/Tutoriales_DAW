<?php

spl_autoload_register(
    function($clase){
        include("$clase.php");
    }
);

$db = DWESBaseDatos::obtenerInstancia();
$db->inicializa(
    'guru',   //Base de datos 
    'guru',   //Usuario
    'guru'    //Contraseña
);

session_start();

?>