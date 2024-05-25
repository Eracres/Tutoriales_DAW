<?php

require_once('init.php');

if(isset($_SESSION['user'])){
    header("Location: index.php");
    die();
}

$errores = [];
$usuario = "";
$contrasena = "";


if(isset($_POST['enviar'])){

    $usuario = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
    
    if(empty($usuario) || empty($contrasena)){
        $errores = "Campos obligatorios"; 
    }


    if(empty($errores)){
       
        $user = $db->ejecuta("SELECT * FROM usuarios WHERE nombre = :id", $usuario);
        $user = $db->obtenDato();

        if(password_verify($contrasena, $user['pass'])){

            $_SESSION['user'] = $user;

            if(isset($_POST['recuerdame'])){
      
                $token = bin2hex(openssl_random_pseudo_bytes(LONGITUD_TOKEN));
                $tiempo_expiracion = time()+TIEMPO_RECUERDAME;

                $db->ejecuta("INSERT INTO tokens (token, usuario_id, fecha_validez, consumido) VALUES (:token, :iduser, :validez, :consumido)", $token, $user['id'], date("Y-m-d H:i:s", $tiempo_expiracion), 0);
                
                setcookie("RECUERDAME", $token, $tiempo_expiracion, "/");
            }
            
            header("Location: index.php");
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
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action=""method="POST">
    <input type="text" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="nombre" id="" placeholder="user" value="<?=$usuario?>"><br><br>
    <input type="password" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="contrasena" id="" placeholder="password"><br><br>
        <?php if(!empty($errores)){?>
            <span class="error"><?php echo $errores ?></span><br><br>
        <?php }?>
        <input type="checkbox" name="recuerdame" id="">Recordar<br><br>
        <input type="submit" name="enviar" value="Acceder">
    </form>
</body>
</html>