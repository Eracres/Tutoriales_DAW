<?php

// Autoload de clases
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// Generación de 10 alertas aleatorias
for ($i = 0; $i < 10; $i++) {
    $tipo = rand(1, 3);
    switch ($tipo) {
        case 1:
            $alerta = new AlertaWarning("Alerta Warning", "Este es un mensaje de advertencia.");
            break;
        case 2:
            $alerta = new AlertaError("Alerta Error", "Este es un mensaje de error.");
            break;
        case 3:
            $alerta = new AlertaAlarma("Alerta de Alarma", "Este es un mensaje de alarma.");
            break;
    }
    $alerta->mostrar();
}

?>

