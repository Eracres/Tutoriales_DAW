<?php

// Función de Autoload
spl_autoload_register(function ($clase) {
    include $clase . '.php';
});

?>
