<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <!--formulario de login -->
    <form action="" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="nombre" id="" placeholder="usuario" value="<?=$usuario?>">
        <label for="password">Contraseña</label>
        <input type="password" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="contrasena" id="" placeholder="contraseña">
        <?php if(!empty($errores)){?>
            <span class="error"><?php echo $errores ?></span><br><br>
        <?php }?>
        <input type="submit" name="enviar" value="Enviar">
    </form>

</body>
</html>