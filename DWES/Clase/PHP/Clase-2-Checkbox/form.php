<?php
    $errores = [];
    $alergiasSeleccionadas = [];
    $alergias = [
        'Gluten',
        'Pescado',
        'Marisco',
        'Lactosa'
    ];
    $turnos = [
        'Mañana',
        'Tarde',
        'Noche'
    ];

    define('USUARIO', 'Sergio');
    define('CONTRASENA', '1234');

    //Se pueden usar las 2 opciones
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){

        //Seteamos las variables al hacer submit en el formulario asi evitamos tener que setearlo cada vez en el if
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $comidas = isset($_POST['comidas']) ? $_POST['comidas'] : null;
        $alergiasSeleccionadas = isset($_POST['alergias']) ? $_POST['alergias'] : [];
        $turnoSeleccionadas = isset($_POST['turnos']) ? $_POST['turnos'] : null;


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
        
        //Pasar 
        if(empty($errores)){
            $nombre = urlencode($nombre);
            $alergias_serializadas = urlencode(serialize($alergiasSeleccionadas));
            $comidas = urlencode($comidas);
            $turnoSeleccionadas = urlencode($turnoSeleccionadas);
            header('Location: exito.php?nombre=' . $nombre . '&alergias=' . $alergias_serializadas . '&comidas=' . $comidas . '&turnos=' . $turnoSeleccionadas);
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
    <form action="form.php" method='post'>
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="nombre" value=<?=$nombre?>>
        <?php if (isset($errores['nombre'])): ?>
            <br><span class="error"><?= $errores['nombre'] ?></span>
        <?php endif; ?> <br>
        <br>
        <label for="password">Contraseña</label>
        <input type="text" name="password" value=<?=$password?>>
        <?php if (isset($errores['password'])): ?>
            <br><span class="error"><?= $errores['password'] ?></span>
        <?php endif; ?> <br>
        <br>
        
        <label for="comidas">Alimentos</label>
        <select name="comidas" id="">
            <option disable selected>Selecciona una opcion ...</option>
            <option value="tomate" <?= ($comidas === 'tomate') ? 'selected' : "" ?>> Tomate</option>
            <option value="patata" <?= ($comidas === 'patata') ? 'selected' : "" ?>> Patata</option>
            <option value="cebolla" <?= ($comidas === 'cebolla') ? 'selected' : "" ?>> Cebolla</option>
        </select><br>
        <br>

        <label for="alergias">Alergias</label><br>
        <?php foreach ($alergias as $alergia): ?>
            <input type="checkbox" name="alergias[]" value="<?= $alergia ?>" <?= (in_array($alergia, $alergiasSeleccionadas)) ? 'checked' : '' ?>> <?= $alergia ?><br>
        <?php endforeach; ?>
        <br>

        <label for="turnos">Horarios</label><br>
        <?php foreach ($turnos as $turno): ?>
            <input type="radio" name="turnos" value="<?= $turno ?>" <?= ($turno === $turnoSeleccionadas) ? 'checked' : '' ?>> <?= $turno ?><br>
        <?php endforeach; ?>
        <br>

        <input type="submit" name="enviar" value="Entrar">        

    </form>
</body>
</html>