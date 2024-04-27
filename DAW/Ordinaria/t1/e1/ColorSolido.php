<?php 

class ColorSolido extends Color {
    public function getDescripcion() {
        return $this->getInformacion() . " - Este es un color sólido.";
    }
}

?>