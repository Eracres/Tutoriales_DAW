DROP TABLE IF EXISTS acciones;

CREATE TABLE acciones (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    fecha           DATE,
    lugar           VARCHAR(255) NOT NULL,
    nombre          VARCHAR(255),
    descripcion     TEXT,
    foto            VARCHAR(255)
);

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-22','Madrid','Pedro','Planto una flor', '/subidas/flores.jpg');
