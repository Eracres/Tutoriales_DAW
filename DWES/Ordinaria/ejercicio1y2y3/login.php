<?php

require_once('init.php');

$errores = [];
$usuario = "";
$password = "";

if (isset($_SESSION['user'])) {
    header('Location: pedidos.php');
    exit();
}

if(isset($_POST['enviar'])){
    
    $usuario = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if (empty($usuario) || empty($password)){
        $errores = "Campos obligatorios";
    }

    if(empty($errores)){
        //Accion
        $aAVerificar = $db->ejecuta("SELECT * FROM usuarios WHERE nombre = :id", $usuario);
        $aAVerificar = $db->obtenDato();

        if(password_verify($password, $aAVerificar['pass'])){

            $_SESSION['user'] = $aAVerificar['nombre'];
        
            header("Location: pedidos.php");
            die();
        }else{
            $errores="Credencial incorrecta";
        }

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
    <!--formulario de login -->
    <form action="" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="nombre" id="" placeholder="usuario" value="<?=$usuario?>">
        <label for="password">Contraseña</label>
        <input type="password" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="password" id="" placeholder="contraseña">
        <?php if(!empty($errores)){?>
            <span class="error"><?php echo $errores ?></span><br><br>
        <?php }?>
        <input type="submit" name="enviar" value="Enviar">
        <a href="recupera.php">Recuperar contraseña</a>
    </form>

</body>
</html>