<?php

require_once('init.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <!-- formulario para recuperar contraseña -->
    <form action="procesar.php" method="post">
        <label for="usuario">Nueva Contraseña</label>
        <input type="text" name="usuario" id="usuario" required>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>