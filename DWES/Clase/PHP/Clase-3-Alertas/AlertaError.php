<?php

// Clase AlertaError
class AlertaError extends Alerta {
    public function mostrar() {
        echo "<div style='border-bottom: 2px solid red;'><h3>{$this->titulo}</h3><p>{$this->mensaje}</p><i class='fas fa-times-circle'></i></div>";
    }
}

?>
