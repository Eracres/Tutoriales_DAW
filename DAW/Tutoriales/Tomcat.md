# TOMCAT

## 1. Instalación

- Actualizamos e instalamos
```
sudo apt update
sudo apt install openjdk-11-jdk
```

Verificamos la version de Java
```
java -version
```

Creamos un usuario del sistema
```
sudo useradd -m -U -d /opt/tomcat -s /bin/false tomcat
```

Descargamos Tomcat
```
wget https://dlcdn.apache.org/tomcat/tomcat-10/v10.1.24/bin/apache-tomcat-10.1.24-deployer.tar.gz
```

Descomprimimos
```
sudo tar -xf ./apache-tomcat-10.1.24-deployer.tar.gz -C /opt/tomcat/
```

Creamos un link simbolico
```
sudo ln -s /opt/tomcat/apache-tomcat-${VERSION} /opt/tomcat/latest
```

Damos permisos de escritura a nuesto usuario
```
sudo chown -R tomcat: /opt/tomcat
```

Ejecutamos
```
sudo sh -c 'chmod +x /opt/tomcat/latest/bin/*.sh'
```
