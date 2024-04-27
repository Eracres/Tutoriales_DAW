<?php
include 'db.php';

function obtenerDetalleLibro($slug) {
    global $pdo;
    try {
        $stmt = $pdo->prepare('SELECT * FROM libros_recomendados WHERE slug = :slug');
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}