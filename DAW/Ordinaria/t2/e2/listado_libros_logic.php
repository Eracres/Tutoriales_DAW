<?php
include 'db.php';

function obtenerListadoLibros() {
    global $pdo;
    try {
        $stmt = $pdo->query('SELECT titulo, slug FROM libros_recomendados');
        $libros = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $libros[] = $row;
        }
        return $libros;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}