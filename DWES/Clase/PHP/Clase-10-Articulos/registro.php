<?php

require_once('init.php');

$errores = [];
$usuario = "";
$contrasena = "";

if(isset($_POST["registro"])){

    $usuario = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
    
    if(empty($usuario) || empty($contrasena)){
        $errores = "Campos obligatorios"; 
    }

    if(empty($errores)){

        $db->ejecuta("SELECT * FROM usuarios WHERE nombre = :nombre", [':nombre' => $usuario]);
        $aAVerificar = $db->obtenDato();

        if (!$aAVerificar) {
            $contrasenaHashed = password_hash($contrasena, PASSWORD_BCRYPT);
            $db->ejecuta(
                "INSERT INTO usuarios (nombre, contrasena) VALUES (:nombre, :contrasena)", 
                [':nombre' => $usuario, ':contrasena' => $contrasenaHashed]
            );

            header("Location: login.php");
            die();
        }else{
            $errores = "El usuario existe";
        }

    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registrase</h1>
    <form action=""method="POST">
    <input type="text" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="nombre" id="" placeholder="user" value="<?=$usuario?>"><br><br>
    <input type="password" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="contrasena" id="" placeholder="password"><br><br>
        <?php if(!empty($errores)){?>
            <span class="error"><?php echo $errores ?></span><br><br>
        <?php }?>
        <input type="submit" name="registro" value="Registrar">
    </form>
</body>
</html>