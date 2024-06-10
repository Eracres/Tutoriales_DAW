<?php
require_once 'init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db->ejecuta("SELECT id, pass FROM usuarios WHERE email = ?", $email);
    $usuario = $db->obtenDato();

    if ($usuario && password_verify($password, $usuario['pass'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        header("Location: pedidos.php");
        exit;
    } else {
        $error = "Email o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?=$error?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value=<?=$email?>><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password"><br>
        
        <input type="submit" value="Login">

        <a href="recupera.php">Recupera Contraseña</a>
    </form>
</body>
</html>
