<?php
    $e = [];

    $title = "";
    $author = "";
    $year = "";
    $pages = "";

    //Se pueden usar las 2 opciones
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){

        //Seteamos las variables al hacer submit en el formulario asi evitamos tener que setearlo cada vez en el if
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        //Se hacen las comprobaciones
        if (empty($nombre)){
            $errores['nombre'] = "El nombre esta vacia";
        }elseif($nombre !== USUARIO){
            $errores['nombre'] = "El nombre no es valido";
        }


        if (empty($password)){
            $errores['password'] = "La contraseña esta vacia";
        }elseif($password !== CONTRASENA){
            $errores['password'] = "La contraseña no es valido";
        }

        if(empty($errores)){
            header('Location: exito.php');
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
    <style>
        .error {color: red; }
    </style>
</head>
<body>
    <h1>Formulario basico</h1>
    <form action="formulario.php" method='post'>
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="nombre" value=<?=$nombre?>>
        <?php if (isset($errores['nombre'])): ?>
            <span class="error"><?= $errores['nombre'] ?></span>
        <?php endif; ?> <br>
        <br>
        <label for="password">Contraseña</label>
        <input type="text" name="password" value=<?=$password?>>
        <?php if (isset($errores['password'])): ?>
            <span class="error"><?= $errores['password'] ?></span>
        <?php endif; ?> <br>
        <br>
        <input type="submit" name="enviar" value="inicio">
    </form>
</body>
</html>