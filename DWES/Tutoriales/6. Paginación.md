# Paginación

Continuaremos con el mismo ejemplo del tutorial de Bases de datos.

## 1. Configurar fichero config.php

Crearemos un archivo config.php en el que definiremos el numero de elementos por pagina que habrá en la tabla:

- config.php

```
<?php

define('NUM_POR_PAGINA', 3);

?>
```
## 2. Ampliacion de fichero index.php

Ahora temos que modificar la etiqueta PHP de nuestro index que teniamos creado anteriormente:

- index.php (Etiqueta PHP)

```
<?php

require('db.php');
require('config.php');

$count = $db->query("SELECT COUNT(*) FROM botanica");

$total = $count->fetch()[0];
$num_paginas = $total / NUM_POR_PAGINA;
$primer_elemento_de_pagina = 0;

$select = $db->prepare("SELECT * FROM botanica LIMIT :num_por_pagina OFFSET :desplazamiento");
$select->bindValue(':num_por_pagina', NUM_POR_PAGINA, PDO::PARAM_INT); 
$select->bindValue(':desplazamiento', $primer_elemento_de_pagina, PDO::PARAM_INT);
$select->execute();
$rows = $select->fetchAll(PDO::FETCH_ASSOC);

?>
```

Añadimos el HTML que queremos mostrar:

- index.php (HTML)

  ```
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
      <table>
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Lugar</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Foto</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($rows as $row):?>
                  <tr>
                      <td><?=$row['id']?></td>
                      <td><?=$row['fecha']?></td>
                      <td><?=$row['lugar']?></td>
                      <td><?=$row['nombre']?></td>
                      <td><?=$row['descripcion']?></td>
                      <td><img src="<?=$row['foto']?>" alt=""></td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <?php for($i = 1; $i <= $num_paginas; $i++): ?>
          <a href="?page=<?=$i?>"><?=$i?></a>
      <?php endfor; ?>
  </body>
  </html>
```

