<?php

// Clase AlertaWarning
class AlertaWarning extends Alerta {
    public function mostrar() {
        echo "<div style='border-bottom: 2px solid yellow;'><h3>{$this->titulo}</h3><p>{$this->mensaje}</p><i class='fas fa-exclamation-circle'></i></div>";
    }
}

?>
