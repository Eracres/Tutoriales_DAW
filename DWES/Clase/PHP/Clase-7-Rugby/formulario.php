<?php

require('db.php');
require_once('init.php');

$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){
    
    $country = isset($_POST['country']) ? $_POST['country'] : null;
    $result = isset($_POST['result']) ? $_POST['result'] : null;
    $result_spain = isset($_POST['result_spain']) ? $_POST['result_spain'] : null;
    $result_rival = isset($_POST['result_rival']) ? $_POST['result_rival'] : null;
    $score = null;
    
    if(empty($country)){
        $errores['country'] = "Introduce nombre del rival";
    }

    if($result === 'Ganado'){
        if($result_spain >  $result_rival){
            $score = $result_spain . '-' . $result_rival;
        }else{
            $errores['score'] = "El marcador no corresponde con el resultado";
        }
    }elseif ($result === 'Perdido') {
        if($result_spain <  $result_rival){
            $score = $result_spain . '-' . $result_rival;
        }else{
            $errores['score'] = "El marcador no corresponde con el resultado";
        }
    }elseif ($result === 'Empate') {
        if($result_spain ===  $result_rival){
            $score = $result_spain . '-' . $result_rival;
        }else{
            $errores['score'] = "El marcador no corresponde con el resultado";
        }
    }

    if(empty($errores)){

        $insert = $db->ejecuta("INSERT INTO matche (country, result, score) VALUES (:country, :result, :score)");
        $insert->bindParam(':country', $country);
        $insert->bindParam(':result', $result);
        $insert->bindParam(':score', $score);
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
    <title>Resultado Partido de España</title>
    <style>
        .error {color: red; }
    </style>
</head>
<body>
    <form action="formulario.php" method='post'>
        <h2>Introducir resultado</h2>
        <br>
        <label for="country">Pais Rival</label>
        <input type="text" name="country" value="<?= isset($country) ? $country : '' ?>">
        <?php if(isset($errores['country'])): ?>
            <br><span class="error"><?= $errores['country'] ?></span>
        <?php endif; ?>
        <br><br>
        <label for="result">Resultado</label>
        <select name="result" id="">
            <option value="Ganado" <?= isset($result) && $result === 'Ganado' ? 'selected' : '' ?>>Ganado</option>
            <option value="Empate" <?= isset($result) && $result === 'Empate' ? 'selected' : '' ?>>Empate</option>
            <option value="Perdido" <?= isset($result) && $result === 'Perdido' ? 'selected' : '' ?>>Perdido</option>
        </select>
        <br><br>
        <label for="result_spain">España</label>
        <input type="text" name="result_spain" value="<?= isset($result_spain) ? $result_spain : '' ?>"> - 
        <label for="result_rival">Rival</label>
        <input type="text" name="result_rival" value="<?= isset($result_rival) ? $result_rival : '' ?>">
        <?php if(isset($errores['score'])): ?>
            <br><span class="error"><?= $errores['score'] ?></span>
        <?php endif; ?>
        <br><br>
        <input type="submit" name="enviar" value="Insertar">  

    </form>
</body>
</html>
