<?php

    require_once('init.php');

    $token = $_GET['token'];
    $registro = isset($_POST['registrar']);

    define('NUM_TOKENS', 5);
    define('CANT_TOKENS', 10);

    $sql = "SELECT * FROM auth_tokens WHERE token = :token";
    $db->ejecuta($sql, $token);
    $token_propor = $db->obtenDato();
    

   if(isset($token)){

        if($token_propor['consumido'] == 1){

            $sql = "SELECT * FROM usuarios WHERE id = :id_consumido";
            $db->ejecuta($sql, $token_propor['id_user_consumido']);
            $user_token = $db->obtenDato();

            $_SESSION['user'] = $user_token['email'];

            header("Location: privada.php");
            die();

        }else if($token_propor['consumido'] == 0) {

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $sql = "INSERT INTO usuarios (email) VALUES (:email)";
                $db->ejecuta($sql, $_POST['email']);
                
                $sql = "SELECT id FROM usuarios WHERE email = :email";
                $db->ejecuta($sql, $_POST['email']);
                $id_user_gene = $db->obtenColumna();

                for($i = 0; $i < NUM_TOKENS; $i++){
                    $new_token = bin2hex(openssl_random_pseudo_bytes(CANT_TOKENS));
                    $sql = "INSERT INTO auth_tokens (token, id_user_generador) VALUES (:token, :id_user_generador)";
                    $db->ejecuta($sql, $new_token, $id_user_gene);
                }

                $sql = "UPDATE auth_tokens SET consumido = 1, id_user_consumido = :id_user_gene WHERE id = :id";
                $db->ejecuta($sql, $id_user_gene, $token_propor['id']);
                
                $_SESSION['user'] = $_POST['email'];

                header("Location: privada.php");
                die();

            }
        }

    }else{
        header("Location: index.php");
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Verifica token y registra al usuario</h1>
    <form action="" method="post">
        <input type="email" name="email" id="">
        <input type="hidden" name="token">
        <input type="submit" name="registrar" value="Registrar">
    </form>
</body>
</html>