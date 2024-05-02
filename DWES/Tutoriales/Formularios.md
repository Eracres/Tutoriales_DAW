# Formularios PHP

En este tutorial veremos la validación y gestión de un formulado realizado en HTML con PHP.

En primer lugar, estableceremos la gestión de un sencillo formulario, como puede ser este:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="formulario.php" method="post">
        <label for="titulo">Titulo:</label><input type="text" name="titulo" id="titulo" value="<?= $titulo?>"><br>
        <label for="autor">Autor:</label><input type="text" name="autor" id="autor" value="<?=$autor?>"><br>
        <label for="ano">Año:</label><input type="text" name="ano" id="ano" value="<?=$ano?>"><br>
        <label for="page">Paginas:</label><input type="text" name="page" id="page" value="<?=$page?>"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
```
