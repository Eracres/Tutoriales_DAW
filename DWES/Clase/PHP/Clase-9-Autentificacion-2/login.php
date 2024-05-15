<?php

require_once('init.php');

if(isset($_SESSION['user'])){
    header("Location: index.php");
    die();
}

// En futuros capitulos. intentaremos autentificar con cookie-token

$errores = [];
$usuario = "";
$contrasena = "";

// Si se está enviando
if(isset($_POST['enviar'])){

    //Cargo datos
    //Verifico errores
    $usuario = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;
    

    if(empty($usuario) || empty($contrasena)){
        $errores = "Campos obligatorios"; 
    }

    //Si no hay errores
    if(empty($errores)){
        //Accion
        $aAVerificar = $db->ejecuta("SELECT * FROM usuarios WHERE nombre = :id", $usuario);

        $aAVerificar = $db->obtenDato();

        if(password_verify($contrasena, $aAVerificar['pass'])){
            $_SESSION['user'] = $aAVerificar['nombre'];

            if(isset($_POST['recuerdame'])){
                // COOKIE
                $token = bin2hex(random_bytes(LONGITUD_TOKEN));
                $date = new DateTime('now');
                $date->add(new DateInterval('P7D'));

                //Guardar en BB.DD
                $db->ejecuta("INSERT INTO tokens (token, usuario_id, fecha_validez, consumido) VALUES (:token, :iduser, :validez, 0)", $token, $aAVerificar['id'], $date->format("Y/m/d H:i:s"));
                //Ponerselo al usuario
                setcookie("RECUERDAME", $token, time()+TIEMPO_RECUERDAME);
            }
            
            header("Location: privada.php");
            die();
        }else{
            $errores="Credencial incorrecta";
        }

        print_r($db->obtenDatos());
    }
        
}
    

//Pintar formulario con datos

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: red;
            border-color: red;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="POST">
        <input type="text" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="nombre" id="" placeholder="user" value="<?=$usuario?>"><br><br>
        <input type="password" class="<?php echo (!empty($errores)) ? 'error' : ''; ?>" name="contrasena" id="" placeholder="password"><br><br>
        <?php if(!empty($errores)){?>
            <span class="error"><?php echo $errores ?></span><br><br>
        <?php }?>
        <input type="checkbox" name="recuerdame" id="">Recordar<br><br>
        <input type="submit" name="enviar" value="Login">
    </form>
</body>
</html>