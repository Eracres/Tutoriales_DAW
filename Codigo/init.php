<?php

    define('DOC_ROOT', dirname(__FILE__) . '/');

    spl_autoload_register(
        function($clase){
            require DOC_ROOT . $clase . '.php';
        }
    );

    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa('ExamenOrdinario', 'examenord', 'examen');

    session_start();

?>