<?php

require_once('init.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sistema de gestión de articulos</h1>
    <?php if (isset($_SESSION['user'])): ?>
        <p>Bienvenido, <?= $_SESSION['user'] ?>
        <form action="articulos.php" method="POST" style="display:inline;">
            <button type="submit">Ir a articulos</button>
        </form> 
        <form action="logout.php" method="POST" style="display:inline;">
            <button type="submit">Logout</button>
        </form>
        </p>
    <?php else: ?>
        <form action="login.php" method="POST" style="display:inline;">
            <button type="submit">Login</button>
        </form>
        <form action="registro.php" method="POST" style="display:inline;">
            <button type="submit">Registro</button>
        </form>
    <?php endif; ?>
</body>
</html>