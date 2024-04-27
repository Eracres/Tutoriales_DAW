---
documentclass: extarticle
fontsize: 14pt
geometry: margin=2cm
---

# Examen DAW

Información general:

https://github.com/JorgeDuenasLerin/docencia-23-24/

Todo lo que no cumpla los requisitos o no sea entregado según formato no será evaluado.

Entrega:

```
apellido1-apellido-nombre
    \- trimestre1
        \- ejercicio1
        \- ejercicio2
    \- trimestre2
        \- ejercicio1
        \- ejercicio2
```

Sustituye jdlordinaria con tus iniciales y la palabra ordinaria en todo el ejercicio.

2 horas por trimestre

Requisito:

- Crea un usuario en el servidor: jdlordinaria. CAPTURA

## trimestre 1

### ejercicio 1

Entrega: fichero PDF con capturas de pantalla de los elementos que se requieren.

- Tanto el espacio web como el host estarán asociados al usuario, permisos más restrictivos.
- Crea un espacio web en /var/www/jdlordinaria/t1/e1/ CAPTURA
- Crea un virtualhost ```jdlordinaria.t1.e1.es```. CAPTURA
- En él habrá dos directorios: info y doc
- En info habrá un mkdoc con una página por cada color primario: RGB.
    - Página rojo, verde y amarillo. Más una página con enlace a ellas.
    - Mete el mkdoc en la entrega final.
    - Haz un pantallazo de la página servida con mkdocs
    - Sube al servidor la página construida. CAPTURA
    - Haz un pantallazo de la página funcionando en el servidor.
- En doc estará la documentación de las dos clases php.
    - Comenta con phpdoc las clases Color y ColorSolido
    - Genera una documentación
    - Mete el código ya comentado en la entrega final.
    - Sube al servidor la página construida. CAPTURA
    - Haz un pantallazo de la página funcionando en el servidor.

Puntos: 

- 1.0 punto. Servidor con permisos restrictivos
- 1.0 punto. Subir ficheros desde cliente con permisos adecuados
- 1.5 punto. Generar y subir mkdocs
- 1.5 punto. Generar y subir phpdoc

### ejercicio 2

Desplegar aplicación con base de datos, la puedes encontrar en t1/e2.

Entrega: fichero PDF con capturas de pantalla de los elementos que se requieren.

Será desplegado en un servidor. Base de datos examen, usuario examen y password examen.

- Tanto el espacio web como el host estarán asociados al usuario, permisos más restrictivos.
- Crea un espacio web en /var/www/jdlordinario/t1/e2/ CAPTURA
- Crea un virtualhost en ```jdlordinaria.t1.e2.es```  CAPTURA
- Restaura la base de datos en el servidor por comando. CAPTURA
- Sube el código al espacio web. CAPTURA
- Muestra la página funcionando. CAPTURA
- Haz un backup de la base datos, comando. CAPTURA
- Haz un back del espacio web, comando. CAPTURA
- Descarga los backups al cliente. CAPTURA

Puntos:

- 1.0 punto. Servidor con permisos restrictivos
- 1.0 punto. Subir ficheros desde cliente con permisos adecuados
- 1.0 punto. Restaura base de datos
- 1.0 punto. Página funcionado
- 1.0 punto. Descarga de backups

## trimestre 2

### ejercicio 1

Desplegar aplicación con base de datos, la puedes encontrar en t2/e1.

Entrega: fichero PDF con capturas de pantalla de los elementos que se requieren.

- Tanto el espacio web como el host estarán asociados al usuario, permisos más restrictivos.
- Crea un espacio web en /var/www/jdlordinaria/t2/e1/ CAPTURA
- Crea un virtualhost ```jdlordinaria.t2.e1.es```. CAPTURA
- Haz que las urls sean bonitas.
- Sube el código
- Explica las modificaicones que has tenido que hacer.
- Haz CAPTURA de las url funcionando.

```
/ -> listado
/detalle/<slug>/ -> detalle
```

Puntos:

- 1.0 punto. Servidor con permisos restrictivos
- 1.0 punto. Subir ficheros desde cliente con permisos adecuados
- 1.0 punto. Restaurar la base de datos
- 1.0 punto. listado con rewrite
- 2.0 punto. rewite del detalle 

### ejercicio 2

Crea un cron que haga un backup de la página del ejercicio1 todos los días a las 12 de la noche y a las 12 del medio día.

Lo dejará en la home del usuario

Captura de los comandos, del cron y sube los backups generados a la entrega.

2 puntos.

### ejercicio 3

Crea un proxy inverso al ejercicio 1 en 'jdl-reverse.es'

Captura de la configuración del servidor y captura de la aplicación funcionando

2 puntos