<?php

// Subclase GestorBasadoEnFichero
class GestorBasadoEnFichero extends GestorDatos {
    use HTMLRenderer;
    
    protected $formatoArchivo;
    protected $modoAcceso;
    
    public function __construct($nombre, $descripcion, $formatoArchivo, $modoAcceso) {
        parent::__construct($nombre, $descripcion);
        $this->formatoArchivo = $formatoArchivo;
        $this->modoAcceso = $modoAcceso;
    }
    
    public function obtenerDetalle() {
        return "Formato de Archivo: {$this->formatoArchivo}, Modo de Acceso: {$this->modoAcceso}";
    }
}

?>
