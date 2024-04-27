<?php
include 'detalle_libros_logic.php';
$slug = $_GET['slug'] ?? '';

if (!$slug) {
    die('Se requiere un slug para mostrar el detalle.');
}

$libro = obtenerDetalleLibro($slug);
if (!$libro) {
    die('Libro no encontrado.');
}
?>
<h1><?= htmlspecialchars($libro['titulo']) ?></h1>
<p><strong>Autor:</strong> <?= htmlspecialchars($libro['autor']) ?></p>
<p><?= htmlspecialchars($libro['sinopsis']) ?></p>