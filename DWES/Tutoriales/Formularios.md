# Formularios PHP

En este tutorial veremos la validación y gestión de un formulado realizado en HTML con PHP.

## 1. Crear HTML

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
## 2. Procesado de peticiones

Lo primero que debemos tener en cuenta es el siguiente pseudocodigo:

```
    if the user submited the form
        if there are form errors
            fill errors array
        else
            record data to database
            302 regirect, as it required by HTTP standard
            exit
    if we have some errors
        display errors
        fill form field values
    display the form
```

Para ello lo veremos poco a poco con nuestro formulario

### 1. Enviar

El inicio de nuestro procesado de datos es el botón de enviar, será el inicio de nuestro pseudocódigo, el codigo
```if the user submited the form``` en PHP se traduce así:

```php
if (isset($_POST["enviar"])) {

    //Validaciones de errores del formulario

}
```

### 2. Validación de errores

En nuestro pseudocodigo hay 2 códigos ligadas a los errores:

- La que detecta el error en un punto ```if there are form errors``` y lo añade a un array de errores
  ```fill errors array``` en caso contrario ```else``` guerda la información en la base de datos ```record data to database``` y te redirige a una página como comprobante de que no hay errores ```302 regirect, as it required by HTTP standard```
- La que verifica si hay algún error en las comprobaciones anteriores ```if we have some errors``` te muestra los errores
  ```display errors``` y te mantiene la información que hallamos introducido correctamente en el formulario ```fill form field values```, finalmente te muestra por pantalla el formulario con la información ```display the form```

Verificaremos esta explicación mediante código


