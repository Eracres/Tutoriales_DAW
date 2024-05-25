<?php

require_once ('init.php');

$errores = [];
$fecha_hoy = date('Y-m-d');

$sql = "SELECT id, nombre, stock FROM flores";
$db->ejecuta($sql);
$flores = $db->obtenDatos();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])){

    $flor_id = isset($_POST['flor']) ? $_POST['flor'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;

    if(empty($nombre)){
        $errores['nombre'] = "Debe tener nombre";
    }

    if(empty($fecha)){
        $errores['fecha1'] = "Debe tener fecha";
    }elseif ($fecha < $fecha_hoy) {
        $errores['fecha2'] = "Debe ser posterior a hoy";
    }

    if(empty($cantidad)){
        $errores['stock1'] = "Debe tener cantidad";
    }

    foreach ($flores as $flor_item) {
        if ($flor_id == $flor_item['id']) {
            if ($cantidad > $flor_item['stock']) {
                $errores['stock2'] = "No hay suficiente stock disponible para la flor seleccionada";
            }
            break; 
        }
    }

    if(empty($errores)){

        $insert = $db->ejecuta("INSERT INTO pedidos (flor_id, direccion, fecha, unidades) VALUES (?, ?, ?, ?)",
            $flor_id,
            "Calle de la $nombre, $id",
            $fecha,
            $cantidad
        );

        $sql = "SELECT stock FROM flores WHERE id = ?";
        $db->ejecuta($sql, $flor_id);
        $resultado = $db->obtenDato();
        $stock_actual = $resultado['stock'];

        if ($stock_actual >= $cantidad) {
            $nuevo_stock = $stock_actual - $cantidad;
            $update = $db->ejecuta("UPDATE flores SET stock = ? WHERE id = ?", $nuevo_stock, $flor_id);
            
            echo "Stock actualizado correctamente.";
        } else {
            header('Location: form.php');
            die();
        }

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
    <title>Formulario de Pedido</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value='<?=$nombre?>'>
        <span class="error"><?=$errores['nombre']?></span>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" >
        <?php if(!empty($errores)): ?>
            <?php if($errores['fecha1']): ?>
                <span class="error"><?=$errores['fecha1']?></span>
            <?php elseif($errores['fecha2']):?>
                <span class="error"><?=$errores['fecha2']?></span>
            <?php endif;?>
        <?php endif;?>
        <label for="flor">Flor</label>
        <select name="flor" id="flor">
            <option value="">Seleccione una flor</option>
            <?php foreach ($flores as $flor_item): ?>
                <option value="<?= $flor_item['id'] ?>" <?= $flor_id == $flor_item['id'] ? 'selected' : '' ?>>
                    <?= $flor_item['nombre'] ?> (<?= $flor_item['stock'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value='<?=$cantidad?>'>
    
        <span class="error"><?=$errores['stock1']?></span>
        <span class="error"><?=$errores['stock2']?></span>

        <input type="submit" name='enviar' value="Enviar">
    </form>
</body>
</html>
