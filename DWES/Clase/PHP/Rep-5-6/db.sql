DROP TABLE IF EXISTS botanica;

CREATE TABLE botanica (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    fecha           DATE NOT NULL,
    lugar           VARCHAR(255) NOT NULL,
    nombre          VARCHAR(255),
    descripcion     TEXT, 
    foto            VARCHAR(255) NOT NULL
);

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-04-22', 'Madrid', 'Sergio', 'Plantó un arbol', 'subidas/arbol.jpg');