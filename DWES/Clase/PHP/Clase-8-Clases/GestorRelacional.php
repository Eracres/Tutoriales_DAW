<?php

// Subclase GestorRelacional
class GestorRelacional extends GestorDatos {
    use HTMLRenderer;
    
    protected $sistemasOperativos;
    protected $version;
    protected $soporteTransacciones;
    
    public function __construct($nombre, $descripcion, $sistemasOperativos, $version, $soporteTransacciones) {
        parent::__construct($nombre, $descripcion);
        $this->sistemasOperativos = $sistemasOperativos;
        $this->version = $version;
        $this->soporteTransacciones = $soporteTransacciones;
    }
    
    public function obtenerDetalle() {
        return "Sistemas Operativos Soportados: {$this->sistemasOperativos}, Versión: {$this->version}, Soporte de Transacciones: {$this->soporteTransacciones}";
    }
}

?>
