<?php
include 'detalle_logic.php';
$slug = $_GET['slug'] ?? '';

if (!$slug) {
    die('Se requiere un slug para mostrar el detalle.');
}

$destino = obtenerDetalleDestino($slug);
if (!$destino) {
    die('Destino no encontrado.');
}
?>
<h1><?= htmlspecialchars($destino['nombre']) ?></h1>
<p><?= htmlspecialchars($destino['descripcion']) ?></p>