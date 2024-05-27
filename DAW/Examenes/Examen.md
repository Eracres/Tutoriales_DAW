# __*Examen resuelto*__

## Ejercicio 1
  Entrega: fichero PDF con capturas de pantalla de los elementos que se requieren.

  • Tanto el espacio web como el host estarán asociados al usuario, permisos
  más restrictivos.

  ```
  sudo nano /etc/hosts
  ```

  • Crea un espacio web en /var/www/jdlordinaria/t1/e1/ CAPTURA

  Creamos el espacio /var/www/jdlordinaria/t1/e1/
  
  ```
  sudo mkdir -p /var/www/jdlordinaria/t1/e1
  sudo chown -R $USER:$USER /var/www/jdlordinaria/
  sudo chmod -R 755 /var/www/jdlordinaria/
  ```

  Mostramos y hacemos la captura:

  ```
  ls -ld /var/www/jdlordinaria/t1/e1
  ```

  Aparecerá así:

  ```linux
  eracres@eracres-VirtualBox:~$ ls -ld /var/www/scrordinaria/t1/e1
  drwxr-xr-x 2 eracres eracres 4096 may 27 19:26 /var/www/scrordinaria/t1/e1
  ```
  
  • Crea un virtualhost jdlordinaria.t1.e1.es. CAPTURA
  • En él habrá dos directorios: info y doc
  • En info habrá un mkdoc con una página por cada color primario: RGB.
  – Página rojo, verde y amarillo. Más una página con enlace a ellas.
  – Mete el mkdoc en la entrega final.
  – Haz un pantallazo de la página servida con mkdocs
  – Sube al servidor la página construida. CAPTURA
  – Haz un pantallazo de la página funcionando en el servidor.
  • En doc estará la documentación de las dos clases php.
  1
  – Comenta con phpdoc las clases Color y ColorSolido
  – Genera una documentación
  – Mete el código ya comentado en la entrega final.
  – Sube al servidor la página construida. CAPTURA
  – Haz un pantallazo de la página funcionando en el servidor.
