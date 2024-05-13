<?php

include 'autoload.php';

// Crear instancias de gestores de datos
$gestores = array(
    new GestorRelacional("MySQL", "Gestor de bases de datos relacional", "Windows, Linux", "8.0", "Sí"),
    new GestorNoRelacional("MongoDB", "Base de datos NoSQL", "Document"),
    new GestorBasadoEnFichero("CSV Manager", "Gestor de archivos CSV", "CSV", "Lectura/Escritura")
);

// Mostrar información en formato HTML
foreach ($gestores as $gestor) {
    echo $gestor->renderHTML();
    echo "<br><br>";
}

?>
