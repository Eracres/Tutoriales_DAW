<?php
$host = 'localhost'; // o la IP del servidor de base de datos
$dbname = 'examen';
$user = 'examen';
$password = 'examen';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Establecer el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se pudo conectar a la base de datos $dbname :" . $e->getMessage());
}
?>