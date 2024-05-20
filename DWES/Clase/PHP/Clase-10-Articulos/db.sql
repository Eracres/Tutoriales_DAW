DROP TABLE IF EXISTS articulos;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS tokens;

CREATE TABLE articulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    contenido VARCHAR(255) NOT NULL, 
    fecha DATE NOT NULL
);


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nombre, contrasena) VALUES ('Sergio', '$2y$10$6EwZm4QoVNZpC3Mv4qY3Q.ttJ9sHvgcIkDeIt902CBIoSL/79Lcx.');

CREATE TABLE tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    usuario_id INT NOT NULL,
    fecha_validez DATETIME NOT NULL,
    consumido BOOLEAN NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);


