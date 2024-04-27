<?php
include 'listado_libros_logic.php';
$libros = obtenerListadoLibros();
?>
<ul>
    <?php foreach ($libros as $libro): ?>
        <li><a href="detalle_libro.php?slug=<?= htmlspecialchars($libro['slug']) ?>"><?= htmlspecialchars($libro['titulo']) ?></a></li>
    <?php endforeach; ?>
</ul>