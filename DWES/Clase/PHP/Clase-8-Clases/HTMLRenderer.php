<?php

// Definición del trait HTMLRenderer
trait HTMLRenderer {
    public function renderHTML() {
        return "<h1>{$this->nombre}</h1>
                <p>{$this->descripcion}</p>
                <p>{$this->obtenerDetalle()}</p>";
    }
}

?>
