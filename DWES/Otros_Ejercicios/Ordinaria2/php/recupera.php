<?php
require_once 'init.php';

$token = $_GET['token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $nueva_password = $_POST['password'];

    // Verificar token
    $db->ejecuta("SELECT usuario_id FROM tokens WHERE token = ? AND consumido = 0 AND fecha_validez > NOW()", $token);
    $token_info = $db->obtenDato();

    if ($token_info) {
        $usuario_id = $token_info['usuario_id'];
        $hashed_password = password_hash($nueva_password, PASSWORD_BCRYPT);
        
        // Actualizar contraseña
        $db->ejecuta("UPDATE usuarios SET pass = ? WHERE id = ?", $hashed_password, $usuario_id);
        
        // Consumir token
        $db->ejecuta("UPDATE tokens SET consumido = 1 WHERE token = ?", $token);
        
        // Redirigir a login
        header("Location: login.php");
        exit;
    } else {
        $error = "Token inválido o expirado.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Recuperar Contraseña</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form action="recupera.php" method="post">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <label for="password">Nueva Contraseña:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Cambiar Contraseña">
    </form>
</body>
</html>

