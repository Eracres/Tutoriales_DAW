<?php
include 'db.php';

function obtenerDetalleDestino($slug) {
    global $pdo;
    try {
        $stmt = $pdo->prepare('SELECT * FROM destinos_turisticos WHERE slug = :slug');
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}