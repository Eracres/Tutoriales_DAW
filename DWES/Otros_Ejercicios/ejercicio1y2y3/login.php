<?php
    require_once('init.php');

    $errores = [];
    $usuario = "";
    $contrasena = "";

    session_start();

    if(isset($_POST['enviar'])){
        
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        if(empty($usuario)){
            $errores['usuario'] = "Indroduce usuario";
        }

        if(empty($password)){
            $errores['password'] = "Indroduce contraseña";
        }

        if(empty($errores)){
            
            $permiso = $db->ejecuta("SELECT * FROM usuarios WHERE nombre = ?", $usuario);
            $permiso = $db->obtenDato();

            if(password_verify($password, $permiso['pass'])){
                $_SESSION['user'] = $permiso['usuario']; 
                header("Location: pedidos.php");
                die();

            }else{
                $errores['credenciales'] = "Credenciales incorrectas";
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
    <form action="login.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" placeholder="usuario" value='<?=$usuario?>'>
        <span class='error'><?=$errores['usuario']?></span>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="contraseña" value='<?=$password?>'>
        <span class='error'><?=$errores['password']?></span>
        <span class='error'><?=$errores['credenciales']?></span>
        <input type="submit" name='enviar' value="Enviar">
    </form>

</body>
</html>