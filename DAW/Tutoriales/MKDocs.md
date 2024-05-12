# MKDocs: Instalación y despliegue

## Paso 1:

```
sudo apt install python3-pip
```

## Paso 2:

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
