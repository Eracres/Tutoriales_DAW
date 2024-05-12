# Ejercicio 1

Vamos ha realizar paso a paso el ejercicio por sus apartados:

  * Crea un usuario en el servidor: scrordinaria. CAPTURA

  Abrimos Terminal y accedemos al server:

  ```
  ssh eracres@scrordinaria.es
  ```

  A continuación creamos el user:
  
  ```
  sudo adduser scrordinaria
  ```
    
  * Tanto el espacio web como el host estarán asociados al usuario, permisos
  más restrictivos.

  Para la modificacion de permisos tenemos que realizar el siguiente comando:

      - Permisos para el host:

      ```
      sudo chmod -R 700 /var/www/html
      ```
      
      - Permisos para el espacion web:

      ```
      <VirtualHost *:80>
          ServerAdmin webmaster@localhost
          DocumentRoot /var/www/html
          ErrorLog ${APACHE_LOG_DIR}/error.log
          CustomLog ${APACHE_LOG_DIR}/access.log combined
          User jdlordinaria
          Group jdlordinaria
      </VirtualHost>

      ```
 
  * Crea un espacio web en /var/www/jdlordinaria/t1/e1/ CAPTURA
  * Crea un virtualhost jdlordinaria.t1.e1.es. CAPTURA
  * En él habrá dos directorios: info y doc
  * En info habrá un mkdoc con una página por cada color primario: RGB.
      – Página rojo, verde y amarillo. Más una página con enlace a ellas.
      – Mete el mkdoc en la entrega final.
      – Haz un pantallazo de la página servida con mkdocs
      – Sube al servidor la página construida. CAPTURA
      – Haz un pantallazo de la página funcionando en el servidor.
