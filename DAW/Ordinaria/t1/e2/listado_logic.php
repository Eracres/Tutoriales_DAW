<?php
include 'db.php';

function obtenerListadoDestinos() {
    global $pdo;
    try {
        $stmt = $pdo->query('SELECT nombre, slug FROM destinos_turisticos');
        $destinos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $destinos[] = $row;
        }
        return $destinos;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}