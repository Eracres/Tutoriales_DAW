# PHPDocs: Instalacion y despliegue

## Paso 1

```
sudo apt install php-mbstring
sudo apt install php-cli
sudo apt install php-xml
```


## Paso 2

```
mkdir ejemplophp
cd ejemplophp
mkdir src
mkdir docs
```



## Paso 3

```
wget https://phpdoc.org/phpDocumentor.phar
```

## Paso 4

```
cd src
sudo nano Perro.php
```

## Paso 4

```php
<?php

/**
 * Esta clase representa a un perro
 */

 class Perro{
    public $nombre;

    /**
     * Hace que el perro ladre
     * 
     * @param integer $veces indica el numero de ladridos 
     * @param integer $tipo indica el ladrido, por defecto "Guau"
     * 
     * @return void
     */
    public function ladra(int $veces, string $tipo="Guau")
    {
        for ($i=0; $i < $veces; $i++){
            echo $tipo;
        }
    }
    
 }
 
?>
```

## Paso 5

```
chmod u+x phpDocumentor.phar
```

## Paso 6

```
php phpDocumentor.phar
```

## Paso 7

```
./phpDocumentor.phar run -d src/ -t docs/
```

## Paso 8

```
xdg-open docs/index.html
```
