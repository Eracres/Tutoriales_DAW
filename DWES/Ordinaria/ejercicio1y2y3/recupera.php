<?php

require_once('init.php');

$errores = [];
$token = "";
$nueva_contrasena = "";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){

    $token = isset($_POST['token']) ? $_POST['token'] : null;
    $nueva_contrasena = isset($_POST['nueva_contrasena']) ? $_POST['nueva_contrasena'] : null;

    if(empty($token)){
        $errores['token'] = "Token obligatorio";
    }else{
        $sql = "SELECT * FROM tokens WHERE token = :token AND consumido = 0 AND fecha_validez >= NOW()";
        $db->ejecuta($sql, [':token' => $token]);
        $token_data = $db->obtenDato();

        if (!$token_data) {
            $errores['token'] = "Token inválido o expirado.";
        }
    }

    if(empty($nueva_contrasena)){
        $errores['nueva_contrasena'] = "Introduce nueva contraseña";
    }

    if(empty($errores)){
        $usuario_id = $token_data['usuario_id'];

        $nueva_contrasena_hashed = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET pass = nueva_contrasena WHERE id = :token_id";
        $db->ejecuta($sql, ['token_id' => $token_data['id']]);

        header('Location: login.php');
        die();

    }

}
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
    <form action="" method="post">
        <label for="usuario">Nueva Contraseña</label>
        <input type="text" name="nueva_contrasena" id="usuario" placeholder='Introduce nueva contraseña'>
        <input type="submit" name='enviar' value="Enviar">
    </form>

</body>
</html>