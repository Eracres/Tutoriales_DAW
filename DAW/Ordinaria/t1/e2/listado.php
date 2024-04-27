<?php
include 'listado_logic.php';
$destinos = obtenerListadoDestinos();
?>
<ul>
    <?php foreach ($destinos as $destino): ?>
        <li><a href="detalle.php?slug=<?= htmlspecialchars($destino['slug']) ?>"><?= htmlspecialchars($destino['nombre']) ?></a></li>
    <?php endforeach; ?>
</ul>