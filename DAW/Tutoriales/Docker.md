# DOCKER

## 1. Instalacion

*1.1 Desinstalar versiones antigüas*
```
for pkg in docker.io docker-doc docker-compose docker-compose-v2 podman-docker containerd runc; do sudo apt-get remove $pkg; done
```

*1.2 Instalar Docker Engine mediante repositorio*

- Actualizamos e instalamos certificados
```
sudo apt-get update
sudo apt-get install ca-certificates curl
```

- Instalamos
```
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc
```

- Añadimos el repositorio
```
echo \
"deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
$(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
```

- Instalamos docker
```
apt install docker
```

- Instalamos la última versión
```
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

## 2. Lanzar un "Hello World"
```
sudo docker run hello-world
```

