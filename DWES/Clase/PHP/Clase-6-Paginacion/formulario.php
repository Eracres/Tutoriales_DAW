<?php
    $errores = [];
    $date_today = date('Y-m-d');
    $photo_filename = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
   
    define('USUARIO', 'Sergio');
    define('CONTRASENA', '1234');

    require('db.php');

    //Se pueden usar las 2 opciones
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){

        //Seteamos las variables al hacer submit en el formulario asi evitamos tener que setearlo cada vez en el if
        $datetime = isset($_POST['datetime']) ? $_POST['datetime'] : null;
        $place = isset($_POST['place']) ? $_POST['place'] : null;
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $photo = isset($_POST['photo']) ? $_POST['photo'] : null;


        //Se hacen las comprobaciones
        if (empty($datetime)){
            $errores['datetime'] = "Campo FECHA obligatorio";
        }elseif($datetime > $date_today){
            $errores['datetime'] = "Introducir fecha correcta";
        }


        if (empty($place)){
            $errores['place'] = "Campo LUGAR obligatorio";
        }

        if (empty($photo)){
            $errores['photo'] = "Insertar fotografia";
        }
        
        //Pasar 
        if(empty($errores)){
            $insert = $db->prepare("INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES (:fecha, :lugar, :nombre, :descripcion, :foto)");
            $insert->bindParam(':fecha', $datetime);
            $insert->bindParam(':lugar', $place);
            $insert->bindParam(':nombre', $name);
            $insert->bindParam(':descripcion', $description);
            $insert->bindParam(':foto', $photo);
            $insert->execute();

            header('Location: index.php');
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

        <label for="datetime">Fecha</label>
        <input type="date" name="datetime" value=<?= isset($datetime) ? $datetime : '' ?>>
        <?php if (isset($errores['datetime'])): ?>
            <br><span class="error"><?= $errores['datetime'] ?></span>
        <?php endif; ?> <br>
        <br>

        <label for="place">Lugar</label>
        <input type="text" name="place" value=<?= isset($place) ? $place : '' ?>>
        <?php if (isset($errores['place'])): ?>
            <br><span class="error"><?= $errores['place'] ?></span>
        <?php endif; ?> <br>
        <br>

        <label for="name">Nombre</label>
        <input type="text" name="name" value=<?= isset($name) ? $name : '' ?>><br>
        <br>

        <label for="description">Descripcion</label>
        <input type="text" name="description" value=<?= isset($description) ? $description : '' ?>><br>
        <br>
        
        <label for="photo">Foto</label>
        <input type="file" name="photo" value=<?= isset($photo_filename) ? $photo_filename : '' ?>>
        <?php if (isset($errores['photo'])): ?>
            <br><span class="error"><?= $errores['photo'] ?></span>
        <?php endif; ?> <br>
        <br>

        <input type="submit" name="enviar" value="Entrar">        

    </form>
</body>
</html>