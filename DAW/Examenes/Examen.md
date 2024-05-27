# __*Examen resuelto*__

## Ejercicio 1

  Entrega: fichero PDF con capturas de pantalla de los elementos que se requieren.

  • **Tanto el espacio web como el host estarán asociados al usuario, permisos
  más restrictivos.**

  ```
  sudo nano /etc/hosts
  ```
  • **Crea un espacio web en /var/www/jdlordinaria/t1/e1/ CAPTURA**

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
  ```
  eracres@eracres-VirtualBox:~$ ls -ld /var/www/scrordinaria/t1/e1
  drwxr-xr-x 2 eracres eracres 4096 may 27 19:26 /var/www/scrordinaria/t1/e1
  ```

  • **Crea un virtualhost jdlordinaria.t1.e1.es. CAPTURA**

  1. *Crear el fichero de configuración:*
  ```
  sudo nano /etc/apache2/sites-available/jdlordinaria.t1.e1.es.conf
  ```
  
  2. *Configurar el fichero de Virtual Host:*
  ```
  <VirtualHost *:80>
    ServerAdmin webmaster@localhost
    ServerName jdlordinaria.t1.e1.es
    DocumentRoot /var/www/jdlordinaria/t1/e1

    <Directory /var/www/jdlordinaria/t1/e1>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
  </VirtualHost>
  ```

  3. *Habilitar el sitio y reiniciar Apache:*
  ```
  sudo a2ensite jdlordinaria.t1.e1.es.conf
  sudo systemctl reload apache2
  ```

  4. *Realizamos la captura mostrando el contenido del fichero:*
  ```
  cat /etc/apache2/sites-available/jdlordinaria.t1.e1.es.conf
  ```
  
  • **En él habrá dos directorios: info y doc**

  1. *Crear Directorios info y doc:*

  ```
  mkdir -p /var/www/jdlordinaria/t1/e1/info
  mkdir -p /var/www/jdlordinaria/t1/e1/doc
  ```
  
  2. *Mostrar los directorios creados y hacer captura:*

  ```
  ls -l /var/www/jdlordinaria/t1/e1/
  ```
  
  • **En info habrá un mkdoc con una página por cada color primario: RGB.**

  1. *Instalar mkdocs:*

  ```
  sudo apt-get install mkdocs
  ```

  2. *Crear un nuevo proyecto mkdocs:*

  ```
  sudo mkdocs new /var/www/jdlordinaria/t1/e1/info
  ```
 
  – Página rojo, verde y amarillo. Más una página con enlace a ellas.

  1. *Modificar mkdocs.yml:*

  ```
  nano /var/www/jdlordinaria/t1/e1/info/mkdocs.yml
  ```

  ```yaml
  site_name: Colores Primarios
  nav:
    - Home: index.md
    - Rojo: rojo.md
    - Verde: verde.md
    - Azul: azul.md
  ```

  2. *Crear las páginas:*

  ```
  cd /var/www/scrordinaria/t1/e1/info/docs/
  echo "# Home\n\n## Colores Primarios\n\n- [Rojo](rojo.md)\n- [Verde](verde.md)\n- [Azul](azul.md)" > index.md
  echo "# Rojo\n\n## Este es el color rojo." > rojo.md
  echo "# Verde\n\n## Este es el color verde." > verde.md
  echo "# Azul\n\n## Este es el color azul." > azul.md
  ```
  
  ```
  # index.md
  ## Colores Primarios
  - [Rojo](rojo.md)
  - [Verde](verde.md)
  - [Azul](azul.md)
  
  # rojo.md
  ## Rojo
  Este es el color rojo.
  
  # verde.md
  ## Verde
  Este es el color verde.
  
  # azul.md
  ## Azul
  Este es el color azul.
  ```

  3. *Construir el sitio:*

  ```
  mkdocs build -f /var/www/jdlordinaria/t1/e1/info/mkdocs.yml
  ```

  CONTINUAR:

  https://chatgpt.com/c/b5851bd1-26c9-42a0-9c1a-402645991092

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
