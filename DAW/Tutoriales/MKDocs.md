# MKDocs: Instalación y despliegue

## Paso 1: Crear el Virtual Host con el nombre que queremos asignar (Cliente)

```
sudo nano /etc/hosts
```

Dentro creas el nombre de host que quieres

## Paso 2: Crear el fichero .conf de apache para el despliegue (Server)

```
cd /etc/apache2/sites-aviable/
cp 000-default.conf 001-loquequieras.conf
micro 001-loquequieras.conf
```

```
<VirtualHost *:80>

        ServerName mkdocs.es

        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/mkdocs.es/nuevo/site/

        <Directory /var/www/mkdocs.es/nuevo/site/>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
```

## Paso 3: Habilita el fichero .conf (Server)

```
a2ensite 001-loquequieras.conf
systemctl reload apache2
```

## Paso 4: Genera el fichero donde se alojará el mkdocs (Server)

```
cd /var/www/
mkdir loquequieras
```

## Paso 5: Crea un nuevo proyecto mkdocs en el directorio que quieras (Cliente)

```
mkdocs new loquequieras
cd loquequieras
```

## Paso 5: Gestiona el fichero mkdocs.yml como desees, por ejemplo: (Cliente)

```
micro mkdocs.yml
```

```
site_name: RockStar

theme: dracula

nav:
  - Home: index.md
  - Sangre: sangre.md
  - Volar: volar.md
  - Nocturno: nocturno.md
```

## Paso 6: Genera los MarkDowns dentro de la carpeta docs: (Cliente)

```
cd docs
micro index.md
```

```markdown

# Welcome to MkDocs

For full documentation visit [mkdocs.org](https://www.mkdocs.org).

## Commands

* `mkdocs new [dir-name]` - Create a new project.
* `mkdocs serve` - Start the live-reloading docs server.
* `mkdocs build` - Build the documentation site.
* `mkdocs -h` - Print help message and exit.

## Project layout

    mkdocs.yml    # The configuration file.
    docs/
        index.md  # The documentation homepage.
        ...       # Other markdown pages, images and other files.

## Enlaces

* [Sangre](sangre.md)
* [Volar](volar.md)
* [Nocturno](nocturno.md)
```

Crear diferentes Markdowns linkados con el index detro de la misma carpeta de docs:

```markdown
# Sangre

## El vampiro solo bebe sangre
```

## Paso 6: Crear un usuario y dale permisos para trans: (Server)


Entrar en Python3
```
python3
```
Importar libreria
```
import mkdocs
```
Salir de Python3
```
exit()
```

## Paso 3:

```
pip install mkdocs
```

## Paso 4:

```
mkdocs new ejemplomkdocs
```
## Paso 5:

```
cd prueba
```

## Paso 5:

```
mkdocs serve
```

## IMPORTANTE
Para ejecuciones desde server, hace falta este codigo:
Tenemos que especificar la IP que tenemos configurada en el server

```
mkdocs serve --dev-addr 0.0.0.0:8000
```
