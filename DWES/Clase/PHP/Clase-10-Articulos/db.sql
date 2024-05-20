DROP TABLE IF EXISTS articulos;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE articulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    contenido VARCHAR(255) NOT NULL, 
    fecha DATE NOT NULL
);


INSERT INTO articulos (titulo, contenido, fecha) VALUES ('Lapicero', 2, '2024-05-10');


CREATE TABLE usuarios (
    nombre VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nombre, contrasena) VALUES ('Sergio', '$2y$10$6EwZm4QoVNZpC3Mv4qY3Q.ttJ9sHvgcIkDeIt902CBIoSL/79Lcx.');