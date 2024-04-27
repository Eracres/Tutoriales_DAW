<?php 

class Color {
    public $nombre;
    public $codigoHex;

    public function __construct($nombre, $codigoHex) {
        $this->nombre = $nombre;
        $this->codigoHex = $codigoHex;
    }

    public function getInformacion() {
        return "Color: " . $this->nombre . ", Código Hex: " . $this->codigoHex;
    }
}

?>